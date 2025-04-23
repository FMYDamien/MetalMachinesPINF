<?php
require_once 'PHP/config.php';

$folder = __DIR__ . '/HTML/';
$files = glob($folder . '*.php');

$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

foreach ($files as $filePath) {
    $slug = basename($filePath, '.php');
    $is_en = str_ends_with($slug, '_en');
    $clean_slug = $is_en ? substr($slug, 0, -3) : $slug;

    // 1. Récupérer id_page
    $stmt = $pdo->prepare("SELECT id_page FROM page WHERE slug = ?");
    $stmt->execute([$clean_slug]);
    $id_page = $stmt->fetchColumn();

    if (!$id_page) {
        echo "⚠️ Page non trouvée : $clean_slug\n";
        continue;
    }

    // 2. Charger le fichier
    $html = file_get_contents($filePath);
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    $nodes = $xpath->query('//*[@class and contains(@class, "editable")]');

    $order = 1;
    foreach ($nodes as $node) {
        $tag = strtolower($node->nodeName);
        $type = null;
        $contenu = null;
        $id_media = null;

        // Déterminer type & contenu
        if (in_array($tag, ['h1', 'h2', 'h3', 'h4'])) {
            $type = 'titre';
            $contenu = trim($node->textContent);
        } elseif ($tag === 'p') {
            $type = 'paragraphe';
            $contenu = trim($node->textContent);
        } elseif ($tag === 'img') {
            $type = 'image';
            $src = $node->getAttribute('src');
            $nom = basename($src);
            $chemin = str_replace('..', '', dirname($src));

            // Vérifie si le média existe déjà
            $stmt = $pdo->prepare("SELECT id_media FROM media WHERE nom_fichier = ? AND chemin = ?");
            $stmt->execute([$nom, $chemin]);
            $id_media = $stmt->fetchColumn();

            if (!$id_media) {
                $fullPath = realpath(__DIR__ . "/HTML/$src");
                $taille = file_exists($fullPath) ? filesize($fullPath) : null;
                $stmt = $pdo->prepare("INSERT INTO media (nom_fichier, chemin, taille) VALUES (?, ?, ?)");
                $stmt->execute([$nom, $chemin, $taille]);
                $id_media = $pdo->lastInsertId();
            }
            $contenu = null;
        } else {
            continue;
        }

        // Vérifie si déjà inséré
        $check = $pdo->prepare("SELECT id_element FROM element WHERE id_page = ? AND type = ? AND ordre = ?");
        $check->execute([$id_page, $type, $order]);
        $id_element = $check->fetchColumn();

        if (!$id_element) {
            // Nouvel élément → insère en FR ou EN selon la page
            $contenu_fr = $is_en ? null : $contenu;
            $contenu_en = $is_en ? $contenu : null;

            $insert = $pdo->prepare("INSERT INTO element (id_page, type, contenu_fr, contenu_en, ordre, deplacable, supprimable, id_media)
                                     VALUES (?, ?, ?, ?, ?, 1, 1, ?)");
            $insert->execute([$id_page, $type, $contenu_fr, $contenu_en, $order, $id_media]);

            $id_element = $pdo->lastInsertId();
        } else {
            // Élément déjà existant → met à jour uniquement contenu_en ou contenu_fr
            if ($type !== 'image') {
                if ($is_en) {
                    $stmt = $pdo->prepare("UPDATE element SET contenu_en = ? WHERE id_element = ?");
                } else {
                    $stmt = $pdo->prepare("UPDATE element SET contenu_fr = ? WHERE id_element = ?");
                }
                $stmt->execute([$contenu, $id_element]);
            }
        }

        // Injecter ou mettre à jour le data-key
        $node->setAttribute("data-key", $id_element);
        $order++;
    }

    // 3. Réécriture du fichier
    $newHtml = $dom->saveHTML();
    $newHtml = html_entity_decode($newHtml, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    file_put_contents($filePath, $newHtml);

    echo "✅ Page $slug traitée avec succès.\n";
}



// Pour ajouter des éléments et médias, entrez l'URL suivante dans le navigateur :
// http://localhost/MetalMachines-main/scan_editables.php
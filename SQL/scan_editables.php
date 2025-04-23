<?php
require_once 'PHP/config.php';

$folder = __DIR__ . '/HTML/';
$files = glob($folder . '*.php');

$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

foreach ($files as $filePath) {
    $filename = basename($filePath, '.php');
    $is_en = str_ends_with($filename, '_en');
    $slug = $is_en ? substr($filename, 0, -3) : $filename;

    // Récupère l'ID de la page
    $stmt = $pdo->prepare("SELECT id_page FROM page WHERE slug = ?");
    $stmt->execute([$slug]);
    $id_page = $stmt->fetchColumn();

    if (!$id_page) {
        echo "⚠️ Page non trouvée en BDD : $slug\n";
        continue;
    }

    // Charge le contenu du fichier
    $html = file_get_contents($filePath);
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    // Trouver tous les éléments éditables
    $nodes = $xpath->query('//*[@class and contains(@class, "editable")]');
    $order = 1;

    foreach ($nodes as $node) {
        $tag = strtolower($node->nodeName);
        $type = null;
        $contenu_fr = null;
        $contenu_en = null;
        $id_media = null;

        // Déterminer type + contenu
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
            $chemin = dirname($src);

            $stmt = $pdo->prepare("SELECT id_media FROM media WHERE nom_fichier = ? AND chemin = ?");
            $stmt->execute([$nom, $chemin]);
            $id_media = $stmt->fetchColumn();

            if (!$id_media) {
                $stmt = $pdo->prepare("INSERT INTO media (nom_fichier, chemin) VALUES (?, ?)");
                $stmt->execute([$nom, $chemin]);
                $id_media = $pdo->lastInsertId();
            }
        } else {
            continue; // balise non prise en charge
        }

        // Choisir la bonne colonne à remplir
        if ($type !== 'image') {
            if ($is_en) {
                $contenu_en = $contenu;
            } else {
                $contenu_fr = $contenu;
            }
        }

        // Vérifie s'il existe déjà un élément équivalent
        $check = $pdo->prepare("SELECT id_element FROM element WHERE id_page = ? AND type = ? AND ordre = ?");
        $check->execute([$id_page, $type, $order]);
        $id_element = $check->fetchColumn();

        if (!$id_element) {
            $insert = $pdo->prepare("INSERT INTO element (id_page, type, contenu_fr, contenu_en, ordre, deplacable, supprimable, id_media)
                                     VALUES (?, ?, ?, ?, ?, 1, 1, ?)");
            $insert->execute([$id_page, $type, $contenu_fr, $contenu_en, $order, $id_media]);
            $id_element = $pdo->lastInsertId();
        } else {
            // Mise à jour du contenu s'il existe déjà
            $update = $pdo->prepare("UPDATE element SET contenu_fr = ?, contenu_en = ?, id_media = ? WHERE id_element = ?");
            $update->execute([$contenu_fr, $contenu_en, $id_media, $id_element]);
        }

        // Injecter l'attribut data-key
        $node->setAttribute("data-key", $id_element);
        $order++;
    }

    // Réécriture du fichier avec les data-key à jour
    $newHtml = html_entity_decode($dom->saveHTML(), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    file_put_contents($filePath, $newHtml);

    echo "✅ Page $filename analysée et synchronisée.\n";
}

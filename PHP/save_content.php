<?php
session_start();
require_once 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['admin'])) {
    http_response_code(403);
    exit('Non autorisé');
}

$data = json_decode(file_get_contents('php://input'), true);

$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$lang = 'fr'; // tu peux le rendre dynamique si besoin

// 1. Sauvegarde des textes
if (!empty($data['batch'])) {
    foreach ($data['batch'] as $update) {
        $id = $update['id_element'];
        $contenu = $update['contenu'];
        $lang = $update['lang'] === 'en' ? 'en' : 'fr';

        $stmt = $pdo->prepare("UPDATE element SET contenu_$lang = ? WHERE id_element = ?");
        $stmt->execute([$contenu, $id]);
    }
}

// 2. Sauvegarde des images (définitive)
if (!empty($data['images'])) {
    foreach ($data['images'] as $img) {
        $filename = $img['filename'];
        $elementId = intval($img['element_id']);
        $type = $img['type'] ?? 'image/png';
        $chemin = 'uploads';

        // Vérifie si ce fichier existe
        $fullPath = __DIR__ . '/../uploads/' . $filename;
        if (!file_exists($fullPath)) continue;

        $taille = filesize($fullPath);

        // Insertion dans media
        $stmt = $pdo->prepare("INSERT INTO media (nom_fichier, chemin, taille, type) VALUES (?, ?, ?, ?)");
        $stmt->execute([$filename, $chemin, $taille, $type]);
        $mediaId = $pdo->lastInsertId();

        // Mise à jour de l’élément
        $stmt = $pdo->prepare("UPDATE element SET id_media = ? WHERE id_element = ?");
        $stmt->execute([$mediaId, $elementId]);
    }
}

echo json_encode(['success' => true]);

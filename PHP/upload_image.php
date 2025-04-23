<?php
session_start();
require_once 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['admin'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'Non autorisé']);
    exit;
}

if (!isset($_FILES['image'])) {
    echo json_encode(['success' => false, 'error' => 'Image manquante']);
    exit;
}

$uploadDir = realpath(__DIR__ . '/../uploads');
if (!$uploadDir) {
    echo json_encode(['success' => false, 'error' => 'Dossier inexistant']);
    exit;
}

// Créer si nécessaire
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}
if (!is_writable($uploadDir)) {
    echo json_encode(['success' => false, 'error' => 'Dossier non accessible en écriture']);
    exit;
}

$type = 'image/png'; // on force le type ici aussi
$extension = '.png';
$filename = str_replace('.', '', uniqid('img_', true)) . $extension;


$uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $filename;

// ✅ Remplacement ici :
$imageData = file_get_contents($_FILES['image']['tmp_name']);
if (file_put_contents($uploadPath, $imageData) === false) {
    echo json_encode(['success' => false, 'error' => 'Échec de l\'enregistrement du fichier']);
    exit;
}

// Retourne l’URL pour affichage + nom temporaire
$imageUrl = "/MetalMachines-main/uploads/$filename";

echo json_encode([
    'success' => true,
    'image_url' => $imageUrl,
    'temp_filename' => $filename
]);

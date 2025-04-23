<?php
session_start();
require_once 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['admin'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'Non autorisé']);
    exit;
}

$uploadsDir = realpath(__DIR__ . '/../uploads');
if (!$uploadsDir || !is_dir($uploadsDir)) {
    echo json_encode(['success' => false, 'error' => 'Dossier introuvable']);
    exit;
}

$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 1. Supprimer les fichiers sur disque qui ne sont pas en BDD (orphans physiques)
$stmt = $pdo->query("SELECT nom_fichier FROM media");
$dbFiles = $stmt->fetchAll(PDO::FETCH_COLUMN);

$filesOnDisk = scandir($uploadsDir);
$deleted = [];

foreach ($filesOnDisk as $file) {
    if ($file === '.' || $file === '..') continue;

    if (!in_array($file, $dbFiles)) {
        $path = $uploadsDir . DIRECTORY_SEPARATOR . $file;
        if (is_file($path) && unlink($path)) {
            $deleted[] = $file;
        }
    }
}

// 2. Supprimer les fichiers présents en BDD mais plus liés à aucun élément
$stmt = $pdo->query("
    SELECT m.nom_fichier
    FROM media m
    LEFT JOIN element e ON m.id_media = e.id_media
    WHERE e.id_media IS NULL
");
$orphanFiles = $stmt->fetchAll(PDO::FETCH_COLUMN);

foreach ($orphanFiles as $file) {
    $path = $uploadsDir . DIRECTORY_SEPARATOR . $file;
    if (is_file($path) && unlink($path)) {
        $deleted[] = $file;
    }

    // Supprimer de la BDD
    $stmt = $pdo->prepare("DELETE FROM media WHERE nom_fichier = ?");
    $stmt->execute([$file]);
}

echo json_encode([
    'success' => true,
    'deleted' => $deleted
]);

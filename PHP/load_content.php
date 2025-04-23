<?php

require_once 'config.php';

$lang = $_GET['lang'] ?? 'fr';
$page = $_GET['page'] ?? '';

if (!$page) exit(json_encode([]));

$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

$stmt = $pdo->prepare("SELECT element.id_element, element.type, element.contenu_$lang AS contenu, media.nom_fichier, media.chemin
                       FROM element
                       LEFT JOIN media ON element.id_media = media.id_media
                       JOIN page ON element.id_page = page.id_page
                       WHERE page.slug = ?");
$stmt->execute([$page]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);



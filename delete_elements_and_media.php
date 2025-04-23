<?php
require_once 'PHP/config.php';

if ($_GET['confirm'] !== 'oui') {
    exit("🛑 Confirmation requise : ajouter ?confirm=oui à l'URL.");
}

try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Supprimer d'abord les éléments (car ils dépendent des médias via id_media)
    $pdo->exec("DELETE FROM element");
    $pdo->exec("DELETE FROM media");

    echo "✅ Tous les éléments et médias ont été supprimés avec succès.";
} catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage();
}

// Pour réinitialiser les éléments et médias, entrez l'URL suivante dans le navigateur :
// http://localhost/MetalMachines-main/delete_elements_and_media.php            
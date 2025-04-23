<?php
session_start();
require_once 'config.php'; // Fichier de connexion à la BDD

function hashPassword($password, $salt) {
    return hash('sha256', $password . $salt);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'Connexion') {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = ?");
    $stmt->execute([$email]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        $hashed = hashPassword($mdp, $admin['salt']);
        if ($hashed === $admin['mot_de_passe']) {
            $_SESSION['admin'] = [
                'email' => $admin['email'],
                'login_time' => time()
            ];
            header('Location: ../HTML/accueil.php'); // Redirection vers la page d'accueil
            exit; 
        }
    }

    // En cas d'échec
    header('Location: ../HTML/admin.php?erreur=1');
    exit;
}

// Déconnexion
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: ../HTML/accueil.php');
    exit;
}

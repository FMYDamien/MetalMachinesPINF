<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - MetalMachines</title>
    <link rel="stylesheet" href="../CSS/style-contact.css"> 
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="contact-container">
        <!-- Section Formulaire de connexion -->
        <section class="contact-form">
            <h2>Connexion</h2>
            <p class="contact-subtitle">
                La connexion n’est utile que pour les administrateurs de ce site.
            </p>
            <form id="contactForm" action="../PHP/controleur.php" method="POST">
                <div>
                    <input type="email" id="email" name="email" required placeholder="Identifiant/email">
                </div>
                <div>
                    <input type="password" id="sujet" name="mdp" required placeholder="Mot de passe">
                    <!-- <a href="#">Mot de passe oublié ?</a> -->
                </div> 
                <button type="submit" name="action" value="Connexion" class="btn-submit">Se connecter</button>
            </form>

            <?php if (isset($_GET['erreur'])): ?>
                <p style="color:red;">Identifiants incorrects</p>
            <?php endif; ?>

            
        </section>
    </main>
</body>
</html>

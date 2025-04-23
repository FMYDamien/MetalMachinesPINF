<?php 
    if (session_status() === PHP_SESSION_NONE) session_start(); 
    $current = basename($_SERVER['PHP_SELF']);
?>

<header>
    <div class="logo">
        <a href="accueil.php">
            <img src="../img/logo.png" alt="Logo de l'entreprise">
        </a>
    </div>

    <div class="language-switch">
        <select id="languageSelect">
            <option value="fr" <?= str_ends_with($current, '_en.php') ? '' : 'selected' ?>>⚑ Français</option>
            <option value="en" <?= str_ends_with($current, '_en.php') ? 'selected' : '' ?>>⚑ English</option>
        </select>
    </div>

    <nav>
        <ul class="menu">
            <li><a href="accueil.php" style="<?= $current === 'accueil.php' ? 'color:gray;' : '' ?>">Accueil</a></li>
            <li class="dropdown">L'entreprise
                <ul class="submenu">
                    <li><a href="qui-sommes-nous.php" style="<?= $current === 'qui-sommes-nous.php' ? 'color:gray;' : '' ?>">Qui sommes-nous ?</a></li>
                    <li><a href="atelier.php" style="<?= $current === 'atelier.php' ? 'color:gray;' : '' ?>">Atelier</a></li>
                    <li><a href="bureau.php" style="<?= $current === 'bureau.php' ? 'color:gray;' : '' ?>">Bureau d'études</a></li>
                    <li><a href="laboratoire.php" style="<?= $current === 'laboratoire.php' ? 'color:gray;' : '' ?>">Laboratoire d'essais</a></li>
                </ul>
            </li>
            <li class="dropdown">Savoir-faire
                <ul class="submenu">
                    <li><a href="competences.php" style="<?= $current === 'competences.php' ? 'color:gray;' : '' ?>">Nos compétences</a></li>
                    <li><a href="realisations.php" style="<?= $current === 'realisations.php' ? 'color:gray;' : '' ?>">Nos réalisations</a></li>
                    <li><a href="industrie.php" style="<?= $current === 'industrie.php' ? 'color:gray;' : '' ?>">Industrie</a></li>
                </ul>
            </li>
            <li><a href="actualites.php" style="<?= $current === 'actualites.php' ? 'color:gray;' : '' ?>">Actualités</a></li>
            <li id="contact-button"><a href="contact.php" style="<?= $current === 'contact.php' ? 'color:gray;' : '' ?>">Nous contacter</a></li>
        </ul>
    </nav>
</header>

<script>
    document.getElementById('languageSelect').addEventListener('change', function() {
        const lang = this.value;
        const currentPage = "<?= $current ?>";
        const baseName = currentPage.replace('_en.php', '').replace('.php', '');

        let newPage = baseName + (lang === 'en' ? '_en.php' : '.php');

        window.location.href = newPage;
    });
</script>
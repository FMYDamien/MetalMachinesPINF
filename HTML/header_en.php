<?php 
    if (session_status() === PHP_SESSION_NONE) session_start(); 
    $current = basename($_SERVER['PHP_SELF']);
?>

<header>
    <div class="logo">
        <a href="accueil_en.php">
            <img src="../img/logo.png" alt="Company logo">
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
            <li><a href="accueil_en.php" style="<?= $current === 'accueil_en.php' ? 'color:gray;' : '' ?>">Home</a></li>
            <li class="dropdown">Company
                <ul class="submenu">
                    <li><a href="qui-sommes-nous_en.php" style="<?= $current === 'qui-sommes-nous_en.php' ? 'color:gray;' : '' ?>">About us</a></li>
                    <li><a href="atelier_en.php" style="<?= $current === 'atelier_en.php' ? 'color:gray;' : '' ?>">Workshop</a></li>
                    <li><a href="bureau_en.php" style="<?= $current === 'bureau_en.php' ? 'color:gray;' : '' ?>">Engineering office</a></li>
                    <li><a href="laboratoire_en.php" style="<?= $current === 'laboratoire_en.php' ? 'color:gray;' : '' ?>">Test laboratory</a></li>
                </ul>
            </li>
            <li class="dropdown">Expertise
                <ul class="submenu">
                    <li><a href="competences_en.php" style="<?= $current === 'competences_en.php' ? 'color:gray;' : '' ?>">Our expertise</a></li>
                    <li><a href="realisations_en.php" style="<?= $current === 'realisations_en.php' ? 'color:gray;' : '' ?>">Our projects</a></li>
                    <li><a href="industrie_en.php" style="<?= $current === 'industrie_en.php' ? 'color:gray;' : '' ?>">Industry</a></li>
                </ul>
            </li>
            <li><a href="actualites_en.php" style="<?= $current === 'actualites_en.php' ? 'color:gray;' : '' ?>">News</a></li>
            <li id="contact-button"><a href="contact_en.php" style="<?= $current === 'contact_en.php' ? 'color:gray;' : '' ?>">Contact us</a></li>
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
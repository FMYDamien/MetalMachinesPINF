<!DOCTYPE html>
<?php session_start(); ?><html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - MetalMachines</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>

<body>
    <?php include 'header.php'; ?>


    <main>

        <!--Section d'introduction-->
        <section class="box" id="intro">
            <div class="column1">
                <h1 class="editable" data-key="1381">Métal Machines Industrie</h1>
                <p class="editable" data-key="1382">Bureau d'étude et atelier spécialisé dans le travail du métal, de la soudure, de la mécanique et de la conception.</p>
                <a id="btn" class="btn">Explorer</a>
            </div>
            <div class="column2">
                <img id="img1" src="../img/image1.png" alt="Image de l'entreprise" class="editable" data-key="1383">
            </div>
        </section>

        <!--Section de présentation-->
        <section class="box" id="about">
            <div class="column1">
                <h2 class="editable" data-key="1384">Qui sommes-nous ?</h2>
                <p class="editable" data-key="1385">Depuis 2010, historiquement par passion, nous avons conçu et fabriqué de multiples véhicules, motorisés ou non. De part cette expérience, notre équipe peut vous conseiller et répondre à vos besoins.</p>
                <a class="btn1" href="qui-sommes-nous.php">En savoir plus</a>
            </div>
            <div class="column2">
                <img id="img2" src="../img/image2.png" alt="Image de l'équipe" class="editable" data-key="1386">
            </div>
        </section>

        <!--Section du savoir-faire-->
        <section class="box" id="know">
            <div class="column1">
                <h2 class="editable" data-key="1387">Notre savoir-faire</h2>
                <p class="editable" data-key="1388">La polyvalence du métal et des matériaux modernes, offre un champ d’applications quasi infini qui nous amène à travailler avec différents secteurs d’activités.</p>
                <a class="btn1" href="competences.php">En savoir plus</a>
            </div>
            <div class="column2">
                <img id="img3" src="../img/image3.png" alt="Image de notre savoir-faire." class="editable" data-key="1389">
            </div>
        </section>

        <!--Section du plan-->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5080.960244676391!2d2.6083506999999995!3d50.4507835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dd3d7b009f1ebf%3A0x8544bf56153bcfef!2sM%C3%A9tal%20Machines!5e0!3m2!1sfr!2sfr!4v1745136953062!5m2!1sfr!2sfr" width="1920" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <!--Section pour le formulaire / le contact-->
        <section class="contact-container" id="infos">

            <!-- Sous-section Formulaire de contact -->
            <section class="contact-form">
                <h2 class="editable" data-key="1390">Besoin d’informations ?</h2>
                <p class="contact-subtitle editable" data-key="1391">
                    Merci de remplir ce formulaire, nous vous recontacterons si nécessaire !
                </p>
                <form id="contactForm" action="https://formsubmit.co/fa746346356eddcd7eb7c6aff66bd391" method="POST">
                    <div>
                        <label for="nom">Nom / Société</label>
                        <input type="text" id="nom" name="nom" required placeholder="Entrez votre nom">
                    </div>
                    <div>
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required placeholder="Entrez votre e-mail">
                    </div>
                    <div>
                        <label for="sujet">Sujet</label>
                        <input type="text" id="sujet" name="sujet" required placeholder="Entrez le sujet">
                    </div>
                    <div>
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Entrez votre message"></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Envoyer</button>
                </form>    
            </section>

            <!-- Sous-section Informations de contact -->
            <section class="contact-info">
                <h2 class="editable" data-key="1392">Nos informations de contact</h2>
                <p class="contact-subtitle editable" data-key="1393">Vous pouvez également nous contacter directement ici :
                </p>
                <ul>
                    <li><a href="tel:+3303216431"><p class="editable" data-key="1394"> 📱 +33 03 21 64 02 31</p></a></li>
                    <li><a href="mailto:contact@metalmachines.com"><p class="editable" data-key="1395"> 🖂 contact@metalmachines.com</p></a></li>
                    <h3 class="editable" data-key="1396">OU SUR RENDEZ-VOUS</h3>
                    <p class="contact-subtitle editable" data-key="1397">9h/12h - 14h/18h du lundi au vendredi </p>
                    <li><a href="https://www.google.com/maps/place/105+Allee+Raymond+Derancy,+62620+Barlin,+France/@50.4507835,2.6057758,17z/data=!3m1!4b1!4m6!3m5!1s0x47dd3d7b00f19f1f:0x510a462f4b60fa32!8m2!3d50.4507835!4d2.6083507!16s%2Fg%2F11f6dqn5tc?hl=fr-FR&entry=ttu&g_ep=EgoyMDI1MDEwOC4wIKXMDSoJLDEwMjExMjMzSAFQAw%3D%3D" target="_blank">📍 105 allée Raymond Derancy Zone Actigreen, 62620 Barlin</a></li>
                </ul>
                <hr id="hr">
                <ul>
                    <h4 class="editable" data-key="1398">Retrouvez nos actualités ici :</h4>
                    <li>
                        <a href="https://www.linkedin.com/in/metal-machines-g%C3%A9rant-jean-fran%C3%A7ois-cr%C3%A9pin-11053a201/" target="_blank">
                        <img id="linkedin" src="../img/linkedin.png" alt="Logo LinkedIn">LinkedIn</a>
                    </li>
                </ul>
            </section>
        </section>
    </main>

    <script>
    document.getElementById('btn').addEventListener('click', function() {
        document.getElementById('know').scrollIntoView({
            behavior: 'smooth' // Le défilement est lissé
        });
    });
    </script>


    <?php include 'footer.php'; ?>
</body>
</html>

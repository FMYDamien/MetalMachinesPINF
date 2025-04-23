<!DOCTYPE html>
<?php session_start(); ?><html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter - MetalMachines</title>
    <link rel="stylesheet" href="../CSS/style-contact.css"> 
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="contact-container">
        <!-- Section Formulaire de contact -->
        <section class="contact-form">
            <h2 class="editable" data-key="1439">Besoin d’informations ?</h2>
            <p class="contact-subtitle editable" data-key="1440">
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


        <!-- Section Informations de contact -->
        <section class="contact-info">
            <h2 class="editable" data-key="1441">Nos informations de contact</h2>
            <p class="contact-subtitle editable" data-key="1442">Vous pouvez également nous contacter directement ici :
            </p>
            <ul>
                <li><a href="tel:+3303216431"><p class="editable" data-key="1443"> 📱 +33 03 21 64 02 31</p></a></li>
                <li><a href="mailto:contact@metalmachines.com"><p class="editable" data-key="1444"> 🖂 contact@metalmachines.com</p></a></li>
                <h3 class="editable" data-key="1445">OU SUR RENDEZ-VOUS</h3>
                <p class="contact-subtitle editable" data-key="1446">9h/12h - 14h/18h du lundi au vendredi
                </p>
                <li><a href="https://www.google.com/maps/place/105+Allee+Raymond+Derancy,+62620+Barlin,+France/@50.4507835,2.6057758,17z/data=!3m1!4b1!4m6!3m5!1s0x47dd3d7b00f19f1f:0x510a462f4b60fa32!8m2!3d50.4507835!4d2.6083507!16s%2Fg%2F11f6dqn5tc?hl=fr-FR&entry=ttu&g_ep=EgoyMDI1MDEwOC4wIKXMDSoJLDEwMjExMjMzSAFQAw%3D%3D" target="_blank">📍 105 allée Raymond Derancy Zone Actigreen, 62620 Barlin</a></li>
            </ul>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5080.960244676391!2d2.6083506999999995!3d50.4507835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dd3d7b009f1ebf%3A0x8544bf56153bcfef!2sM%C3%A9tal%20Machines!5e0!3m2!1sfr!2sfr!4v1745136953062!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <ul>
                <h4 class="editable" data-key="1447">Retrouvez nos actualités ici :</h4>
                <li><a href="https://www.linkedin.com/in/metal-machines-g%C3%A9rant-jean-fran%C3%A7ois-cr%C3%A9pin-11053a201/" target="_blank"><img id="linkedin" src="../img/linkedin.png">LinkedIn</a></li>
            </ul>
        </section>
    </main>
    
    <?php include 'footer.php'; ?>

</body>
</html>

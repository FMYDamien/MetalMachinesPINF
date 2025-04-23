<!DOCTYPE html>
<?php session_start(); ?><html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - MetalMachines</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>

<body>
    <?php include 'header_en.php'; ?>


    <main>

        <!--Section d'introduction-->
        <section class="box" id="intro">
            <div class="column1">
                <h1 class="editable" data-key="1381">Métal Machines Industry</h1>
                <p class="editable" data-key="1382">Design office and workshop specialising in metalwork, welding, mechanics and design.</p>
                <a id="btn" class="btn">Explore</a>
            </div>
            <div class="column2">
                <img id="img1" src="../img/image1.png" alt="Company image" class="editable" data-key="1383">
            </div>
        </section>

        <!--Section de présentation-->
        <section class="box" id="about">
            <div class="column1">
                <h2 class="editable" data-key="1384">Who are we?</h2>
                <p class="editable" data-key="1385">Since 2010, we've been designing and building a wide range of vehicles, both motorised and non-motorised, out of passion. Thanks to this experience, our team can advise you and meet your needs.</p>
                <a class="btn1" href="qui-sommes-nous.php">Read more</a>
            </div>
            <div class="column2">
                <img id="img2" src="../img/image2.png" alt="Team image" class="editable" data-key="1386">
            </div>
        </section>

        <!--Section du savoir-faire-->
        <section class="box" id="know">
            <div class="column1">
                <h2 class="editable" data-key="1387">Our expertise</h2>
                <p class="editable" data-key="1388">The versatility of metal and modern materials offers an almost infinite range of applications, leading us to work with a variety of sectors.</p>
                <a class="btn1" href="competences.php">Read more</a>
            </div>
            <div class="column2">
                <img id="img3" src="../img/image3.png" alt="An image of our expertise" class="editable" data-key="1389">
            </div>
        </section>

        <!--Section du plan-->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5080.960244676391!2d2.6083506999999995!3d50.4507835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dd3d7b009f1ebf%3A0x8544bf56153bcfef!2sM%C3%A9tal%20Machines!5e0!3m2!1sfr!2sfr!4v1745136953062!5m2!1sfr!2sfr" width="1920" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <!--Section pour le formulaire / le contact-->
        <section class="contact-container" id="infos">

            <!-- Sous-section Formulaire de contact -->
            <section class="contact-form">
                <h2 class="editable" data-key="1390">Need more information?</h2>
                <p class="contact-subtitle editable" data-key="1391">
                    Please fill in this form and we'll get back to you if necessary!
                </p>
                <form id="contactForm" action="https://formsubmit.co/fa746346356eddcd7eb7c6aff66bd391" method="POST">
                    <div>
                        <label for="nom">Name / Company</label>
                        <input type="text" id="nom" name="nom" required placeholder="Enter your name">
                    </div>
                    <div>
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your e-mail address">
                    </div>
                    <div>
                        <label for="sujet">Topic</label>
                        <input type="text" id="sujet" name="sujet" required placeholder="Enter the subject">
                    </div>
                    <div>
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Enter your message"></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Send</button>
                </form>    
            </section>

            <!-- Sous-section Informations de contact -->
            <section class="contact-info">
                <h2 class="editable" data-key="1392">Our contact details</h2>
                <p class="contact-subtitle editable" data-key="1393">You can also contact us directly here:
                </p>
                <ul>
                    <li><a href="tel:+3303216431"><p class="editable" data-key="1394"> 📱 +33 03 21 64 02 31</p></a></li>
                    <li><a href="mailto:contact@metalmachines.com"><p class="editable" data-key="1395"> 🖂 contact@metalmachines.com</p></a></li>
                    <h3 class="editable" data-key="1396">OR BY APPOINTMENT</h3>
                    <p class="contact-subtitle editable" data-key="1397">9am/12pm - 2pm/6pm Monday to Friday </p>
                    <li><a href="https://www.google.com/maps/place/105+Allee+Raymond+Derancy,+62620+Barlin,+France/@50.4507835,2.6057758,17z/data=!3m1!4b1!4m6!3m5!1s0x47dd3d7b00f19f1f:0x510a462f4b60fa32!8m2!3d50.4507835!4d2.6083507!16s%2Fg%2F11f6dqn5tc?hl=fr-FR&entry=ttu&g_ep=EgoyMDI1MDEwOC4wIKXMDSoJLDEwMjExMjMzSAFQAw%3D%3D" target="_blank">📍 105 allée Raymond Derancy Zone Actigreen, 62620 Barlin</a></li>
                </ul>
                <hr id="hr">
                <ul>
                    <h4 class="editable" data-key="1398">Read our news here:</h4>
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


    <?php include 'footer_en.php'; ?>
</body>
</html>

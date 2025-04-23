<!DOCTYPE html>
<?php session_start(); ?><html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us - MetalMachines</title>
    <link rel="stylesheet" href="../CSS/style-contact.css"> 
</head>
<body>
    <?php include 'header_en.php'; ?>

    <main class="contact-container">
        <!-- Section Formulaire de contact -->
        <section class="contact-form">
            <h2 class="editable" data-key="1439">Do you need more information?</h2>
            <p class="contact-subtitle editable" data-key="1440">
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


        <!-- Section Informations de contact -->
        <section class="contact-info">
            <h2 class="editable" data-key="1441">Our contact details</h2>
            <p class="contact-subtitle editable" data-key="1442">You can also contact us directly here:</p>
            <ul>
                <li><a href="tel:+3303216431"><p class="editable" data-key="1443"> 📱 +33 03 21 64 02 31</p></a></li>
                <li><a href="mailto:contact@metalmachines.com"><p class="editable" data-key="1444"> 🖂 contact@metalmachines.com</p></a></li>
                <h3 class="editable" data-key="1445">OR BY APPOINTMENT</h3>
                <p class="contact-subtitle editable" data-key="1446">9am/12pm - 2pm/6pm Monday to Friday
                </p>
                <li><a href="https://www.google.com/maps/place/105+Allee+Raymond+Derancy,+62620+Barlin,+France/@50.4507835,2.6057758,17z/data=!3m1!4b1!4m6!3m5!1s0x47dd3d7b00f19f1f:0x510a462f4b60fa32!8m2!3d50.4507835!4d2.6083507!16s%2Fg%2F11f6dqn5tc?hl=fr-FR&entry=ttu&g_ep=EgoyMDI1MDEwOC4wIKXMDSoJLDEwMjExMjMzSAFQAw%3D%3D" target="_blank">📍 105 allée Raymond Derancy Zone Actigreen, 62620 Barlin (France)</a></li>
            </ul>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5080.960244676391!2d2.6083506999999995!3d50.4507835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dd3d7b009f1ebf%3A0x8544bf56153bcfef!2sM%C3%A9tal%20Machines!5e0!3m2!1sfr!2sfr!4v1745136953062!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <ul>
                <h4 class="editable" data-key="1447">Read our latest news here:</h4>
                <li><a href="https://www.linkedin.com/in/metal-machines-g%C3%A9rant-jean-fran%C3%A7ois-cr%C3%A9pin-11053a201/" target="_blank"><img id="linkedin" src="../img/linkedin.png" alt="Linkedin logo">LinkedIn</a></li>
            </ul>
        </section>
    </main>
    
    <?php include 'footer_en.php'; ?>

</body>
</html>

<!DOCTYPE html>
<?php session_start(); ?><html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités - MetalMachines</title>
    <link rel="stylesheet" href="../CSS/style-common.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <!--Section d'introduction-->
        <section class="box" id="intro">
            <h1 class="editable" data-key="1399">Actualités</h1>
            <p class="editable" data-key="1400">Retrouvez ici nos dernières actualités.</p>
        </section>

        <!--Section de présentation 1-->
        <section class="box" id="about2">
            <div class="column1">
                <h2 class="editable" data-key="1401">Notre dernier projet</h2>
                <p id="exception" class="editable" data-key="1402">Projet (description, client ...)</p>
            </div>
            <div class="column2">
                <img id="img1" src="../img/image1.png" alt="Image du projet" class="editable" data-key="1403">
            </div>
        </section> <br><br><br>

        <!-- Section Posts Linkedin -->
        <section class="box" id="about1">
            <div class="actu3">
                <h2 class="editable" data-key="1404">L'actualité sur nos réseaux</h2> <br><br><br> 
                <script src="https://static.elfsight.com/platform/platform.js" async></script>  <!-- Elfsight LinkedIn Feed | TEST -->
                <div class="elfsight-app-eae1a532-0eba-48ee-b840-a7024cc65600" data-elfsight-app-lazy></div>
                <!-- <div class="tagembed-widget" style="width:80%;height:50%" data-widget-id="2164392" data-tags="false"  view-url="https://widget.tagembed.com/2164392">
                </div><script src="https://widget.tagembed.com/embed.min.js" type="text/javascript"></script> -->
            </div>
        </section>

    </main>

    <?php include 'footer.php'; ?>
</body>
</html>

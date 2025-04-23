<!DOCTYPE html>
<?php session_start(); ?><html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atelier - MetalMachines</title>
    <link rel="stylesheet" href="../CSS/style-common.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <!--Section d'introduction-->
        <section class="box" id="intro">
            <h1 class="editable" data-key="1405">Atelier</h1>
            <p class="editable" data-key="1406">Présentation de l'atelier.</p>
        </section>

        <!--Section de présentation 1-->
        <section class="box" id="about2">
            <div class="column1">
                <h2 class="editable" data-key="1407">A compléter !</h2>
                <p id="exception" class="editable" data-key="1408">Lorem ipsum dolor amet, consectetur adipiscing elit. Lacinia eleifend fringilla maximus donec blandit per. Ligula vel quam vitae porta fermentum id; laoreet neque torquent. Eget praesent interdum taciti et; sit quis enim aptent. Pharetra velit hac dictum fermentum posuere maximus dictum. Enim orci pulvinar platea etiam eleifend ridiculus iaculis. Malesuada dis tortor praesent ligula bibendum interdum; laoreet mauris netus. Leo dapibus commodo tellus velit iaculis natoque at. Sagittis felis volutpat fringilla facilisis metus sagittis pharetra.</p>
            </div>
            <div class="column2">
                <img id="img1" src="../img/image1.png" alt="Image de l'atelier" class="editable" data-key="1409">
            </div>
        </section>

        <!--Section de présentation 2-->
        <section class="box" id="about1">
            <div class="column2">
                <img id="img2" src="../img/image2.png" alt="Image 2 de l'atelier" class="editable" data-key="1410">
            </div>
            <div class="column1">
                <h2 class="editable" data-key="1411">A compléter !</h2>
                <p class="editable" data-key="1412">Lorem ipsum dolor amet, consectetur adipiscing elit. Lacinia eleifend fringilla maximus donec blandit per. Ligula vel quam vitae porta fermentum id; laoreet neque torquent. Eget praesent interdum taciti et; sit quis enim aptent. Pharetra velit hac dictum fermentum posuere maximus dictum. Enim orci pulvinar platea etiam eleifend ridiculus iaculis. Malesuada dis tortor praesent ligula bibendum interdum; laoreet mauris netus. Leo dapibus commodo tellus velit iaculis natoque at. Sagittis felis volutpat fringilla facilisis metus sagittis pharetra.</p>
            </div>
        </section>

        <!--Section de présentation 3-->
        <section class="box" id="about3">
            <div class="column2">
                <img id="img3" src="../img/image3.png" alt="Image 3 de l'atelier" class="editable" data-key="1413">
            </div>
            <div class="column1">
                <img id="img4" src="../img/image4.png" alt="Image 4 de l'atelier" class="editable" data-key="1414">
            </div>
        </section>
    </main>



    <?php include 'footer.php'; ?>
</body>
</html>

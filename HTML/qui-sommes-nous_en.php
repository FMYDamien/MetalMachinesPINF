<!DOCTYPE html>
<?php session_start(); ?><html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us - MetalMachines</title>
    <link rel="stylesheet" href="../CSS/style-qsn.css">
</head>
<body>
    <?php include 'header_en.php'; ?>

    <main>
        <!--Section d'introduction-->
        <section class="box" id="intro">
            <h1 class="editable" data-key="1468">About us</h1>
            <p class="editable" data-key="1469">Find out more about our team and our company.</p>
        </section>

        <!--Section de présentation 1-->
        <section class="box" id="about1">
            <div class="column2">
                <img id="img1" src="../img/image1.png" alt="Image on our history" class="editable" data-key="1470">
            </div>
            <div class="column1">
                <h2 class="editable" data-key="1471">Our history</h2>
                <p class="editable" data-key="1472">Lorem ipsum dolor amet, consectetur adipiscing elit. Lacinia eleifend fringilla maximus donec blandit per. Ligula vel quam vitae porta fermentum id; laoreet neque torquent. Eget praesent interdum taciti et; sit quis enim aptent. Pharetra velit hac dictum fermentum posuere maximus dictum. Enim orci pulvinar platea etiam eleifend ridiculus iaculis. Malesuada dis tortor praesent ligula bibendum interdum; laoreet mauris netus. Leo dapibus commodo tellus velit iaculis natoque at. Sagittis felis volutpat fringilla facilisis metus sagittis pharetra.</p>
            </div>
        </section>

        <!--Section de présentation 2-->
        <section class="box" id="about2">
            <div class="column1">
                <h2 class="editable" data-key="1473">To be completed!</h2>
                <p id="exception" class="editable" data-key="1474">Lorem ipsum dolor amet, consectetur adipiscing elit. Lacinia eleifend fringilla maximus donec blandit per. Ligula vel quam vitae porta fermentum id; laoreet neque torquent. Eget praesent interdum taciti et; sit quis enim aptent. Pharetra velit hac dictum fermentum posuere maximus dictum. Enim orci pulvinar platea etiam eleifend ridiculus iaculis. Malesuada dis tortor praesent ligula bibendum interdum; laoreet mauris netus. Leo dapibus commodo tellus velit iaculis natoque at. Sagittis felis volutpat fringilla facilisis metus sagittis pharetra.</p>
            </div>
            <div class="column2">
                <img id="img2" src="../img/image2.png" alt="Image 2 on our history" class="editable" data-key="1475">
            </div>
        </section>

        <!--Section des partenaires-->
        <section class="clients">
            <h1 class="editable" data-key="1476">These companies put their trust in us:</h1>
            <h2 class="editable" data-key="1477">They are our customers or partners.</h2>
            <div class="grid">
                <div class="client"><img src="../img/AgroMousquetaires.png" alt="Agro Mousquetaires" class="editable" data-key="1478"></div>
                <div class="client"><img src="../img/VETA.jpg" alt="VETA France" class="editable" data-key="1479"></div>
                <div class="client"><img src="../img/CRITT_M2A.png" alt="CRITT M2A" class="editable" data-key="1480"></div>
                <div class="client"><img src="../img/JOKEY.png" alt="JOKEY" class="editable" data-key="1481"></div>
                <div class="client"><img src="../img/LFB.png" alt="LFB Biomanufacturing" class="editable" data-key="1482"></div>
                <div class="client"><img src="../img/WECOSTA.jpg" alt="WECOSTA" class="editable" data-key="1483"></div>
                <div class="client"><img src="../img/HANOVA.png" alt="HANOVA" class="editable" data-key="1484"></div>
                <div class="client"><img src="../img/ATLANTIC.png" alt="Atlantic" class="editable" data-key="1485"></div>
            </div>
        </section>
    </main>

    <?php include 'footer_en.php'; ?>

</body>
</html>

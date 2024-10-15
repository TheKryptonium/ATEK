<?php
    $title = 'Menu principal';
    require './config/header.php';
    require './functions/auth.php';
    toConnect();
?>
<body class="menu">
        <div class="row mt-3 justify-content-end">
            <?php if (isConnected()):?>
            <a href="logout.php" class="logout"><i class="fa fa-sign-out"></i> Deconnexion</a>
            <?php endif?>
        </div>
    <div class="container text-center">
        <div class="row my-5">
            <h1 class="text-center fw-bolder title">MENU PRINCIPAL</h1>
        </div>
        <div class="row menus my-3 justify-content-center">
            <div class="col-5"><a href="./inventaire.php">INVENTAIRE DES EQUIPEMENTS</a></div>
            <div class="col-5"><a href="./historique.php">HISTORIQUE DES MAINTENANCES</a></div>
            <div class="col-5"><a href="./planification.php">PLANIFICATION DES MAINTENANCES</a></div>
            <div class="col-5"><a href="./gestion.php">GESTION DES PANNES</a></div>
            <div class="col-5"><a href="./rapport.php">RAPPORTS</a></div>
        </div>
    </div>
    
    <script src="./js/bootstrap.js"></script>
</body>
</html>
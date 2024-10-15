<?php
    $folder = null;
    if(isset($directory)){
        require '../functions/folder.php';
        $folder = getFolder($directory);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=($folder=='crud')?'../css/bootstrap.css':'./css/bootstrap.css'?>>
    <link rel="stylesheet" href=<?=($folder=='crud')?'../css/font-awesome.min.css':'./css/font-awesome.min.css'?>>
    <link rel="stylesheet" href=<?=($folder=='crud')?'../css/style.css':'./css/style.css'?>>
    <title><?=$title?></title>
</head>

<?php if ($title!='Menu principal'):?>
<body class="fonctions">
    <div class="container">
        <div class="row">
            <div class="col ret"><a href=<?=($folder=='crud')?"../inventaire.php":"./menu.php"?> class="retour"><i class="fa fa-home mx-1"></i><?=($folder=='crud')?"Inventaire des equipements":"Menu Principal"?></a></div>
        </div>
        <div class="row text-center headshot mt-3"><h1 class="fw-bolder text-center"><?=$mini?></h1></div>
<?php endif?>
<?php
    require '../config/config.php';
    if(!empty($_GET['code'])){
        $deletion = $pdo->prepare("DELETE FROM equipement WHERE CODE= :code");
        $deletion->execute([
            'code'=>$_GET['code']
        ]);
        header('Location: ../inventaire.php');
    }
    if(!empty($_GET['codep'])){
        $deletion = $pdo->prepare("DELETE FROM pannes WHERE CODEP= :code");
        $deletion->execute([
            'code'=>$_GET['codep']
        ]);
        header('Location: ../rapport.php');
    }
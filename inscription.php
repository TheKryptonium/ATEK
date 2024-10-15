<?php
    $title = "INSCRIPTION";
    require './config/header2.php';
    require './functions/security.php';
    require './config/config.php';

    $error=null;

    $query = $pdo->prepare('SELECT * FROM users');
    $query->execute();
    $users = $query->fetchAll();
    
    integrity($users, './connexion.php'); //Fonction qui permet de limiter le nombre de personnes ayant acces aux donnees de maintenance a 5 (De preference uniquement les personnes habiletes) 

    if(!empty($_POST['nom']) && !empty($_POST['pwd']) && !empty($_POST['pwd2'])){
        if($_POST['pwd']===$_POST['pwd2']){
            $query = $pdo->prepare('INSERT INTO users(nom, mdp) VALUES(:nom, :mdp)');
            $query->execute([
                'nom'=>$_POST['nom'],
                'mdp'=>$_POST['pwd']
            ]);
            header('Location: index.html');

        }else{
            $error = "Mot de passe incorrect";
        }
    }
?>
<body class="inscription">
    <div class="inscript container">
        <h2 class="title text-center">INSCRIPTION</h2>
        <?php if($error):?>
        <div class="alert alert-danger"><?=$error?></div>
        <?php endif?>
        <form class="form" method="POST">
            <div class="mb-3">
                <input
                    type="text"
                    class="form-control text-white"
                    name="nom"
                    id=""
                    placeholder="Nom"
                />
            </div>
            <div class="mb-3">
                <input
                    type="password"
                    class="form-control text-white"
                    name="pwd"
                    id=""
                    placeholder="Mot de passe"
                />
            </div>
            <div class="mb-3">
                <input
                    type="password"
                    class="form-control text-white"
                    name="pwd2"
                    id=""
                    placeholder="Confirmez votre mot de passe"
                />
            </div>
            <div class="confirm">
                <input type="submit" value="S'inscrire">
            </div>
        </form>
    </div>
    
<script src="./js/bootstrap.js"></script>
</body>
</html>
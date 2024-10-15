<?php
    $title = 'Connexion';
    require './config/header2.php';
    require './functions/auth.php';
    require './config/config.php';
    
    $error=null;

    if(!empty($_POST['nom']) && !empty($_POST['pwd'])){
        $request = $pdo->prepare('SELECT * from users WHERE nom= :nom');
        $request->execute([
            'nom'=> $_POST['nom']
        ]);
        $user = $request->fetch();

        if(isset($user) && $_POST['pwd']==$user->mdp){         
            session_start();
            $_SESSION['connected']=1;
            header('Location: ./menu.php');
            exit();        
        }else{
            $error = "Identifiants incorrects";
       }
    }
?>

<body class="connexion">
    <div class="container">
        <div class="connect">
            <h2 class="title text-center">CONNEXION</h2>
            <?php if($error):?>
            <div class="alert alert-danger"><?=$error?></div>
            <?php endif?>
            <form class="form" method="POST">
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control text-white"
                        name="nom"
                        placeholder="Nom"
                    />
                </div>
                <div class="mb-3">
                    <input
                        type="password"
                        class="form-control text-white"
                        name="pwd"
                        placeholder="Mot de passe"
                    />
                </div>
                <div class="confirm mt-4">
                    <input type="submit" value="Se connecter" class="submit">
                </div>
            </form>
        </div>
    </div>    
<script src="./js/bootstrap.js"></script>
</body>
</html>
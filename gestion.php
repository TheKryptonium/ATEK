<?php
    $title = 'Gestion de pannes';
    $mini = 'GESTION DE PANNES';
    require './config/config.php';
    require './config/header.php';
    $query = $pdo->prepare("SELECT * FROM equipement WHERE TYPEE='Principal'");
    $query->execute();
    $results = $query->fetchAll();


    if(isset($_POST['code'], $_POST['panne'], $_POST['description'], $_POST['dateP'])){
        $requete = $pdo->prepare("INSERT INTO pannes(CODEP, EQUIPEMENT, DESCRIPTIONP, DATEP) VALUES(:code, :equipement, :descriptionp, :datep)");
        $requete->execute([
            'code'=>$_POST['code'],   
            'equipement'=>$_POST['panne'],
            'descriptionp'=>$_POST['description'],
            'datep'=>$_POST['dateP']
        ]);
    }

?>


<div class="fonct container">
    <h2 class="title text-center my-2">DECLARATION DES PANNES</h2>
    <form class="form" method="post">
        <div class="my-4">
            <input
                type="text"
                class="form-control text-white"
                name="code"
                id=""
                placeholder="Entrer le code de la panne"
            />
        </div>
        <div class="my-4">                   
            <select
                class="form-select"
                name="panne"
                id=""
            >
                <option selected disabled="disabled">Quel est l equipement en panne ?</option>
                <?php foreach ($results as $result):?>
                <option value=<?=$result->DESCRIPTIONE?>><?=$result->DESCRIPTIONE?></option>
                <?php endforeach?>
            </select>                            
        </div>
        <div class="my-4">
            <div class="mb-3">
            <textarea class="form-control" name="description" id="" rows="5" placeholder="Decrire la panne..."></textarea>
            </div>                
        </div>
        <div class="my-4">
            <input
                type="date"
                class="form-control"
                name="dateP"
                id=""
                placeholder="Entrez la date de panne"
            />
        </div>
        <div class="confirm">
            <input type="submit" value="Enregistrer">
        </div>
    </form>
</div>

<?php require './config/footer.php'?>
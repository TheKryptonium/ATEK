<?php
    $title='Planification de maintenances';
    $mini='PLANIFICATION DES MAINTENANCES';
    require './config/config.php';
    require './config/header.php';

    $query = $pdo->prepare("SELECT * FROM equipement WHERE TYPEE='Principal'");
    $quer = $pdo->prepare("SELECT * FROM equipement WHERE TYPEE='Outillage'");
    $query->execute(); $quer->execute();
    $equipments = $query->fetchAll(); $outils = $quer->fetchAll();

    if(isset($_POST['code'], $_POST['typem'], $_POST['panne'], $_POST['description'],$_POST['outillage'], $_POST['dateM'])){
        $requete = $pdo->prepare("INSERT INTO historique(CODEM, TYPEM, EQUIPEMENT, INTERVENTION, PIECESR, DATEM) VALUES(:code, :typem, :equipement, :intervention, :piecer, :datem)");
        $requete->execute([
            'code'=>$_POST['code'],
            'typem'=>$_POST['typem'],   
            'equipement'=>$_POST['panne'],
            'intervention'=>$_POST['description'],
            'piecer'=>$_POST['outillage'],
            'datem'=>$_POST['dateM']
        ]);
    }
    
?>

<div class="fonct container">
    <h2 class="title text-center my-2">MAINTENANCE DES EQUIPEMENTS</h2>
    <form class="form" method="POST">
        <div class="my-3">
            <input
                type="text"
                class="form-control text-white"
                name="code"
                id=""
                placeholder="Code"
            />
        </div>
        <div class="my-3">
            <select 
                name="typem" 
                class="form-select"
                id="">
                <option selected disabled="disabled">Selectionner le type de maintenance</option>
                <option name="typem" value="Preventive">Preventive</option>
                <option name="typem" value="Curative">Curative</option>
                <option name="typem" value="Ameliorative">Ameliorative</option>
            </select>
        </div>
        <div class="my-3">                   
            <select
                class="form-select"
                name="panne"
                id=""
                >
                <option selected disabled="disabled">Choisissez l'equipement a maintenir</option>
                <?php foreach ($equipments as $equipment):?>
                <option name="panne" value=<?=$equipment->DESCRIPTIONE?>><?=$equipment->DESCRIPTIONE?></option>
                <?php endforeach?>
            </select>                            
        </div>
        <div class="my-3">
            <div class="mb-3">
                <textarea class="form-control" name="description" id="" rows="5" placeholder="Decrire l'intervention" value=></textarea>
            </div>                
        </div>
        <div class="my-3">                   
            <select
                class="form-select"
                name="outillage"
                id=""
            >
                <option selected disbaled="disabled">Choisissez l'outillage a utiliser:</option>
                 <?php foreach ($outils as $outil):?>
                <option value=<?=$outil->DESCRIPTIONE?>><?=$outil->DESCRIPTIONE?></option>
                <?php endforeach?>
            </select>                            
        </div>
        <div class="my-3">
            <input
                type="date"
                class="form-control"
                name="dateM"
                id=""
                placeholder="Entrez la date de maintenance"
            />
        </div>
        <div class="confirm">
            <input type="submit" value="Enregistrer">
        </div>
    </form>
</div>

<?php require './config/footer.php'?>

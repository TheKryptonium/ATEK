<?php
    $title = 'Modification de l\'equipement: '.$_GET['code'];
    $directory = __DIR__;
    $mini = 'MODIFICATIONS ET AJUSTEMENTS';
    require '../config/header.php';
    require '../config/config.php';

    if(isset($_GET['code'])){
        $result = $pdo->prepare('SELECT * FROM equipement WHERE CODE=:code');
        $result->execute([
            'code'=>$_GET['code']
        ]);
        $selection=$result->fetch();
        if(isset($_POST['type'], $_POST['designation'], $_POST['description'], $_POST['dateAE'], $_POST['dateE'])){
            $requete = $pdo->prepare("UPDATE equipement SET TYPEE = :typee, DESIGNATION  = :designation, DESCRIPTIONE = :descriptione, DATEE = :datee , DATE_ACHAT= :dateachat WHERE CODE=:code");
            $requete->execute([
                'code'=>$_GET['code'],
                'typee'=>$_POST['type'], 
                'designation'=>$_POST['designation'], 
                'descriptione'=>$_POST['description'], 
                'datee'=>$_POST['dateE'], 
                'dateachat'=>$_POST['dateAE']
            ]);
        }
    }    
?>


<div class="fonct container">
    <form class="form" method="post">
        <div class="my-4">                   
            <select
                class="form-select"
                name="type"
                id=""
            >
                <option disabled="disabled">De quel type d'equipement s'agit-il ?</option>
                <option <?=($selection->TYPEE=='Outillage')?'selected':''?> value="Outillage">Outillage</option>
                <option <?=($selection->TYPEE=='Principal')?'selected':''?> value="Principal">Principal</option>
            </select>                            
        </div>
        <div class="my-4">
            <input
                type="text"
                class="form-control"
                name="designation"
                id=""
                placeholder="Entrez l'equipement (Ex: Moteur, Ventilateur, Chaudiere...)"
                value = <?=htmlentities($selection->DESIGNATION)?>
            />                
        </div>        
        <div class="my-4">
            <div class="mb-3">
            <textarea class="form-control" name="description" id="" rows="5" placeholder="Decrire l'equipement (Ex: Moteur de ventilation )"><?=htmlentities($selection->DESCRIPTIONE)?></textarea>
            </div>                
        </div>
        <div class="my-4">
            <label for="dateAE">Date d'achat de l'equipement: </label>
            <input
                type="date"
                class="form-control"
                name="dateAE"
                id=""
                placeholder="Entrez la date d'achat de l'equipement"
                value = <?=htmlentities($selection->DATE_ACHAT)?>
            />
        </div>
        <div class="my-4">
            <label for="dateE">Date d'arrivee de l'equipement: </label>
            <input
                type="date"
                class="form-control"
                name="dateE"
                id=""
                placeholder="Entrez la date d'arrivee d'equipement"
                value = <?=htmlentities($selection->DATEE)?>
            />
        </div>
        <div class="confirm">
            <input type="submit" value="Confirmer">
        </div>
    </form>
</div>

<?php require '../config/footer.php'?>
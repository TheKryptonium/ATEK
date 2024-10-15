<?php
    $title = 'Ajout d\'un equipement';
    $directory = __DIR__;
    $mini = 'AJOUT D\'UN EQUIPEMENT';
    require '../config/header.php';
    require '../config/config.php';

    if(isset($_POST['code'], $_POST['type'], $_POST['designation'], $_POST['description'], $_POST['dateE'], $_POST['dateAE'])){
        $requete = $pdo->prepare("INSERT INTO equipement(CODE, DESIGNATION, DESCRIPTIONE, TYPEE,DATEE, DATE_ACHAT) VALUES(:code, :designation, :descriptione,:typee,:datee, :datea)");
        $requete->execute([
            'code'=>$_POST['code'],
            'designation'=>$_POST['designation'],
            'descriptione'=>$_POST['description'],
            'typee'=>$_POST['type'],
            'datee'=>$_POST['dateE'],
            'datea'=>$_POST['dateAE']
        ]);
    }
?>


<div class="fonct container">
    <form class="form" method="post">
        <div class="my-4">
            <input
                type="text"
                class="form-control text-white"
                name="code"
                id=""
                placeholder="Entrer le code de la equipement"
            />
        </div>
        <div class="my-4">                   
            <select
                class="form-select"
                name="type"
                id=""
            >
                <option selected disabled="disabled">De quel type d'equipement s'agit-il ?</option>
                <option value="Outillage">Outillage</option>
                <option value="Principal">Principal</option>
            </select>                            
        </div>
        <div class="my-4">
            <input
                type="text"
                class="form-control"
                name="designation"
                id=""
                placeholder="Entrez l'equipement (Ex: Moteur, Ventilateur, Chaudiere...)"
            />                
        </div>        
        <div class="my-4">
            <div class="mb-3">
            <textarea class="form-control" name="description" id="" rows="5" placeholder="Decrire l'equipement (Ex: Moteur de ventilation )"></textarea>
            </div>                
        </div>
        <div class="my-4">
            <label for="dateE">Date d'arrivee de l'equipement: </label>
            <input
                type="date"
                class="form-control"
                name="dateE"
                id=""
                placeholder="Entrez la date d'arrivee d'equipement"
            />
        </div>
        <div class="my-4">
            <label for="dateAE">Date d'achat de l'equipement: </label>
            <input
                type="date"
                class="form-control"
                name="dateAE"
                id=""
                placeholder="Entrez la date d'achat de l'equipement"
            />
        </div>
        <div class="confirm">
            <input type="submit" value="Ajouter">
        </div>
    </form>
</div>

<?php require '../config/footer.php'?>
    
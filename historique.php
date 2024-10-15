<?php
    $title = "Historique de maintenances";
    $mini = 'HISTORIQUE DES MAINTENANCES';
    require './config/config.php';
    require './config/header.php';
?>
<table class="table table-info table-striped mt-5">
    <tr scope="col">
                <td>Code</td>
                <td>Type de maintenance</td>
                <td>Description d'intervention</td>
                <td>Equipements</td>
                <td>Outillage utilise</td>
                <td>Date</td>
    </tr>
    <?php
        $query = $pdo->prepare("SELECT * FROM historique");
        $query->execute();
        $results=$query->fetchAll();
        foreach($results as $result):?>
    <tr>
        <td><?=$result->CODEM?></td>
        <td><?=$result->TYPEM?></td>
        <td><?=$result->INTERVENTION?></td>
        <td><?=$result->EQUIPEMENT?></td>
        <td><?=$result->PIECESR?></td>
        <td><?=$result->DATEM?></td>;
    </tr>            
    <?php endforeach?>
</table>
<?php require './config/footer.php'?>

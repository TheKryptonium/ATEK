<?php
  $title = 'Inventaire des equipements';
  $mini = strtoupper($title);
  require './config/config.php';
  require './config/header.php';

  $query = $pdo->prepare("SELECT * FROM equipement");
  $query->execute();
  $results=$query->fetchAll();
?>

<table class="table table-info table-striped mt-5 table-responsive">
    <tr scoped='col'>
        <td>Code</td>
        <td>Designation</td>
        <td>Description</td>
        <td>Type</td>
        <td>Date d'achat</td>
        <td>Date d'arrivee</td>
        <td>Operations</td>
    </tr>
    <?php foreach($results as $result):?>
    <tr>
        <td><?=$result->CODE?></td>
        <td><?=$result->DESIGNATION?></td>
        <td><?=$result->DESCRIPTIONE?></td>
        <td><?=$result->TYPEE?></td>
        <td><?=$result->DATEE?></td>
        <td><?=$result->DATE_ACHAT?></td>
        <td>
            <div class="btn btn-info"><a class="text-white text-decoration-none" href="./crud/edit.php?code=<?=$result->CODE?>">Editer</a></div>
            <div class="btn btn-danger"><a class="text-white text-decoration-none" href="./crud/delete.php?code=<?=$result->CODE?>">Supprimer</a></div>
        </td>
    </tr>
    <?php endforeach?>            
</table>
<div class="btn btn-ajout"><a class="text-white" href="./crud/ajout.php">Ajouter</a></div>
        
<?php require './config/footer.php'?>
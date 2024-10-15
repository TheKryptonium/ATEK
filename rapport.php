<?php
  $title = 'Rapport des pannes et maintenances';
  $mini = strtoupper($title);
  require './config/config.php';
  require './config/header.php';

  $query = $pdo->prepare("SELECT * FROM pannes");
  $query->execute();
  $results=$query->fetchAll();
?>

<div class="alert alert-warning text-center fw-bolder opacity-50">Supprimer la panne ou la defaillance en cas de maintenance curative</div>

<table class="table table-info table-striped mt-5">
    <tr scoped='col'>
        <td>Code</td>
        <td>Equipement</td>
        <td>Description de la panne/defaillance</td>
        <td>Date</td>
        <td>Operations</td>
    </tr>
    <?php foreach($results as $result):?>
    <tr>
        <td><?=$result->CODEP?></td>
        <td><?=$result->EQUIPEMENT?></td>
        <td><?=$result->DESCRIPTIONP?></td>
        <td><?=$result->DATEP?></td>
        <td>
            <div class="btn btn-danger"><a class="text-white text-decoration-none" href="./crud/delete.php?codep=<?=$result->CODEP?>">Supprimer</a></div>
        </td>
    </tr>
    <?php endforeach?>            
</table>
        
<?php require './config/footer.php'?>


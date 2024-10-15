<?php
  $login='root'; $password=""; $serveur='localhost';
  $pdo = new PDO("mysql: host=$serveur; dbname=atek",$login,$password,
  [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);		
?>
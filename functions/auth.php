<?php

    function isConnected():bool{
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        return !empty($_SESSION['connected']); 
    }

    function toConnect():void{
        if(!isConnected()){
            header('Location: connexion.php');
            exit();
        }
    }
  
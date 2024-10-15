<?php 
    function integrity($users, $connexionPage) : void{
        if(count($users)==4){
            header('Location: '.$connexionPage);
        }
    }
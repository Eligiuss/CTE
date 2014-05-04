<?php
    include('Connection_BDD.php');
    session_start();
    
    $id = $_POST["id"];
    
    $SQL = "DELETE FROM utilisateur
            WHERE ID = '".$id."' ";
    
    $rs=$cnx->query($SQL);
    
    if($rs){
        echo 'ok';
    }
    

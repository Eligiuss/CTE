<?php
    include('Connection_BDD.php');
    session_start();
    
    if(!isset($_SESSION["ID"])){
        header('Location: index.php');
    }
    
    $id = $_POST["id"];
    
    $SQL = "DELETE FROM utilisateur
            WHERE ID = '".$id."' ";
    
    $rs=$cnx->query($SQL);
    
    if($rs){
        echo 'ok';
    }
    

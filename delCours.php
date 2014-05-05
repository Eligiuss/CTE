<?php
    include('Connection_BDD.php');
    session_start();
    
    if(!isset($_SESSION["ID"])){
        header('Location: index.php');
    }
    
    $id = $_POST["id"];
    $id_interro = $_POST["id_interro"];
    
    $SQL = "DELETE FROM cours
            WHERE ID = '".$id."' ";
    
    $SQL2 = "DELETE FROM interro
             WHERE ID = '".$id_interro."' ";
    
    $rs=$cnx->query($SQL);
    $rs2=$cnx->query($SQL2);
    
    if($rs){
        echo 'ok';
    }
    

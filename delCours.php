<?php
    include('Connection_BDD.php');
    session_start();
    
    $id = $_POST["id"];
    
    $SQL = "DELETE FROM cours
            WHERE ID = '".$id."' ";
    
    $rs=$cnx->query($SQL);
    
    if($rs){
        echo 'ok';
    }
    

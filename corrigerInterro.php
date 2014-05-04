<?php
    include('Connection_BDD.php');
    session_start();
    
    $id = $_POST["id"];
    
    $SQL = "SELECT etat FROM interro
            WHERE ID = '".$id."' ";
    $rs=$cnx->query($SQL);
    while($info=$rs->fetch_object()) {
        $etat = $info->etat;
    }
    
    if($etat=='0'){
        $SQL2 = "UPDATE interro
                 SET etat = '1'
                 WHERE ID = '".$id."' ";
    } else {
        $SQL2 = "UPDATE interro
                 SET etat = '0'
                 WHERE ID = '".$id."' ";
    }
    
    $rs2=$cnx->query($SQL2);
    
    if($rs2){
        echo 'ok';
    }
    

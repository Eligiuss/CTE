<?php
    include('Connection_BDD.php');
    session_start();
    
    $date = $_POST["date"];
    $promo = $_POST["promo"];
    $contenu = $_POST["contenu"];
    $travail = $_POST["travail"];
    /*$interro = $_POST["interro"];
    $interroCorrigee = $_POST["interroCorrigee"];*/
    $id_prof = $_SESSION["ID"];
    $id_matiere = $_POST["id_matiere"];
    $id_cours = $_POST["id_cours"];
    
    $SQL = "UPDATE cours
            SET id_prof='".$id_prof."', id_matiere='".$id_matiere."', promo='".$promo."',
                travail='".$travail."', date='".$date."', contenu='".$contenu."'
            WHERE ID = '".$id_cours."' "; 

    
    $rs=$cnx->query($SQL);
    
    if($rs){
        echo 'ok';
    }
    

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
    $id_matiere= $_POST["id_matiere"];
    
    $SQL = "INSERT INTO cours (id_prof,id_matiere,id_interro,promo,travail,date,contenu)
            VALUES ('".$id_prof."', '".$id_matiere."', '".$promo."',
                    '".$promo."', '".$travail."', '".$date."', '".$contenu."'); ";
    
    $rs=$cnx->query($SQL);
    
    if($rs){
        echo 'ok';
    }
    

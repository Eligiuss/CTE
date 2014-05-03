<?php
    include('Connection_BDD.php');
    session_start();
    
    $type = $_POST["type"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $login = $_POST["login"];
    $password= $_POST["password"];
    $id = $_POST["id"];
    
    if($id==''){ //INSERTION
        $SQL = "INSERT INTO utilisateur (type,nom,prenom,login,password)
                VALUES ('".$type."', '".$nom."', '".$prenom."', '".$login."', '".$password."')";
    } else { //MODIICATION
        $SQL = "UPDATE utilisateur
                SET type='".$type."', nom='".$nom."', prenom='".$prenom."',
                    login='".$login."', password='".$password."'
                WHERE ID = '".$id."' ";
    }
    $rs=$cnx->query($SQL);
    
    if($rs){
        if($id==''){
            echo 'ajout ok';
        } else {
            echo 'modif ok';
        }
    }
    

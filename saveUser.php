<?php
    include('Connection_BDD.php');
    session_start();
    
    $type = $_POST["type"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $login = $_POST["login"];
    $password= $_POST["password"];
    $matiere = $_POST["matiere"];
    $matiere2 = $_POST["matiere2"];
    $matiere3 = $_POST["matiere3"];
    $matiereId = $_POST["matiereId"];
    $matiere2Id = $_POST["matiere2Id"];
    $matiere3Id = $_POST["matiere3Id"];
    $id = $_POST["id"];
    
    if($id==''){ //INSERTION
        $SQL = "INSERT INTO utilisateur (type,nom,prenom,login,password)
                VALUES ('".$type."', '".$nom."', '".$prenom."', '".$login."', '".$password."')";
        
        if($matiere!='' && $matiere2=='' && $matiere3=''){
            $SQL2 = "INSERT INTO enseigne VALUES ('".$matiere."','".$matiereId."') ";
        } else if ($matiere!='' && $matiere2!='' && $matiere3=='') {
            $SQL2 = "INSERT INTO enseigne VALUES ('".$matiere."','".$matiereId."'),
                                                 ('".$matiere2."','".$matiere2Id."') ";
        } else if ($matiere!='' && $matiere2!='' && $matiere3!='') {
            $SQL2 = "INSERT INTO enseigne VALUES ('".$matiere."','".$matiereId."'),
                                                 ('".$matiere2."','".$matiere2Id."'),
                                                 ('".$matiere3."','".$matiere3Id."') ";
        }
        
    } else { //MODIFICATION
        $SQL = "UPDATE utilisateur
                SET type='".$type."', nom='".$nom."', prenom='".$prenom."',
                    login='".$login."', password='".$password."'
                WHERE ID = '".$id."' ";
        
        $SQL2 = "DELETE FROM enseigne
                 WHERE userID='".$id."' ";
        
        if($matiere!='' && $matiere2=='' && $matiere3=''){
            $SQL3 = "UPDATE enseigne
                     SET userID='".$matiere."', matiereID='".$matiereId."'
                     WHERE userID='".$id."' ";
        } else if ($matiere!='' && $matiere2!='' && $matiere3=='') {
            $SQL3 = "UPDATE enseigne
                     SET userID='".$matiere."', matiereID='".$matiereId."' ";
        } else if ($matiere!='' && $matiere2!='' && $matiere3!='') {
            $SQL3 = "UPDATE enseigne
                     SET userID='".$matiere."', matiereID='".$matiereId."' ";
        }
    }
    
    $rs=$cnx->query($SQL);
    $rs2=$cnx->query($SQL2);
    $rs3=$cnx->query($SQL3);
    
    if($rs){
        if($id==''){
            echo 'ajout ok';
        } else {
            echo 'modif ok';
        }
    }
    

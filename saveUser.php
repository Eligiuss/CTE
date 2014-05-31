<?php
    include('Connection_BDD.php');
    session_start();
    
    if(!isset($_SESSION["ID"])){
        header('Location: index.php');
    }
    
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
        $historique = " INSERT INTO historique (ID,action,date)
                        VALUES ('".$_SESSION["ID"]."', 'Ajout de l\'utilisateur ".$prenom." ".$nom."', NOW()) ";
        
        $SQL = "INSERT INTO utilisateur (type,nom,prenom,login,password)
                VALUES ('".$type."', '".$nom."', '".$prenom."', '".$login."', '".$password."')";
        
        $rs=$cnx->query($SQL);
        
        if($matiere!='' && $matiere2=='' && $matiere3==''){
            $SQL2 = "INSERT INTO enseigne VALUES ('".mysqli_insert_id($cnx)."','".$matiereId."') ";
            $rs2=$cnx->query($SQL2);
        } else if ($matiere!='' && $matiere2!='' && $matiere3=='') {
            $SQL2 = "INSERT INTO enseigne VALUES ('".mysqli_insert_id($cnx)."','".$matiereId."'),
                                                 ('".mysqli_insert_id($cnx)."','".$matiere2Id."') ";
            $rs2=$cnx->query($SQL2);
        } else if ($matiere!='' && $matiere2!='' && $matiere3!='') {
            $SQL2 = "INSERT INTO enseigne VALUES ('".mysqli_insert_id($cnx)."','".$matiereId."'),
                                                 ('".mysqli_insert_id($cnx)."','".$matiere2Id."'),
                                                 ('".mysqli_insert_id($cnx)."','".$matiere3Id."') ";  
            $rs2=$cnx->query($SQL2);
        }
        
    } else { //MODIFICATION
        $historique = " INSERT INTO historique (ID,action,date)
                        VALUES ('".$_SESSION["ID"]."', 'Modification de l\'utilisateur ".$prenom." ".$nom."', NOW()) ";
        
        $SQL = "UPDATE utilisateur
                SET type='".$type."', nom='".$nom."', prenom='".$prenom."',
                    login='".$login."', password='".$password."'
                WHERE ID = '".$id."' ";
        
        $rs=$cnx->query($SQL);
        
        $SQL2 = "DELETE FROM enseigne
                 WHERE userID='".$id."' ";
        $rs2=$cnx->query($SQL2);
        
        if($matiere!='' && $matiere2=='' && $matiere3==''){
            $SQL3 = "INSERT INTO enseigne VALUES
                     ('".$id."', '".$matiereId."') ";
            $rs3=$cnx->query($SQL3);
        } else if ($matiere!='' && $matiere2!='' && $matiere3=='') {
            $SQL3 = "INSERT INTO enseigne VALUES
                     ('".$id."', '".$matiereId."'),
                     ('".$id."', '".$matiere2Id."') ";
            $rs3=$cnx->query($SQL3);
        } else if ($matiere!='' && $matiere2!='' && $matiere3!='') {
            $SQL3 = "INSERT INTO enseigne VALUES
                     ('".$id."', '".$matiereId."'),
                     ('".$id."', '".$matiere2Id."'),
                     ('".$id."', '".$matiere3Id."') ";
            $rs3=$cnx->query($SQL3);
        }
    }
    
    $rsHisto = $cnx->query($historique);
    
    if($rs){
        if($id==''){
            echo 'ajout ok';
        } else {
            echo 'modif ok';
        }
    }
    

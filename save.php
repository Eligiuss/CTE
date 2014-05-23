<?php
    include('Connection_BDD.php');
    session_start();
    
    if(!isset($_SESSION["ID"])){
        header('Location: index.php');
    }
    
    $date = $cnx->real_escape_string($_POST["date"]);
    $promo = $cnx->real_escape_string($_POST["promo"]);
    $contenu = $cnx->real_escape_string($_POST["contenu"]);
    $travail = $cnx->real_escape_string($_POST["travail"]);
    $dateButoir = $cnx->real_escape_string($_POST["dateButoir"]);
    $sujet = $cnx->real_escape_string($_POST["sujet"]);
    $id_interro = $cnx->real_escape_string($_POST["id_interro"]);
    $id_prof = $cnx->real_escape_string($_POST["id_prof"]);
    $id_matiere= $cnx->real_escape_string($_POST["id_matiere"]);
    $id_cours = $cnx->real_escape_string($_POST["id_cours"]);
    $interroChecked = $cnx->real_escape_string($_POST["interroChecked"]);
    
    $SQLMatiere = "SELECT nom FROM matiere
                   WHERE  ID = '".$id_matiere."' ";
    $rsmat=$cnx->query($SQLMatiere);
    while($info=$rsmat->fetch_object()){
        $matiere = $cnx->real_escape_string($info->nom);
    }
    
    if($id_cours==''){ //Si on a pas d'id cours, on ajoute un nouveau cours
        
        if($interroChecked=='1'){
            $historiqueInterro = " INSERT INTO historique (ID,action,date)
                                   VALUES ('".$_SESSION["ID"]."', 'Ajout de l\'interrogation : ".$sujet."', NOW()); ";
            $rsHistoInt=$cnx->query($historiqueInterro);
            
            $SQL = "INSERT INTO interro (libelle, etat, date, promo)
                    VALUES ('".$sujet."', '0', '".$date."', '".$promo."') ";
            $rs=$cnx->query($SQL);
        }
        
        $SQL2 = "INSERT INTO cours (id_prof,id_matiere,id_interro,promo,travail,date,date_butoir,contenu,creation_date,last_update_date)
                 VALUES ('".$id_prof."', '".$id_matiere."', '".mysqli_insert_id($cnx)."',
                        '".$promo."', '".$travail."', '".$date."', '".$dateButoir."', '".$contenu."',
                        NOW(), NOW() ); ";
        
        $historique = " INSERT INTO historique (ID,action,date)
                        VALUES ('".$_SESSION["ID"]."', '(".$matiere.") Nouveau cours : ".$contenu."', NOW()) ";
        
    } else { //Si on a une id cours, on modifie le cours existant
        
        if($interroChecked=='1'){
            if($id_interro=='0'){ //Si le cours n'est pas associé à une interro, on en rajoute une
                $SQL = "INSERT INTO interro (libelle, etat, date, promo)
                        VALUES ('".$sujet."', '0', '".$date."', '".$promo."') ";
                
                $historiqueInterro = " INSERT INTO historique (ID,action,date)
                                       VALUES ('".$_SESSION["ID"]."', 'Ajout de l\'interrogation : ".$sujet."', NOW()); ";
        
                $rsHistoInt=$cnx->query($historiqueInterro);
            } else { //Sinon, on modifie l'interro existante
                $SQL = "UPDATE interro
                        SET libelle='".$sujet."', date='".$date."', promo='".$promo."'
                        WHERE ID = '".$id_interro."' ";
                
                $historiqueInterro = " INSERT INTO historique (ID,action,date)
                                       VALUES ('".$_SESSION["ID"]."', 'Modification de l\'interrogation : ".$sujet."', NOW()); ";
        
                $rsHistoInt=$cnx->query($historiqueInterro);
            }
        } else if ($interroChecked=='0'){
            $SQL = "DELETE FROM interro
                    WHERE ID = '".$id_interro."' ";
            
            $historiqueInterro = " INSERT INTO historique (ID,action,date)
                                   VALUES ('".$_SESSION["ID"]."', 'Suppression de l\'interrogation : ".$sujet."', NOW()); ";
        
            $rsHistoInt=$cnx->query($historiqueInterro);
        }
        $rs=$cnx->query($SQL);
        
        if($id_interro=='0'){
            $SQL2 = "UPDATE cours
                     SET id_prof='".$id_prof."', id_matiere='".$id_matiere."',
                         promo='".$promo."', id_interro='".mysqli_insert_id($cnx)."',
                         travail='".$travail."', date_butoir='".$dateButoir."',
                         date='".$date."', contenu='".$contenu."', last_update_date=NOW()
                     WHERE ID = '".$id_cours."' ";
        } else if($id_interro!='0' && $interroChecked=='1') {
            $SQL2 = "UPDATE cours
                     SET id_prof='".$id_prof."', id_matiere='".$id_matiere."',
                         promo='".$promo."', travail='".$travail."', date_butoir='".$dateButoir."',
                         date='".$date."', contenu='".$contenu."', last_update_date=NOW()
                     WHERE ID = '".$id_cours."' ";
        } else if($id_interro!='0' && $interroChecked=='0') {
            $SQL2 = "UPDATE cours
                     SET id_prof='".$id_prof."', id_matiere='".$id_matiere."', promo='".$promo."',
                         travail='".$travail."', id_interro='0', date_butoir='".$dateButoir."',
                         date='".$date."', contenu='".$contenu."', last_update_date=NOW()
                     WHERE ID = '".$id_cours."' ";
        }
        
        $historique = " INSERT INTO historique (ID,action,date)
                        VALUES ('".$_SESSION["ID"]."', '(".$matiere.") Modification d\'un cours : ".$contenu."', NOW()) ";
    }
    
    $rs=$cnx->query($historique);
    
    $rs2=$cnx->query($SQL2);
    if($rs2){
        if($id_cours==''){
            echo 'ajout ok';
        } else {
            echo 'modif ok';
        }
    }
    

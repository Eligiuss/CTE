<?php
    include('Connection_BDD.php');
    session_start();
    
    $date = $_POST["date"];
    $promo = $_POST["promo"];
    $contenu = $_POST["contenu"];
    $travail = $_POST["travail"];
    $dateButoir = $_POST["dateButoir"];
    $sujet = $_POST["sujet"];
    $id_interro = $_POST["id_interro"];
    $id_prof = $_SESSION["ID"];
    $id_matiere= $_POST["id_matiere"];
    $id_cours = $_POST["id_cours"];
    $modifActionInterro = $_POST["modifActionInterro"];
    
    if($id_cours==''){ //Si on a pas d'id cours, on ajoute un nouveau cours
       
        $SQL = "INSERT INTO interro (libelle, etat, date, promo)
                VALUES ('".$sujet."', '0', '".$date."', '".$promo."') ";
        $rs=$cnx->query($SQL);
        
        $SQL2 = "INSERT INTO cours (id_prof,id_matiere,id_interro,promo,travail,date,date_butoir,contenu)
                VALUES ('".$id_prof."', '".$id_matiere."', '".mysqli_insert_id($cnx)."',
                        '".$promo."', '".$travail."', '".$date."', '".$dateButoir."', '".$contenu."'); ";
    
        
    } else { //Si on a une id cours, on modifie le cours existant
        
        if($modifActionInterro=='modif'){
            if($id_interro=='0'){ //Si le cours n'est pas associé à une interro, on en rajoute une
                $SQL = "INSERT INTO interro (libelle, etat, date, promo)
                        VALUES ('".$sujet."', '0', '".$date."', '".$promo."') ";
            } else { //Sinon, on modifie l'interro existante
                $SQL = "UPDATE interro
                        SET libelle='".$sujet."', date='".$date."', promo='".$promo."'
                        WHERE ID = '".$id_interro."' ";
            }
        } else if ($modifActionInterro=='delete'){
            $SQL = "DELETE FROM interro
                    WHERE ID = '".$id_interro."' ";
        }
        $rs=$cnx->query($SQL);
        
        if($id_interro=='0'){
            $SQL2 = "UPDATE cours
                    SET id_prof='".$id_prof."', id_matiere='".$id_matiere."',
                        promo='".$promo."', id_interro='".mysqli_insert_id($cnx)."',
                        travail='".$travail."', date_butoir='".$dateButoir."',
                        date='".$date."', contenu='".$contenu."'
                    WHERE ID = '".$id_cours."' ";
        } else if($id_interro!='0' && $modifActionInterro=='modif') {
            $SQL2 = "UPDATE cours
                    SET id_prof='".$id_prof."', id_matiere='".$id_matiere."',
                        promo='".$promo."', travail='".$travail."',
                        date_butoir='".$dateButoir."',date='".$date."', contenu='".$contenu."'
                    WHERE ID = '".$id_cours."' ";
        } else if($id_interro!='0' && $modifActionInterro=='delete') {
            $SQL2 = "UPDATE cours
                    SET id_prof='".$id_prof."', id_matiere='".$id_matiere."',
                        promo='".$promo."', travail='".$travail."', id_interro='0',
                        date_butoir='".$dateButoir."',date='".$date."', contenu='".$contenu."'
                    WHERE ID = '".$id_cours."' ";
        }
        
    }
    
    $rs2=$cnx->query($SQL2);
    if($rs2){
        if($id_cours==''){
            echo 'ajout ok';
        } else {
            echo 'modif ok';
        }
    }
    

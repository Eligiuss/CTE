<?php
    include 'Connection_BDD.php';
    $allowedExts = array("csv", "xls", "xlsx", "pdf");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

    move_uploaded_file($_FILES["file"]["tmp_name"],
    "upload/" . $_FILES["file"]["name"]);
    
    $f = fopen("upload/" . $_FILES["file"]["name"], 'r');
    if ($f) {
        $i=0;
        $data = array();
        
        while ($line = fgetcsv($f)) {
            $data[$i] = $line[0];
            $i++;
        }
        fclose($f);
    } else {
        echo "Erreur dans l'ouverture du fichier";
    }
        
    if($_POST["choix"]=='matieres'){
        $table = "matiere (nom)";
    } else if ($_POST["choix"]=='utilisateurs'){
        $table = "utilisateur (nom)";
    } else if ($_POST["choix"]=='promos'){
        $table = "promo (nom)";
    }
    
    $SQL = "INSERT into ".$table." VALUES ";
    
    for($i=0; $i<sizeof($data)-1; $i++){
        $SQL.="('".$data[$i]."'),";
    }
    
    $SQL.="('".$data[$i]."')";
    
    var_dump($SQL);
    $rs = $cnx->query($SQL);
    echo 'Operation effectuee';
?>

<a href="accueil.php">Retour a l'accueil</a>
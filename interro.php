<?php
    $titre='Interrogations';
    include('header.php');
    include('connection_BDD.php');
    
    if(!isset($_SESSION["ID"])){
        header('Location: index.php');
    }
    
    function truncate($value,$length){
        if(strlen($value)>$length){
        $value=substr($value,0,$length);
        $n=0;
        while(substr($value,-1)!=chr(32)){
        $n++;
        $value=substr($value,0,$length-$n);
        }
        $value=$value." ...";
        }
        return $value;
    }
?>

<!--TABLE 1-->
<table class="table table-hover" id="tableInterro1">
    <thead>
        <tr>
            <th style="text-align: center" colspan="6">NON CORRIGÉES</th>
        </tr>
        <tr class="info">
            <th>Date</th>
            <th>Matière</th>
            <th>Promotion</th>
            <th>Sujet</th>
            <th>Corrigée</th>
            <?php if($_SESSION["type"]==1) echo "<th>Professeur</th>"; ?>
        </tr>
    </thead>
    
<?php
    if($_SESSION['type']=='1'){
        $SQL = "SELECT c.*, m.nom matiere, i.libelle sujet, i.promo promoInterro, i.ID interro_id, u.nom nomProf, u.prenom prenomProf FROM cours c
                INNER JOIN interro i ON c.id_interro = i.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                INNER JOIN utilisateur u ON C.id_prof = u.ID
                WHERE i.etat = '0'
                ORDER BY date DESC";
    } else {
        $SQL = "SELECT c.*, m.nom matiere, i.libelle sujet, i.promo promoInterro, i.ID interro_id FROM cours c
                INNER JOIN interro i ON c.id_interro = i.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                WHERE id_prof = '".$_SESSION["ID"]."'
                AND i.etat = '0'
                ORDER BY date DESC";
    }
        
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()){
        
        if($info->id_interro!=='0'){
            $interro = $info->sujet;
        } else {
            $interro = "";
        }
        
        echo '  <tr class="danger">
                    <td>
                        '.$info->date.'
                    </td>
                    <td>
                        '.$info->matiere.'
                    </td>
                    <td>
                        '.$info->promoInterro.'
                    </td>
                    <td>
                        '.truncate($info->sujet,80).'
                    </td>
                    <td>
                        <input type="checkbox" class="checkbox" onclick="corrigerInterro('.$info->interro_id.')" />
                    </td>';
            if($_SESSION["type"]=='1'){
                echo '<td>'.$info->prenomProf.' '.$info->nomProf.'</td>';
            }
          echo '</tr>';
    }
    
    echo '</table>';
?>

    
    
    
    
    
    
<!--TABLE 2-->
<table class="table table-hover" id="tableInterro2">
    <thead>
        <tr>
            <th style="text-align: center" colspan="6">CORRIGÉES</th>
        </tr>
        <tr class="info">
            <th>Date</th>
            <th>Matière</th>
            <th>Promotion</th>
            <th>Sujet</th>
            <th>Corrigée</th>
            <?php if($_SESSION["type"]==1) echo "<th>Professeur</th>"; ?>
        </tr>
    </thead>
    
<?php
    if($_SESSION['type']=='1'){
        $SQL2 = "SELECT c.*, m.nom matiere, i.libelle sujet, i.promo promoInterro, i.ID interro_id, u.nom nomProf, U.prenom prenomProf FROM cours c
                INNER JOIN interro i ON c.id_interro = i.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                LEFT JOIN utilisateur u ON C.id_prof = u.ID
                WHERE i.etat = '1'
                ORDER BY date DESC";
    } else {
        $SQL2 = "SELECT c.*, m.nom matiere, i.libelle sujet, i.promo promoInterro, i.ID interro_id FROM cours c
                INNER JOIN interro i ON c.id_interro = i.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                WHERE id_prof = '".$_SESSION["ID"]."'
                AND i.etat = '1'
                ORDER BY date DESC";
    }
        
    $rs2=$cnx->query($SQL2);
    
    while($info=$rs2->fetch_object()){
        
        if($info->id_interro!=='0'){
            $interro = $info->sujet;
        } else {
            $interro = "";
        }
        
        echo '  <tr class="success">
                    <td>
                        '.$info->date.'
                    </td>
                    <td>
                        '.$info->matiere.'
                    </td>
                    <td>
                        '.$info->promoInterro.'
                    </td>
                    <td>
                        '.truncate($info->sujet,80).'
                    </td>
                    <td>
                        <input type="checkbox" class="checkbox" checked onclick="corrigerInterro('.$info->interro_id.')" />
                    </td>';
            if($_SESSION["type"]=='1'){
                echo '<td>'.$info->prenomProf.' '.$info->nomProf.'</td>';
            }
          echo '</tr>';
    }
    
    echo '</table>';
?>

<?php
    $titre='Interrogations';
    include('header.php');
    include('connection_BDD.php');
?>

<table class="table table-hover tableListe">
        <tr>
            <th style="text-align: center" colspan="4">NON CORRIGÉES</th>
        </tr>
        <tr>
            <th>Date</th>
            <th>Matière</th>
            <th>Promotion</th>
            <th>Sujet</th>
        </tr>
<?php
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
    
    
    $SQL = "SELECT c.*, m.nom matiere, i.libelle sujet, i.promo promoInterro FROM cours c
            INNER JOIN interro i ON c.id_interro = i.ID
            INNER JOIN matiere m ON c.id_matiere = m.ID
            WHERE id_prof = '".$_SESSION["ID"]."'
            AND i.etat = '0'
            ORDER BY date DESC";
        
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()){
        
        if($info->id_interro!=='0'){
            $interro = $info->sujet;
        } else {
            $interro = "";
        }
        
        echo '  <tr onclick="window.location=\'modifCours.php?id='.$info->ID.'\'">
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
                </tr>';
    }
    
    echo '</table>';
?>
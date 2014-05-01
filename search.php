<?php
    $titre = 'Recherche';
    include 'header.php';
    
    session_start();
?>


    <table class="table table-hover tableListe">
        <tr>
            <th colspan="6">Filtre</th>
        </tr>
        <tr>
            <th>Date</th>
            <th>Promotion</th>
            <th>Professeur</th>
            <th>Matière</th>
            <th>Contenu du cours</th>
            <th>Interro</th>
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

    include 'Connection_BDD.php';
    
    if($_SESSION["ID"]=='1'){ //Si l'utilisateur connecté est un administrateur, on affiche tous les cours
        $SQL = "SELECT c.*, m.nom matiere, u.nom nomProf, u.prenom prenomProf FROM cours c
            INNER JOIN utilisateur u ON c.id_prof = u.ID
            INNER JOIN matiere m ON c.id_matiere = m.ID   
            ORDER BY date DESC";
    } else {
        $SQL = "SELECT c.*, m.nom matiere, u.nom nomProf, u.prenom prenomProf FROM cours c
            INNER JOIN utilisateur u ON c.id_prof = u.ID
            INNER JOIN matiere m ON c.id_matiere = m.ID   
            WHERE id_prof = '".$_SESSION["ID"]."'
            ORDER BY date DESC";
    }
    
    
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()){
        if($info->id_interro=='1'){
            $interro = "Oui";
        } else {
            $interro = "Non";
        }
        
        echo '  <tr onclick="window.location.replace(\'modifCours.php?id='.$info->ID.'\')">
                    <td>
                        '.$info->date.'
                    </td>
                    <td>
                        '.$info->promo.'
                    </td>
                    <td>
                        '.$info->prenomProf.' '.$info->nomProf.'
                    </td>
                    <td>
                        '.$info->matiere.'
                    </td>
                    <td>
                        '.truncate($info->contenu,100).'
                    </td>
                    <td>
                        '.$interro.'
                    </td>
                </tr>';
    }
    
    echo '</table>';
?>
    

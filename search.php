<?php
    $titre = 'Recherche';
    $active = 'search';
    include 'header.php';
    
    session_start();
?>

<div class="recherche">
    <table class="table">
        <tr>
            <th>Date</th>
            <th>Promotion</th>
            <th>Professeur</th>
            <th>Matière</th>
            <th>Contenu du cours</th>
            <th>Interro</th>
        </tr>
<?php
    $hote='127.0.0.1';
    $user='root';
    $passwd='';
    $database='cte';
    $cnx=new mysqli($hote,$user,$passwd,$database);
    
    $cnx->set_charset("utf8");
    
    $SQL = "SELECT c.*, m.nom matiere, u.nom prof FROM cours c
            INNER JOIN utilisateur u ON c.id_prof = u.ID
            INNER JOIN matiere m ON c.id_matiere = m.ID
            INNER JOIN interro i ON c.id_interro = i.ID
            WHERE id_prof = '".$_SESSION["ID"]."'
            ORDER BY date DESC";
    
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()){
        if($info->id_interro!==''){
            $interro = "Oui";
        } else {
            $interro = "Non";
        }
        
        echo '  <tr>
                    <td>
                        '.$info->date.'
                    </td>
                    <td>
                        '.$info->promo.'
                    </td>
                    <td>
                        '.$info->prof.'
                    </td>
                    <td>
                        '.$info->matiere.'
                    </td>
                    <td>
                        '.$info->contenu.'
                    </td>
                    <td>
                        '.$interro.'
                    </td>
                </tr>
            </table>
        </div>';
    }
?>
    

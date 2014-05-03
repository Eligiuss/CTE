<?php
    $titre = 'Gestion des utilisateurs';
    include('header.php');
    include('Connection_BDD.php');
?>

    <table class="table table-hover tableListe">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Nom d'utilisateur</th>
            <th>Mot de passe</th>
            <th>Type</th>
        </tr>
<?php
    $SQL = "SELECT * FROM utilisateur
            ORDER BY nom ASC";
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()){
        if($info->type=='1'){
            $type = "Administrateur";
        } else {
            $type = "Professeur";
        }
        
        echo '  <tr onclick="window.location=\'modifUser.php?id='.$info->ID.'\'">
                    <td>
                        '.$info->nom.'
                    </td>
                    <td>
                        '.$info->prenom.'
                    </td>
                    <td>
                        '.$info->login.'
                    </td>
                    <td>
                        '.$info->password.'
                    </td>
                    <td>
                        '.$type.'
                    </td>
                </tr>';
    }
    
    echo '</table>';
?>
    
    <input type="button" class="btn btn-default center-block" onclick="window.location = 'addUser.php'" value="Ajouter un utilisateur" />

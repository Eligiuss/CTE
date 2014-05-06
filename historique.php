<?php
    $titre='Modifier un utilisateur';
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

    <table class="table table-hover tableHisto table-condensed">
    </tr>
        <tr class="info">
            <th>Utilisateur</th>
            <th>Action</th>
            <th>Date</th>
        </tr>
<?php
    include 'Connection_BDD.php';
   
    $SQL = "SELECT nom,prenom FROM utilisateur
            WHERE ID = '".$_SESSION["ID"]."' ";
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()){
        $nom = $info->nom;
        $prenom = $info->prenom;
    }
    
    $SQL2 = "SELECT ID,action,DATE_FORMAT(date, '%d/%m/%Y \à %H:%i:%S') AS DateTemps FROM historique
            ORDER BY date DESC"; 
    $rs2=$cnx->query($SQL2);
    
    while($info=$rs2->fetch_object()){          
        echo '  <tr>
                    <td>
                        '.$prenom.' '.$nom.'
                    </td>
                    <td>
                        '.truncate($info->action,150).'
                    </td>
                    <td>
                        '.$info->DateTemps.'
                    </td>
                </tr>';
    }
    
    echo '</table>';
?>
    

<?php
    $titre = 'Recherche';
    include 'header.php';

    if(!isset($_SESSION["ID"])){
        header('Location: index.php');
    }
?>


<table class="table table-hover tableListe table-condensed">
    <thead>    
        <tr class="info">
            <th>Date</th>
            <th>
                <select class="filtre" onchange="filtre()" id="promotion">
                    <option value="">Promotion</option>
                    <?php
                    include 'Connection_BDD.php';

                    $SQL = "SELECT nom FROM promo";
                    $rs = $cnx->query($SQL);

                    while ($info = $rs->fetch_object()) {
                        if(isset($_GET['promotionId'])){
                            if ($info->nom == $_GET['promotionId']) {
                                echo '<option selected="selected" value="' . $info->nom . '">' . $info->nom . '</option>';
                            } else {
                                echo '<option value="' . $info->nom . '">' . $info->nom . '</option>';
                            }
                        } else {
                            echo '<option value="' . $info->nom . '">' . $info->nom . '</option>';
                        }
                    }
                    ?>
                </select>
            </th>
            <th>
                <?php
                if($_SESSION['type'] == 1)
    {
                ?>
                <select class="filtre" onchange="filtre()" id="professeur">
                    <!--a géré le fait que ce filtre ne s'affiche que si le user et un admin(les prof ne peuvent pas voir les cours des autres professeurs) -->
                    <option value="">Professeur</option>
    <?php
    
        include 'Connection_BDD.php';

        $SQL = "SELECT ID,nom,prenom FROM utilisateur";
        $rs = $cnx->query($SQL);

        while ($info = $rs->fetch_object()) {
            if(isset($_GET['promotionId'])){
                if ($info->ID == $_GET['professeurId']) {
                    echo '<option selected="selected" value="' . $info->ID . '">' . $info->nom . ' ' . $info->prenom . '</option>';
                } else {
                    echo '<option value="' . $info->ID . '">' . $info->nom . ' ' . $info->prenom . '</option>';
                }
            } else {
                echo '<option value="' . $info->ID . '">' . $info->nom . ' ' . $info->prenom . '</option>';
            }
        }
        echo '</select >';
    }
 else {
    echo 'Professeur';    
    }
    ?>
                
            </th>
            <th>
                <select class="filtre" onchange="filtre()" id="Matiere">
                    <option value=""> Matière</option>
                    <?php
                        include 'Connection_BDD.php';

                        $SQL = "SELECT ID,nom FROM matiere";
                        $rs = $cnx->query($SQL);

                        while ($info = $rs->fetch_object()) {
                            if(isset($_GET['promotionId'])){
                                if ($info->ID == $_GET['matiereId']) {
                                    echo '<option selected="selected" value="' . $info->ID . '">' . $info->nom . '</option>';
                                } else {
                                    echo '<option value="' . $info->ID . '">' . $info->nom . '</option>';
                                }
                            } else {
                                echo '<option value="' . $info->ID . '">' . $info->nom . '</option>';
                            }
                        }
                    ?>
                </select>
            </th>
            <th>
                Contenu
            </th>
            <th>
                Travail
            </th>
            <th>
                Interro
            </th>
        </tr>
    </thead>
    
<?php
    function truncate($value, $length) {
        if (strlen($value) > $length) {
            $value = substr($value, 0, $length);
            $n = 0;
            while (substr($value, -1) != chr(32)) {
                $n++;
                $value = substr($value, 0, $length - $n);
            }
            $value = $value . " ...";
        }
        return $value;
    }

include 'Connection_BDD.php';
if ($_GET) {
    
    if(!$_GET["promotionId"]) {
        $promoWhere = "c.promo LIKE '" . '%' . $_GET['promotionId'] . '%' . "' ";
    } else {
        $promoWhere = "c.promo = '".$_GET["promotionId"]."' ";
    }
    
    if(!$_GET["professeurId"]) {
        $profWhere = "id_prof LIKE '" . '%' . $_GET['professeurId'] . '%' . "' ";
    } else {
        $profWhere = "id_prof = '".$_GET["professeurId"]."' ";
    }
    
    if(!$_GET["matiereId"]) {
        $matiereWhere = "id_matiere LIKE '" . '%' . $_GET['matiereId'] . '%' . "' ";
    } else {
        $matiereWhere = "id_matiere = '".$_GET["matiereId"]."' ";
    }
    
    if ($_SESSION["type"] == '1') { //Si l'utilisateur connecté est un administrateur, on affiche tous les cours
        $SQL = "SELECT c.ID IDcours, c.promo, c.contenu, c.travail, c.id_interro, DATE_FORMAT(c.date, '%d/%m/%Y') AS date_fr,
                       m.nom matiere, u.nom nomProf, u.prenom prenomProf, i.libelle sujet FROM cours c
                INNER JOIN utilisateur u ON c.id_prof = u.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                LEFT JOIN interro i on c.id_interro = i.ID
                WHERE ".$promoWhere."
                    AND ".$matiereWhere."
                    AND ".$profWhere."
                ORDER BY date DESC";
    } else {
        $SQL = "SELECT c.ID IDcours, c.promo, c.contenu, c.travail, c.id_interro, DATE_FORMAT(c.date, '%d/%m/%Y') AS date_fr,
                       m.nom matiere, u.nom nomProf, u.prenom prenomProf, i.libelle sujet FROM cours c
                INNER JOIN utilisateur u ON c.id_prof = u.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                LEFT JOIN interro i on c.id_interro = i.ID
                WHERE id_prof = '" . $_SESSION["ID"] . "' 
                    AND ".$promoWhere."
                    AND ".$matiereWhere."
                    AND ".$profWhere."
                ORDER BY date DESC";
    }
} else {
    if ($_SESSION["type"] == '1') { //Si l'utilisateur connecté est un administrateur, on affiche tous les cours
        $SQL = "SELECT c.ID IDcours, c.promo, c.contenu, c.travail, c.id_interro, DATE_FORMAT(c.date, '%d/%m/%Y') AS date_fr,
                       m.nom matiere, u.nom nomProf, u.prenom prenomProf, i.libelle sujet FROM cours c
                INNER JOIN utilisateur u ON c.id_prof = u.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                LEFT JOIN interro i on c.id_interro = i.ID
                ORDER BY c.date DESC";
    } else {
        $SQL = "SELECT c.ID IDcours, c.promo, c.contenu, c.travail, c.id_interro, DATE_FORMAT(c.date, '%d/%m/%Y') AS date_fr,
                       m.nom matiere, u.nom nomProf, u.prenom prenomProf, i.libelle sujet FROM cours c
                INNER JOIN utilisateur u ON c.id_prof = u.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                LEFT JOIN interro i on c.id_interro = i.ID
                WHERE id_prof = '" . $_SESSION["ID"] . "'
                ORDER BY c.date DESC";
    }
}

$rs = $cnx->query($SQL);

while ($info = $rs->fetch_object()) {

    if ($info->id_interro !== '0') {
        $interro = $info->sujet;
    } else {
        $interro = "";
    }

    echo '  <tr onclick="window.location=\'modifCours.php?id=' . $info->IDcours . '\'">
                    <td>
                        ' . $info->date_fr . '
                    </td>
                    <td>
                        ' . $info->promo . '
                    </td>
                    <td>
                        ' . $info->prenomProf . ' ' . $info->nomProf . '
                    </td>
                    <td>
                        ' . $info->matiere . '
                    </td>
                    <td>
                        ' . truncate($info->contenu, 80) . '
                    </td>
                    <td>
                        ' . truncate($info->travail, 50) . '
                    </td>
                    <td>
                        ' . $interro . '
                    </td>
                </tr>';
}

echo '</table>';
?>
    

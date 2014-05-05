<?php
$titre = 'Recherche';
include 'header.php';
?>


<table class="table table-hover tableListe">
    <tr>
        <th colspan="7">Filtre :</th>
    </tr>
    <tr>
        <th>Date(calendrier a faire)</th>
        <th>
            <select class="filtre" onchange="filtre()" id="promotion">
                <option value="">Promotion</option>
                <?php
                include 'Connection_BDD.php';

                $SQL = "SELECT nom FROM promo";
                $rs = $cnx->query($SQL);

                while ($info = $rs->fetch_object()) {
                    if ($info->nom == $_GET['promotionId']) {
                        echo '<option selected="selected" value="' . $info->nom . '">' . $info->nom . '</option>';
                    } else {
                        echo '<option value="' . $info->nom . '">' . $info->nom . '</option>';
                    }
                }
                ?>
            </select>
        </th>
        <th>
            <select class="filtre" onchange="filtre()" id="professeur">
                <!--a géré le fait que ce filtre ne s'affiche que si le user et un admin(les prof ne peuvent pas voir les cours des autres professeurs) -->
                <option value="">Professeur</option>
<?php
include 'Connection_BDD.php';

$SQL = "SELECT ID,nom,prenom FROM utilisateur";
$rs = $cnx->query($SQL);

while ($info = $rs->fetch_object()) {
    if ($info->ID == $_GET['professeurId']) {
        echo '<option selected="selected" value="' . $info->ID . '">' . $info->nom . ' ' . $info->prenom . '</option>';
    } else {
        echo '<option value="' . $info->ID . '">' . $info->nom . ' ' . $info->prenom . '</option>';
    }
}
?>
            </select >
        </th>
        <th colspan="3">
            <select class="filtre" onchange="filtre()" id="Matiere">
                <option value=""> Matière</option>
                <?php
                include 'Connection_BDD.php';

                $SQL = "SELECT ID,nom FROM matiere";
                $rs = $cnx->query($SQL);

                while ($info = $rs->fetch_object()) {
                    if ($info->ID == $_GET['matiereId']) {
                        echo '<option selected="selected" value="' . $info->ID . '">' . $info->nom . '</option>';
                    } else {
                        echo '<option value="' . $info->ID . '">' . $info->nom . '</option>';
                    }
                }
                ?>
            </select>
        </th>

<!--        <th>
            <select class="filtre" class="filtre" onchange="filtre()" id="interrogation">
                <option>Interro</option>
                <option value="0">Oui</option>
                <option value="1">Non</option>
            </select>
        </th>-->

    </tr>
    <tr>
        <th>Date</th>
        <th>Promotion</th>
        <th>Professeur</th>
        <th>Matière</th>
        <th>Contenu du cours</th>
        <th>Travail donné</th>
        <th>Interro</th>
    </tr>
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

//    var_dump($_POST);
include 'Connection_BDD.php';
if ($_GET) {
    if ($_SESSION["type"] == '1') { //Si l'utilisateur connecté est un administrateur, on affiche tous les cours
        $SQL = "SELECT c.*, m.nom matiere, u.nom nomProf, u.prenom prenomProf, i.libelle sujet FROM cours c
                INNER JOIN utilisateur u ON c.id_prof = u.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                LEFT JOIN interro i on c.id_interro = i.ID
                WHERE c.promo LIKE '" . '%' . $_GET['promotionId'] . '%' . "'
                    AND id_matiere LIKE '" . '%' . $_GET['matiereId'] . '%' . "'
                    AND id_prof LIKE '" . '%' . $_GET['professeurId'] . '%' . "'
                ORDER BY date DESC";
    } else {
        $SQL = "SELECT c.*, m.nom matiere, u.nom nomProf, u.prenom prenomProf, i.libelle sujet FROM cours c
                INNER JOIN utilisateur u ON c.id_prof = u.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                LEFT JOIN interro i on c.id_interro = i.ID
                WHERE id_prof = '" . $_SESSION["ID"] . "' 
                    AND promo LIKE '" . '%' . $_GET['promotionId'] . '%' . "'
                    AND id_matiere LIKE '" . '%' . $_GET['matiereId'] . '%' . "'
                    AND id_prof LIKE '" . '%' . $_GET['professeurId'] . '%' . "'
                ORDER BY date DESC";
    }
} else {
    if ($_SESSION["type"] == '1') { //Si l'utilisateur connecté est un administrateur, on affiche tous les cours
        $SQL = "SELECT c.*, m.nom matiere, u.nom nomProf, u.prenom prenomProf, i.libelle sujet FROM cours c
                INNER JOIN utilisateur u ON c.id_prof = u.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                LEFT JOIN interro i on c.id_interro = i.ID
                ORDER BY date DESC";
    } else {
        $SQL = "SELECT c.*, m.nom matiere, u.nom nomProf, u.prenom prenomProf, i.libelle sujet FROM cours c
                INNER JOIN utilisateur u ON c.id_prof = u.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                LEFT JOIN interro i on c.id_interro = i.ID
                WHERE id_prof = '" . $_SESSION["ID"] . "'
                ORDER BY date DESC";
    }
}

$rs = $cnx->query($SQL);

while ($info = $rs->fetch_object()) {

    if ($info->id_interro !== '0') {
        $interro = $info->sujet;
    } else {
        $interro = "";
    }

    echo '  <tr onclick="window.location=\'modifCours.php?id=' . $info->ID . '\'">
                    <td>
                        ' . $info->date . '
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
    

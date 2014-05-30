<?php

//echo 'haha : '.$_POST['id_test'];

require('framework/fpdf.php');
require('framework/tfpdf/tfpdf.php');
include 'Connection_BDD.php';

$SQL = "SELECT c.ID IDcours, c.promo, c.contenu, c.travail, c.id_interro, DATE_FORMAT(c.date, '%d/%m/%Y') AS date_fr,
                m.nom matiere, u.nom nomProf, u.prenom prenomProf, i.libelle sujet FROM cours c
        INNER JOIN utilisateur u ON c.id_prof = u.ID
        INNER JOIN matiere m ON c.id_matiere = m.ID
        LEFT JOIN interro i on c.id_interro = i.ID
        WHERE c.ID = " . $_POST['id_test'] . "
        ORDER BY c.date DESC";

$rs = $cnx->query($SQL);

while ($info = $rs->fetch_object()) {

    $pdf = new tFPDF();
    $pdf->AddPage();
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
//    $pdf->SetFont('DejaVu','B',16);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Cours du : ' . $info->date_fr);
    $pdf->Cell(-40, 20);
//    $pdf->SetFont('Arial', '', 11);
    $pdf->SetFont('DejaVu','',12);
    $pdf->Cell(40, 30, 'Matière : ' . $info->matiere);
    $pdf->Cell(-40, 40);
    $pdf->Cell(40, 50, 'Professeur : ' . $info->nomProf . ' ' . $info->prenomProf);
    $pdf->Cell(-40, 60);
    $pdf->Cell(40, 70, 'Contenu du cours(intituler/resumé) : ' . $info->contenu);
    if ($info->travail != null) {
        $pdf->Cell(-40, 80);
        $pdf->Cell(40, 90, 'Travail à faire : ' . $info->travail);
    }
    if ($info->id_interro != 0) {
        if ($info->travail != null) {
            $pdf->Cell(-40, 100);
            $pdf->Cell(40, 110, 'interro : ' . $info->sujet);
        }
        else{
            $pdf->Cell(-40, 80);
            $pdf->Cell(40, 90, 'interro : ' . $info->sujet);
        }
    }
    $pdf->Output();
}
?>

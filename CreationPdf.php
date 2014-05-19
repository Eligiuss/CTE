<?php

//echo 'haha : '.$_POST['id_test'];

require('framework/fpdf.php');
include 'Connection_BDD.php';

 $SQL = "SELECT c.ID IDcours, c.promo, c.contenu, c.travail, c.id_interro, DATE_FORMAT(c.date, '%d/%m/%Y') AS date_fr,
                       m.nom matiere, u.nom nomProf, u.prenom prenomProf, i.libelle sujet FROM cours c
                INNER JOIN utilisateur u ON c.id_prof = u.ID
                INNER JOIN matiere m ON c.id_matiere = m.ID
                LEFT JOIN interro i on c.id_interro = i.ID
                WHERE IDcours = ".$_POST['id_test']."
                ORDER BY c.date DESC";
 
 $rs = $cnx->query($SQL);

//$info = $rs->fetch_object();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$_POST['id_test']);
$pdf->Cell(-40,20,$_POST['id_test']);

$pdf->Output();
?>

<?php
// permet d'inclure la biblioth�que fpdf
require('../fpdf/fpdf.php');

// instancie un objet de type FPDF qui permet de cr�er le PDF
$pdf=new FPDF();
// ajoute une page
$pdf->AddPage();
// d�finit la police courante
$pdf->SetFont('Arial','B',16);
$pdf->Image('../images/theatre1.jpg',10,10, 64, 48);
// affiche du texte
$pdf->Cell(40,10,'Voici un Pdf !');
// Enfin, le document est termin� et envoy� au navigateur gr�ce � Output().
$pdf->Output();
?>
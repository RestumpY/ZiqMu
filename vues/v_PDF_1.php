<div id="inscription">
<?php
require('modele/fonctions.php');
$i = $_GET['i'];
echo $i;
$lesInscriptions = Music::getLesInscriptions();
var_dump($lesInscriptions[$i]);

  

       echo " <hr><center></br> Nom : <b>" . $lesInscriptions[$i]['nomAdherent']. "</b>" ;
       echo " </br> Prenom : <b>" . $lesInscriptions[$i]['prenomAdherent']. "</b>" ;
       echo " </br> Adresse : <b>" . $lesInscriptions[$i]['mail']. "</b>" ;
       echo " </br> Mail : <b>" . $lesInscriptions[$i]['adresse'] . "</b></br>";
    
    require('fpdf/fpdf.php');
    // instancie un objet de type FPDF qui permet de créer le PDF
    $pdf=new FPDF();
    // ajoute une page
    $pdf->AddPage();
    // définit la police courante
    $pdf->SetFont('Arial','B',16);
    $pdf->Image('images/theatre.jpg',10,10, 64, 48);
    // affiche du texte
    $pdf->Cell(40,10,'Voici un Pdf !');
    // Enfin, le document est terminé et envoyé au navigateur grâce à Output().
    $pdf->Output();

?>
</div>
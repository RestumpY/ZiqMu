<div id="pdfInscription">
<?php
 require ('modele/fonctions.php');
 $numSeance = $_REQUEST["numSeance"];
// Music::creerPDF($numSeance);
 
 //$inscription = Music::testTkt($numSeance);
 //var_dump($inscription);
 //$nom = $inscription[0]['nomAdherent'];
 //echo $nom;
 
 $lesInscriptions = Music::getLesInscriptions();
 $inscription = Music::getInscription($numSeance, $lesInscriptions);
 //var_dump($inscription);
 Music::creerPDF($inscription);
?>
</div>
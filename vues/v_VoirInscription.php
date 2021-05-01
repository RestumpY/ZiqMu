<div id="inscription">

    
    <h2> <center> Liste des inscriptions  </center> </h2>
<?php 
    require ('modele/fonctions.php');
    $lesInscriptions = Music::getLesInscriptions();
    
     $numSeance = 0;

   foreach($lesInscriptions as $uneInscription){
        
       
       echo " <hr><center></br> Nom : <b>" . $uneInscription['nomAdherent']. "</b>" ;
       echo " </br> Prenom : <b>" . $uneInscription['prenomAdherent']. "</b>" ;
       echo " </br> Adresse : <b>" . $uneInscription['adresse']. "</b>" ;
       echo " </br> Mail : <b>" . $uneInscription['mail'] . "</b></br>";
       echo " </br> <a href='index.php?action=pdfInscription&numSeance=".$numSeance."'> <img src='images/pdf.png' title='Afficher PDF' alt='PDF'> </a></center>";
       echo "$numSeance";
       //echo Music::getIdSeance($uneInscription['nomAdherent'],$uneInscription['prenomAdherent']);
       $numSeance = $numSeance +1;
     
    }
    
    
     ?>
    
    
    
    
    
</div>

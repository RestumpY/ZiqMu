<div id="validerInscription">
<?php extract($_POST); require('modele/fonctions.php'); ?>
    


<?php

$tab = Music::validerInscription();
    
    
    //echo $tab["idSeance"] . $tab["nom"] . $tab["prenom"] . $tab["adresse"] .$tab["mail"]  ;
    
    Music::creerInscription($tab);
    
    include ("v_ConfirmeInscription.php");
     ?>
</div>

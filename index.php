<?php

if(!isset($_REQUEST['action']))
{
 $action = 'accueil';
}
else {
 $action = $_REQUEST['action'];
}
// vue qui cr�e l?en-t�te de la page
include("vues/v_entete.php") ;
switch($action)
{
 case 'accueil':
 // vue qui cr�e le contenu de la page d?accueil
 include("vues/v_accueil.php");
 break;


 case 'catalogue':
     
 include("vues/v_catalogue.php");
 break;


 case 'voirInscription':
 include("vues/v_VoirInscription.php");
 break;

case 'Inscrire':
     
 include("vues/v_inscrire.php");
 break;


case 'validerInscription':
 include("vues/v_ValiderInscription.php");
    
 break;

case 'pdfInscription':
 include("vues/v_PDF.php");

 break;
  }

include("vues/v_pied.php") ;
?>
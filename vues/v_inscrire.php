<div id="inscrire">
    
    <div id="contenu">
<form action="index.php?action=validerInscription" method="post">
S'inscrire au cours: <?php require('modele/fonctions.php'); echo $idSeance = Music::inscrireCours();  ?>
<input type='hidden' value='<?php echo $idSeance ?>' name='idSeance'>
</br>Nom: <input type="text" name="nom"><br>
Prenom: <input type="text" name="prenom"><br>
Adresse: <input type="text" name="adresse"><br>
Mail: <input type="text" name="mail"><br>
<input type="submit">
</form>
        <div>
</div>

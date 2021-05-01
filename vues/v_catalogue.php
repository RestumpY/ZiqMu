<div id="catalogue"> 
 
     <?php 
    require ('modele/fonctions.php');
    $lesCours = Music::getLesCours();
        

    //print_r($lesCours);
    //var_dump($lesCours);


    
   
            
     
  
   foreach($lesCours as $unCours){
        
        
       
       echo  "<center><hr> <b>  <a href='index.php?action=Inscrire&idSeance={$unCours['idSeance']}'>Cours:  " . $unCours['idSeance'] . "</b></a>";
       echo " <hr>  La date du cours :<b> " . $unCours['jour'] . " ". $unCours['idHeure'] . "h </b>";
       echo " </br> La matiere : <b>" . $unCours['idMatiere']. "</b>" ;
       echo " </br> Le professeur : <b>" . $unCours['idProf'] . "</b></br> </center>";
      
     
    }
    
    
    

    /*foreach ( $lesCours[0] as $unCours ){
    
        echo  $unCours ."<br/>";
    }
    
    echo "</br>";
    
      foreach ( $lesCours[1] as $unCours ){
    
        echo  $unCours ."<br/>";
    }

    */
    //Music::getLesCoursTest();
   
     ?>
</div>
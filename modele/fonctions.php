<?php

extract($_POST);

class Music{
    

    static function getLesCours()
    {
        $cours = array();
        require ("connexion.php");
        
        $sql = "SELECT idSeance,jour,idHeure, idMatiere, idProf  FROM Seance";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $cours[] = $row  ;
          }
        } else {
          echo "0 results";
        }
        $conn->close();


        return $cours;

    }
   
    static function inscrireCours() {
    // récup numéro cours
    $idSeance = $_REQUEST["idSeance"];
    return $idSeance;
}

static function validerInscription(){

    $inscription = array();
    // récupération du numéro
    $idSeance = $_REQUEST["idSeance"];
    $inscription["idSeance"] =  $idSeance;
    // faire de même les autres paramètres?
    $nom = $_REQUEST["nom"];
    $inscription["nom"] = $nom;
            
    $prenom = $_REQUEST["prenom"];
    $inscription["prenom"] = $prenom;
    
    $adresse = $_REQUEST["adresse"];
    $inscription["adresse"] = $adresse;
    
    $mail = $_REQUEST["mail"];
    $inscription["mail"] = $mail;
    
    return $inscription;
   

}

static function creerInscription($inscription){

       require ("connexion.php"); 
       
       $sql="insert into adherent(nomAdherent, prenomAdherent, adresse, mail) 
       VALUES('".$inscription["nom"]."','".$inscription["prenom"]."','".$inscription["adresse"]."','".$inscription["mail"]."')";
       
       
       if ($conn->query($sql) === TRUE) {
            echo "Inscris avec succes";
        } 
        
        else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
          }
          
        $conn->close();
             

}


static function getLesInscriptions(){
    
        $inscriptions = array();
        require ("connexion.php");
        
        $sql = "SELECT nomAdherent,prenomAdherent,adresse,mail  FROM adherent";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $inscriptions[] = $row  ;
          }
        } else {
          echo "0 results";
        }
        $conn->close();


        return $inscriptions;
    
}

static function getIdSeance($nom,$prenom){
    
        $idSeance = array();
        require ("connexion.php");
        
        $sql = "SELECT idAdherent  FROM adherent WHERE nomAdherent = '. $nom .' AND prenomAdherent = '. $prenom .'";
      
        $result = $conn->query($sql);
 


         
        return $idSeance;
    
    
}

static function getInscription($numSeance,$inscriptions){
    
    $uneInscription = array();
    
    array_push($uneInscription,$numSeance);
    array_push($uneInscription,$inscriptions[$numSeance]['nomAdherent']);
    array_push($uneInscription,$inscriptions[$numSeance]['prenomAdherent']);
    array_push($uneInscription,$inscriptions[$numSeance]['mail']);
    array_push($uneInscription,$inscriptions[$numSeance]['adresse']);
    
    
    return $uneInscription;
}

static function creerPDF($inscription){
        include("connexion.php");
        require('fpdf/fpdf.php');
        
        
        $numero = $inscription[0];
        $nom = $inscription[1];
        $prenom =  $inscription[2];
        $mail = $inscription[3];
        $adresse = $inscription[4];
        
        $pdf = new FPDF("P","pt","A4");
        
        $pdf->AddPage();
        $pdf->SetFont('Arial','',12);
        $pdf->SetXY(100, 25);
        $pdf->SetTitle("Fiche d'inscription");
        
        $pdf->SetXY(40, 70);
        $pdf->Image("images/theatre_1.jpg");
        
        $pdf->SetXY(40, 10);
        $pdf->Write(7, "Numero de cours: " . $numero);
        
        $pdf->SetXY(40, 20);
        $pdf->Write(7, "Nom : " . $nom);
        
        $pdf->SetXY(40, 30);
        $pdf->Write(7, "Prenom : " . $prenom);
        
        $pdf->SetXY(40, 40);
        $pdf->Write(7, "Mail : " . $mail);
        
        $pdf->SetXY(40, 50);
        $pdf->Write(7, "adresse : " . $adresse);
        
        ob_end_clean();
        $pdf->Output();
        
    }

    /*static function testTkt($numero){

        $inscription = array();
        require ("connexion.php");
        
        $sql = "SELECT *  FROM adherent WHERE idAdherent = $numero";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $inscription[] = $row  ;
          }
        } else {
          echo "0 results";
        }
        $conn->close();

        echo "OUAIS LE NUM: .$numero";
        return $inscription;
       
        
        
    }*/
    
    
    
    /*static function creerPDF($numero){
        include("connexion.php");
        require('fpdf/fpdf.php');
        
        $req = $conn->prepare(
                "SELECT *
                 FROM adherent
                 WHERE idAdherent = $numero ");
        $req->execute();
        $res = $req->fetch();
        
        $nom = $res['nomAdherent'];
        $prenom =  $res['prenomAdherent'];
        $mail = $res['mail'];
        $adresse = $res['adresse'];
        
        $pdf = new FPDF("P","pt","A4");
        
        $pdf->AddPage();
        $pdf->SetFont('Helvetica','',12);
        $pdf->SetXY(100, 25);
        $pdf->SetTitle("Fiche d'inscription");
        $pdf->SetAuthor("Nassim");
        
        //$pdf->Image("images/theatre.jpg");
        
        $pdf->SetXY(10, 10);
        $pdf->Write(7, "Numero de cours: " . $numero);
        
        $pdf->SetXY(10, 20);
        $pdf->Write(7, "Nom : " . $nom);
        
        $pdf->SetXY(10, 30);
        $pdf->Write(7, "Prenom : " . $prenom);
        
        $pdf->SetXY(10, 40);
        $pdf->Write(7, "Mail : " . $mail);
        
        $pdf->SetXY(10, 50);
        $pdf->Write(7, "adresse : " . $adresse);
        
        ob_end_clean();
        $pdf->Output();
        
    }*/
    
    /*static function creerPDF($numero){
        include("connexion.php");
        require('fpdf/fpdf.php');
        
        $inscription = array();

        
        $sql = "SELECT *  FROM adherent WHERE idAdherent = $numero";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $inscription[] = $row  ;
          }
        } else {
          echo "0 results";
        }
        $conn->close();
        
        $nom = $inscription[0]['nomAdherent'];
        $prenom =  $inscription[0]['prenomAdherent'];
        $mail = $inscription[0]['mail'];
        $adresse = $inscription[0]['adresse'];
        
        $pdf = new FPDF("P","pt","A4");
        
        $pdf->AddPage();
        $pdf->SetFont('Helvetica','',12);
        $pdf->SetXY(100, 25);
        $pdf->SetTitle("Fiche d'inscription");
        $pdf->SetAuthor("Nassim");
        
        //$pdf->Image("images/theatre.jpg");
        
        $pdf->SetXY(10, 10);
        $pdf->Write(7, "Numero de cours: " . $numero);
        
        $pdf->SetXY(10, 20);
        $pdf->Write(7, "Nom : " . $nom);
        
        $pdf->SetXY(10, 30);
        $pdf->Write(7, "Prenom : " . $prenom);
        
        $pdf->SetXY(10, 40);
        $pdf->Write(7, "Mail : " . $mail);
        
        $pdf->SetXY(10, 50);
        $pdf->Write(7, "adresse : " . $adresse);
        
        ob_end_clean();
        $pdf->Output();
        
    }*/
}
?>

    
 

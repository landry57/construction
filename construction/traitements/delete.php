<?php
include ('function.php');
include ('config.php');
$tab= array("id"=>"","message"=>"","isSuccess"=>false );

if ($_SERVER['REQUEST_METHOD']=="POST") {

    $tab['id']= verifyInput($_POST['id']);    
    $tab['isSuccess']= true ;
    
    
    // mise en route de la base de donnée
    if ($tab["isSuccess"]) {
        /* plan à supprimer */
     $supP=$bdd->prepare("SELECT photos FROM plans WHERE id= ?");
     $supP->execute(array($tab['id']));
      /* model à supprimer */
     $supM=$bdd->prepare("SELECT photos FROM model WHERE plan_id= ?");
     $supM->execute(array($tab['id']));
     //suppression definitive du plan dans le dossier plans
      while ($sp=$supP->fetch()) {
       $files="../plans/".$sp['photos'];

     // Vérification de l'existance du fichier avant de la supprimer
        if(file_exists("$files")){
        unlink("$files");
        $suc= "Le fichier a été supprimé";
        }else{
        $errors= "Le fichier n'existe pas !";
      }

     
     }

     //suppression definitive du plan dans le dossier plans
     while ($spm=$supM->fetch()) {
      $filesm="../models/".$spm['photos'];

    // Vérification de l'existance du fichier avant de la supprimer
       if(file_exists("$filesm")){
       unlink("$filesm");
       $suc= "Le fichier a été supprimé";
       }else{
       $errors= "Le fichier n'existe pas !";
     }

    
    }

       //suppression du model dans la base de donnees
        $delM= $bdd->prepare('DELETE  FROM model WHERE plan_id=?');
        $delM->execute(array($tab['id']));
        //suppression du model dans la base de donnees
        $delP= $bdd->prepare('DELETE  FROM plans WHERE id=?');
        $delP->execute(array($tab['id']));
        $tab["message"]="succes";
       
    }
  echo json_encode($tab);
}

?>
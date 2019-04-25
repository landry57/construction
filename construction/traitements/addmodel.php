<?php
include('function.php');
include('config.php');
$tab= array("plan_id"=>"","name"=>"","plan"=>"","desc"=>"", "model"=>"",
"message"=>"","nameError"=>"","planError"=>"","descError"=>"","modelError"=>"","gError"=>"",
"imagePath"=>"","imageExtension"=>"","isSuccess"=>false,"isUploadSuccess"=>false );

if (isset($_POST) AND $_SERVER['REQUEST_METHOD'] == "POST" ) {

    $tab['plan_id']= verifyInput($_POST['plan_id']);
    $tab['name']= verifyInput($_POST['name']);
    $tab['model']= verifyInput($_FILES["model"]["name"]);     
    //un isset pour l image
    $tab['isUploadSuccess']= true ;
    $tab['isSuccess']= true ;
    
    

    // verification name
    if (empty($tab['name'])) {
        $tab['nameError'] = 'le titre stp !!';
        $tab['isSuccess']= false ;
    } else {
        if (!isLetter($tab['name'])) {
            $tab['nameError'] = " ce n'est pas un titre ";
            $tab['isSuccess']= false ;
        } else {
            $tab['name'] ;
        }
        
    }
     
     
    
    // verification plan
    if(empty($tab['model'])) 
    {
        $tab['modelError'] = 'Ce champ ne peut pas être vide';
        $tab['isUploadSuccess']= false ;
    }
    else
    {
      if ($_FILES['model']['size'] <= 6000000)
      {
              // Testons si l'extension est autorisée

              $infosfichier = pathinfo($_FILES['model']['name']);
              $result = explode('.',$_FILES['model']['name']);
              $extension_upload =strtolower(end($result));
              $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

              if (in_array($extension_upload, $extensions_autorisees)==true)
         
              {    
                      // On peut valider le fichier et le stocker définitivement
                      $tab['model'];

              }
              else
              {
                  $tab['modelError']='extension non valide vous devez uploader un fichier jpg,jpeg, gif,png';
                  $tab['isUploadSuccess']= false ;
              }

      }
      else
      {

          $tab['modelError']='la taille du fichier ne doit pas depasser 6Mo';
          $tab['isUploadSuccess']= false ;

      }

    }
    
    // mise en route de la base de donnée
    if ($tab["isSuccess"]&&$tab["isUploadSuccess"]) {
       
        $selectPlan= $bdd->prepare('SELECT * FROM model WHERE name=? AND photos=?');
        $selectPlan->execute(array($tab['name'],$tab['model']));
        $rows=$selectPlan->rowCount();
       
        if($rows==0)
        {
           
            $insertPlan=$bdd->prepare('INSERT INTO model(plan_id,name,photos,date_reg) VALUES(?,?,?,NOW())');
            $insertPlan->execute(array($tab['plan_id'],$tab['name'], $tab['model']));
            move_uploaded_file($_FILES['model']['tmp_name'], '../models/' . basename( $tab['model']));
            $tab['message']='model bien enregistré';
        }
        else
        {
            $tab['gError']='Il semble que ce model a enregistré';
        }
    }
  echo json_encode($tab);
}

?>
<?php
include('function.php');
include('config.php');
$tab= array("category_id"=>"","name"=>"","plan"=>"","desc"=>"", "model"=>"",
"message"=>"","nameError"=>"","planError"=>"","descError"=>"","modelError"=>"","gError"=>"",
"imagePath"=>"","imageExtension"=>"","isSuccess"=>false,"isUploadSuccess"=>false );

if (isset($_POST) AND $_SERVER['REQUEST_METHOD'] == "POST" ) {

    $tab['category_id']= verifyInput($_POST['category_id']);
    $tab['name']= verifyInput($_POST['name']);
    $tab['desc']= verifyInput($_POST['desc']);
    $tab['plan']= verifyInput($_FILES["plan"]["name"]);     
    //un isset pour l image
    $tab['isUploadSuccess']= true ;
    $tab['isSuccess']= true ;
    
    

    // verification name
    if (empty($tab['name'])) {
        $tab['nameError'] = 'le titre stp !!';
        $tab['isSuccess']= false ;
    } else {
        if (!isLetter1($tab['name'])) {
            $tab['nameError'] = " ce n'est pas un titre ";
            $tab['isSuccess']= false ;
        } else {
            $tab['name'] ;
        }
        
    }
     
     // verification de la description
     if (empty($tab['desc'])) {
        $tab['descError'] = 'ta description stp !!';
        $tab['isSuccess']= false ;
    } else {
        if (limitDesc($tab['desc'])<=200) {
            $tab['desc'] ;
        } else {
            $tab['descError'] = "la taille de la description ne doit pas exceder les 200 caracteres ";
            $tab['isSuccess']= false ;
        }
        
    }
    
    // verification plan
    if(empty($tab['plan'])) 
    {
        $tab['planError'] = 'Ce champ ne peut pas être vide';
        $tab['isUploadSuccess']= false ;
    }
    else
    {
      if ($_FILES['plan']['size'] <= 6000000)
      {
              // Testons si l'extension est autorisée

              $infosfichier = pathinfo($_FILES['plan']['name']);
              $result = explode('.',$_FILES['plan']['name']);
              $extension_upload =strtolower(end($result));
              $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

              if (in_array($extension_upload, $extensions_autorisees)==true)
         
              {    
                      // On peut valider le fichier et le stocker définitivement
                      $tab['plan'];

              }
              else
              {
                  $tab['planError']='extension non valide vous devez uploader un fichier jpg,jpeg, gif,png';
                  $tab['isUploadSuccess']= false ;
              }

      }
      else
      {

          $tab['planError']='la taille du fichier ne doit pas depasser 6Mo';
          $tab['isUploadSuccess']= false ;

      }

    }
    
    // mise en route de la base de donnée
    if ($tab["isSuccess"]&&$tab["isUploadSuccess"]) {
       
        $selectPlan= $bdd->prepare('SELECT * FROM plans WHERE name=? AND photos=?');
        $selectPlan->execute(array($tab['name'],$tab['plan']));
        $rows=$selectPlan->rowCount();
       
        if($rows==0)
        {
           
            $insertPlan=$bdd->prepare('INSERT INTO plans(category_id,name,description,photos,date_reg) VALUES(?,?,?,?,NOW())');
            $insertPlan->execute(array($tab['category_id'],$tab['name'],$tab['desc'], $tab['plan']));
            move_uploaded_file($_FILES['plan']['tmp_name'], '../plans/' . basename( $tab['plan']));
            $tab['message']='Plan bien enregistré';
        }
        else
        {
            $tab['gError']='Il semble que ce plan a enregistré';
        }
    }
  echo json_encode($tab);
}

?>
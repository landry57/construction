<?php

include('function.php');
include('config.php');
$tab= array("name"=>"","lastname"=>"","tel"=>"","email"=>"","code"=>"","adresse"=>"","ville"=>"","sexe"=>"","besoin"=>"","nombre"=>"",
"villep"=>"","budget"=>"","sujet"=>"","plan_id"=>"",
"message"=>"","nameError"=>"","lastnameError"=>"","telError"=>"","emailError"=>"","codeError"=>"","gError"=>"","adresseError"=>"",
"villeError"=>"","besoinError"=>"","nombreError"=>"","villepError"=>"","budgetError"=>"","sujetError"=>"",
"plan_idError"=>"","sexeError"=>"","rows"=>"","isSuccess"=>false );

if ($_SERVER['REQUEST_METHOD'] == "POST" ) {

    $tab['plan_id']= verifyInput($_POST['plan_id']);
    $tab['name']= verifyInput($_POST['name']);
    $tab['lastname']= verifyInput($_POST['lastname']);
    $tab['tel']= verifyInput($_POST['tel']);  
    $tab['email']= verifyInput($_POST['email']);     
    $tab['code']= verifyInput($_POST['code']); 
    $tab['adresse']= verifyInput($_POST['adresse']);  
    $tab['ville']= verifyInput($_POST['ville']);   
    $tab['sexe']= verifyInput($_POST['sexe']);  
    $tab['besoin']= verifyInput($_POST['besoin']);  
    $tab['nombre']= verifyInput($_POST['nombre']);  
    $tab['villep']= verifyInput($_POST['villep']);  
    $tab['budget']= verifyInput($_POST['budget']);  
    $tab['sujet']= verifyInput($_POST['sujet']);  
    $tab['isSuccess']= true ;
    
    
    if (empty($tab['plan_id'])) {
      $tab['plan_idError'] = 'identite pas charge !!';
      $tab['isSuccess']= false ;
  } else {
     
          $tab['plan_id'] ;
  } 
   
      if (empty($tab['sexe'])) {
        $tab['sexeError'] = 'genre!!';
        $tab['isSuccess']= false ;
    } else {
      
            $tab['sexe'] ;
    } 

    // verification name
    if (empty($tab['name'])) {
        $tab['nameError'] = 'ton name stp !!';
        $tab['isSuccess']= false ;
    } else {
        if (!isLetter($tab['name'])) {
            $tab['nameError'] = " ce n'est pas un name ";
            $tab['isSuccess']= false ;
        } else {
            $tab['name'] ;
        }
        
    }
    if (empty($tab['lastname'])) {
        $tab['lastnameError'] = 'ton nom stp !!';
        $tab['isSuccess']= false ;
    } else {
        if (!isLetter($tab['lastname'])) {
            $tab['lastnameError'] = " ce n'est pas un prenom ";
            $tab['isSuccess']= false ;
        } else {
            $tab['lastname'] ;
        }
        
    }

    if (empty($tab['tel'])) {
        $tab['telError'] = 'ton contact stp !!';
        $tab['isSuccess']= false ;
    } else {
        if (!telDefind($tab['tel'])) {
            $tab['telError'] = " ce n'est pas un contact ";
            $tab['isSuccess']= false ;
        } else {
            $tab['tel'] ;
        }
        
    }
     
    if (empty($tab['email'])) {
        $tab['emailError'] = 'ton mail stp !!';
        $tab['isSuccess']= false ;
    } else {
        if (!isEmail($tab['email'])) {
            $tab['emailError'] = " ce n'est pas un email ";
            $tab['isSuccess']= false ;
        } else {
            $tab['email'] ;
        }
        
    }
     
    if (empty($tab['code'])) {
        $tab['codeError'] = 'ton code postal stp !!';
        $tab['isSuccess']= false ;
    } else {
       
            $tab['code'] ;
    } 
    
    if (empty($tab['adresse'])) {
        $tab['adresseError'] = 'ton adresse stp !!';
        $tab['isSuccess']= false ;
    } else {
       
       $tab['adresse'] ;
    }

    if (empty($tab['ville'])) {
        $tab['villeError'] = 'ta ville stp !!';
        $tab['isSuccess']= false ;
    } else {
       
            $tab['ville'] ;
    }

    if (empty($tab['villep'])) {
        $tab['villepError'] = 'ville du projet stp !!';
        $tab['isSuccess']= false ;
    } else {
       
     $tab['villep'] ;
    }
     
    if (empty($tab['nombre'])) {
        $tab['nombreError'] = 'un nombre stp !!';
        $tab['isSuccess']= false ;
    } else {
        if (!isNumeric($tab['nombre'])) {
            $tab['nombreError'] = " ce n'est pas un chiffre ";
            $tab['isSuccess']= false ;
        } else {
            $tab['nombre'] ;
        }
        
    }

     
    if (empty($tab['budget'])) {
        $tab['budgetError'] = 'votre budget stp !!';
        $tab['isSuccess']= false ;
    } else {
        if (!isNumeric($tab['budget'])) {
            $tab['budgetError'] = " ce n'est pas des chiffres ";
            $tab['isSuccess']= false ;
        } else {
            $tab['budget'] ;
        }
        
    }

    if (empty($tab['sujet'])) {
        $tab['sujetError'] = 'ton message stp !!';
        $tab['isSuccess']= false ;
    } else {
       
            $tab['sujet'] ;
    }
     
    
    // mise en route de la base de donnée
    if ($tab["isSuccess"]){
        $selectM =$bdd->prepare('SELECT * FROM marchands WHERE email=? AND plan_id=?');
        $selectM->execute(array($tab['email'],$tab['plan_id']));
        $rows=$selectM->rowCount();
        if($rows==0)
        {
           $tab['rows']='ok';
            $insertM=$bdd->prepare('INSERT INTO marchands(plan_id,name,lastname,tel,address,email,civilite,city,code_post,besoin,projet_city,
            alternative,budget,message,date_send) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())');
            $insertM->execute(array($tab['plan_id'],$tab['name'],$tab['lastname'], $tab['tel'], $tab['adresse'], $tab['email'], $tab['sexe'],
            $tab['ville'], $tab['code'], $tab['besoin'], $tab['villep'],$tab['nombre'], $tab['budget'], $tab['sujet']));
            $tab['message']='demande bien envoyee , vous serez contacté dans les dernières heures qui suivent';
        }
        else
        {
            $tab['gError']='Il semble que ce plan a ete enregistré contactez le service';
        }
    }
 echo json_encode($tab);
}

?>
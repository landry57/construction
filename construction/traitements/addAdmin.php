<?php
   require('function.php');
   require('config.php');

    $array = array( "name" => "", "lastname" => "",  "tel" => "", "email" => "","password"=>"", "repassword"=>"",
     "nameError" => "", "lastnameError" => "","telError"=>"","message"=>"",
     "passwordError"=>"","repasswordError"=>"","globalError"=>"", "isSuccess" => false);
   

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $array["name"] = verifyInput($_POST["name"]);
        $array["lastname"] = verifyInput($_POST["lastname"]);
        $array["tel"] = verifyInput($_POST["tel"]);
        $array["email"] = verifyInput($_POST["email"]);
        $array["password"] = verifyInput($_POST["password"]);
        $array["repassword"] = verifyInput($_POST["repassword"]);
        $array["isSuccess"] = true; 
        
        if (empty($array["name"]))
        {
            $array["nameError"] = " je veux savoir son nom !";
            $array["isSuccess"] = false; 
        } 
        else
        {
         if (!isLetter($array["name"])) {
            $array["nameError"] = " tu essai de me tromper avec des chiffres!";
            $array["isSuccess"] = false; 
         }else{
             $array["name"];
         }
           
        }


        if (empty($array["lastname"]))
        {
            $array["lastnameError"] = " je veux savoir son prenom !";
            $array["isSuccess"] = false; 
        } 
        else
        {
         if (!isLetter($array["lastname"])) {
            $array["lastnameError"] = " tu essai de me tromper avec des chiffres!";
            $array["isSuccess"] = false; 
         }else{
             $array["lastname"];
         }
           
        }
         
        if (empty($array['tel'])) {
            $array['telError'] = 'son contact stp !!';
            $array['isSuccess']= false ;
        } else {
            if (!telDefind($array['tel'])) {
                $array['telError'] = " ce n'est pas un contact ";
                $array['isSuccess']= false ;
            } else {
                $array['tel'] ;
            }
            
        }
         
        if (empty($array['email'])) {
            $array['emailError'] = 'ton mail stp !!';
            $array['isSuccess']= false ;
        } else {
            if (!isEmail($array['email'])) {
                $array['emailError'] = " ce n'est pas un email ";
                $array['isSuccess']= false ;
            } else {
                $array['email'] ;
            }
            
        }

        if(empty($array["password"])) 
        {
            $array["passwordError"] = "Et oui je veux  tout savoir.même son password !";
            $array["isSuccess"] = false; 
        } 
        else
        {
            if (!verifyPass($array["password"])) {
            $array["passwordError"] = "6 caractères demandés pour le password!";
            $array["isSuccess"] = false; 
            }else
            {
            $array["password"];
           }
        }

        if (empty($array["repassword"]))
        {
            $array["repasswordError"] = "je veux  que tu repète  son password !";
            $array["isSuccess"] = false; 
        }
        else
        {
         if (!verifyPass($array["repassword"])) {
            $array["repasswordError"] = "6 caractères demandés pour le password!";
            $array["isSuccess"] = false; 
            }else
            {
            $array["repassword"];
           }
        }
        
        if ($array["repassword"]!=$array["password"]) {
            $array["repasswordError"] = "les password doivent être identique";
            $array["isSuccess"] = false; 
            }else
            {
            $array["repassword"];
           }
        
        

        if($array["isSuccess"]) 
        {
            $array['password']=hashPass( $array['password']);
            $select=$bdd->prepare("SELECT * FROM admin WHERE email=?");
            $select->execute(array($array['email']));
            $rows=$select->rowCount();
            if ($rows==0) {
               $insert=$bdd->prepare("INSERT INTO admin(name,lastname,tel,email,password,date_reg) VALUES(?,?,?,?,?,NOW())");
               $insert->execute(array($array['name'],$array['lastname'],$array['tel'],$array['email'],$array['password']));
               $array["message"]="Admin bien ajouté";
            }else
            {
                $array['globalError']="{$array['name']}  existe deja";
            }
            
        }
       
        
        echo json_encode($array);
        
    }

?>



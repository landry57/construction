
<?php
  require('config.php');
  require('function.php');


 $tab = array( "email" => "", "id"=>"","emailDb"=>"","passwordDb"=>"", "codeqr"=>"", "emailError" => "","password"=>"","passwordError"=>"","globalError"=>"", "isSuccess" => false);
      if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $tab["email"] = verifyInput($_POST["email"]);
        $tab["password"] = verifyInput($_POST["password"]);
        $tab["isSuccess"] = true; 
        
        if (empty($tab["email"]))
        {
            $tab["emailError"] = " je veux savoir ton email !";
            $tab["isSuccess"] = false; 
        } 
        else
        {
         if (!isEmail($tab["email"])) {
            $tab["emailError"] = " tu essai de me tromper ce n'est pas un email!";
            $tab["isSuccess"] = false; 
         }else{
             $tab["email"];
         }
           
        }

        if(empty($tab["password"])) 
        {
            $tab["passwordError"] = "Et oui je veux  tout savoir.même ton password !";
            $tab["isSuccess"] = false; 
        } 
        else
        {
            if (!verifyPass($tab["password"])) {
            $tab["passwordError"] = "6 caractères demandés pour le password!";
            $tab["isSuccess"] = false; 
            }else
            {
            $tab["password"];
           }
        }

          $tab['password']=hashPass($tab['password']);
          //verification nom utilisateur
          $selectu=$bdd->prepare("SELECT * FROM admin WHERE email=?");
          $selectu->execute(array($tab['email']));
          $rows=$selectu->rowCount();
          $user=$selectu->fetch();
          $tab['emailDb']=$user['email'];
           //verification pass utilisateur
          $selectp=$bdd->prepare("SELECT * FROM admin WHERE password=?");
          $selectp->execute(array($tab['password']));
          $userp=$selectp->fetch();
          $tab['passwordDb']=$userp['password'];

        if ($tab['isSuccess']==true) {
           // $tab['password']=achage( $tab['password']);
           $select=$bdd->prepare("SELECT * FROM admin WHERE email=? AND password=?");
           $select->execute(array($tab['email'],$tab['password']));
           $rows=$select->rowCount();
            if ($rows==1) {
             $list=$select->fetch();
             $_SESSION['id']=$list['id'];
             $tab['id']=$_SESSION['id'];
            }else
            {
              $tab['globalError']=" le compte de l'utilisateur {$tab['email']} n'est pas encore créé!";
            }
        }
        echo json_encode($tab);
}



   ?>
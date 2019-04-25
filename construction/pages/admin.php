
<?php

include('../traitements/req.php');
if(isset($_SESSION['id']) AND $_SESSION['id']>0)
{
  $_SESSION['id'];
}
else
{
  header('Location:connexion.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.1/css/mdb.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
    <link rel="stylesheet "  href = " https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!--lightbox-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">
    <!--css-->
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">


    <title>Admin</title>
</head>
<body>
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark  ">
  <a class="navbar-brand" href="#">Builders<sup>.</sup></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Plans de Maison
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
        <?php while ($list= $selCategories->fetch()) { ?>
          <a class="dropdown-item" href="admin.php?page=<?=$list['id'];?>"><?= $list['name'];?></a>
        <?php } ?>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-google-plus-g"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <?php
           if(isset($_SESSION['id']) AND $_SESSION['id']>0)
           {
           echo'<a class="dropdown-item btn" href="../traitements/deconnexion.php">deconnexion</a>';
           }

          
          ?>
          
          
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
<div id='pan1'></div>
<section class="container-fluid">
  <!-- Section plan -->
  <div class="col-lg-1 col-md-1 btn fr " id="ov">
      <i class="fas fa-angle-double-right" id="ouvrir"></i>
  </div>
<section class="row">
    <div class="col-lg-2 col-md-3 text-left left1 btn " id="volet">
     <div class="panel btn  cpan">CPanel</div> 
     <div class="clearfix"></div>
     <div class="row">
       <div class="col-lg-12 col-md-12 text-center">
        <span class="btn "data-toggle="modal" data-target="#exampleModalCenter">Ajouter un plan</span>
        <div class="divider"></div>
        <span class="btn "data-toggle="modal" data-target="#model">Ajouter un model</span>
        <div class="divider"></div>
        <span class="btn "data-toggle="modal" data-target="#voirp">Voir les Plans</span>
        <div class="divider"></div>
        <span class="btn "data-toggle="modal" data-target="#supp">Supprimer un plan</span>
        <div class="divider"></div>
        <span class="btn "data-toggle="modal" data-target="#message">Mes mail</span>
        <div class="divider"></div>
        <span class="btn "data-toggle="modal" data-target="#addA">ajout admin</span>
        <div class="divider"></div>
       </div>
     </div>
     
    </div>
    
    <div class="col-lg-8 col-md-8 mr-1" >
        <div class="row">
         <div class="col-lg-12 col-md-12">
            <div class="col-lg-5 col-md-5 ml-1 btn cad">
                <h4 class="panel btn  tr">Stat des plans</h4>
                <p style="color:#000;font-weight:bold">(<?=$numpC1?>) <span style="color:#d98880;"> pour la categorie maisons modernes</span></p>
                <p style="color:#000;font-weight:bold">(<?=$numpC2?>) <span style="color:#d98880;"> pour la categorie maisons classiques</span></p>
                <p style="color:#000;font-weight:bold">(<?=$numpC3?>) <span style="color:#d98880;"> pour la categorie maisons de ville</span></p>
                <p style="color:#000;font-weight:bold">(<?=$numpC4?>) <span style="color:#d98880;"> pour la categorie maisons regionales</span></p>
            </div>
            <div class="col-lg-5 col-md-5 btn cad" style="color:#000;">
              <h4 class="panel btn  tr">visiteurs</h4>
              <p id="visit1" style="color:#000;">
             <?php include('../traitements/visiteur.php');?>
          
            </p>
            </div>
         </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="col-lg-10 col-md-10 btn pt-4 gr">
            <h4 class="panel btn  tr"> plans approuves</h4>
            <p style="color:#000;font-weight:bold">
            <?php
              $P=$selPA1->rowCount();
              if($P>1)
              {
                  echo'(' .$P .')'. '<span style="color:#d98880;"> plans approuvés</span></p>';
              }
              else
              {
                echo'(' .$P .')'. '<span style="color:#d98880;"> plans approuvé</span></p>';
              }
              ?>

              
               
            </div>
          </div>
        </div>
    </div>

   </section>
</section>
<!--modal-->

<!-- Modal d'enregistrement des plans-->
<div class="modal fade  bd-example-modal-lg " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajout Plan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" id="addPlan">
        <div class="form-group" id='entete'>
            
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Type de plan:</label>
             <select name="category_id" id="" class="form-control">
             <?php while ($list1= $selCategoriesOp->fetch()) { ?>
              <option value="<?=$list1['id'];?>"><?=$list1['name'];?></option>
             <?php } ?>
            
             </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nom:</label>
            <input type="text" class="form-control"name="name" id="recipient-name">
            <div  id="nameError"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Plan:</label>
            <input type="file" class="form-control" name="plan" id="file">
            <div  id="planError"></div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" name="desc" id="message-text"></textarea>
            <div  id="descError"></div>
          </div>
          <input type="submit"  class="btn btn-primary" value='save'>
        </form>
      </div>
      <div class="modal-footer">
       
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal d'enregistrement des model-->
<div class="modal fade  bd-example-modal-lg " id="model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajout Model</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" id="addModel">
        <div class="form-group" id='enteteM'>
            
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"> Plan:</label>
             <select name="plan_id" id="" class="form-control">
             <?php while ($list1= $selPlansM->fetch()) { ?>
              <option value="<?=$list1['id'];?>"><?=$list1['name'];?></option>
             <?php } ?>
            
             </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nom:</label>
            <input type="text" class="form-control"name="name" id="recipient-name">
            <div  id="MnameError"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">model:</label>
            <input type="file" class="form-control" name="model" id="file">
            <div  id="modelError"></div>
          </div>
          
          <input type="submit"  class="btn btn-primary" value='save'>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 <!-- Modal voir les plans-->
<div class="modal fade  bd-example-modal-lg " id="voirp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Plans</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <?php while($plan=$selPlans->fetch()){?>
          <div class="col-lg-8 col-md-8 btn imgP">
            
            <img class="img" id="imgP" src="../plans/<?=$plan['photos']?>" alt="<?=$plan['nom']?>" width="500" >
          </div>
          <div class="col-lg-2 col-md-2 btn imgP">
             <p style="color:#000"><?=$plan['name']?></p>
          </div>
             <?php } ?>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--messages-->
<div class="modal fade  bd-example-modal-lg " id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Plans</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row cp">
        <?php while($mess=$selectMessage->fetch()){?>
          <div class="col-lg-8 col-md-8 btn imgP">
            <p style="color:#000"  class="text-lowercase"><span>anonimat: </span><?=$mess['besoin']?></p>
            <p style="color:#000"  class="text-lowercase"><span>Budget: </span><?=$mess['budget']?></p>
            <p style="color:#000"  class="text-lowercase"><span>Message: </span><?=$mess['message']?></p>
            <p style="color:#000" class="mt-2"><span>Date: </span><?php
               $datform= date_create($mess['date_send']);
               $annee=date_format($datform,"d/m/Y");
               $heure=date_format($datform,"G:i");
             echo  $annee.' à ' .$heure;
            ?></p>
          </div>
          <div class="col-lg-2 col-md-2 btn imgP">
          <p style="color:#000" class="text-lowercase"><span>Nom: </span><?=$mess['name']?></p>
          <p style="color:#000" class="text-lowercase"><span>Prenom: </span><?=$mess['lastname']?></p>
          <p style="color:#000 ;" class="text-lowercase"><span>Email: </span><?=$mess['email']?></p>
          <p style="color:#000" class="text-lowercase"><span>Tel: </span><?=$mess['tel']?></p>
          <p style="color:#000" class="text-lowercase"><span>Ville: </span><?=$mess['city']?></p>
          <p style="color:#000" class="text-lowercase"><span>id plan: </span><?=$mess['plan_id']?></p>
          </div>
             <?php } ?>
        </div>
        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" >Repondre</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--ajout admin-->
 <div style="border-radius:40px;" class="modal fade  bd-example-modal-lg " id="addA" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body Aform">
          <div id="Ad"></div>
        <form method="POST" id="formadd">
        <div class="form-group">
            <label class="col-form-label">Nom:</label>
            <input type="text" class="form-control"name="name">
            <div id="AnameError"></div>
          </div>
          <div class="form-group">
            <label  class="col-form-label">Prenom:</label>
            <input type="text" class="form-control"name="lastname" >
            <div id="AlastnameError"></div>
          </div>
          <div class="form-group">
            <label class="col-form-label">Tel</label>
            <input type="text" class="form-control"name="tel" >
            <div id="AtelError"></div>
          </div>
          <div class="form-group">
            <label  class="col-form-label">Email:</label>
            <input type="text" class="form-control"name="email" >
            <div id="AemailError"></div>
          </div>
          <div class="form-group">
            <label  class="col-form-label">mot de passe:</label>
            <input type="password" class="form-control"name="password">
            <div id="ApasswordError"></div>
          </div>
          <div class="form-group">
            <label class="col-form-label">mot de passe:</label>
            <input type="password" class="form-control"name="repassword">
            <div id="ArepasswordError"></div>
          </div>
          <div class="form-group">
            <input type="submit" name="add" class="btn btn-default">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--fin admin-->
 <!-- Modal supprimer les plans-->
 <div class="modal fade  bd-example-modal-lg " id="supp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Plans</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table">
            <form method="POST" id="deletePlan" >
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Noms</th>
                    <th scope="col">plans</th>
                    <th scope="col">suppressions</th>
                  </tr>
                </thead>
                <tbody id='refpl'>
                <?php 
                $selPlansD = $bdd->query('SELECT * FROM plans');
                while($del=$selPlansD->fetch()){?>
                  <tr>
                  
                    <th scope="row"><?=$del['id']?></th>
                    <td><?=$del['name']?></td>
                    <td><img src="../plans/<?=$del['photos']?>" alt="" srcset="" class="imgpm"></td>
                    
                    <input type="hidden" name="id" value="<?=$del['id']?>">
                    <td><input type="submit" name="del" value="Delete" class=""> </td>
                   
                  </tr>
                <?php } ?>
                </tbody>
                </form>
              </table>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
<div class="clearfix"></div>
<!-- Footer -->
<footer class="page-footer font-small pt-4 ">
  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-md-6 mt-md-0 mt-3">
        <h5 class="text-uppercase font-weight-bold">Nos Partenaires</h5>
        <p>INTERBAT</p>
        <p>Courtage Conception et Construction Bâtiment</p>
        <p>Oribat SARL</p>
        <p>Global Piscine</p>
        <p>CYGNES CONSTRUCTION</p>

      </div>
      <hr class="clearfix w-100 d-md-none pb-3">
      <div class="col-md-6 mb-md-0 mb-3">
        <h5 class="text-uppercase font-weight-bold">Nos Services</h5>
        <p><span id="builde">Builders</span> vous offres les services telques:</p>
        <p>-le financément de votre projet</p>
        <p>-Apport d'aide technique</p>
        <p>Aussi grâce nos partenaires, une equipe chargé de la supervision
        du projet du début jusqu'a la fin.</p>
      </div>
    </div>
  </div>
  <div class="footer-copyright text-center py-3 cp">&copy; 2018 Copyright 
  </div>
</footer>

 
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="../js/script.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.1/js/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox-plus-jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   
</body>
</html>
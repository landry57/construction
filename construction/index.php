<?php
include('traitements/req.php');
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
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <title>Construction</title>
</head>
<body>

 <div class="row">
         <div class="col-sn-12 col-md-12">
           <header>

           </header>
         </div>
         
 </div>

<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top ">
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
          <a class="dropdown-item" href="index.php?page=<?=$list['id'];?>"><?= $list['name'];?></a>
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
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="pages/choix.php">
          <i class="fa fa-phone"></i>
        </a>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
<p id="visit2"><?php
include('traitements/visiteur.php');
?>
</p>
<div id='pan'></div>

<section class="container">
  <!-- Section plan -->
<section class="text-center my-5 set">

    <!-- Section heading -->
   
    <!-- Section description -->
    <div class="mb-8" ></div>
     <div class="row">
      <div class="col-lg-12 col-md-12 btn">
        <p style="color:#000;font-size:18px;">Le constructeur de maisons BUILDERS vous propose une large sélection de maisons régionales :<span style="color:#ef3e42;"> maison Dordogne,
         maison Basque, maison Rétaise, maison Arcachonnaise, maison Vendéenne</span> ou encore <span style="color:#ef3e42;">maison typique des Sables d’Olonne</span> , découvrez toutes les <span style="color:#ef3e42;"> maisons régionales</span>, elles s’inscrivent dans l’architecture locale, ont le charme des belles maisons de la côte atlantique, 
        des belles maisons du Sud-Ouest, tout en offrant le confort d’une maison neuve.</p>
      </div>
     </div>
    <p class="grey-text text-center w-responsive mx-auto mb-5 title">
      <h1>
      Builders vous offre  des meilleurs plans pour toutes vos constructions.
      Les plans de rêve à vos disposition!!
    </h1>
    <div class="divider"></div>
    </p>
     <div class="clearfix"></div>
    <div class="row">
      <?php while($p=$selPlanMarc->fetch()){?> 
      <div class="col-lg-6 col-md-6 mb-lg-0 mb-4">
        <div class="cadre">
          <img id="im" src="plans/<?=$p['photos']?>" alt="" width="100%" height="350">
        </div>
        <div class="clearfix"></div>
        <p class="p1"><i class="fas fa-search"></i><a href="plans/<?=$p['photos']?>" data-lightbox="mygallery"> agrandir</a></p><p class="p2">
        <a href="pages/models.php?id=<?=$p['id']?>">voir les modeles</a><span>.</span></p>
        <a href="pages/choix.php?id=<?=$p['id']?>#ch" class="btn btn-success mt-1 choix">Choisir</a>
     </div>
     <div class="clearfix"></div>
     <?php } ?>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-lg-10 col-md-10 offset-md-1 offset-lg-1">
        <div class="row">
       <div class="col-lg-6 col-md-6">
        <p class="  text-left desc">
          Une maison est un bâtiment d'habitation, souvent de taille moyenne destiné au logement d'une famille,
           ou encore plus imposante divisée en plusieurs résidences ou appartements.
           Une maison est, en droit civil français, un immeuble,
            mot qui désigne aussi couramment un édifice de plusieurs étages divisé en plusieurs
             appartements occupés par diverses familles. On parle alors d'immeuble collectif.

             La maison représente aussi l'ensemble des lieux de vie ou des espaces habités,
             ainsi que ses occupants ou résidents familiers. Elle est souvent considérée en « maisonnée » ou en
            symbole de la famille qui l'occupe.
        </p>
       </div>
       <div class="col-lg-6 col-md-6">
        <p class=" text-left  desc">
          Une maison est un bâtiment d'habitation, souvent de taille moyenne destiné au logement d'une famille,
           ou encore plus imposante divisée en plusieurs résidences ou appartements.
           Une maison est, en droit civil français, un immeuble,
            mot qui désigne aussi couramment un édifice de plusieurs étages divisé en plusieurs
             appartements occupés par diverses familles. On parle alors d'immeuble collectif.

             La maison représente aussi l'ensemble des lieux de vie ou des espaces habités,
             ainsi que ses occupants ou résidents familiers. Elle est souvent considérée en « maisonnée » ou en
            symbole de la famille qui l'occupe.
        </p>
       </div>
      </div>
      </div>
    </div>
  </section>


  <!--modal-->

</section>

 
<div class="clearfix"></div>
<!-- Footer -->
<footer class="page-footer font-small  pt-4 ">
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
        <p>Builders vous offre des services telsques:</p>
        <p>-le financement de votre projet</p>
        <p>-Apport d'aides techniques</p>
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
<script src="js/script.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.1/js/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox-plus-jquery.min.js"></script>

   
</body>
</html>
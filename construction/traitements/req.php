<?php
include('config.php');
//recuperation des categories

$selCategories = $bdd->query('SELECT * FROM categories');
$selCategoriesOp = $bdd->query('SELECT * FROM categories');
$selPlans = $bdd->query('SELECT * FROM plans');
$selPlansM = $bdd->query('SELECT * FROM plans');
$selPlansD = $bdd->query('SELECT * FROM plans');
if(isset($_GET['page']) AND $_GET['page']>0)
{
    $cat_id=(int)$_GET['page'];
    $selPlanMarc = $bdd->prepare('SELECT * FROM plans WHERE category_id=?');
    $selPlanMarc->execute(array($cat_id));
    
}
else
{
    $cat_id=1;
    $selPlanMarc = $bdd->prepare('SELECT * FROM plans WHERE category_id=?');
    $selPlanMarc->execute(array($cat_id));
}

//
if(isset($_GET['id']) AND $_GET['id']>0)
{
    $plan_id=(int)$_GET['id'];
    $selPlanMasc = $bdd->prepare('SELECT * FROM plans WHERE id=?');
    $selPlanMasc->execute(array($plan_id));
    $pl= $selPlanMasc->fetch();
   
    $z=$bdd->prepare('SELECT photos FROM model  WHERE plan_id=? ');
    $z->execute(array($plan_id));

}
//categories
 

//select plan par categorie
$selectPC1 = $bdd->query('SELECT * FROM plans WHERE category_id=1');
$numpC1=$selectPC1 ->rowCount();

$selectPC2 = $bdd->query('SELECT * FROM plans WHERE category_id=2');
$numpC2=$selectPC2 ->rowCount();


$selectPC3 = $bdd->query('SELECT * FROM plans WHERE category_id=3');
$numpC3=$selectPC3 ->rowCount();


$selectPC4 = $bdd->query('SELECT * FROM plans WHERE category_id=4');
$numpC4=$selectPC4 ->rowCount();


 $selPA1= $bdd->query('SELECT id FROM marchands');

 //les message
 $selectMessage=$bdd->query('SELECT * FROM marchands');
 
?>
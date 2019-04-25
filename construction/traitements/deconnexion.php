<?php
session_start();
ob_start();

?>
<?php
session_destroy();
header('Location:../pages/connexion.php');

?>
<?php
session_start();
if(empty($_COOKIE['rmb'])){
setcookie('email','',time()-3600);//detruire cookie à la deconnexion
}
setcookie('passwd','',time()-3600);//detruire cookie à la déconnexion
$_SESSION=array();
session_destroy();
header("location:connexion.php");
?>
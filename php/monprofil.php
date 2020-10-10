<?php
require_once('config.php');
require('function.php');

if (isset($_GET['id']) and $_GET['id']==$_SESSION['id_utilisateur'])
{

    $utilisateur=$db->prepare('SELECT * FROM utilisateur where id_utilisateur=?');
    $utilisateur->execute(array($_SESSION['id_utilisateur']));

    require('../views/monprofil.view.php');

}
else
{
    header('location: connexion.php');
}

?>
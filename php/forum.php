<?php
require_once('config.php');
require('function.php');

if (isset($_GET['id']) and $_GET['id']==$_SESSION['id_utilisateur'])
{
//
$categories=$db->query('SELECT * FROM categories');
//
$souscategories=$db->prepare('SELECT * from souscategories where id_categories=?');



require('../views/forum.view.php');

}
else
{
    header('location: connexion.php');
}

?>
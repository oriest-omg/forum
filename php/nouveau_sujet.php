<?php
require_once('config.php');
require('function.php');

//
if(isset($_POST['envoyer']))
{
    $req=$db->prepare('INSERT into sujet (titre,contenu,date_creation,id_souscategories,id_utilisateur)values (?,?,?,?,?)');
    $req->execute(array($_POST['titre'],$_POST['contenu'],$_POST['date'],$_GET['souscategori'],$_SESSION['id_utilisateur']));

}



require('../views/nouveau_sujet.view.php');

?>
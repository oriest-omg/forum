<?php
require_once('config.php');
require('function.php');

//
$sujet=$db->prepare('SELECT * from sujet join utilisateur where id_sujet=? and sujet.id_utilisateur=utilisateur.id_utilisateur');
//
$mess=$db->prepare('SELECT * from messages join utilisateur  where id_sujet=? and messages.id_utilisateur=utilisateur.id_utilisateur ');
//
if(isset($_POST['envoyer']))
{
    $insert=$db->prepare('INSERT INTO messages (contenu_mess,date_mess,id_utilisateur,id_sujet) values (?,?,?,?)');
    $insert->execute(array($_POST['reponse'],$_POST['date'],$_SESSION['id_utilisateur'],$_GET['sujet']));
}


require('../views/mess.view.php');

?>
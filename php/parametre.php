<?php
require_once('config.php');
include('function.php');

if (isset($_GET['id']) and $_GET['id']==$_SESSION['id_utilisateur'])
{
$mdp=sha1(@$_POST['mdp_utilisateur']);
    $utilisateur=$db->prepare('SELECT * FROM utilisateur where id_utilisateur=?');
    if(isset($_POST['modifier']))
    {
        $image = $_FILES['avatar']['name'];
        $modif=$db->prepare('UPDATE utilisateur SET
                             email_utilisateur=?,
                             mdp_utilisateur=?,
                             nom_utilisateur=?,
                             prenom_utilisateur=?,
                             sexe_utilisateur=?,
                             datenaiss_utilisateur=?,
                             avatar=?,
                             num_utilisateur=?,
                             pseudo=?
                             WHERE id_utilisateur=?');
        $modif->execute(array($_POST['email_utilisateur'],$mdp,$_POST['nom_utilisateur'],$_POST['prenom_utilisateur'],$_POST['sexe_utilisateur'],$_POST['datenaiss_utilisateur'],$image,$_POST['num_utilisateur'],$_POST['pseudo'],$_SESSION['id_utilisateur']));
        envoyer();
    }
    require('../views/parametre.view.php');
    
}
else
{
    header('location: connexion.php');
}

?>
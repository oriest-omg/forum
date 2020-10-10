<?php
    if(!isset($_SESSION['id']) and isset($_COOKIE['email'],$_COOKIE['passwd']) and !empty($_COOKIE['email']) and !empty(['passwd']))
    {
        $req=$db->prepare("SELECT * FROM utilisateur WHERE email_utilisateur =? && mdp_utilisateur =? ");
        $req->execute(array($_COOKIE['email'],$_COOKIE['passwd']));
        $existuser=$req->rowCount();
        if($existuser==1)
        {
        $userinfo=$req->fetch();
        $_SESSION['id_utilisateur']=$userinfo['id_utilisateur'];
        $_SESSION['nom_utilisateur']=$userinfo['nom_utilisateur'];
        $_SESSION['email_utilisateur']=$userinfo['email_utilisateur'];
        //header("location:forum.php?id=".$_SESSION['id_utilisateur']);
        }
    }
?>
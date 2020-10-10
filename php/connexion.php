<?php 
require_once("config.php");
require_once("function.php");

include("cookieconnect.php");
/***** connexion ****/
if(isset($_POST['connect']))
{
    $emailconnect=htmlspecialchars($_POST['emailconnect']);
    $mdpconnect=sha1($_POST['mdpconnect']);
    echo $mdpconnect;
    var_dump($mdpconnect);
    if(!empty($emailconnect) && !empty($mdpconnect))
    {
      $req=$db->prepare("SELECT * FROM utilisateur WHERE email_utilisateur =? && mdp_utilisateur =? ");
      $req->execute(array($emailconnect,$mdpconnect));
      $existuser=$req->rowCount();
      if($existuser==1)
      {
             setcookie('rmb','',time()+365*24*3600,null,null,false,true);
          if(isset($_POST['se_souvenir_moi'])){
              setcookie('email',$emailconnect,time()+365*24*3600,null,null,false,true);
              setcookie('passwd',$mdpconnect,time()+365*24*3600,null,null,false,true);
              setcookie('rmb',$_POST['se_souvenir_moi'],time()+365*24*3600,null,null,false,true);
              //setcookie('passwd',$_POST['mdpconnect'],time()+365*24*3600,null,null,false,true);         
          }
       $userinfo=$req->fetch();
       $_SESSION['id_utilisateur']=$userinfo['id_utilisateur'];
       $_SESSION['nom_utilisateur']=$userinfo['nom_utilisateur'];
       $_SESSION['email_utilisateur']=$userinfo['email_utilisateur'];
       header("location:forum.php?id=".$_SESSION['id_utilisateur']);
      }
      else
      {
          $message='créer un compte svp';
      }
    }
    else
    {
        $message='merci de tout renseigner svp';
    }
}
require('../views/connexion.view.php');     

?>
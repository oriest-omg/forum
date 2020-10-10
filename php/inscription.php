<?php 
require_once("config.php");
require_once("function.php");

/***** Inscription ****/
if(isset($_POST['inscription']))
{
    $nom=htmlspecialchars($_POST['nom_utilisateur']);
    $prenom=htmlspecialchars($_POST['prenom_utilisateur']);
    $date=htmlspecialchars($_POST['datenaiss_utilisateur']);
    $sexe=htmlspecialchars($_POST['sexe_utilisateur']);
    $email=htmlspecialchars($_POST['email']);
    $email2=htmlspecialchars($_POST['email2']);
    $mdp=sha1($_POST['mdp']);
    $mdp2=sha1($_POST['mdp2']);

    if(!empty($_POST['nom_utilisateur'])&&
    !empty($_POST['prenom_utilisateur'])&&
    !empty($_POST['email']) &&
    !empty($_POST['email2']) &&
    !empty($_POST['mdp']) &&
    !empty($_POST['mdp2']) )
    {

        $nomlength=strlen($nom);
        $mdptaille=strlen($_POST['mdp']);
        $prenomlength=strlen($_POST['prenom_utilisateur']);
        if($nomlength<=20)
        {
            if($prenomlength<=60)
            {
                if($email==$email2)
                {
                    if(filter_var($email,FILTER_VALIDATE_EMAIL))
                    {
                        $reqemail=$db->query("SELECT * FROM utilisateur WHERE email_utilisateur = '".$_POST['email']."'");
                        $reqemail->execute(array($email));
                        $existemail=$reqemail->rowCount();
                        if($existemail==0)
                        {
                            if($mdptaille>=4 && $mdptaille<=8 )
                            {
                                if($mdp==$mdp2)
                                {
                                    $insertion_utilisateur=$db->prepare('INSERT INTO utilisateur (nom_utilisateur,prenom_utilisateur,email_utilisateur,mdp_utilisateur,sexe_utilisateur,datenaiss_utilisateur) VALUES(?,?,?,?,?,?)');
                                    $insertIsOk=$insertion_utilisateur->execute(array($nom,$prenom,$email,$mdp,$sexe,$date)); 
                                    if($insertIsOk)
                                    {
                                        $success="inscription reussi !! <a href=\"forum.php\">Vous pouvez à présent vous connecter </a>";                                     
                                    }
                                    else
                                    {
                                    $erreur_insertion='Echec';
                                    }  
                                }
                                else
                                {
                                    $erreur_mdp="vos mots de passe ne correspondent pas !";
                                }
                            }    
                            else
                            {
                                $erreur_mdp="le mot de passe doit être compris entre 4 et 8 caractères ";
                            }
                        }
                        else
                        {
                            $erreur_email="l'email existe déjà";
                        }
                    }        
                    else
                    {
                        $erreur_mail="votre addresse mail n'est pas valide";
                    }
                }
                else
                {
                $erreur_mail="vos mail ne correspondent pas !";
                }
            }
            else
            {
                $erreur_prenom="votre prenom ne doit pas contenir plus de 60 caractères";
            }
        }
        else
        {
         $erreur_nom="votre nom ne doit pas contenir plus de 20 caractères";
        }
    }
    else
    {
        $erreur_remplissage_form="tous les champs doivent être complétés !";
    }
}

require('../views/inscription.view.php');

?>
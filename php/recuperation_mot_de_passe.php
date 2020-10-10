<?php
require_once('config.php');
require('function.php');

$section="";
if(isset($_GET['section']))
{
   $section=$_GET['section'];
}


if(isset($_POST['recup_submit'],$_POST['recup_mail'])) {
   if(!empty($_POST['recup_mail'])) {
      $recup_mail = htmlspecialchars($_POST['recup_mail']);
      if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)) {
         $mailexist = $db->prepare('SELECT id_utilisateur,email_utilisateur FROM utilisateur WHERE email_utilisateur = ?');
         $mailexist->execute(array($recup_mail));//verifier si l'utilisateur existe
         $mailexist_count = $mailexist->rowCount();
         if($mailexist_count == 1) {
            $email_utilisateur = $mailexist->fetch();
            $_SESSION['id_utilisateur']=$email_utilisateur['id_utilisateur'];//attention, recupérer son id
            $email_utilisateur = $email_utilisateur['email_utilisateur'];//recupérer son email

            var_dump($_SESSION['id_utilisateur'],$email_utilisateur);

            $_SESSION['recup_mail'] = $recup_mail;//générer un code
            $recup_code="";
            for($i=0;$i<8;$i++){
               $recup_code.=mt_rand(0,9);
            }
            echo $recup_code;
            

            $mail_recup_exist = $db->prepare('SELECT * FROM recuperation join utilisateur WHERE recuperation.id_utilisateur=utilisateur.id_utilisateur and email_utilisateur = ?');
            $mail_recup_exist->execute(array($recup_mail));//vérifier si il avait déjà demander un code de récupération
            $mail_recup_exist = $mail_recup_exist->rowCount();
            if($mail_recup_exist == 1) {
               $recup_insert = $db->prepare('UPDATE recuperation SET code = ? WHERE id_utilisateur = ?');
               $recup_insert->execute(array($recup_code,$_SESSION['id_utilisateur']));//si oui mise à jour de l'ancien code
            } else {
               echo 'ok';
               $recup_insert = $db->prepare('INSERT INTO recuperation(id_utilisateur,code) VALUES (?, ?)');
               $recup_insert->execute(array($_SESSION['id_utilisateur'],$recup_code));// si non on insère un code
            } 
            $header="MIME-Version: 1.0\r\n";
         $header.='From:"oriForum.com"<oriestlearn@gmail.com>'."\n";
         $header.='Content-Type:text/html; charset="utf-8"'."\n";
         $header.='Content-Transfer-Encoding: 8bit';
         $message = '
         <html>
         <head>
           <title>Récupération de mot de passe - Votresite</title>
           <meta charset="utf-8" />
         </head>
         <body>
           <font color="#303030";>
             <div align="center">
               <table width="600px">
                 <tr>
                   <td>
                     <h1> owen le best  haha </h1>
                     <div align="center">Bonjour <b>'.$email_utilisateur.'</b>,</div>
                     Voici votre code de récupération: <b>'.$recup_code.'</b>
                     A bientôt sur <a href="#">Votre site</a> !
                     
                   </td>
                 </tr>
                 <tr>
                   <td align="center">
                     <font size="2">
                       Ceci est un email automatique, merci de ne pas y répondre
                     </font>
                   </td>
                 </tr>
               </table>
             </div>
           </font>
         </body>
         </html>
         ';
         mail($recup_mail, "Récupération de mot de passe - Votresite", $message, $header);
            header("Location:recuperation_mot_de_passe.php?section=code");
         } else {
            $error = "Cette adresse mail n'est pas enregistrée";
         }
      } else {
         $error = "Adresse mail invalide";
      }
   } else {
      $error = "Veuillez entrer votre adresse mail";
   }
}

if(isset($_POST['verif_submit'],$_POST['verif_code'])) {
   if(!empty($_POST['verif_code'])) {
      $verif_code = htmlspecialchars($_POST['verif_code']);
      $verif_req = $db->prepare('SELECT id FROM recuperation WHERE id_utilisateur = ? AND code = ?');
      $verif_req->execute(array($_SESSION['id_utilisateur'],$verif_code));
      $verif_req = $verif_req->rowCount();
      if($verif_req == 1) {
         $up_req = $db->prepare('UPDATE recuperation SET confirme = 1 WHERE id_utilisateur = ?');
         $up_req->execute(array($_SESSION['id_utilisateur']));
         header('Location:recuperation_mot_de_passe.php?section=changemdp');
      } else {
         $error = "Code invalide";
      }
   } else {
      $error = "Veuillez entrer votre code de confirmation";
   }
}

if(isset($_POST['change_submit'])) {
   if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {

      var_dump($_SESSION['id_utilisateur']);

      $verif_confirme = $db->prepare('SELECT confirme FROM recuperation WHERE id_utilisateur = ?');
      $verif_confirme->execute(array($_SESSION['id_utilisateur']));
      $verif_confirme = $verif_confirme->fetch();
      $verif_confirme = $verif_confirme['confirme'];
      if($verif_confirme == 1) {
         $mdp = htmlspecialchars($_POST['change_mdp']);
         $mdpc = htmlspecialchars($_POST['change_mdpc']);
         var_dump($mdp,$mdpc);
         if(!empty($mdp) AND !empty($mdpc)) {
            if($mdp == $mdpc) {
               $mdp = sha1($mdp);
               $ins_mdp = $db->prepare('UPDATE utilisateur SET mdp_utilisateur = ? WHERE id_utilisateur = ?');
               $ins_mdp->execute(array($mdp,$_SESSION['id_utilisateur']));
               $del_req=$db->prepare('DELETE FROM recuperation WHERE id_utilisateur= ?');
               $del_req->execute(array($_SESSION['id_utilisateur']));
               header('Location:connexion.php');
            } else {
               $error = "Vos mots de passes ne correspondent pas";
            }
         } else {
            $error = "Veuillez remplir tous les champs";
         }
      } else {
         $error = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
      }
   } else {
      $error = "Veuillez remplir tous les champs";
   }
}

/*if(isset($_POST['recup_submit'],$_POST['recup_mail'])) {
   if(!empty($_POST['recup_mail'])) {
      $recup_mail = htmlspecialchars($_POST['recup_mail']);
      if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)) {
         $mailexist = $db->prepare('SELECT id,email_utilisateur FROM membres WHERE mail = ?');
         $mailexist->execute(array($recup_mail));
         $mailexist_count = $mailexist->rowCount();
         if($mailexist_count == 1) {
            $email_utilisateur = $mailexist->fetch();
            $email_utilisateur = $email_utilisateur['email_utilisateur'];
            
            $_SESSION['recup_mail'] = $recup_mail;
            $recup_code="";
            for($i=0; $i < 8; $i++) { 
               $recup_code.= mt_rand(0,9);
            }
            $mail_recup_exist = $db->prepare('SELECT id FROM recuperation WHERE mail = ?');
            $mail_recup_exist->execute(array($recup_mail));
            $mail_recup_exist = $mail_recup_exist->rowCount();
            if($mail_recup_exist == 1) {
               $recup_insert = $db->prepare('UPDATE recuperation SET code = ? WHERE mail = ?');
               $recup_insert->execute(array($recup_code,$recup_mail));
            } else {
               $recup_insert = $db->prepare('INSERT INTO recuperation(mail,code) VALUES (?, ?)');
               $recup_insert->execute(array($recup_mail,$recup_code));
            }
            $header="MIME-Version: 1.0\r\n";
         $header.='From:"[VOUS]"<votremail@mail.com>'."\n";
         $header.='Content-Type:text/html; charset="utf-8"'."\n";
         $header.='Content-Transfer-Encoding: 8bit';
         $message = '
         <html>
         <head>
           <title>Récupération de mot de passe - Votresite</title>
           <meta charset="utf-8" />
         </head>
         <body>
           <font color="#303030";>
             <div align="center">
               <table width="600px">
                 <tr>
                   <td>
                     
                     <div align="center">Bonjour <b>'.$email_utilisateur.'</b>,</div>
                     Voici votre code de récupération: <b>'.$recup_code.'</b>
                     A bientôt sur <a href="#">Votre site</a> !
                     
                   </td>
                 </tr>
                 <tr>
                   <td align="center">
                     <font size="2">
                       Ceci est un email automatique, merci de ne pas y répondre
                     </font>
                   </td>
                 </tr>
               </table>
             </div>
           </font>
         </body>
         </html>
         ';
         mail($recup_mail, "Récupération de mot de passe - Votresite", $message, $header);
            header("Location:http://127.0.0.1/path/recuperation.php?section=code");
         } else {
            $error = "Cette adresse mail n'est pas enregistrée";
         }
      } else {
         $error = "Adresse mail invalide";
      }
   } else {
      $error = "Veuillez entrer votre adresse mail";
   }
}
if(isset($_POST['verif_submit'],$_POST['verif_code'])) {
   if(!empty($_POST['verif_code'])) {
      $verif_code = htmlspecialchars($_POST['verif_code']);
      $verif_req = $db->prepare('SELECT id FROM recuperation WHERE mail = ? AND code = ?');
      $verif_req->execute(array($_SESSION['recup_mail'],$verif_code));
      $verif_req = $verif_req->rowCount();
      if($verif_req == 1) {
         $up_req = $db->prepare('UPDATE recuperation SET confirme = 1 WHERE mail = ?');
         $up_req->execute(array($_SESSION['recup_mail']));
         header('Location:http://127.0.0.1/path/recuperation.php?section=changemdp');
      } else {
         $error = "Code invalide";
      }
   } else {
      $error = "Veuillez entrer votre code de confirmation";
   }
}
if(isset($_POST['change_submit'])) {
   if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {
      $verif_confirme = $db->prepare('SELECT confirme FROM recuperation WHERE mail = ?');
      $verif_confirme->execute(array($_SESSION['recup_mail']));
      $verif_confirme = $verif_confirme->fetch();
      $verif_confirme = $verif_confirme['confirme'];
      if($verif_confirme == 1) {
         $mdp = htmlspecialchars($_POST['change_mdp']);
         $mdpc = htmlspecialchars($_POST['change_mdpc']);
         if(!empty($mdp) AND !empty($mdpc)) {
            if($mdp == $mdpc) {
               $mdp = sha1($mdp);
               $ins_mdp = $db->prepare('UPDATE membres SET motdepasse = ? WHERE mail = ?');
               $ins_mdp->execute(array($mdp,$_SESSION['recup_mail']));
              $del_req = $db->prepare('DELETE FROM recuperation WHERE mail = ?');
              $del_req->execute(array($_SESSION['recup_mail']));
               header('Location:http://127.0.0.1/path/connexion/');
            } else {
               $error = "Vos mots de passes ne correspondent pas";
            }
         } else {
            $error = "Veuillez remplir tous les champs";
         }
      } else {
         $error = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
      }
   } else {
      $error = "Veuillez remplir tous les champs";
   }
}*/

require('../views/recuperation_mot_de_passe.view.php');

?>
<?php
require_once('config.php');
if(isset($_POST['valider'])){
    if(!empty($_POST['ancien_mot_de_passe'])){
        if(!empty($_POST['nouveau_mot_de_passe']) && !empty($_POST['nouveau_mot_de_passe2'])){
            $mdp1=sha1($_POST['nouveau_mot_de_passe']);
            $mdp2=sha1($_POST['nouveau_mot_de_passe2']);
            if($mdp1==$mdp2){
                $req=$db->prepare("UPDATE utilisateur set mdp_utilisateur=? where id_utilisateur=?");
                $verif=$req->execute(array($mdp1,$_SESSION['id_utilisateur']));
                if($verif==1){
                    echo'succès';
                }
            }else{
                $erreur="mot de passe non identique";
            }
        }else{
            $erreur="veuillez remplir les 2 champs svp!";
        }
    }else
    {
        $erreur="insérer l'ancien mdp";
    }
}
require('../includes/changer_mot_de_passe.include.php');

?>
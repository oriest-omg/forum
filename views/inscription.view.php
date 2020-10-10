
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=table, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
<h1>Inscription</h1>
<form action="" method="POST">
<table>
    <tr>
        <td><label for="nom_co">Nom :</label></td>
        <td> <input type="text" id="nom_co" placeholder="votre Nom" name="nom_utilisateur" value="<?php if(isset($nom)) { echo $nom; } ?>"/> </td>
    </tr>

    <tr>
        <td></td>
        <td><?php if(isset($erreur_nom)){ echo '<font color="red">'.$erreur_nom.'</font>'; }?></td>
    </tr>
    <!---->
    <!---->
    <!---->
    <tr>
        <td><label for="prenom_co">Prenom :</label></td>
        <td> <input type="text" id="prenom_co" placeholder="votre Prenom" name="prenom_utilisateur" value="<?php if(isset($prenom)) { echo $prenom; } ?>"/> </td>
    </tr>

    <tr>
        <td></td>
        <td><?php if(isset($erreur_prenom)){ echo '<font color="red">'.$erreur_prenom.'</font>'; }?></td>
    </tr>
    <!---->
    <!---->
    <!---->

    <!---->
    <!---->
    <!---->
    <tr>
        <td><label for="datenaiss">date de naissance :</label></td>
        <td> <input type="date" id="datenaiss" placeholder="votre date de naissance" name="datenaiss_utilisateur" value="<?php if(isset($date)) { echo $date; } ?>"/> </td>
    </tr>

    <tr>
        <td></td>
        <td><?php if(isset($erreur_date)){ echo '<font color="red">'.$erreur_date.'</font>'; }?></td>
    </tr>
    <!---->
    <!---->
    <!---->

    <tr>
        <td><label for="email">Email :</label></td>
        <td> <input type="email" id="email" placeholder="votre email" name="email" value="<?php if(isset($email)) { echo $email; } ?>"/> </td>
    </tr>

    <tr>
        <td></td>
        <td><?php if(isset($erreur_email)){ echo '<font color="red">'.$erreur_email.'</font>'; }?></td>
        <td><?php if(isset($erreur_mail)){ echo '<font color="red">'.$erreur_mail.'</font>'; }?></td>
    </tr>
    <!---->
    <!---->
    <!---->
    <tr>
        <td><label for="email2">repéter email :</label></td>
        <td> <input type="email" id="email2" placeholder="confirmer email" name="email2" value="<?php if(isset($email2)) { echo $email2; } ?>"/> </td>
    </tr>

    <tr>
        <td></td>
        <td><?php if(isset($erreur_mail)){ echo '<font color="red">'.$erreur_mail.'</font>'; }?></td>
    </tr>
    <!---->
    <!---->
    <!---->
    <tr>
        <td> <label for="mdp">Mot de passe :</label> </td>
        <td><input type="password" id="mdp" placeholder="votre mdp" name="mdp"/></td>
    </tr>

    <tr>
        <td></td>
        <td><?php if(isset($erreur_mdp)){ echo '<font color="red">'.$erreur_mdp.'</font>'; }?></td>
    </tr>
    <!---->
    <!---->
    <!---->
    <tr>
        <td> <label for="mdp2">Repéter mot de passe :</label> </td>
        <td><input type="password" id="mdp2" placeholder="confirmer mdp" name="mdp2"/></td>
    </tr>

    <tr>
        <td></td>
        <td><?php if(isset($erreur_mdp)){ echo '<font color="red">'.$erreur_mdp.'</font>'; }?></td>
    </tr>
    <!---->
    <!---->
    <!---->

       <!---->
    <!---->
    <!---->
    <tr>
        <td><label for="sex">sexe :</label></td>
        <td> 
            <span>M</span><input type="radio" id="sex" name="sexe_utilisateur" value="M"/> 
            <span>F</span><input type="radio" id="sex" name="sexe_utilisateur" value="F"/> 
        </td>
    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>
    <!---->
    <!---->
    <!---->


    <tr>
        <td></td>
        <td> <nobr><input type="submit" value="inscription" name="inscription"/></nobr></td>
    </tr>
</table>
</form>
</br>
<?php 
if(isset($erreur_insertion)){ echo '<font color="red">'.$erreur_insertion.'</font>'; }
if(isset($erreur_remplissage_form)){ echo '<font color="red">'.$erreur_remplissage_form.'</font>'; }
if(isset($success)){ echo '<font color="green">'.$success.'</font>'; }
?>
</center>
</body>
</html>
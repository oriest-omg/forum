<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=table, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Connexion_kokous</title>
</head>
<body>
    <center>
<h1>Connexion</h1>
<form action="" method="POST">
    <table >

    <tr>
        <td><label for="email">email :</label></td>
        <td> <input type="email" id="email" placeholder="votre email" name="emailconnect" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email'];} ?>"/> </td>
    </tr>

    <tr>
        <td> <label for="mdp">Mot de passe :</label> </td>
        <td><input type="password" id="mdp" placeholder="votre mdp" name="mdpconnect"/></td>
    </tr>
    </table>
    <p><input type="checkbox" name="se_souvenir_moi" id="rmb"> <label for="rmb">se souvenir de moi</label></p>
    <p><input type="submit" value="connexion" name="connect"/></p>
    <P><a href="../php/recuperation_mot_de_passe.php">Mot de passe oublié ?</a>
    <font color="red"><?php if(isset($message)) { echo $message;}?></font><a href="../php/inscription.php">inscription</a></p>
</form> 
</center>
</body>
</html>
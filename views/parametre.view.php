<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/moncompte.css">
    <script src="../js/jquery.js"></script>
    <title>Document</title>
</head>
<body>
<?php include('../php/menu.php') ?>
<?php 
    if(!empty($_GET['lien'])){
        include($_GET['lien']);
    } else {
?>
<form action="" method="post" enctype="multipart/form-data">
    <h1>Votre compte</h1>
    <?php
        $utilisateur->execute(array($_SESSION['id_utilisateur']));
        while($mc=$utilisateur->fetch())
            {
    ?>
    <table>
        <tr>
            <td>avatar :</td>
            <td>
                <div class="image"> 
                    <label for="image-form">
                        <input type="file" class="affimg" id="image-form" name="avatar">                 
                        <img src="#" alt="" id="image" class="img ">
                        <p class="insimg">insérer avatar</p>
                    </label>
                </div>
            </td>
        </tr>
        <tr>
            <td>nom :</td>
            <td><input type="text" name="nom_utilisateur" id="" value="<?= $mc['nom_utilisateur'] ?>"></td>
        </tr>
        <tr>
            <td>prenom :</td>
            <td><input type="text" name="prenom_utilisateur" value="<?= $mc['prenom_utilisateur'] ?>"></td>
        </tr>
        <tr>
            <td>pseudo :</td>
            <td><input type="text" name="pseudo"  value="<?= $mc['pseudo'] ?>"></td>
        </tr>
        <tr>
            <td>date de naissance :</td>
            <td><input type="date" name="datenaiss_utilisateur" id="" value="<?= $mc['datenaiss_utilisateur'] ?>"></td>
        </tr>
        <tr>
            <td>email:</td>
            <td><input type="email" name="email_utilisateur" id="" value="<?= $mc['email_utilisateur'] ?>"></td>
        </tr>
        <tr>
            <td>numero de telephone :</td>
            <td><input type="tel" name="num_utilisateur" id="" value="<?= $mc['num_utilisateur'] ?>" placeholder="ajouter un numero de telephone"></td>
        </tr>
        <tr>
            <td> mdp :</td>
            <td><a href="../php/parametre.php?id=<?= $_SESSION['id_utilisateur']?>&lien=../php/changer_mot_de_passe.php">changer de mot de pase</a></td>
        </tr>
        <tr>
            <td>sexe :</td>
            <td>
                <span>M</span><input type="radio" id="sex" name="sexe_utilisateur" value="M" <?php if($mc['sexe_utilisateur']=='M'){ echo 'checked';} ?> /> 
                <span>F</span><input type="radio" id="sex" name="sexe_utilisateur" value="F" <?php if($mc['sexe_utilisateur']=='F'){ echo 'checked';} ?>/> 
            </td>
        </tr>
        <tr>
           <td> <input type="submit" value="modifier" name="modifier"> </td> 
           <td> <input type="reset" value="annuler" name="annuler"> </td>
        </tr>
    <?php  } ?>
    </table>
            <?php 
             include('../php/taf.php'); } ?>
</form>
</body>
<script src="../js/afficherimage.js"></script>
</html>
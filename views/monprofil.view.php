<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/monprofil.css">
    <title>Document</title>
</head>
<body>
<?php include('../php/menu.php') ?>
    <div class="identite">
        <table class="tableau" border="1px" cellspacing="0">
        <?php while($u=$utilisateur->fetch()) { ?> 
            <tr>
                <td rowspan="8">
                     <?php recuperer(); ?><br/>
                     <center><u> avatar </u></center>
                </td>
            </tr>
            <tr>
                <td>
                    <span> Nom:</span> <?php echo civil($_SESSION['id_utilisateur']); echo $u['nom_utilisateur'];  ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span> prenom :</span> <?= $u['prenom_utilisateur']  ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span> email :</span> <?= $u['email_utilisateur']  ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span> date de naissance :</span> <?= $u['datenaiss_utilisateur']  ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span> pseudo :</span> <?= $u['pseudo']  ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span> sexe :</span> <?= $u['sexe_utilisateur']  ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span> Numero telephone :</span> <?= $u['num_utilisateur']  ?>
                </td>
            </tr>
        <?php } ?>
        </table>
    </div>
</body>
</html>
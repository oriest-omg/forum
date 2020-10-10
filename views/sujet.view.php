<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<?php include('../php/menu.php') ?>
<form action="" method="post">
    <h1>Mon forum</h1>
         <a class="btn" href="nouveau_sujet.php?souscategori=<?= $_GET['souscategorie'] ?>" name="newsujet">créer un nouveau sujet </a>  
    <table border='1px' cellspacing="0" class="table table-bordered  table-dark ">
    <tr>
    <th>auteur</th>
    <th>sujets</th>
    <th>réponses</th>
    <th>Dernier message</th>
    <th>date</th>
    </tr>

    <?php 
        $sujet->execute(array($_GET['souscategorie']));
        while($s=$sujet->fetch()) 
        { 
            $subcat ='<a href="mess.php?souscategori='.$_GET['souscategorie'].'&sujet='.$s['id_sujet'].'">'.$s['titre'].'</a> ' ;
    ?>
        <tr>
                <td>
                     <?= $s['nom_utilisateur'] ?>
                </td>
                <td>
                    <h4><?= $subcat ?></h4>
                </td>
                <td> <?= reponse_nbr_sujet($s['id_sujet']); ?> </td>
                <td> <?= dernier_message_sujet($s['id_sujet']) ?></td>
                <td>
                    <?= $s['date_creation'] ?>
                </td>
        </tr>
    <?php  }  ?>

    </table>
    </form>
</body>
</html>
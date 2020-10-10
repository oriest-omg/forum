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

    <table  class="table table-bordered  table-dark ">

    <tr>
    <th>catégories</th>
    <th>réponses</th>
    <th>vues</th>
    <th>Dernier message</th>
    </tr>

    <?php while($catg=$categories->fetch()) {
                $souscategories->execute(array($catg['id_categories']));
                $subcat=''; 
                while($souscatg=$souscategories->fetch()) { 
                    $subcat .='<a href="sujet.php?souscategorie='.$souscatg['id_souscategories'].'">'.$souscatg['nom_souscategories'].'</a> |' ;
                }
                $subcat=substr($subcat,0,-3)?>
        <tr>
                <td>
                    <h4><?= $catg['nom_categories'] ?></h4>
                    <p>
                        <?= $subcat ?>
                    </p>
                </td>
                <td> <?= reponse_nbr_categorie($catg['id_categories']); ?> </td>
                <td></td>
                <td><?= dernier_message_categorie($catg['id_categories']); ?></td>
        </tr>
    <?php  }  ?>

    </table>
</body>
</html>
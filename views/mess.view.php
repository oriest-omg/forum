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
<table border='1px' cellspacing="0" class="table table-bordered  table-dark ">

<?php 
    $sujet->execute(array($_GET['sujet']));
    $subcat=''; 
    while($s=$sujet->fetch()) 
    { 
        $subcat .=$s['titre'] ;
?>
    <tr>
        <div>
            <th>
                <h4>Auteur</h4> <br>
                 <?= $s['nom_utilisateur'] ?>
            </th>
            <td>
               <nobr> <h4> Sujet : <u><?= $subcat ?></u></h4></nobr>
            
            <?= $s['contenu'] ?>
            </td>
            <td>
                <h4>Date</h4>       
                <?= $s['date_creation'] ?>
            </td>
        </div>
    </tr>
<?php  }  ?>
<!---------------------------->
<?php 
    $mess->execute(array($_GET['sujet']));
    while($s=$mess->fetch()) 
    { 
?>
    <tr>
            <td>
                 <?= $s['nom_utilisateur'] ?>
            </td>
            <td>
                <p><?= $s['contenu_mess'] ?></p>
            </td>
            <td>
                <?= $s['date_mess'] ?>
            </td>
    </tr>
<?php  }  ?>
</table> 
<div>
date
<input type="datetime" name="date" id="" value="<?php echo date("d/m/Y H:i:s");?>"> 
<textarea name="reponse" id="" cols="30" rows="10"></textarea>
<input type="submit" value="répondre" name="envoyer">
</div>
</form>
</body>
</html>
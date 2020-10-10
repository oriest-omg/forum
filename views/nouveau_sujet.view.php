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
<h1>nouveau sujet</h1>
    <table >
        <tr>
            <td>date</td>
            <td><input type="datetime" name="date" id="" value="<?php echo date("d/m/Y H:i:s");?>"></td>
        </tr>
        <tr>
            <td>titre</td>
            <td><input type="text" name="titre"></td>
        </tr>
        <tr>
            <td>contenu</td>
            <td>
                <textarea name="contenu" id="" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="envoyer" name="envoyer">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
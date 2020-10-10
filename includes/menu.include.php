<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forum.css">
    <title>Document</title>
</head>
<body>
    <div class="menu">
        <a href="monprofil.php?id=<?= $_SESSION['id_utilisateur'] ?>">Mon profil |</a>
        <a href="forum.php?id=<?= $_SESSION['id_utilisateur'] ?>">oriForum |</a>
        <a href="parametre.php?id=<?= $_SESSION['id_utilisateur'] ?>">paramètre |</a>
        <a href="testerreur.php?id=<?= $_SESSION['id_utilisateur'] ?>">testerreur |</a>
        <a href="deconnexion.php">deconnexion</a>
    </div>
</body>
</html>
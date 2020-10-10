<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="body">
<?php  
        $fichier=fopen('../includes/taf.txt','r+');//si c'est bizar met a+ ou a
        $i=0;
        while($i<=100)
        {
            $ligne=fgets($fichier);
            echo $ligne."<br/>";
            $i++;
        }
        echo $ligne ."<br/>";
        fclose($fichier);//fermer fichier
        
    ?>
    </div>
</body>
<style>
.body{
background-color:red;
}
</style>
</html>

<?Php
    session_start();
    $dsn='mysql:host=localhost;dbname=forum';
    $user='root';
    $password='';

    $db= new PDO($dsn,$user,$password);
?>
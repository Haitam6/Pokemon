<?php
function connexpdo($db)
{
    $sgbd = "mysql"; // choix de MySQL
    $host = "localhost";
    $charset = "UTF8";
    $user = "root"; 
    $pass = "root";  
    $pdo = new PDO("$sgbd:host=$host;dbname=$db;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;

}

function printPDOException(PDOEXception $e){
    echo "<div class=\"error\"><p> ERREUR </p>\n<p>".$e->getMessage()."</p></div>";
}
?>

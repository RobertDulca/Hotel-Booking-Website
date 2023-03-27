<?php
$host = "localhost";
$name = "sparta";
$user = "root";
$passwort = "";
try{
    $con = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);//stellt verbindung zur DB her
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}
?>

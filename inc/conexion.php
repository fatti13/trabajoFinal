<?php
    $user = "root";
    $pass = "";
    $db = "escuela";
    $host = "localhost";

    try{
        $conexion = new PDO("mysql:host=$host; dbname=$db; charset=utf8", $user, $pass);
    }
    catch(PDOException $e){
        echo "Ha ocurrido el siguiente Error: ".$e->getMessage();
    }

    






?>
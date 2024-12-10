<?php
    $usuario = "Isabel";
    $clave = "Mab15/16*";
    $basedatos = "registro";

    try 
    {
        $con = new PDO("mysql:host=localhost;dbname=$basedatos", $usuario, $clave);

    } 
    catch (Exception $e) 
    {
        echo "Error de conexión".$e->getMessage();

 
    }
?>
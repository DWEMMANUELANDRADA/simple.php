<?php
$servidor = "127.0.0.1";
$baseDeDatos = "website";
$usuario="root";
$contrasenia="";

try{
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasenia);
    echo "conexion exitosa......";


}catch(Exception $error){
    echo $error->getMessage();

}




?>
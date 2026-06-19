<?php
$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "apadem"
);

if(!$conexion){
    die("Error de conexión.");
}
?>
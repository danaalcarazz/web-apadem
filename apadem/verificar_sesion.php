<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// si no está registrado lo mandamos a loguearse
if (!isset($_SESSION['rol'])) {
    header("Location: login.php");
    exit();
}

// detecta en q archivo está parado el navegador actualmente
$archivo_actual = basename($_SERVER['PHP_SELF']);

// lista de páginas que el visitante común no tiene permiso de abrir
$paginas_prohibidas_visitante = [
    'pacientes.php',
    'registro.php',
    'editar_paciente.php',
    'eliminar_paciente.php',
    'guardar_paciente.php' 
];

// si el usuario es un visitante y quiere entrar a una prohibida lo mandamos a inicio
if ($_SESSION['rol'] === 'visitante' && in_array($archivo_actual, $paginas_prohibidas_visitante)) {
    header("Location: index.php"); 
    exit();
}
?>
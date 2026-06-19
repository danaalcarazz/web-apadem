<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APADEM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div class="container-fluid p-0 text-center">
        <img src="apadem.jpeg" class="img-fluid w-100" alt="APADEM">
    </div>
    
    <nav class="navbar navbar-expand-lg p-0 barra-navegacion-superior">
        <div class="container-fluid">
            <button class="navbar-toggler ms-3 my-2" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <div class="navbar-nav nav-tabs border-0 w-100 d-flex justify-content-between flex-column flex-lg-row">                    
                    
                    <ul class="navbar-nav border-0 flex-column flex-lg-row">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><i class="fa-solid fa-house"></i> Inicio</a>
                        </li>
                        
                        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="pacientes.php"><i class="fa-solid fa-users"></i> Pacientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registro.php"><i class="fa-solid fa-user-plus"></i> Registro</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    
                    <ul class="navbar-nav border-0 flex-column flex-lg-row">
                        <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] !== 'Invitado'): ?>
                            <li class="nav-item">
                                <a class="nav-link text-danger fw-bold" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link fw-bold text-primary" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
        </div>
    </nav>

<script>
        document.addEventListener("DOMContentLoaded", function() {
            // consigue el nombre del archivo de la url actual
            let rutaActual = window.location.pathname.split("/").pop();
            
            // si estás en la raíz del sitio o la url está vacía se asume q es inicio
            if (rutaActual === "" || rutaActual === "index") {
                rutaActual = "index.php";
            }

            // selecciona todos los enlaces del menú de navegación
            const enlaces = document.querySelectorAll('.navbar-nav .nav-link');

            enlaces.forEach(enlace => {
                // se limpia cualquier clase active previa
                enlace.classList.remove('active');

                // si el href del botón coincide exactamente con el archivo actual ahí se activa
                if (enlace.getAttribute('href') === rutaActual) {
                    enlace.classList.add('active');
                }
            });
        });
</script>
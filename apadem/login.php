<?php
session_start();
require_once("conexion.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // botón1: si el usuario dio click en visitante
    if (isset($_POST['acceso_visitante'])) {
        $_SESSION['usuario'] = 'Invitado';
        $_SESSION['rol'] = 'visitante';
        header("Location: index.php");
        exit();
    }

    // botón 2: si intentó iniciar sesión como admin
    if (isset($_POST['acceso_admin'])) {
        $usuario = trim($_POST['usuario']);
        $password = trim($_POST['password']);

        if (!empty($usuario) && !empty($password)) {
            // se busca usando consultas preparadas (de la clase 11)
            $sql = "SELECT * FROM usuarios WHERE usuario = ? AND rol = 'admin'";
            if ($stmt = mysqli_prepare($conexion, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $usuario);
                mysqli_stmt_execute($stmt);
                $resultado = mysqli_stmt_get_result($stmt);
                $datos_user = mysqli_fetch_assoc($resultado);

                // se compara la contraseña
                if ($datos_user && $password === $datos_user['password']) {
                    $_SESSION['usuario'] = $datos_user['usuario'];
                    $_SESSION['rol'] = $datos_user['rol'];
                    header("Location: index.php");
                    exit();
                } else {
                    $error = "Usuario o contraseña incorrectos.";
                }
                mysqli_stmt_close($stmt);
            }
        } else {
            $error = "Por favor, completa todos los campos.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso - APADEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center min-vh-100">

<div class="container">
    <div class="row justify-content-center w-100 m-0">
        <div class="col-12 col-sm-8 col-md-4"> 
            <div class="text-center mb-4">
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <img src="apadem(1).jpeg" alt="Logo APADEM" class="logo-titulo">
                    <h2 class="m-0 fw-bold text-dark">APADEM</h2>
                </div>
            </div>

            <?php if(!empty($error)): ?>
                <div class="alert alert-danger rounded-0"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="card mb-3 p-4 text-center rounded-0 border-secondary-subtle">
                <h5>Acceso Público</h5>
                <form method="POST" action="login.php">
                    <button type="submit" name="acceso_visitante" class="btn btn-outline-secondary w-100 py-2 rounded-0">Continuar como Visitante</button>
                </form>
            </div>

            <div class="card p-4 rounded-0 border-secondary-subtle">
                <h5 class="text-center mb-3">Panel Administrativo</h5>
                <form method="POST" action="login.php" autocomplete="off">
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Usuario</label>
                        <input type="text" name="usuario" class="form-control rounded-0" required placeholder="Ej: admin">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">Contraseña</label>
                        <input type="password" name="password" class="form-control rounded-0" required placeholder="••••••••">
                    </div>
                    <button type="submit" name="acceso_admin" class="btn btn-primary w-100 py-2 btn-apadem rounded-0">Iniciar como Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
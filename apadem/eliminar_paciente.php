<?php
require_once("verificar_sesion.php");
require_once("conexion.php");

// verifica q llegue el id por url
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // prepara la consulta de eliminación, utilizando consultas preparadas para mayor seguridad (clase 11)
    $sql = "DELETE FROM pacientes WHERE id = ?";
    
    if ($stmt = mysqli_prepare($conexion, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            // si se eliminó correctamente vuelve a la lista de pacientes
            header("Location: pacientes.php");
            exit();
        } else {
            echo "Error al intentar eliminar el registro.";
        }
        mysqli_stmt_close($stmt);
    }
} else {
    // si no hay id va directo a la lista
    header("Location: pacientes.php");
    exit();
}

mysqli_close($conexion);
?>
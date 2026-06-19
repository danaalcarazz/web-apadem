<?php
require_once("verificar_sesion.php");
require_once("conexion.php");

// validación y procesamiento con el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // recepción y limpieza de espacios de los datos del paciente
    $nombre = trim($_POST['nombre']);
    $nacimiento = trim($_POST['nacimiento']);
    $cedula = trim($_POST['cedula']);
    $telefono = trim($_POST['telefono']);
    $direccion = trim($_POST['direccion']);
    $diagnostico = trim($_POST['diagnostico']);
    $hospital = trim($_POST['hospital']);
    $medicamentos = trim($_POST['medicamentos']);
    $observaciones = trim($_POST['observaciones']);
    
    // recepción y limpieza de espacios de los datos del responsable
    $responsable = trim($_POST['responsable']);
    $cedula_responsable = trim($_POST['cedula_responsable']);
    $telefono_responsable = trim($_POST['telefono_responsable']);
    $parentesco = trim($_POST['parentesco']);

    // manejo de la fecha de próxima consulta (evita strings vacíos en campos date)
    $proxima_consulta = trim($_POST['proxima_consulta']);
    if (empty($proxima_consulta)) {
        $proxima_consulta = null;
    }

    // validaciones en back-end
    // se limpian puntos y guiones temporalmente solo para comprobar si el formato es numérico
    $cedula_limpia = str_replace(['.', '-'], '', $cedula);
    $cedula_resp_limpia = str_replace(['.', '-'], '', $cedula_responsable);
    $tel_limpio = str_replace([' ', '-', '+'], '', $telefono);
    $tel_resp_limpio = str_replace([' ', '-', '+'], '', $telefono_responsable);

    if (empty($nombre) || empty($nacimiento) || empty($cedula) || empty($responsable) || empty($cedula_responsable) || empty($telefono_responsable)) {
        die("Error: Todos los campos obligatorios (*) deben estar completos.");
    }

    if (!is_numeric($cedula_limpia) || !is_numeric($cedula_resp_limpia)) {
        die("Error de Validación Back-end: Los campos de Cédula de Identidad deben contener únicamente números.");
    }

    if (!is_numeric($tel_limpio) || !is_numeric($tel_resp_limpio)) {
        die("Error de Validación Back-end: Los campos de Teléfono deben contener únicamente números.");
    }
    // consulta sql estructurada con parámetros seguros usando consultas preparadas
    $sql = "INSERT INTO pacientes 
            (nombre, nacimiento, cedula, telefono, direccion, diagnostico, hospital, medicamentos, observaciones, responsable, cedula_responsable, telefono_responsable, parentesco, proxima_consulta) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conexion, $sql)) {
        mysqli_stmt_bind_param(
            $stmt, 
            "ssssssssssssss", 
            $nombre, 
            $nacimiento, 
            $cedula, 
            $telefono, 
            $direccion, 
            $diagnostico, \r
            $hospital, 
            $medicamentos, 
            $observaciones, 
            $responsable, 
            $cedula_responsable, 
            $telefono_responsable, 
            $parentesco, 
            $proxima_consulta
        );

        if (mysqli_stmt_execute($stmt)) {
            // redirección
            header("Location: pacientes.php");
            exit();
        } else {
            echo "Error de Base de Datos al registrar el paciente: " . mysqli_error($conexion);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta de inserción.";
    }
} else {
    // si intentan entrar directo al archivo por url sin enviar datos por POST
    header("Location: registro.php");
    exit();
}

mysqli_close($conexion);
?>
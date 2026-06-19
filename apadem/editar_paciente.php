<?php
require_once("verificar_sesion.php");
require_once("conexion.php");

$id = isset($_GET['id']) ? $_GET['id'] : '';
$paciente = null;

// carga los datos actuales del paciente
if (!empty($id)) {
    $sql = "SELECT * FROM pacientes WHERE id = ?";
    if ($stmt = mysqli_prepare($conexion, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $paciente = mysqli_fetch_assoc($resultado);
        mysqli_stmt_close($stmt);
    }
}

// si el paciente no existe vuelve a la lista
if (!$paciente) {
    header("Location: pacientes.php");
    exit();
}

// procesa la actualización al enviar el form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = trim($_POST['id']);
    $nombre = trim($_POST['nombre']);
    $nacimiento = trim($_POST['nacimiento']);
    $diagnostico = trim($_POST['diagnostico']);
    $hospital = trim($_POST['hospital']);
    $medicamentos = trim($_POST['medicamentos']);
    $observaciones = trim($_POST['observaciones']);
    
    // datos del responsable tmb
    $responsable = trim($_POST['responsable']);
    $cedula_responsable = trim($_POST['cedula_responsable']);
    $telefono_responsable = trim($_POST['telefono_responsable']);
    $parentesco = trim($_POST['parentesco']);

    // recibe la fecha de la próxima consulta
    $proxima_consulta = trim($_POST['proxima_consulta']);
    // si viene vacía se transforma en null para la base de datos
    if (empty($proxima_consulta)) {
        $proxima_consulta = null;
    }

    $sql_update = "UPDATE pacientes SET nombre = ?, nacimiento = ?, diagnostico = ?, hospital = ?, medicamentos = ?, observaciones = ?, proxima_consulta = ?, responsable = ?, cedula_responsable = ?, telefono_responsable = ?, parentesco = ? WHERE id = ?";
    
    if ($stmt_update = mysqli_prepare($conexion, $sql_update)) {
        mysqli_stmt_bind_param($stmt_update, "sssssssssssi", $nombre, $nacimiento, $diagnostico, $hospital, $medicamentos, $observaciones, $proxima_consulta, $responsable, $cedula_responsable, $telefono_responsable, $parentesco, $id);
        
        if (mysqli_stmt_execute($stmt_update)) {
            header("Location: pacientes.php");
            exit();
        } else {
            $error = "Hubo un error al actualizar los datos.";
        }
        mysqli_stmt_close($stmt_update);
    }
}

include("header.php");
?>

<div class="container my-5" style="max-width: 800px;">
    <div class="card p-4 mb-4 contenedor-blanco-titulo shadow-sm">
        <h1 class="titulos">Editar Historial de Paciente</h1>
        <p class="subtitulos">Modifique los campos necesarios del sistema.</p>
    </div>

    <form action="editar_paciente.php?id=<?php echo $id; ?>" method="POST" autocomplete="off">
        <input type="hidden" name="id" value="<?php echo $paciente['id']; ?>">

        <div class="card p-4 mb-4 border-secondary-subtle shadow-sm">
            <h5 class="encabezado-seccion-interna mb-4 fw-bold text-secondary border-bottom pb-2">Datos del Paciente</h5>
            
            <div class="mb-3">
                <label class="form-label label-apadem">Nombre Completo</label>
                <input type="text" name="nombre" class="form-control input-apadem" value="<?php echo htmlspecialchars($paciente['nombre']); ?>" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label label-apadem">Fecha de Nacimiento</label>
                    <input type="date" name="nacimiento" class="form-control input-apadem" value="<?php echo $paciente['nacimiento']; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label label-apadem">Centro Hospitalario</label>
                    <input type="text" name="hospital" class="form-control input-apadem" value="<?php echo htmlspecialchars($paciente['hospital']); ?>">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label label-apadem">Diagnóstico Principal</label>
                <input type="text" name="diagnostico" class="form-control input-apadem" value="<?php echo htmlspecialchars($paciente['diagnostico']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label label-apadem">Medicamentos Asignados</label>
                <input type="text" name="medicamentos" class="form-control input-apadem" value="<?php echo htmlspecialchars($paciente['medicamentos']); ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label label-apadem">Próxima Consulta</label>
                <input type="date" name="proxima_consulta" class="form-control input-apadem" value="<?php echo isset($paciente['proxima_consulta']) ? $paciente['proxima_consulta'] : ''; ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label label-apadem">Observaciones Médicas</label>
                <textarea name="observaciones" class="form-control input-apadem" rows="3"><?php echo htmlspecialchars($paciente['observaciones']); ?></textarea>
            </div>
        </div>

        <div class="card p-4 mb-4 border-secondary-subtle shadow-sm">
            <h5 class="encabezado-seccion-interna mb-4 fw-bold text-secondary border-bottom pb-2">Datos del Responsable / Tutor</h5>
            
            <div class="mb-3">
                <label class="form-label label-apadem">Nombre del Responsable</label>
                <input type="text" name="responsable" class="form-control input-apadem" value="<?php echo htmlspecialchars($paciente['responsable'] ?? ''); ?>" required>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label label-apadem">Cédula Responsable</label>
                    <input type="number" name="cedula_responsable" class="form-control input-apadem" value="<?php echo htmlspecialchars($paciente['cedula_responsable'] ?? ''); ?>" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label label-apadem">Teléfono</label>
                    <input type="number" name="telefono_responsable" class="form-control input-apadem" value="<?php echo htmlspecialchars($paciente['telefono_responsable'] ?? ''); ?>" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label label-apadem">Parentesco</label>
                    <input type="text" name="parentesco" class="form-control input-apadem" value="<?php echo htmlspecialchars($paciente['parentesco'] ?? ''); ?>" required>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2 justify-content-end">
            <a href="pacientes.php" class="btn btn-light border" style="border-radius: 8px;">Cancelar</a>
            <button type="submit" class="btn btn-primary px-4" style="border-radius: 8px; background-color: #2166ff; border: none;">Guardar Cambios</button>
        </div>
    </form>
</div>

<?php include("footer.php"); ?>
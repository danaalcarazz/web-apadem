<?php
require_once("verificar_sesion.php");
require_once("conexion.php");

$sql = "SELECT * FROM pacientes";
$resultado = mysqli_query($conexion, $sql);

include("header.php");
?>

<div class="container-fluid px-2 px-md-5 my-5">  
    <div class="card p-4 mb-4 contenedor-blanco-titulo shadow-sm">
        <div class="d-flex align-items-center gap-3">
            <div class="fs-2 icon-titulo-sistema"></div>
            <div>
                <h1 class="titulos">Pacientes Registrados</h1>
                <p class="subtitulos">Listado de pacientes atendidos por APADEM.</p>
            </div>
        </div>
    </div>

    <div class="contenedor-blanco-buscador mb-4">
        <div class="barra-busqueda-interior w-100">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="inputBuscador" class="buscador" placeholder="Buscar por nombre o dolencia...">
        </div>
    </div>

    <div class="card p-3 contenedor-tabla shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="tablaPacientes">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cédula</th>
                        <th>Nac./Edad</th>
                        <th>Hospital</th>
                        <th>Diagnóstico</th>
                        <th>Medicamentos</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($fila = mysqli_fetch_assoc($resultado)){ ?>
                    
                    <tr class="paciente-fila" data-nombre="<?php echo strtolower($fila["nombre"]); ?>" data-diagnostico="<?php echo strtolower($fila["diagnostico"]); ?>">
                        <td class="fw-bold text-muted">#<?php echo $fila["id"]; ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-mini">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <span class="nombre-paciente-tabla"><?php echo $fila["nombre"]; ?></span>
                            </div>
                        </td>
                        
                        <td>
                            <span class="text-secondary">
                                <?php echo !empty($fila["cedula"]) ? $fila["cedula"] : '—'; ?>
                            </span>
                        </td>
                        
                        <td>
                            <div>
                                <?php 
                                if (!empty($fila["nacimiento"])) {
                                    $fecha_nac = new DateTime($fila["nacimiento"]);
                                    $hoy = new DateTime();
                                    $edad = $hoy->diff($fecha_nac)->y;
                                    
                                    echo "<div class='text-dark'>" . date("d/m/Y", strtotime($fila["nacimiento"])) . "</div>";
                                    echo "<small class='text-muted'>$edad años</small>";
                                } else {
                                    echo "<span class='text-muted'>No registrada</span>";
                                }
                                ?>
                            </div>
                        </td>
                        
                        <td><span class="txt-tabla-info"><?php echo $fila["hospital"]; ?></span></td>
                
                        <td>
                            <span class="etiqueta-tabla">
                                <?php echo $fila["diagnostico"]; ?>
                            </span>
                        </td>
                        
                        <td>
                            <div class="medicamentos-container">
                                <?php
                                $lista = explode(",", $fila["medicamentos"]);
                                $tiene_meds = false;
                                foreach($lista as $med){
                                    if(trim($med) != "") {
                                        $tiene_meds = true;
                                ?>
                                    <span class="tag-medicamento-mini">
                                        <?php echo trim($med); ?>
                                    </span>
                                <?php 
                                    }
                                } 
                                if(!$tiene_meds) echo "<span class='text-muted small'>Ninguno</span>";
                                ?>
                            </div>
                        </td>
                        
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="editar_paciente.php?id=<?php echo $fila["id"]; ?>" class="btn btn-sm btn-editar-lista" title="Editar Paciente">
                                    <i class="fa-solid fa-pen-to-square me-1"></i> Editar
                                </a>
                                <a href="eliminar_paciente.php?id=<?php echo $fila["id"]; ?>" class="btn btn-sm btn-eliminar-lista" onclick="return confirm('¿Estás seguro que desea eliminar a este paciente?');" title="Eliminar Paciente">
                                    <i class="fa-solid fa-trash me-1"></i> Eliminar
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const buscador = document.getElementById("inputBuscador");
    const filas = document.querySelectorAll(".paciente-fila");

    if (buscador) {
        buscador.addEventListener("input", function() {
            const termino = buscador.value.toLowerCase().trim();

            filas.forEach(fila => {
                // lee los datos guardados en la fila de la tabla
                const nombre = fila.getAttribute("data-nombre") || "";
                const diagnostico = fila.getAttribute("data-diagnostico") || "";

                // si coincide con el nombre o el diagnóstico, se muestra; si no se oculta
                if (nombre.includes(termino) || diagnostico.includes(termino)) {
                    fila.style.display = ""; // vuelve a su estado original
                } else {
                    fila.style.display = "none"; // oculta la fila por completo
                }
            });
        });
    }
});
</script>

<?php include("footer.php"); ?>
<?php
require_once("verificar_sesion.php");
require_once("conexion.php");

$sql = "SELECT * FROM pacientes";
$resultado = mysqli_query($conexion, $sql);

include("header.php");
?>

<div class="container my-5">
    
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

    <div class="listado-pacientes" id="contenedorTarjetas">
        <?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

        <div class="paciente-card" data-nombre="<?php echo strtolower($fila["nombre"]); ?>" data-diagnostico="<?php echo strtolower($fila["diagnostico"]); ?>">
            
            <div class="paciente-header">
                <div class="paciente-info">
                    <div class="avatar">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div>
                        <h5 class="nombre-paciente-texto"><?php echo $fila["nombre"]; ?></h5>
                        <small>
                            <?php 
                            if (!empty($fila["nacimiento"])) {
                                $fecha_nac = new DateTime($fila["nacimiento"]);
                                $hoy = new DateTime();
                                $edad = $hoy->diff($fecha_nac)->y;
                                echo $edad . " años";
                            } else {
                                echo "Edad no registrada.";
                            }
                            ?>
                        </small>
                    </div>
                </div>
                
                <div class="paciente-header-derecha">
                    <span class="etiqueta">
                        <?php echo $fila["diagnostico"]; ?>
                    </span>
                    <div class="acciones-rapidas-iconos">
                        <a href="editar_paciente.php?id=<?php echo $fila["id"]; ?>" class="btn-accion-mini edit" title="Editar">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="eliminar_paciente.php?id=<?php echo $fila["id"]; ?>" class="btn-accion-mini delete" onclick="return confirm('¿Estás seguro que desea eliminar a este paciente?');" title="Eliminar">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="paciente-body">
                <div class="grid-detalles">   
                    <div class="detalle-item">
                        <i class="fa-solid fa-hospital-user"></i>
                        <div>
                            <strong>Hospital/Centro</strong>
                            <p><?php echo $fila["hospital"]; ?></p>
                        </div>
                    </div>

                    <div class="detalle-item">
                        <i class="fa-solid fa-capsules"></i>
                        <div>
                            <strong>Medicamentos</strong>
                            <div class="medicamentos-container">
                                <?php
                                $lista = explode(",", $fila["medicamentos"]);
                                foreach($lista as $med){
                                    if(trim($med) != "") {
                                ?>
                                    <span class="tag-medicamento">
                                        <?php echo trim($med); ?>
                                    </span>
                                <?php 
                                    }
                                } 
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="detalle-item">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div>
                            <strong>Próxima Consulta</strong>
                            <p>
                                <?php 
                                if (!empty($fila["proxima_consulta"])) {
                                    echo date("d/m/Y", strtotime($fila["proxima_consulta"])); 
                                } else {
                                    echo "<span class='text-muted'>Sin fecha asignada</span>";
                                }
                                ?>
                            </p>
                        </div>
                    </div>

                    <div class="detalle-item">
                        <i class="fa-solid fa-file-medical"></i>
                        <div>
                            <strong>Observaciones</strong>
                            <p><?php echo $fila["observaciones"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include("footer.php"); ?>
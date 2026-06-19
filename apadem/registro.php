<?php
require_once("verificar_sesion.php");
require_once("conexion.php");

include("header.php");
?>

<div class="container my-5">
    <div class="card p-4 mb-4 contenedor-blanco-titulo shadow-sm">
        <div class="d-flex align-items-center gap-3">
            <div class="fs-2 icon-titulo-sistema">
                <i class="fa-solid fa-user-plus"></i>
            </div>
            <div>
                <h1 class="titulos">Registrar paciente nuevo</h1>
                <p class="subtitulos">Complete el formulario con los datos del paciente.</p>
            </div>
        </div>
    </div>

    <form action="guardar_paciente.php" method="POST" autocomplete="off">
        
        <div class="card p-4 mb-4 border-secondary-subtle shadow-sm tarjeta-sistema-unificada">
            <h5 class="encabezado-seccion-interna border-bottom pb-2 mb-4 fw-bold">Datos del Paciente</h5>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-muted small fw-bold">Nombre Completo *</label>
                    <input type="text" name="nombre" class="form-control" required placeholder="Ej: María González">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-muted small fw-bold">Fecha de Nacimiento *</label>
                    <input type="date" name="nacimiento" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-muted small fw-bold">Cédula de Identidad *</label>
                    <input type="number" name="cedula" class="form-control" pattern="[0-9.]+" title="Solo se permiten números y puntos" required placeholder="Ej: 4.567.890">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-muted small fw-bold">Teléfono</label>
                    <input type="number" name="telefono" class="form-control" pattern="[0-9 ]+" title="Solo se permiten números y espacios" required placeholder="Ej: 0981234567">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label text-muted small fw-bold">Dirección</label>
                <input type="text" name="direccion" class="form-control" placeholder="Ej: Colonia Pastoreo, Obligado">
            </div>

            <div class="mb-3">
                <label class="form-label text-muted small fw-bold">Diagnóstico/Dolencia *</label>
                <input type="text" name="diagnostico" class="form-control" required placeholder="Ej: Parálisis Cerebral">
            </div>

            <div class="mb-3">
                <label class="form-label text-muted small fw-bold">Hospital/Centro de Atención</label>
                <input type="text" name="hospital" class="form-control" placeholder="Ej: Centro de Salud de Obligado">
            </div>

            <div class="mb-3">
                <label class="form-label text-muted small fw-bold">Medicamentos que Necesita</label>
                <input type="text" name="medicamentos" class="form-control" placeholder="Liste los medicamentos separados por comas">
            </div>

            <div class="mb-3">
                <label class="form-label text-muted small fw-bold">Próxima Consulta (Opcional)</label>
                <input type="date" name="proxima_consulta" class="form-control">
            </div>
        </div>

        <div class="card p-4 mb-4 border-secondary-subtle shadow-sm tarjeta-sistema-unificada">
            <h5 class="encabezado-seccion-interna border-bottom pb-2 mb-4 fw-bold">Datos del Encargado/Responsable</h5>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-muted small fw-bold">Nombre Completo *</label>
                    <input type="text" name="responsable" class="form-control" required placeholder="Ej: Juan Pérez">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-muted small fw-bold">Cédula de Identidad *</label>
                    <input type="number" name="cedula_responsable" class="form-control" pattern="[0-9.]+" title="Solo se permiten números y puntos" required placeholder="Ej: 4.567.890">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-muted small fw-bold">Teléfono *</label>
                    <input type="number" name="telefono_responsable" class="form-control" pattern="[0-9 ]+" title="Solo se permiten números y espacios" required placeholder="Ej: 0981234567">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-muted small fw-bold">Parentesco *</label>
                    <input type="text" name="parentesco" class="form-control" required placeholder="Ej: Madre, Padre, Tutor">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label text-muted small fw-bold">Observaciones Adicionales</label>
                <textarea name="observaciones" class="form-control" rows="3" placeholder="Cualquier información adicional relevante..."></textarea>
            </div>
        </div>

        <div class="d-flex gap-2 justify-content-end mb-5">
            <button type="reset" class="btn btn-outline-secondary px-4 py-2">Limpiar Formulario</button>
            <button type="submit" class="btn btn-apadem px-4 py-2"><i class="fa-solid fa-user-plus me-2"></i>Registrar Paciente</button>
        </div>
    </form>
</div>

<?php include("footer.php"); ?>
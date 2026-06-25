<?php
include("header.php");
?>

<div class="container my-5">
    <div class="card p-4 mb-4 contenedor-blanco-titulo shadow-sm">
        <div class="d-flex align-items-center gap-3">
            <div class="fs-2 icon-titulo-sistema">
                <i class="fa-solid fa-phone"></i>
            </div>
            <div>
                <h1 class="titulos">Contacto</h1>
                <p class="subtitulos">Información de contacto de la organización.</p>
            </div>
        </div>
    </div>

    <div class="card mb-4 border-secondary-subtle shadow-sm overflow-hidden tarjeta-sistema-unificada">
        <div class="p-3 fw-bold encabezado-seccion-celeste border-bottom">Información General</div>
        <div class="card-body p-4">
            <div class="d-flex align-items-start gap-3 mb-4">
                <div class="icon-detalle-sistema fs-5 mt-1"><i class="fa-solid fa-location-dot"></i></div>
                <div>
                    <div class="text-muted small fw-bold">Dirección</div>
                    <div class="text-dark">Obligado, Itapúa, Paraguay</div>
                </div>
            </div>
            <div class="d-flex align-items-start gap-3 mb-4">
                <div class="icon-detalle-sistema fs-5 mt-1"><i class="fa-solid fa-phone"></i></div>
                <div>
                    <div class="text-muted small fw-bold">Teléfono Central</div>
                    <div class="text-dark">0983 533 111</div>
                </div>
            </div>
            <div class="d-flex align-items-start gap-3">
                <div class="icon-detalle-sistema fs-5 mt-1"><i class="fa-solid fa-tty"></i></div>
                <div>
                    <div class="text-muted small fw-bold">Línea fija</div>
                    <div class="text-dark">0717 20524</div>
                </div>
            </div>
        </div>
    </div>

    <h4 class="fw-bold mb-3 subtitulo-seccion-fuerte">Directiva:</h4>
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card h-100 border-secondary-subtle shadow-sm overflow-hidden tarjeta-sistema-unificada">
                <div class="card p-3 text-white border-0 d-flex flex-row align-items-center gap-3 gradiente encabezado-directiva-gradiente">
                    <div class="fs-4 bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center contenedor-icono-circular">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <h5 class="mb-0 fw-bold">Presidente</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-2 text-dark"><i class="fa-solid fa-user text-muted me-2"></i> Arq. Enrique Moscarda</div>
                    <div class="mb-2 text-dark"><i class="fa-solid fa-phone text-muted me-2"></i> 0981 000 000</div>
                    <div class="text-dark"><i class="fa-solid fa-envelope text-muted me-2"></i> presidente@apadem.org.py</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card h-100 border-secondary-subtle shadow-sm overflow-hidden tarjeta-sistema-unificada">
                <div class="card p-3 text-white border-0 d-flex flex-row align-items-center gap-3 gradiente encabezado-directiva-gradiente">
                    <div class="fs-4 bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center contenedor-icono-circular">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h5 class="mb-0 fw-bold">Secretaria</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-2 text-dark"><i class="fa-solid fa-user text-muted me-2"></i> Lic. Rosa Zarza</div>
                    <div class="mb-2 text-dark"><i class="fa-solid fa-phone text-muted me-2"></i> 0985 000 000</div>
                    <div class="text-dark"><i class="fa-solid fa-envelope text-muted me-2"></i> secretaria@apadem.org.py</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-5 border-secondary-subtle shadow-sm overflow-hidden tarjeta-sistema-unificada">
        <div class="p-3 fw-bold encabezado-seccion-celeste border-bottom">Horarios de Atención</div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h5 class="fw-bold text-dark mb-3">Oficina Principal</h5>
                    <p class="mb-2 text-dark">Lunes a Viernes: 7:30 a 11:30</p>
                    <p class="mb-2 text-dark">Sábados y Domingos: Cerrado</p>
                </div>
                <div class="col-md-6">
                    <h5 class="fw-bold text-dark mb-3">Atención de Emergencias</h5>
                    <p class="mb-2 text-dark">Disponible las 24 horas</p>
                    <p class="mb-0 text-dark">Llamar al: 0983 533 111</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include("footer.php"); 
?>
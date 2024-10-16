<?php include "Views/Templates/header.php"; ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
    <p style="text-align: center; font-weight: bold; font-size: 20px; color: #343a40;"></p>

    </li>
</ol>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card" style="background-color: #0000FF; color: white;">
            <div class="card-body d-flex">
                Listado de Usuarios
                <i class="fas fa-user fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Usuarios" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['usuarios']['total'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card" style="background-color:  #008000; color: white;">
            <div class="card-body d-flex">
                Configuracion de Datos
                <i class="fas fa-cogs fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Administracion" class="text-white">Ver Detalle</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white">
            <div class="card-body d-flex">
                Listado de Roles
                <i class="fa fa-retweet fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Roles" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['caja']['total'] ?></span>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white">
            <div class="card-body d-flex">
                Listado de Carreras
                <i class="fas fa-tools fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Carrerass" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['carreras']['total'] ?></span>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-xl-3 col-md-6">
        <div class="card" style="background-color:  #800080; color: white;">
            <div class="card-body d-flex">
                Listado de Estadias
                <i class="fa-solid fa-file-circle-plus fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Libros" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['documentos']['total'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card" style="background-color:  #333333; color: white;">
            <div class="card-body d-flex">
                Prestamos de Libros
                <i class="app-menu__icon fa fa-hourglass-start fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Prestamoslibros" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['prestamosbiblio']['total'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card" style="background-color: #0BBE93; color: white;">
            <div class="card-body d-flex">
                Reporte Libros Prestados
                <i class="fa-solid fa-handshake fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Prestamoslibros/reportepdf" class="text-white" target="_blank">Ver Detalle</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card" style="background-color:  #E20A9D; color: white;">
            <div class="card-body d-flex">
                Listado de Libros
                <i class="fa-solid fa-file-circle-plus fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Libros_biblioteca" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['librosb']['total'] ?></span>
            </div>
        </div>
    </div>
 </div>
 <div class="row mt-4">
    <div class="col-xl-3 col-md-6">
        <div class="card" style="background-color:  #6E7F7A; color: white;">
            <div class="card-body d-flex">
                Listado de Estadias Balleza
                <i class="fas fa-water fa-2x  ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>EstadiasB" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['estadiasb']['total'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card" style="background-color:  #C0A614; color: white;">
            <div class="card-body d-flex">
                Estudiantes
                <i class="fas fa-graduation-cap fa-2x ml-auto "></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Estudiantes" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['estudiantes']['total'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card" style="background-color: #986BB0; color: white;">
            <div class="card-body d-flex">
                Autores
                <i class="fas fa-user mr-2 ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Autores" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['autores']['total'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card" style="background-color:  #45DB09; color: white;">
            <div class="card-body d-flex">
                Editoriales
                <i class="icon fa fa-tags ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Editoriales" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['editoriales']['total'] ?></span>
            </div>
        </div>
    </div>
 </div>

 <div class="row mt-4">
    <div class="col-xl-12">
        <div class="card border-0 shadow">
            <div class="card-header bg-primary text-white py-3">
                <h4 class="m-0"><i class="fas fa-search mr-2"></i> Encuentra Estadías</h4>
            </div>
            <div class="card-body d-flex justify-content-center">
                <button id="miBoton" class="btn btn-success btn-lg rounded-pill px-5 py-3 mr-3">
                    <i class="fas fa-university mr-1"></i> Universidad Tecnológica de Parral
                </button>
                <button id="nuevoBoton" class="btn btn-danger btn-lg rounded-pill px-5 py-3 mr-3" onclick="window.location.href='http://localhost/Buscadro_Libros/'">
                    <i class="fas fa-school mr-1"></i> Buscador Libros
                </button>
                <button id="balleza" class="btn btn-success btn-lg rounded-pill px-5 py-3">
                    <i class="fas fa-map-marker-alt mr-1"></i> Universidad Unidad Rio Balleza
                </button>
            </div>
        </div>
    </div>
</div>




<!-- <div class="row mt-4">
    <div class="col-6">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title mb-3"><em>Prestamos Por Mes</em></h5>
                <canvas id="reporte_mes" width="400" height="200"></canvas> 
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title mb-3"><em>Prestamos Por Dia</em></h5>
                <canvas id="reporteDia" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div> -->

<script>
    var boton = document.getElementById('miBoton');
    boton.addEventListener('click', function() {
        window.location.href = 'http://localhost/estadias/GENERA_QR/index.php';
    });
    var boton = document.getElementById('balleza');
    boton.addEventListener('click', function() {
        window.location.href = 'http://localhost/estadias/GENERA_QR/balleza.php';
    });
</script>
<?php include "Views/Templates/footer.php"; ?>
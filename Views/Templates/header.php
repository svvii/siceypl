<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PANEL ADMINISTRATIVO</title>
    <link rel="icon" href="http://utparral.edu.mx/logotipos/UTP.png">
    <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>Assets/css/estilos.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>Assets/css/header.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>Assets/css/menu.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url; ?>Assets/css/colores.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>Assets/DataTables/datatables.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js" integrity="sha512-Z8CqofpIcnJN80feS2uccz+pXWgZzeKxDsDNMD/dJ6997/LSRY+W4NmEt9acwR+Gt9OHN0kkI1CTianCwoqcjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo base_url; ?>Administracion/home">
            <h2 style="font-style: italic; text-transform: uppercase; text-align: center;">SICE<span style="text-transform: lowercase;">y</span>PL</h2>
        </a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-university fa-lg"></i>
                </a>
            </li>
            <li class="nav-item">
                <span class="navbar-text">|</span>
            </li>
            <li class="nav-item">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="quienesSomosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Quiénes somos
                </a>
                <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="quienesSomosDropdown" style="min-width: 500px;">
                    <div class="text-center mb-3">
                        <h6 class="dropdown-header" style="text-transform: uppercase;">Misión</h6>
                        <p class="dropdown-item-text mb-0" style="text-align: justify;">Formar Profesionistas altamente capacitados y competitivos, con actitudes y conocimientos científicos y tecnológicos, mediante programas educativos bajo el modelo de educación por competencias y que contribuyan a la solución creativa de problemas de la sociedad.</p>
                    </div>

                    <div class="text-center mb-3">
                        <h6 class="dropdown-header" style="text-transform: uppercase;">Visión</h6>
                        <p class="dropdown-item-text mb-0" style="text-align: justify;">Ser una Institución de Educación Superior Tecnológica líder en la región reconocida por sus egresados, que den respuesta adecuada y pertinente a los requerimientos del sector productivo, sustentada en programas educativos acreditados de Técnico Superior Universitario e Ingeniería, mediante procesos de gestión certificados.</p>
                    </div>

                    <hr class="mt-2 mb-2">

                    <div class="text-center">
                        <h6 class="dropdown-header" style="text-transform: uppercase;">Valores</h6>
                        <ul class="list-unstyled mb-0 columns-3">
                            <li>◉ Liderazgo</li>
                            <li>◉ Disciplina</li>
                            <li>◉ Honestidad</li>
                            <li>◉ Legalidad</li>
                            <li>◉ Respeto</li>
                            <li>◉ Imparcialidad</li>
                            <li>◉ Compromiso</li>
                            <li>◉ Responsabilidad</li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>

        <!--notificaciones-->
        <ul class="navbar-nav ml-auto">
            <?php
            require_once 'Models/AdministracionModel.php';
            $prestamos = new AdministracionModel();
            $fecha = date('Y-m-d');
            $notificaciones = $prestamos->getprestamos($fecha);
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge"><?php echo count($notificaciones); ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header text-danger">
                        <i class="fas fa-exclamation-circle mr-2"></i> Lista de Libros Pendientes
                    </span>
                    <div class="dropdown-divider"></div>
                    <?php foreach ($notificaciones as $row) { ?>
                        <a href="<?php echo base_url; ?>Prestamoslibros" <?php echo $row['id']; ?> class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i><?php echo $row['nombre_estudiante']; ?>
                            <span class="float-right text-muted text-sm"><?php echo $row['fecha_devolucion']; ?></span>
                        </a>
                        <div class="dropdown-divider"></div>
                    <?php } ?>
            <li><span class="navbar-text text-white font-weight-bold ml-3">¡Bienvenid@, <?php echo $_SESSION['nombre']; ?>!</span></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cambiarpass"><i class="fa-solid fa-id-badge mr-2"></i>Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url; ?>Usuarios/salir"><i class="fa-solid fa-right-from-bracket mr-2"></i>Cerrar Sesion</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link custom-link" href="<?php echo base_url; ?>Administracion/home">
                            <div class="sb-nav-link-icon"></div>
                            <span class="link-text"><img src="../../../estadias/Assets/img/utp_modificado.png" width="60" height="60"></span>
                        </a>
                        <div class="sb-sidenav-menu-heading">Configuracion</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                            <div class="sb-nav-link-icon"><i class="fas fa-cogs fa-2x"></i></div>
                            Configuracion
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url; ?>Usuarios"><i class="fas fa-user-lock mr-2"></i>Usuarios</a>
                                <a class="nav-link" href="<?php echo base_url; ?>Roles"><i class="fa fa-retweet mr-2 " aria-hidden="true"></i>Roles</a>
                                <a class="nav-link" href="<?php echo base_url; ?>Administracion"><i class="fas fa-sliders-h mr-2 " aria-hidden="true"></i>Configuracion</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="<?php echo base_url; ?>Carrerass">
                            <div class="sb-nav-link-icon"><i class="fas fa-tools fa-2x"></i></div>
                            Listado Carreras
                        </a>
                        <div class="sb-sidenav-menu-heading">SISTEMA DE ESTADIAS</div>
                        <a class="nav-link" href="<?php echo base_url; ?>Egresados">
                            <div class="sb-nav-link-icon"><i class="fas fa-medal mr-2"></i></div>
                            Egresados y titulados
                        </a>
                        <div class="sb-sidenav-menu-heading">SISTEMA DE ESTADIAS</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt fa-2x"></i></div>
                            Administracion
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">

                                <a class="nav-link" href="<?php echo base_url; ?>Generaciones">
                                    <div class="sb-nav-link-icon"><i class="far fa-clock mr-2"></i></div>
                                    Generaciones
                                </a>
                                <a class="nav-link" href="<?php echo base_url; ?>Lectores">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-reader mr-2"></i></div>
                                    Alumnos Prestamos
                                </a>
                                <a class="nav-link" href="<?php echo base_url; ?>Prestamos">
                                    <div class="sb-nav-link-icon"><i class="fas fa-exchange-alt mr-2"></i></div>
                                    Prestamos
                                </a>

                            </nav>
                        </div>
                        <a class="nav-link" href="<?php echo base_url; ?>Libros">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-signature fa-2x"></i></div>
                            Estadias UTP
                        </a>
                        <a class="nav-link" href="<?php echo base_url; ?>EstadiasB">
                            <div class="sb-nav-link-icon"><i class="fas fa-water fa-2x"></i></div>
                            Estadias Balleza
                        </a>
                        </a>
                        <div class="sb-sidenav-menu-heading">Sistema Biblioteca</div>
                        <a class="nav-link" href="<?php echo base_url; ?>Prestamoslibros">
                            <div class="sb-nav-link-icon"><i class="app-menu__icon fa fa-hourglass-start fa-2x"></i></div>
                            Prestamos Libros
                        </a>
                        <a class="nav-link" href="<?php echo base_url; ?>Prestamoslibros/reportepdf " target="_blank">
                            <div class="sb-nav-link-icon"><i class="fas fa-tasks fa-2x"></i></div>
                            Reporte Prestamos
                        </a>
                        <a class="nav-link" href="<?php echo base_url; ?>Libros_biblioteca">
                            <div class="sb-nav-link-icon"><i class="icon fa fa-book fa-2x"></i></div>
                            Libros Biblioteca
                        </a>
                        <a class="nav-link" href="<?php echo base_url; ?>Estudiantes">
                            <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap fa-2x"></i></div>
                            Estudiantes
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                            <div class="sb-nav-link-icon"><i class="app-menu__icon fa fa-list fa-2x"></i></div>
                            Complementos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                </a>
                                <a class="nav-link" href="<?php echo base_url; ?>Autores">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user mr-2"></i></div>
                                    Autores
                                </a>
                                <a class="nav-link" href="<?php echo base_url; ?>Editoriales">
                                    <div class="sb-nav-link-icon"><i class="icon fa fa-tags"></i> </div>
                                    Editoriales
                                </a>

                            </nav>
                        </div>
                    </div>
                </div>
            </nav>

        </div>
        <div id="layoutSidenav_content">
            <main style="margin-bottom: 50px;">
                <div class="container-fluid mt-2">
                    <style>
                        .columns-3 {
                            -webkit-column-count: 3;
                            -moz-column-count: 3;
                            column-count: 3;
                            list-style-type: none;
                            padding-left: 0;
                        }

                        .columns-3 li {
                            margin-bottom: 5px;
                            text-align: justify;
                        }
                    </style>
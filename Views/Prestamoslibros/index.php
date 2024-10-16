<?php include "Views/Templates/header.php"; ?>
<?php
date_default_timezone_set('America/Mexico_City');
?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Prestamos</li>
</ol>
<button class="btn btn-secondary mb-2" type="button" onclick="frmprestamodelibros();"><i class="fas fa-plus"></i></button>
<table class="table table-light" id="tbl_prestamoslibros">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Titulo del libro</th>
            <th>Nombre del estudiante</th>
            <th>Cantidad</th>
            <th>Fecha Prestamo</th>
            <th>Fecha Devolucion</th>
            <th>Hora</th>
            <th>Observacion Prestamo</th>
            <th>Observacion Devolucion</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div id="nuevo_prestamodelibro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="title">Nuevo Prestamo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="display: flex; align-items: center; justify-content: center; margin: 10px; position: relative;">
                    <video id="video" width="120" height="90" autoplay style="border: 2px solid #4CAF50; position: relative;">
                        <source src="tu_video.mp4" type="video/mp4">
                        Tu navegador no admite la etiqueta de video.
                    </video>
                    <div style="position: absolute; top: 5px; left: 5px; z-index: 1;">
                        <img src="http://www.utparral.edu.mx/logotipos/lobo.png" alt="Icono" width="30" height="30">
                    </div>
                    <div style="position: absolute; top: 5px; right: 5px; z-index: 1; transform: scaleX(-1);">
                        <img src="http://www.utparral.edu.mx/logotipos/lobo.png" alt="Icono" width="30" height="30">
                    </div>
                </div>
                <form method="post" id="frmprestamodelibros">
                    <input type="hidden" id="id" name="id">
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="font-size: 1.2em; color: #333; margin-bottom: 20px;">Llenado Automático</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="buscar_libro">Buscar Libro</label>
                                <select id="buscar_libro" class="form-control select_libro" name="buscar_libro" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <input id="autor" class="form-control" type="text" name="autor" placeholder="Nombre Autor:">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="editorial">Editorial</label>
                                <input id="editorial" class="form-control" type="text" name="editorial" placeholder="Nombre Editorial:">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="buscar_estudiante">Buscar Estudiante</label>
                                <select id="buscar_estudiante" class="form-control select_est" name="buscar_estudiante" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input id="cantidad" class="form-control" type="number" name="cantidad" placeholder="Can.">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_prestamo">Fecha Prestamo</label>
                                <input id="fecha_prestamo" class="form-control" type="date" name="fecha_prestamo" placeholder="fecha prestamo" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_devolucion">Fecha Devolucion</label>
                                <input id="fecha_devolucion" class="form-control" type="date" name="fecha_devolucion" placeholder="fecha devolucion" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="horap">Hora Prestamo</label>
                                <input id="horap" class="form-control" type="time" name="horap" placeholder="hora prestamo" value="<?php echo date('H:i:s'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="observacionesp">Observaciones:</label>
                                <textarea class="form-control" name="observacionesp" id="observacionesp" placeholder="Ingresa tus observaciones aqui" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" type="button" onclick="registrarprestamodelibro(event);" id="btnAccion">Realizar Prestamo</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="devolucion_prestamo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title">Entrega del Prestamo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frmdevolucion" onsubmit="registrardevolucion(event)">
                <div class="modal-body">
                    <input type="hidden" id="id_prestamoo" name="id_prestamoo">
                    <div class="form-group">
                        <label for="observaciones_devoluciones">Observaciones:</label>
                        <textarea class="form-control" name="observaciones_devoluciones" id="observaciones_devoluciones" placeholder="Ingresa tus observaciones de devoluciones aqui" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Devolver</button>
                </div>
            </form>
        </div>
    </div>

</div>

<?php include "Views/Templates/footer.php"; ?>
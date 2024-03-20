<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Estadias</li>
</ol>
<button class="btn btn-secondary mb-2" type="button" onclick="frmEB();"><i class="fas fa-plus"></i></button>
<div class="table-responsive">
<table class="table table-light" id="tblBALLEZA">
    <thead class="thead-dark">
        <tr>
                <th>id</th>
                <th>Folio</th>
                <th>Generación</th>
                <th>Matricula</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombre</th>
                <th>Carrera</th>
                <th>Color Estante</th>
                <th>Nombre del Proyecto</th>
                <th>Fecha Documento</th>
                <th>Nombre Empresa</th>
                <th>Tutor Academico</th>
                <th>Asesor Academico</th>
                <th>Asesor Empresarial</th>
                <th>Observaciones</th>
                <th>Estado</th>
                <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="nuevo_EstadiaB" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="title">Nueva Estadia</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmEB">
                <input id="id" name="id" class="form-control" type="hidden" placeholder="id">
                <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="codigo_estadia">Folio:</label>
                        <input id="codigo_estadia" class="form-control" type="text" name="codigo_estadia" placeholder="Código de Estadía" readonly>
                        </div>
                        </div>
                    <div class="col-md-3">
                    <div class="form-group">
                    <label for="color_estante">Color del Estante:</label>
                                    <input id="color_estante" class="form-control" type="text" name="color_estante" placeholder="Color del Estante">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id_generacion">Generacion:</label>
                                    <input id="id_generacion" class="form-control" type="text" name="id_generacion" placeholder="Generacion">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="matricula">Matrícula:</label>
                                    <input id="matricula" class="form-control" type="text" name="matricula" placeholder="Matrícula">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="apellido_p">Apellido Paterno:</label>
                                    <input id="apellido_p" class="form-control" type="text" name="apellido_p" placeholder="Apellido Paterno">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="apellido_m">Apellido Materno:</label>
                                    <input id="apellido_m" class="form-control" type="text" name="apellido_m" placeholder="Apellido Materno">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_carrera">Nombre del Proyecto:</label>
                                    <input id="id_carrera" class="form-control" type="text" name="id_carrera" placeholder="carrera">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre_proyecto">Nombre del Proyecto:</label>
                                    <input id="nombre_proyecto" class="form-control" type="text" name="nombre_proyecto" placeholder="Nombre del Proyecto">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_documento">Fecha de Estadía:</label>
                                    <input id="fecha_documento" class="form-control" type="text" name="fecha_documento" placeholder="Fecha de Estadía">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombre_empresa">Nombre de la Empresa:</label>
                                    <input id="nombre_empresa" class="form-control" type="text" name="nombre_empresa" placeholder="Nombre de la Empresa">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tutor_academico">Tutor Académico:</label>
                                    <input id="tutor_academico" class="form-control" type="text" name="tutor_academico" placeholder="Tutor Académico">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="asesor_academico">Asesor Académico:</label>
                                    <input id="asesor_academico" class="form-control" type="text" name="asesor_academico" placeholder="Asesor Académico">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="asesor_empresarial">Asesor Empresarial:</label>
                                    <input id="asesor_empresarial" class="form-control" type="text" name="asesor_empresarial" placeholder="Asesor Empresarial">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                        <label for="archivoPDF">Archivo PDF:</label>
                        <input type="file" id="archivoPDF" name="archivoPDF" accept=".pdf">
                        </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="observaciones">Observaciones:</label>
                                    <textarea class="form-control" name="observaciones" id="observaciones" placeholder="Observaciones" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                <button class="btn btn-success" type="button" onclick="registrarEB(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancelar</button>
            </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>
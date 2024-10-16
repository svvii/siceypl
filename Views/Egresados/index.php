<?php include "Views/Templates/header.php"; ?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active centered-bold">EGRESADOS</li>

</ol>
<button class="btn btn-secondary mb-2" type="button" onclick="frmEgresado();"><i class="fas fa-plus"></i> Carga individual</button>

<button class="btn btn-info mb-2" type="button" onclick="abrirCargaMasiva();"><i class="fas fa-upload"></i> Carga Masiva</button>

<a href="<?php echo base_url; ?>Assets/img/PLANTILLA.xlsx" class="btn btn-success mb-2" download>
    <i class="fas fa-file-excel"></i> Plantilla
</a>

<button class="btn mb-2" type="button" data-toggle="modal" data-target="#videoModal" style="background-color: #FFD700; color: white;">
    <i class="fas fa-question-circle"></i> Instrucciones
</button>

<button class="btn btn-danger mb-2" type="button" onclick="abrirSugerencias();">
    <i class="fas fa-comment"></i> Sugerencias
</button>

<div class="table-responsive">
    <table class="table table-striped table-hover display nowrap" style="width: 100%" id="tblEgresados">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>CURP</th>
                <th>NOMBRE</th>
                <th>APELLIDO PATERNO</th>
                <th>APELLIDO MATERNO</th>
                <th>PARRAL O BALLEZA</th>
                <th>GÉNERO</th>
                <th>MES Y AÑO DE INGRESO</th>
                <th>MES Y AÑO DE EGRESO</th>
                <th>FECHA DE EGRESO</th>
                <th>NÚMERO DE CÉDULA</th>
                <th>NIVEL</th>
                <th>MATRÍCULA</th>
                <th>ESTATUS</th>
                <th>TITULADOS EN LA UTP</th>
                <th>FECHA DE CEDULACIÓN EN DGP</th>
                <th>FECHA DE PASE PARA CÉDULA</th>
                <th>FECHA DE ENTREGA A EGRESADO</th>
                <th>OBSERVACIONES</th>
                <th>RESPUESTA DEL EGRESADO</th>
                <th>OBSERVACIÓN DEL EGRESADO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    </table>

    <div id="nuevo_egresado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="title">Nuevo Egresado</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmEgresado">
                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="curp">CURP</label>
                                    <input id="curp" class="form-control" type="text" name="curp" placeholder="Exactamente 18 caracteres" maxlength="18" required style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombre">NOMBRE</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" style="text-transform: uppercase;" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ap_paterno">APELLIDO PATERNO</label>
                                    <input id="ap_paterno" class="form-control" type="text" name="ap_paterno" placeholder="Apellido Paterno" maxlength="30" style="text-transform: uppercase;" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ap_materno">APELLIDO MATERNO</label>
                                    <input id="ap_materno" class="form-control" type="text" name="ap_materno" placeholder="Apellido Materno" maxlength="30" style="text-transform: uppercase;" autocomplete="off">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parral_balleza">PARRAL O BALLEZA</label>
                                    <select id="parral_balleza" class="form-control" name="parral_balleza">
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="parral">Parral</option>
                                        <option value="balleza">Balleza</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="genero">GÉNERO</label>
                                    <select id="genero" class="form-control" name="genero">
                                        <option value="">Seleccione</option>
                                        <option value="hombre">Hombre</option>
                                        <option value="mujer">Mujer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mes_anio_ingreso">MES Y ANO DE EGRESO</label>
                                    <input id="mes_anio_ingreso" class="form-control" type="month" name="mes_anio_ingreso">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mes_anio_egreso">MES Y ANO DE EGRESO</label>
                                    <input id="mes_anio_egreso" class="form-control" type="month" name="mes_anio_egreso">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_egreso">FECHA DE EGRESO</label>
                                    <input id="fecha_egreso" class="form-control" type="month" name="fecha_egreso">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_cedula">NUMERO DE CEDULA</label>
                                    <input id="numero_cedula" class="form-control" type="text" name="numero_cedula" placeholder="Número de Cédula">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nivel">NIVEL</label>
                                    <input id="nivel" class="form-control" type="text" name="nivel" placeholder="Nivel" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="matricula">MATRÍCULA</label>
                                    <input id="matricula" class="form-control" type="text" name="matricula" placeholder="Matrícula" maxlength="12" style="text-transform: uppercase;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="estatus">ESTATUS</label>
                                    <select id="estatus" class="form-control" name="estatus" onchange="toggleOtherInput()">
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="corte">Corte</option>
                                        <option value="resagado">Rezagado</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                    <input type="text" id="other_estatus" class="form-control mt-2" name="other_estatus" placeholder="Especifique" style="display: none;">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="titulados_utp">TITULADOS EN LA UTP</label>
                                    <select id="titulados_utp" class="form-control" name="titulados_utp">
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_cedulacion_dgp">FECHA DE CEDULACION DE DGP</label>
                                    <input id="fecha_cedulacion_dgp" class="form-control" type="date" name="fecha_cedulacion_dgp">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_pase_cedula">FECHA DE PASE PARA CEDULA</label>
                                    <input id="fecha_pase_cedula" class="form-control" type="date" name="fecha_pase_cedula">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_entrega_egresado">FECHA DE ENTREGA A EGRESADO</label>
                                    <input id="fecha_entrega_egresado" class="form-control" type="date" name="fecha_entrega_egresado">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="observaciones">OBSERVACIONES</label>
                                    <textarea id="observaciones" class="form-control" name="observaciones"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="respuesta_egresado">RESPUESTA DEL EGRESADO</label>
                                    <textarea id="respuesta_egresado" class="form-control" name="respuesta_egresado"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="observacion_egresado">OBSERVACIÓN DEL EGRESADO</label>
                                    <textarea id="observacion_egresado" class="form-control" name="observacion_egresado"></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success" type="button" onclick="registrarEgresado(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="cargaMasivaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="titleCargaMasiva">Carga Masiva de Egresados</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmCargaMasiva" method="post">
                    <input type="file" id="fileInput" accept=".csv" required />
                    <button class="btn btn-success mt-3" type="button" onclick="cargarMasivamente();">Cargar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Instrucciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="video" width="100%" height="315" src="<?php echo base_url; ?>Assets/img/instrucciones.mp4" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    
    <div id="mejorasModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mejorasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="mejorasModalLabel">Sugerencias de Mejora</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmSugerencias" method="post">
                    <p>Aquí puedes agregar tus sugerencias o ideas para mejorar el sistema.</p>
                    <textarea class="form-control" rows="5" placeholder="Escribe tu sugerencia aquí..." required></textarea>
                    <button class="btn btn-success mt-3" type="button" onclick="enviarSugerencia();">Enviar Sugerencia</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php"; ?>



    <script>
        function toggleOtherInput() {
            const select = document.getElementById('estatus');
            const otherInput = document.getElementById('other_estatus');
            if (select.value === 'otro') {
                otherInput.style.display = 'block';
            } else {
                otherInput.style.display = 'none';
                otherInput.value = '';
            }
        }


        function abrirCargaMasiva() {
    $('#cargaMasivaModal').modal('show');
}

    </script>
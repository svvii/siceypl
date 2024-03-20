<?php include "Views/Templates/header.php"; ?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Registro de Estudiantes</li>
</ol>
<button class="btn btn-secondary mb-2" type="button" onclick="frmEstudiantes();"><i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblESTUDIANTES">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Nombre Estudiante</th>
            <th>Matricula</th>
            <th>Carrera</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Observaciones</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="nuevo_estudiante" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="title">Nuevo Estudiante</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmEstudiantes">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Ingrese su nombre:">
                    </div>
                    <div class="form-group">
                        <label for="matricula">Matricula</label>
                        <input id="matricula" class="form-control" type="text" name="matricula" placeholder="Ingrese la matrícula del alumno:">
                    </div>
                    <div class="form-group">
                        <label for="carrera">Carrera</label>
                        <select id="carrera" class="form-control" name="carrera">
                            <option value="" disabled selected>Seleccione</option>
                            <?php foreach ($data['carreras_e'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo" style="color: blue; font-weight: bold;">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Observaciones</label>
                        <textarea class="form-control" name="direccion" id="direccion" placeholder="" rows="3"></textarea>
                    </div>
                    <button class="btn btn-success" type="button" onclick="registrarEstudiante(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>
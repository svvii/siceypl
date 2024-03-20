<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Prestamos</li>
</ol>
<button class="btn btn-secondary mb-2" type="button" onclick="frmPrestamos();"><i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblPrestamos">
    <thead class="thead-dark">
            <tr>
            <th>Id</th>
            <th>Lector</th>
            <th>Fecha Prestamo</th>
            <th>Fecha Devolucion</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="nuevo_prestamos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="title">Nuevo Prestamo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmPrestamos">
                    <div class="form-group">
                    <div class="form-group">
                        <label for="id_lector">Lector</label>
                        <select id="id_lector" class="form-control" name="id_lector">
                            <?php foreach ($data ['lectores'] as $row ) { ?>
                            <option value="<?php echo $row ['id'];?>"><?php echo $row ['nombre'];?></option>
                            <?php }?>
                        </select>
                    </div>
                        <label for="fecha_prestamo">Fecha Prestamo</label>
                        <input type="hidden" id="id" name="id"> 
                        <input id="fecha_prestamo" class="form-control" type="date" name="fecha_prestamo" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="fecha_devolucion">Fecha Devolucion</label>
                        <input id="fecha_devolucion" class="form-control" type="date" name="fecha_devolucion" placeholder="Nombre del Usuario">
                    </div> 
                <button class="btn btn-success" type="button" onclick="registrarPRESTAMO(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancelar</button>
            </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>
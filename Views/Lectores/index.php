<?php include "Views/Templates/header.php";?>

<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Lectores</li>
</ol>
<button class="btn btn-secondary mb-2" type="button" onclick="frmLector();"><i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblLectores">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Dni</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="nuevo_Lector" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="title">Nuevo Lector</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmLector">
                    <div class="form-group">
                        <label for="dni">Dni</label>
                        <input type="hidden" id="id" name="id"> 
                        <input id="dni" class="form-control" type="text" name="dni" placeholder="Documento de identidad">
                    </div>
                
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del lector">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                      <label for="direccion">Direccion</label>
                      <textarea class="form-control" name="direccion" id="direccion" placeholder="Direccion" rows="3"></textarea>
                    </div>
                <button class="btn btn-success" type="button" onclick="registrarLec(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancelar</button>
            </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>


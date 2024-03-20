<?php include "Views/Templates/header.php";?>

<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Carreras</li>
</ol>
<button class="btn btn-secondary mb-2" type="button" onclick="frmCarreraa();"><i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblCarrerass">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Nombre de la Carrera</th>
            <th>Abreviatura</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="nuevo_carreraa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="title">Nuevo Carrera</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmCarreraa">
                    <div class="form-group">
                        <label for="nombre">nombre</label>
                        <input type="hidden" id="id" name="id"> 
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="nombre">
                    </div>
                
                    <div class="form-group">
                        <label for="abreviatura">abreviatura</label>
                        <input id="abreviatura" class="form-control" type="text" name="abreviatura" placeholder="Nombre del Usuario">
                    </div>
                <button class="btn btn-success" type="button" onclick="registrarCarr(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancelar</button>
            </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>
<?php include "Views/Templates/header.php";?>

<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Generaciones</li>
</ol>
<button class="btn btn-secondary mb-2" type="button" onclick="frmGeneracion();"><i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblGeneraciones">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Inicio de la Generacion</th>
            <th>Final de la Generacion</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="nuevo_generacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="title">Nueva Generacion</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmGeneracion">
                    <div class="form-group">
                        <label for="inicio">inicio</label>
                        <input type="hidden" id="id" name="id"> 
                        <input id="inicio" class="form-control" type="text" name="inicio" placeholder="inicio">
                    </div>
                
                    <div class="form-group">
                        <label for="final">final</label>
                        <input id="final" class="form-control" type="text" name="final" placeholder="inicio del Usuario">
                    </div>
                <button class="btn btn-success" type="button" onclick="registrarGENE(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancelar</button>
            </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>
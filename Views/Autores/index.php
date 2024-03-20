<?php include "Views/Templates/header.php";?>

<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Autores</li>
</ol>
<button class="btn btn-secondary mb-2" type="button" onclick="frmAutores();"><i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblAutores">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Nombre Completo del Autor</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="nuevo_autor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="title">Nuevo Autor</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmAutores">
                <input id="id" name="id" class="form-control" type="hidden" placeholder="id">
                    <div class="form-group">
                        <label for="nombre">Nombre Completo</label>
                        <input id="nombre" class="form-control" type="text" name="nombre">
                    </div>
                <button class="btn btn-success" type="button" onclick="registrarautor(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancelar</button>
            </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>
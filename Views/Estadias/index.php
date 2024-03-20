<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Estadias</li>
</ol>
<button class="btn btn-secondary mb-2" type="button" onclick="frmestadia();"><i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblEstadias">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Matricula</th>
            <th>Titulo</th>
            <th>Codigo</th>
            <th>Estante</th>
            <th>Color</th>
            <th>Carrera</th>
            <th>Generacion</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="nuevo_estadia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="title">Nueva Estadia</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmestadia">
                <input id="id" class="form-control" type="hidden" placeholder="id">
                <div class="row">
                    <div class="col md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                    </div>
                    </div>
                    <div class="col md-6">
                    <div class="form-group">
                        <label for="matricula">Matricula</label>
                        <input id="matricula" class="form-control" type="text" name="matricula" placeholder="Matricula">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col md-6">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input id="titulo" class="form-control" type="text" name="titulo" placeholder="Titulo">
                    </div>
                    </div>
                    <div class="col md-6">
                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Codigo">
                        </div>
                    </div>
                </div>
              
                    <div class="row">
                    <div class="col md-6">
                    <div class="form-group">
                        <label for="estante">Estante</label>
                        <input id="estante" class="form-control" type="text" name="estante" placeholder="Estante">
                    </div>
                    </div>
                    <div class="col md-6">
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input id="color" class="form-control" type="text" name="color" placeholder="Color">
                        </div>
                    </div>
                </div>
                    <div class="row">
                    <div class="col md-6">
                    <div class="form-group">
                        <label for="carrera">Carrera</label>
                        <input id="carrera" class="form-control" type="text" name="carrera" placeholder="Carrera">
                    </div>
                    </div>
                    <div class="col md-6">
                    <div class="form-group">
                        <label for="generacion">Generacion</label>
                        <input id="generacion" class="form-control" type="text" name="generacion" placeholder="Generacion">
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" type="button" onclick="registrarestadia(event);" id="btnAccion">Registrar</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancelar</button>
            </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>


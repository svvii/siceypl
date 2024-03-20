<?php include "Views/Templates/header.php"; ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">VISTA DE LIBROS</li>
</ol>
<button class="btn btn-secondary mb-2" type="button" onclick="frmlibrosb();"><i class="fas fa-plus"></i></button>
<table class="table table-light" id="tblLIBROB">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Biblioteca</th>
            <th>Clasificacion</th>
            <th>codigo de barras</th>
            <th>Cantidad Ejemplar</th>
            <th>Cantidad Prestamo</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="nuevo_librob" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="title">Nuevo Libro</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmlibrosb">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="biblioteca">Biblioteca</label>
                        <select id="biblioteca" class="form-control" name="biblioteca">
                            <option value="" disabled selected>Seleccione</option>
                            <option value="utp">Universidad Tecnologica de Parral</option>
                            <option value="utballeza">Unidad Academia Rio Balleza</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="clasificacion">Clasificacion:</label>
                                <input id="clasificacion" class="form-control" type="text" name="clasificacion" placeholder="Ingrese la clasificación del libro">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="codigo">Codigo de Barras:</label>
                                <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Ingrese el código de barras">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cantidadejemplar">Cantidad Ejemplar</label>
                                <input id="cantidadejemplar" class="form-control" type="number" name="cantidadejemplar" placeholder="Ingrese la cantidad de ejemplares">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cantidad">Cantidad Prestamo</label>
                                <input id="cantidad" class="form-control" type="number" name="cantidad" placeholder="Ingrese la cantidad de ejemplares disponibles">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input id="titulo" class="form-control" type="text" name="titulo" placeholder="Ingrese el título">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="autor">Autores</label>
                                <select id="autor" class="form-control select_autor" name="autor" style="width: 100;">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editorial">Editoriales</label>
                                <select id="editorial" class="form-control select_editorial" name="editorial">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="observaciones">Observaciones:</label>
                                <textarea class="form-control" name="observaciones" id="observaciones" placeholder="Ingresa tus observaciones aqui" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-success" type="button" onclick="registrarLIBROB(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>
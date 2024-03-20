<?php include "Views/Templates/header.php";?>

<div class="card">
    <div class="card-header bg-dark text-white">
        Datos de la Universidad
    </div>
    <div class="card-body">
        <form id="frmEmpresa">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
              <input id="id" class="form-control" type="hidden" name="id" value=" <?php echo $data ['id']?>">
              <label for="nombre">Nombre</label>
              <input id="nombre" class="form-control" type="text" name="nombre" placeholder="nombre" value=" <?php echo $data ['nombre']?>">
            </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="telefono">Telefono</label>
              <input id="telefono" class="form-control" type="text" name="telefono" placeholder="telefono" value=" <?php echo $data ['telefono']?>">
            </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="direccion">Direccion</label>
              <input id="direccion" class="form-control" type="text" name="direccion" placeholder="direccion" value=" <?php echo $data ['direccion']?>">
            </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
             <label for="mensaje">Mensaje</label>
             <textarea class="form-control" name="mensaje" id="mensaje" placeholder="Mensaje" rows="3"><?php echo $data ['mensaje']?></textarea>
           </div>
        </div>
    </div>
        <button class="btn btn-success"type ="button" onclick= "Modificarempresa()">Modificar</button>
        </form>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>
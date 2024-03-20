<?php include "Views/Templates/header.php";?>

<div class="col-md-10 mx-auto">
    <div class="card">
    <div class="card-header text-center bg-success text-white">
        Asignar Permisos
    </div>
    <div class="card-body">
        <form id="formulario" onsubmit="registrarpermisos(event)">
            <div class="row">
                <?php foreach ($data ['datos'] as $row) { ?>
                    <div class="col-md-4 text-center text-capitalize p-3">
                    <label for=""><?php echo $row ['permiso'];?></label>
            <div class="checkbox-wrapper-55">
                <label class="rocker rocker-small">
                    <input type="checkbox" name="permisos[]" value="<?php echo $row ['id']; ?>" <?php echo isset($data ['asignados'][$row ['id']]) ? 'checked' : '' ; ?>>
                    <span class="switch-left">SI</span>
                    <span class="switch-right">NO</span>
                </label>
                </div>
                    </div>
                <?php } ?>
                <input type="hidden" value = "<?php echo $data['id_usuario']; ?>" name="id_usuario">
            </div>
            <div class="d-grid gap-2"> 
                <button type="submit" class="btn btn-outline-success">Asignar permisos </button>
            <a class="btn btn-outline-danger" href="<?php echo base_url; ?>Usuarios">Cancelar</a>
            </div>
        </form>
    </div>
    </div>
</div>

<?php include "Views/Templates/footer.php";?>








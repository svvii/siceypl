</div>
</main>
<footer class="py-1" style="background: linear-gradient(to right, rgba(255, 255, 0, 0.7), rgba(255, 255, 0, 0.8), rgba(255, 255, 0, 0.9), rgba(255, 255, 0, 0.8)); text-align: center;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"></div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="d-flex justify-content-around align-items-center">
                    <img src="../../../estadias/Assets/img/logos/chihuahua.png" alt="Imagen 1" class="img-fluid rounded-circle" width="70">
                    <a href="http://www.utparral.edu.mx" target="_blank" class="text-decoration-none">
                        <img src="../../../estadias/Assets/img/logos/utyp_nuevo.png" alt="Imagen 2" class="img-fluid" width="70">
                    </a>
                    <img src="../../../estadias/Assets/img/logos/SEP.png" alt="Imagen 3" class="img-fluid" width="70">
                </div>
                <div class="text-center mt-1">
                    <p class="small font-weight-bold mb-0" style="font-size: 0.7rem; white-space: nowrap;">®Sistema Integral para el Control de Estadias y Prestamos de Libros 2024</p>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>
</div>
<div id="cambiarpass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Modificar Contraseña</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmCambiarPass" onsubmit="frmCambiarPass(event);">
                    <div class="form-group">
                        <label for="clave_actual">Contraseña Actual</label>
                        <input id="clave_actual" class="form-control" type="password" name="clave_actual" placeholder="Contraseña Actual">
                    </div>
                    <div class="form-group">
                        <label for="clave_nueva">Contraseña Nueva</label>
                        <input id="clave_nueva" class="form-control" type="password" name="clave_nueva" placeholder="Nueva Contraseña">
                    </div>

                    <div class="form-group">
                        <label for="confirmar_clave">Confirmar Contraseña Nueva</label>
                        <input id="confirmar_clave" class="form-control" type="password" name="confirmar_clave" placeholder="Confirmar Contraseña">
                    </div>
                    <button type="submit" class="btn btn-secondary btn-lg">Modificar</button>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url; ?>Assets/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
<script src="<?php echo base_url; ?>Assets/DataTables/datatables.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url; ?>Assets/demo/datatables-demo.js"></script>
<script>
    const base_url = "<?php echo base_url; ?>";
</script>
<script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/Chart.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
</body>

</html>
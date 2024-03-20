<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Iniciar Sesion</title>
        <link rel = "icon" href="http://utparral.edu.mx/logotipos/UTP.png">
        <link href="<?php echo base_url;?>Assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url;?>Assets/css/login.css" rel="stylesheet" />
        <script src="<?php echo base_url;?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary" style="background: url('Assets/img/FONDO.jpeg') ;background-size:cover;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header bg-light">
                                        <h3 class="text-center font-weight-light my-4">Iniciar Sesion</h3></div>
                                    <div class="card-body">
                                        <form id="frmlogin">
                                            <div class="form-group">
                                                <label class="small mb-1" for="usuario" ><i class="fas fa-user mr-2"></i>Usuario</label>
                                                <input class="form-control py-4" id="usuario" name="usuario" type="text" placeholder="Ingrese Usuario" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="clave"><i class="fas fa-key mr-2"></i>Contraseña</label>
                                                <input class="form-control py-4" id="clave" name="clave" type="password" placeholder="Ingrese Contraseña" />
                                            </div>
                                            <div class="alert alert-danger text-center d-none" id ="alerta" role="alert">
                                                
                                            </div>
                                          <button class="btn btn-success" type="submit" onclick="frmlogin(event);">Iniciar Sesion</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        <script src="<?php echo base_url;?>Assets/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url;?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url;?>Assets/js/scripts.js"></script>
        <script>
        const base_url = "<?php echo base_url; ?>"
        
        </script>
        <script src="<?php echo base_url;?>Assets/js/login.js"></script>
    </body>
</html>


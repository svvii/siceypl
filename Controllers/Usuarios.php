<?php
class Usuarios extends Controller{
    public function __construct(){
        session_start();
        
        parent::__construct();
    }
    public function index()
    {
        $id_user = $_SESSION ['id_usuario'];
        $verificar = $this->model->verficarpermiso($id_user,'lectores');
        if (empty( $_SESSION['activo'] )) {
            header("location:" .base_url);
        }
        $data ['cajas'] = $this->model->getCajas();
        if (!empty($verificar)|| $id_user == 1) { 
            $this->views->getViews($this,"index", $data) ;
        } else {
            header('Location:' .base_url. 'Errors/permisos');
        } 
    }
    public function listar()
    {
        $data = $this->model-> getUsuarios();
        for ($i=0; $i <count($data); $i++) { 
            if ($data[$i]['estado'] ==1) {
                $data[$i]['estado'] ='<span class="badge badge-success">Activo</span>';
               if ($data[$i]['id'] ==1) {
                $data[$i]['acciones'] = '<div>
                <span class="badge badge-success">Administrador</span>
                </div>';
               }else {
                $data[$i]['acciones'] = '<div>
                <a class="btn btn-dark" href="'.base_url.'Usuarios/permisos/'.$data[$i]['id'].'"><i class = "fas fa-key"></i></a>
                <button class="btn btn-primary" type="button" onclick="btnEditarUser('.$data[$i]['id'].');"><i class = "fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button"  onclick="btnEliminarUser('.$data[$i]['id'].');"><i class = "fas fa-trash-alt"></i></button>
               </div>';
               }
            }else{
            $data[$i]['estado'] ='<span class="badge badge-danger">Inactivo</span>';
            $data[$i]['acciones'] = '<div>
           <button class="btn btn-success" type="button"  onclick="btnReingresarUser('.$data[$i]['id'].');"><i class = "fas fa-circle"></i></button>
            </div>';
        }
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function validar()
    {
        if(empty($_POST['usuario']) || empty($_POST['clave'])) {
            $msg = "Los campos estan vacios"; 
        }else{
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $hash = hash("SHA256",$clave);
            $data = $this->model->getUsuario($usuario, $hash);
            if ($data) {
                $_SESSION['id_usuario'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['activo'] = true;
                $msg = "ok";
            }else{
                $msg = "Usuario o Contraseña Incorrecta";
            }
        }
        echo json_encode($msg,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $confirmar = $_POST['confirmar'];
        $caja = $_POST['caja'];
        $id = $_POST['id'];
        $hash = hash("SHA256", $clave);
        if(empty($usuario) || empty($nombre)  || empty($caja)){
            $msg = "todos los campos son obligatorios";
        }else{
            if ($id == "") {
                if($clave != $confirmar){
                    $msg = "las contraseñas no coinciden";
                }else{
            $data = $this->model->registrarUsuario($usuario,$nombre,$hash,$caja);
            if ($data =="ok") {
                $msg = "si";
            }else if($data == "existe"){
                $msg = "El usuario ya existe";
            }else{
                $msg = "Error al registrar el usuario";
            }
        }
            }else{
                $data = $this->model->modificarUsuario($usuario,$nombre,$caja,$id);
                if ($data =="Modificado") {
                    $msg = "Modificado";
                }else{
                    $msg = "Error al Modificado el usuario";
                }

            }

        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function editar(int $id)
    {
        $data = $this->model->editarUser($id);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
       $data = $this->model->accionUser(0,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al eliminar el usuario";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    public function reingresar(int $id)
    {
       $data = $this->model->accionUser(1,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al reingresar el usuario";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
   public function CambiarPass()
   {
        $actual = $_POST['clave_actual'];
        $nueva = $_POST['clave_nueva'];
        $confirmar = $_POST['confirmar_clave'];
        if (empty($actual)  || empty($nueva) || empty($confirmar)) {
            $mensaje = array('msg' => 'todo los campos son obligatorios','icono' =>'warning');
        }else {
            if ($nueva !=$confirmar) {
            $mensaje = array('msg' => 'las contraseñas no coiciden','icono' =>'warning');
            }else {
                $id = $_SESSION['id_usuario'];
                $hash = hash("SHA256",$actual);
                $data = $this->model->getPass($hash,$id);
                if (!empty($data)){
                   $verificar = $this->model->modificarPass(hash("SHA256",$nueva), $id);
                    if ($verificar ==1) {
                        $mensaje = array('msg' => 'Contraseña Modificada Con Exito','icono' =>'success');
                    }else {
                        $mensaje = array('msg' => 'error al modificar la contraseña','icono' =>'error');
                    }
                }else {
                        $mensaje = array('msg' => 'Contraseña Actual Incorrecta','icono' =>'warning');
                }
            }

        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
   }

   public function permisos($id)
    {
        if (empty( $_SESSION['activo'] )) {
            header("location:" .base_url);
        }
       $data ['datos'] = $this->model->getpermisos();
       $permisos = $this->model->getdetallepermisos($id);
       $data ['asignados'] = array();
       foreach ($permisos as $permiso) {
            $data ['asignados'][$permiso['id_permiso']] = true;
        }
       $data ['id_usuario'] = $id;
       $this->views->getViews($this,"permisos", $data);
    }

    public function registrarpermiso() 
    {
        $msg = '';
       $id_user = $_POST ['id_usuario'];
       $eliminar = $this->model->eliminarpermisos($id_user);
       if ($eliminar == 'ok') {
        foreach ($_POST['permisos'] as $id_permiso) {
           $msg = $this->model->registrarpermisos($id_user,$id_permiso);
        }
        if ($msg == 'ok') {
            $msg = array('msg' => 'Permisos Asignados','icono'=>'success' );
        } else {
            $msg = array('msg' => 'Error al Asignar los Permisos','icono'=>'error' );
        }
        
       } else {
        $msg = array('msg' => 'Error al elimiar los permisos anteriores','icono'=>'error' ); 
     }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);    
    }
    public function salir()
    {
        session_destroy();
        header("location:" .base_url);
    }
    }
?>

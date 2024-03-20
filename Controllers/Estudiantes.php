<?php
class Estudiantes extends Controller{
    public function __construct(){
        session_start();
        if (empty( $_SESSION['activo'] )) {
            header("location:" .base_url);
        }
        parent::__construct();
    }
    public function index()
    {
        $id_user = $_SESSION['id_usuario'];
        $verificar = $this->model->verficarpermiso($id_user, 'lectores');
        $data['carreras_e'] = $this->model->getCarreras();
    
        if (!empty($verificar) || $id_user == 1) { 
            $this->views->getViews($this, "index", $data); 
        } else {
            header('Location:' . base_url . 'Errors/permisos');
        }
    }
    
    public function listar()
    {
        $data = $this->model->getEstudiantes();
        for ($i=0; $i <count($data); $i++) { 
            if ($data[$i]['estado'] ==1) {
                $data[$i]['estado'] ='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarESTUDIANTE('.$data[$i]['id'].');"><i class = "fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button"  onclick="btnEliminarESTUDIANTE('.$data[$i]['id'].');"><i class = "fas fa-trash-alt"></i></button>
               </div>';
            }else{
            $data[$i]['estado'] ='<span class="badge badge-danger">Inactivo</span>';
            $data[$i]['acciones'] = '<div>
           
            <button class="btn btn-success" type="button"  onclick="btnReingresarESTUDIANTE('.$data[$i]['id'].');"><i class = "fas fa-circle"></i></button>
            </div>';
        }
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function registrar()
    {
        $nombre = $_POST['nombre'];
        $matricula = $_POST['matricula'];
        $carrera = $_POST['carrera'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $id = $_POST['id'];
        if(empty($nombre) || empty($matricula) || empty($carrera) || empty($correo) || empty($telefono) || empty($direccion)){
            $msg = "todos los campos son obligatorios";
        }else{
            if ($id == "") {
            $data = $this->model->registrarEstudiantes($nombre,$matricula,$carrera,$correo,$telefono,$direccion);
            if ($data =="ok") {
                $msg = "si";
            }else if($data == "existe"){
                $msg = "El estudiante ya existe";
            }else{
                $msg = "Error al registrar el estudiante";
            }
        
            }else{
                $data = $this->model->modificarEstudiante($nombre,$matricula,$carrera,$correo,$telefono,$direccion,$id);
                if ($data =="Modificado") {
                    $msg = "Modificado";
                }else{
                    $msg = "Error al Modificado el estudiante";
                }

            }

        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function editar(int $id)
    {
        $data = $this->model->editarEstudiante($id);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
       $data = $this->model->accionEstudiantes(0,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al eliminar el estudiante";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    public function reingresar(int $id)
    {
       $data = $this->model->accionEstudiantes(1,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al reingresar el estudiante";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    public function select_estudiantes()
    {
        if (isset($_GET['estudiante'])) {
            $valor = $_GET['estudiante'];
            $data = $this->model->buscarestu($valor);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    }


?>
<?php
class Lectores extends Controller{
    public function __construct(){
        session_start();
        if (empty( $_SESSION['activo'] )) {
            header("location:" .base_url);
        }
        parent::__construct();
    }
    public function index()
    {
        $id_user = $_SESSION ['id_usuario'];
        $verificar = $this->model->verficarpermiso($id_user,'lectores');
        if (!empty($verificar)|| $id_user == 1) { 
            $this->views->getViews($this,"index") ;
        } else {
            header('Location:' .base_url. 'Errors/permisos');
        }
    }
    public function listar()
    {
        $data = $this->model-> getLectores();
        for ($i=0; $i <count($data); $i++) { 
            if ($data[$i]['estado'] ==1) {
                $data[$i]['estado'] ='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarLE('.$data[$i]['id'].');"><i class = "fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button"  onclick="btnEliminarLE('.$data[$i]['id'].');"><i class = "fas fa-trash-alt"></i></button>
               </div>';
            }else{
            $data[$i]['estado'] ='<span class="badge badge-danger">Inactivo</span>';
            $data[$i]['acciones'] = '<div>
           
            <button class="btn btn-success" type="button"  onclick="btnReingresarLE('.$data[$i]['id'].');"><i class = "fas fa-circle"></i></button>
            </div>';
        }
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function registrar()
    {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $id = $_POST['id'];
        if(empty($dni) || empty($nombre) || empty($telefono) || empty($direccion)){
            $msg = "todos los campos son obligatorios";
        }else{
            if ($id == "") {
            $data = $this->model->registrarLector($dni,$nombre,$telefono,$direccion);
            if ($data =="ok") {
                $msg = "si";
            }else if($data == "existe"){
                $msg = "El lector ya existe";
            }else{
                $msg = "Error al registrar el lector";
            }
        
            }else{
                $data = $this->model->modificarLector($dni,$nombre,$telefono,$direccion,$id);
                if ($data =="Modificado") {
                    $msg = "Modificado";
                }else{
                    $msg = "Error al Modificado el lector";
                }

            }

        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function editar(int $id)
    {
        $data = $this->model->editarLE($id);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
       $data = $this->model->accionLE(0,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al eliminar el lector";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    public function reingresar(int $id)
    {
       $data = $this->model->accionLE(1,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al reingresar el lector";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    }


?>
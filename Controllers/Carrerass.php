<?php
class Carrerass extends Controller{
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
        $verificar = $this->model->verficarpermiso($id_user,'carreras');
        if (!empty($verificar)|| $id_user == 1) { 
            $this->views->getViews($this,"index") ;
        } else {
            header('Location:' .base_url. 'Errors/permisos');
        }
    }
    public function listar()
    {
        $data = $this->model-> getCarrerass();
        for ($i=0; $i <count($data); $i++) { 
            if ($data[$i]['estado'] ==1) {
                $data[$i]['estado'] ='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarcarr('.$data[$i]['id'].');"><i class = "fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button"  onclick="btnEliminarcarr('.$data[$i]['id'].');"><i class = "fas fa-trash-alt"></i></button>
               </div>';
            }else{
            $data[$i]['estado'] ='<span class="badge badge-danger">Inactivo</span>';
            $data[$i]['acciones'] = '<div>
           <button class="btn btn-success" type="button"  onclick="btnReingresarcarr('.$data[$i]['id'].');"><i class = "fas fa-circle"></i></button>
            </div>';
        }
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function registrar()
    {
        $nombre = $_POST['nombre'];
        $abreviatura = $_POST['abreviatura'];
        $id = $_POST['id'];
        if(empty($nombre) || empty($abreviatura)){
            $msg = "todos los campos son obligatorios";
        }else{
            if ($id == "") {
            $data = $this->model->registrarCarreraa($nombre,$abreviatura);
            if ($data =="ok") {
                $msg = "si";
            }else if($data == "existe"){
                $msg = "La carrera ya existe";
            }else{
                $msg = "Error al registrar el carrera";
            }
            }else{
                $data = $this->model->modificarCarreraa($nombre,$abreviatura,$id);
                if ($data =="Modificado") {
                    $msg = "Modificado";
                }else{
                    $msg = "Error al Modificado la carrera";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function editar(int $id)
    {
        $data = $this->model->editarCarr($id);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
       $data = $this->model->accionCarr(0,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al eliminar la carrera";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    public function reingresar(int $id)
    {
       $data = $this->model->accionCarr(1,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al reingresar la carrera";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    }
?>
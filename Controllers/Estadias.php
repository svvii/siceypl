<?php
class Estadias extends Controller{
    public function __construct(){
        session_start();
        if (empty( $_SESSION['activo'] )) {
            header("location:" .base_url);
        }
        parent::__construct();
    }
    public function index()
    {
       $this->views->getViews($this,"index") ;

    }
    public function listar()
    {
        $data = $this->model-> getEstadias();
        for ($i=0; $i <count($data); $i++) { 
            if ($data[$i]['estado'] ==1) {
                $data[$i]['estado'] ='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarES('.$data[$i]['id'].');"><i class = "fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button"  onclick="btnEliminarES('.$data[$i]['id'].');"><i class = "fas fa-trash-alt"></i></button>
                </div>';
            }else{
            $data[$i]['estado'] ='<span class="badge badge-danger">Inactivo</span>';
            $data[$i]['acciones'] = '<div>
           
            <button class="btn btn-success" type="button"  onclick="btnReingresarES('.$data[$i]['id'].');"><i class = "fas fa-circle"></i></button>
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
        $titulo = $_POST['titulo'];
        $codigo = $_POST['codigo'];
        $estante = $_POST['estante'];
        $color = $_POST['color'];
        $carrera = $_POST['carrera'];
        $generacion = $_POST['generacion'];
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
        } else {
            $id = '';
        }
        
        if(empty($nombre) || empty($matricula) || empty($titulo) || empty($codigo) || empty($estante) || empty($color) || empty($carrera) || empty($generacion)){
            $msg = "todos los campos son obligatorios";
        }else{
            if ($id == "") {
            $data = $this->model->registrarEstadia($nombre,$matricula,$titulo,$codigo,$estante,$color,$carrera,$generacion);
            if ($data =="ok") {
                $msg = "si";
            }else if($data == "existe"){
                $msg = "El lector ya existe";
            }else{
                $msg = "Error al registrar el lector";
            }
        
            }else{
                $data = $this->model->modificarEstadia($nombre,$matricula,$titulo,$codigo,$estante,$color,$carrera,$generacion,$id);
                if ($data =="Modificado") {
                    $msg = "Modificado";
                }else{
                    $msg = "Error al Modificado estadia";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function editar(int $id)
    {
        $data = $this->model->editarES($id);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
       $data = $this->model->accionES(0,$id);
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
       $data = $this->model->accionES(1,$id);
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
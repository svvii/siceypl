<?php
class Carreras extends Controller{
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
        $data = $this->model-> getCarreras();
        for ($i=0; $i <count($data); $i++) { 
            if ($data[$i]['estado'] ==1) {
                $data[$i]['estado'] ='<span class="badge badge-success">Activo</span>';
            }else{
                $data[$i]['estado'] ='<span class="badge badge-danger">Inactivo</span>';
            }
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary" type="button" onclick="btnEditarCa('.$data[$i]['id'].');"><i class = "fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button"  onclick="btnEliminarCa('.$data[$i]['id'].');"><i class = "fas fa-trash-alt"></i></button>
            <button class="btn btn-success" type="button"  onclick="btnReingresarCa('.$data[$i]['id'].');"><i class = "fas fa-circle"></i></button>
            </div>';

        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $nombre = $_POST['nombre'];
        $abreviatura = $_POST['abreviatura'];;
        $id = $_POST['id'];
        if(empty($nombre)  || empty($abreviatura)){
            $msg = "Todos los campos son obligatorios";
        }else{
            if ($id == "") {
            $data = $this->model->registrarCarrera($nombre,$abreviatura);
            if ($data =="ok") {
                $msg = "si";
            }else if($data == "existe"){
                $msg = "La Carrera ya existe";
            }else{
                $msg = "Error al registrar carrera";
            }

            }else{
                $data = $this->model->modificarCarrera($nombre,$abreviatura,$id);
                if ($data =="Modificado") {
                    $msg = "Modificado";
                }else{
                    $msg = "Error al Modificado carrera";
                }

            }

        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function editar(int $id)
    {
        $data = $this->model->editarCa($id);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
       $data = $this->model->accionCa(0,$id);
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
       $data = $this->model->accionCa(1,$id);
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
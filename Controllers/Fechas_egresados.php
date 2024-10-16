<?php
class Fechas_egresados extends Controller{
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
        $verificar = $this->model->verficarpermiso($id_user,'Roles');
        if (!empty($verificar)|| $id_user == 1) { 
            $this->views->getViews($this,"index") ;
        } else {
            header('Location:' .base_url. 'Errors/permisos');
        }
    }
    public function listar()
    {
        $data = $this->model->getfechas_egresados();
        for ($i=0; $i <count($data); $i++) { 
            if ($data[$i]['estado'] ==1) {
                $data[$i]['estado'] ='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarfechaEgresado('.$data[$i]['id'].');"><i class = "fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button"  onclick="btnEliminarfechaEgresado('.$data[$i]['id'].');"><i class = "fas fa-trash-alt"></i></button>
               </div>';
            }else{
            $data[$i]['estado'] ='<span class="badge badge-danger">Inactivo</span>';
            $data[$i]['acciones'] = '<div>
           <button class="btn btn-success" type="button"  onclick="btnReingresarFechaEgresado('.$data[$i]['id'].');"><i class = "fas fa-circle"></i></button>
            </div>';
        }
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function registrar()
    {
        $inicio = $_POST['inicio'];
        $final = $_POST['final'];
        $id = $_POST['id'];
        if(empty($inicio) || empty($final)){
            $msg = "todos los campos son obligatorios";
        }else{
            if ($id == "") {
            $data = $this->model->registrarEgresados($inicio,$final);
            if ($data =="ok") {
                $msg = "si";
            }else if($data == "existe"){
                $msg = "El registro ya existe";
            }else{
                $msg = "Error al registrar";
            }
            }else{
                $data = $this->model->modificarEgresados($inicio,$final,$id);
                if ($data =="Modificado") {
                    $msg = "Modificado";
                }else{
                    $msg = "Error al Modificar";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function editar(int $id)
    {
        $data = $this->model->editarEgresados($id);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
       $data = $this->model->accionEgresados(0,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al eliminar";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    public function reingresar(int $id)
    {
       $data = $this->model->accionEgresados(1,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al reingresar";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    }
?>
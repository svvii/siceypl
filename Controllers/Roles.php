<?php
class Roles extends Controller{
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
        $data = $this->model-> getRoles();
        for ($i=0; $i <count($data); $i++) { 
            if ($data[$i]['estado'] ==1) {
                $data[$i]['estado'] ='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarROL('.$data[$i]['id'].');"><i class = "fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button"  onclick="btnEliminarROL('.$data[$i]['id'].');"><i class = "fas fa-trash-alt"></i></button>
               </div>';
            }else{
            $data[$i]['estado'] ='<span class="badge badge-danger">Inactivo</span>';
            $data[$i]['acciones'] = '<div>
           <button class="btn btn-success" type="button"  onclick="btnReingresarROL('.$data[$i]['id'].');"><i class = "fas fa-circle"></i></button>
            </div>';
        }
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function registrar()
    {
        $caja = $_POST['caja'];
        $id = $_POST['id'];
        if(empty($caja)){
            $msg = "todos los campos son obligatorios";
        }else{
            if ($id == "") {
            $data = $this->model->registrarRol($caja);
            if ($data =="ok") {
                $msg = "si";
            }else if($data == "existe"){
                $msg = "el rol ya existe";
            }else{
                $msg = "Error al registrar rol";
            }
            }else{
                $data = $this->model->modificarROL($caja,$id);
                if ($data =="Modificado") {
                    $msg = "Modificado";
                }else{
                    $msg = "Error al Modificado el rol";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function editar(int $id)
    {
        $data = $this->model->editarROL($id);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
       $data = $this->model->accionROL(0,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al eliminar ROL";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    public function reingresar(int $id)
    {
       $data = $this->model->accionROL(1,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al reingresar ROL";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    }
?>
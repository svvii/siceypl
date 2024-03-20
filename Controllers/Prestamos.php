<?php
class Prestamos extends Controller{
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
        $verificar = $this->model->verficarpermiso($id_user,'prestamos');
        $data ['lectores'] = $this->model->getLectores();
        if (!empty($verificar)|| $id_user == 1) { 
            $this->views->getViews($this,"index",$data) ;
        } else {
            header('Location:' .base_url. 'Errors/permisos');
        }
      
    }
    public function listar()
    {
        $data = $this->model-> getPrestamos();
        for ($i=0; $i <count($data); $i++) { 
            if ($data[$i]['estado'] ==1) {
                $data[$i]['estado'] ='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarPresta('.$data[$i]['id'].');"><i class = "fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button"  onclick="btnEliminarPresta('.$data[$i]['id'].');"><i class = "fas fa-trash-alt"></i></button>
               </div>';
            }else{
            $data[$i]['estado'] ='<span class="badge badge-danger">Inactivo</span>';
            $data[$i]['acciones'] = '<div>
           <button class="btn btn-success" type="button"  onclick="btnReingresarPresta('.$data[$i]['id'].');"><i class = "fas fa-circle"></i></button>
            </div>';
        }
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $id_lector = $_POST['id_lector'];
        $fecha_prestamo = $_POST['fecha_prestamo'];
        $fecha_devolucion = $_POST['fecha_devolucion'];
        $id = $_POST['id'];
        if(empty($id_lector) || empty($fecha_prestamo)  || empty($fecha_devolucion)){
            $msg = "todos los campos son obligatorios";
        }else{
            if ($id == "") {
            $data = $this->model->registrarPrestamo($id_lector,$fecha_prestamo,$fecha_devolucion);
            if ($data =="ok") {
                $msg = "si";
            }else if($data == "existe"){
                $msg = "El Prestamo ya existe";
            }else{
                $msg = "Error al registrar el Prestamo";
            }

            }else{
                $data = $this->model->modificarPrestamo($id_lector,$fecha_prestamo,$fecha_devolucion,$id);
                if ($data =="Modificado") {
                    $msg = "Modificado";
                }else{
                    $msg = "Error al Modificado el Prestamo";
                }

            }

        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function editar(int $id)
    {
        $data = $this->model->editarpresta($id);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
       $data = $this->model->accionpresta(0,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al eliminar el Prestamo";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    public function reingresar(int $id)
    {
       $data = $this->model->accionpresta(1,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al reingresar el Prestamo";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    }
?>

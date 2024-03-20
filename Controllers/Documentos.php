<?php
class Documentos extends Controller{
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
        $verificar = $this->model->verficarpermiso($id_user,'documentos');
        $data ['generaciones'] = $this->model->getGeneraciones();
        $data ['carreras'] = $this->model->getCarreras();
        if (!empty($verificar)|| $id_user == 1) { 
            $this->views->getViews($this,"index",$data) ;
        } else {
            header('Location:' .base_url. 'Errors/permisos');
        }
      
    }
    public function listar()
    {
        $data = $this->model-> getDocumentos();
        for ($i=0; $i <count($data); $i++) { 
            if ($data[$i]['estado'] ==1) {
                $data[$i]['estado'] ='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditardoc('.$data[$i]['id'].');"><i class = "fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button"  onclick="btnEliminardoc('.$data[$i]['id'].');"><i class = "fas fa-trash-alt"></i></button>
               </div>';
            }else{
            $data[$i]['estado'] ='<span class="badge badge-danger">Inactivo</span>';
            $data[$i]['acciones'] = '<div>
           <button class="btn btn-success" type="button"  onclick="btnReingresardoc('.$data[$i]['id'].');"><i class = "fas fa-circle"></i></button>
            </div>';
        }
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        
        $color_estante = $_POST['color_estante'];
        $id_generacion  = $_POST['id_generacion'];
        $matricula = $_POST['matricula'];
        $apellido_p = $_POST['apellido_p'];
        $apellido_m = $_POST['apellido_m'];
        $nombre = $_POST['nombre'];
        $id_carrera = $_POST['id_carrera'];
        $codigo_estadia = $_POST['codigo_estadia'];
        $nombre_proyecto = $_POST['nombre_proyecto'];
        $fecha_documento = $_POST['fecha_documento'];
        $nombre_empresa = $_POST['nombre_empresa'];
        $tutor_academico = $_POST['tutor_academico'];
        $asesor_academico = $_POST['asesor_academico'];
        $asesor_empresarial = $_POST['asesor_empresarial'];
        $observaciones = $_POST['observaciones'];
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
        } else {
            $id = '';
        }
        if (empty($color_estante) || empty($id_generacion) || empty($matricula) || empty($apellido_p) || empty($apellido_m) || empty($nombre) || empty($id_carrera) || empty($codigo_estadia) || empty($nombre_proyecto) || empty($fecha_documento) || empty($nombre_empresa) || empty($tutor_academico) || empty($asesor_academico) || empty($asesor_empresarial) || empty($observaciones)) {
            $msg = "todos los campos son obligatorios";
        }else{
            if ($id == "") {
                $data = $this->model->registrarDocumento($color_estante,$id_generacion, $matricula, $apellido_p, $apellido_m, $nombre, $id_carrera, $codigo_estadia, $nombre_proyecto, $fecha_documento, $nombre_empresa, $tutor_academico, $asesor_academico, $asesor_empresarial, $observaciones);
            if ($data =="ok") {
                $msg = "si";
            }else if($data == "existe"){
                $msg = "El lector ya existe";
            }else{
                $msg = "Error al registrar el lector";
            }
        
            }else{
                $data = $this->model->modificarDocumento($color_estante,$id_generacion, $matricula, $apellido_p, $apellido_m, $nombre, $id_carrera, $codigo_estadia, $nombre_proyecto, $fecha_documento, $nombre_empresa, $tutor_academico, $asesor_academico, $asesor_empresarial, $observaciones,$id);
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
        $data = $this->model->editardoc($id);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
       $data = $this->model->acciondoc(0,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al eliminar la estadia";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    public function reingresar(int $id)
    {
       $data = $this->model->acciondoc(1,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al reingresar la estadia";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    }
?>

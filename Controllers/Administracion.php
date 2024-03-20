<?php

class Administracion extends Controller{
    public function __construct()
    {
    session_start();
    if (empty( $_SESSION['activo'] )) {
        header("location:" .base_url);
        }
        parent::__construct();
    }
    public function index()
    {
        $id_user = $_SESSION ['id_usuario'];
        $verificar = $this->model->verficarpermiso($id_user,'configuracion');
        if (!empty($verificar)  || $id_user == 1) {
            $data = $this->model->getEmpresa();
            $this->views->getViews($this,"index", $data) ;
        } else {
            header('Location:' .base_url. 'Errors/permisos');
        }
        
    }
    public function home()
    {
        $data['usuarios'] = $this->model->getDatos('usuarios');
        $data['caja']  = $this->model->getDatos('caja');
        $data['carreras']  = $this->model->getDatos('carreras');
        $data['prestamosbiblio']  = $this->model->getDatos('prestamosbiblio');
        $data['librosb']  = $this->model->getDatos('librosb');
        $data['documentos']  = $this->model->getDatos('documentos');
        $this->views->getViews($this,"home", $data) ;
    }
    public function modificar()
    {
        $nombre = $_POST ['nombre'];
        $telefono = $_POST ['telefono'];
        $direccion = $_POST ['direccion'];
        $mensaje = $_POST ['mensaje'];
        $id = $_POST ['id'];
        $data = $this->model->modificar($nombre,$telefono,$direccion,$mensaje,$id);
        if($data =='ok')  {
            $msg = 'ok';
        }else {
            $msg = 'error';
        }
        echo json_encode($msg);
        die();
    }
    function Reporte()  
    {
        $data = $this->model->getreporte();
        echo json_encode($msg);
        die();
      
    }


}


<?php
class Egresados extends Controller{
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
        $data['generaciones'] = $this->model->getGeneracion();
        if (!empty($verificar)|| $id_user == 1) { 
            $this->views->getViews($this, "index", $data);
        } else {
            header('Location:' .base_url. 'Errors/permisos');
        }
    }
    public function listar()
    {
        $data = $this->model->getEgresados();
        for ($i=0; $i <count($data); $i++) { 
            if ($data[$i]['estado'] ==1) {
                $data[$i]['estado'] ='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarEgresados('.$data[$i]['id'].');"><i class = "fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button"  onclick="btnEliminarEgresado('.$data[$i]['id'].');"><i class = "fas fa-trash-alt"></i></button>
               </div>';
            }else{
            $data[$i]['estado'] ='<span class="badge badge-danger">Inactivo</span>';
            $data[$i]['acciones'] = '<div>
           <button class="btn btn-success" type="button"  onclick="btnReingresarEgresados('.$data[$i]['id'].');"><i class = "fas fa-circle"></i></button>
            </div>';
        }
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $curp = $_POST['curp'];
        $nombre = $_POST['nombre'];
        $ap_paterno = $_POST['ap_paterno'];
        $ap_materno = $_POST['ap_materno'];
        $parral_balleza = $_POST['parral_balleza'];
        $genero = $_POST['genero'];
        $mes_anio_ingreso = $_POST['mes_anio_ingreso'];
        $mes_anio_egreso = $_POST['mes_anio_egreso'];
        $fecha_egreso = $_POST['fecha_egreso'];
        $numero_cedula = $_POST['numero_cedula'];
        $nivel = $_POST['nivel'];
        $matricula = $_POST['matricula'];
        $estatus = $_POST['estatus'];
        $titulados_utp = $_POST['titulados_utp'];
        $fecha_cedulacion_dgp = $_POST['fecha_cedulacion_dgp'];
        $fecha_pase_cedula = $_POST['fecha_pase_cedula'];
        $fecha_entrega_egresado = $_POST['fecha_entrega_egresado'];
        $observaciones = $_POST['observaciones'];
        $respuesta_egresado = $_POST['respuesta_egresado'];
        $observacion_egresado = $_POST['observacion_egresado'];
        $id = $_POST['id'];
        if(empty($curp) || empty($nombre) || empty($ap_paterno)|| empty($ap_materno)|| empty($parral_balleza)|| empty($genero)|| empty($mes_anio_ingreso)|| empty($mes_anio_egreso)|| empty($fecha_egreso)|| empty($numero_cedula)|| empty($nivel)|| empty($matricula)|| empty($estatus || empty($titulados_utp)|| empty($fecha_cedulacion_dgp)|| empty($fecha_entrega_egresado)|| empty($observaciones)|| empty($respuesta_egresado)|| empty($observacion_egresado))){
            $msg = "todos los campos son obligatorios";
        }else{
            if ($id == "") {
            $data = $this->model->registrarEgresado($curp,$nombre,$ap_paterno,$ap_materno,$parral_balleza,$genero,$mes_anio_ingreso,$mes_anio_egreso,$fecha_egreso,$numero_cedula,$nivel,$matricula,$estatus,$titulados_utp,$fecha_cedulacion_dgp,$fecha_pase_cedula,$fecha_entrega_egresado,$observaciones,$respuesta_egresado,$observacion_egresado);
            if ($data =="ok") {
                $msg = "si";
            }else if($data == "existe"){
                $msg = "La matricula ya existe";
            }else{
                $msg = "Error al registrar";
            }
            }else{
                $data = $this->model->modificarEgresado($curp,$nombre,$ap_paterno,$ap_materno,$parral_balleza,$genero,$mes_anio_ingreso,$mes_anio_egreso,$fecha_egreso,$numero_cedula,$nivel,$matricula,$estatus,$titulados_utp,$fecha_cedulacion_dgp,$fecha_pase_cedula,$fecha_entrega_egresado,$observaciones,$respuesta_egresado,$observacion_egresado,$id);
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
        $data = $this->model->editarEgresado($id);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
       $data = $this->model->accionEgresado(0,$id);
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
       $data = $this->model->accionEgresado(1,$id);
       if ($data == 1) {
        $msg = "ok";
       }else{
        $msg = "Error al reingresar";
       }
       echo json_encode($msg,JSON_UNESCAPED_UNICODE);
       die();
    }
    public function cargar_masiva() {
        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data, true);
    
        $rows = explode("\n", $data['csvData']);
        $successfulInserts = 0;
    
        foreach ($rows as $row) {
            if (!empty(trim($row))) {
                $fields = str_getcsv($row);
    
                // Asegúrate de que la cantidad de campos es la esperada
                if (count($fields) < 20) {
                    continue; // O manejar el error como prefieras
                }
    
                // Asigna valores, usando un valor predeterminado si está vacío
                $curp = $fields[0] ?: ''; // Asigna cadena vacía
                $nombre = $fields[1] ?: '';
                $ap_paterno = $fields[2] ?: '';
                $ap_materno = $fields[3] ?: '';
                $parral_balleza = $fields[4] ?: '';
                $genero = $fields[5] ?: '';
                $mes_anio_ingreso = $fields[6] ?: '';
                $mes_anio_egreso = $fields[7] ?: '';
                $fecha_egreso = $fields[8] ?: '';
                $numero_cedula = $fields[9] ?: '';
                $nivel = $fields[10] ?: '';
                $matricula = $fields[11] ?: '';
                $estatus = $fields[12] ?: '';
                $titulados_utp = $fields[13] ?: '';
                $fecha_cedulacion_dgp = $fields[14] ?: '';
                $fecha_pase_cedula = $fields[15] ?: '';
                $fecha_entrega_egresado = $fields[16] ?: '';
                $observaciones = $fields[17] ?: '';
                $respuesta_egresado = $fields[18] ?: '';
                $observacion_egresado = $fields[19] ?: '';
    
                // Aquí puedes agregar una validación adicional
                if (empty($curp) || empty($nombre) || empty($matricula)) {
                    // Manejar error: algún campo obligatorio está vacío
                    continue; // O enviar un mensaje de error
                }
    
                $result = $this->model->registrarEgresado($curp, $nombre, $ap_paterno, $ap_materno, $parral_balleza, $genero, $mes_anio_ingreso, $mes_anio_egreso, $fecha_egreso, $numero_cedula, $nivel, $matricula, $estatus, $titulados_utp, $fecha_cedulacion_dgp, $fecha_pase_cedula, $fecha_entrega_egresado, $observaciones, $respuesta_egresado, $observacion_egresado);
    
                if ($result == "ok") {
                    $successfulInserts++;
                }
            }
        }
    
        echo json_encode([
            'status' => 'success',
            'message' => "$successfulInserts registros insertados correctamente."
        ]);
        die();
    }
    
    }
?>

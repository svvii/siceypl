<?php
class Libros_biblioteca extends Controller
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location:" . base_url);
        }
        parent::__construct();
    }
    public function index()
    {
        $id_user = $_SESSION['id_usuario'];
        $verificar = $this->model->verficarpermiso($id_user, 'generaciones');
        if (!empty($verificar) || $id_user == 1) {
            $this->views->getViews($this, "index");
        } else {
            header('Location:' . base_url . 'Errors/permisos');
        }
    }
    public function listar()
    {
        $data = $this->model->getLIBROSB();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div class="btn-group">
                    <button class="btn btn-primary" type="button" onclick="btnEditarLIBROB(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarLIBROB(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
                    <button class="btn btn-warning" type="button" onclick="btnGenerarQR(' . $data[$i]['id'] . ');"><i class="fas fa-qrcode"></i></button>
                   </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div class="btn-group">
               <button class="btn btn-success" type="button" onclick="btnReingresarLIBROB(' . $data[$i]['id'] . ');"><i class="fas fa-circle"></i></button>
               <button class="btn btn-warning" type="button" onclick="btnGenerarQR(' . $data[$i]['id'] . ');"><i class="fas fa-qrcode"></i></button>
                </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $biblioteca = $_POST['biblioteca'];
        $clasificacion = $_POST['clasificacion'];
        $codigo = $_POST['codigo'];
        $cantidadejemplar = $_POST['cantidadejemplar'];
        $cantidad = $_POST['cantidad'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editorial = $_POST['editorial'];
        $observaciones = $_POST['observaciones'];
        $id = $_POST['id'];
        if (empty($biblioteca) || empty($clasificacion) || empty($codigo) || empty($cantidadejemplar) || empty($cantidad) || empty($titulo) || empty($autor) || empty($editorial) || empty($observaciones)) {
            $msg = "todos los campos son obligatorios";
        } else {
            if ($id == "") {
                $data = $this->model->registrarLIBROB($biblioteca, $clasificacion, $codigo, $cantidadejemplar, $cantidad, $titulo, $autor, $editorial, $observaciones);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "EL libro ya existe";
                } else {
                    $msg = "Error al registrar la Generacion";
                }
            } else {
                $data = $this->model->modificarLIBROB($biblioteca, $clasificacion, $codigo, $cantidadejemplar, $cantidad, $titulo, $autor, $editorial, $observaciones, $id);
                if ($data == "Modificado") {
                    $msg = "Modificado";
                } else {
                    $msg = "Error al Modificado la libro";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id)
    {
        $data = $this->model->editarLIBROB($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
        $data = $this->model->accionLIBROB(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar Libro";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function reingresar(int $id)
    {
        $data = $this->model->accionLIBROB(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar Libro";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function select_lib()
    {
        if (isset($_GET['libr'])) {
            $valor = $_GET['libr'];
            $data = $this->model->buscarlib($valor);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    public function generarQR($id)
    {
        include 'libraries/Lib/barcode.php';

        $librosqr = $this->model->obtenerDatosqr($id);
        if ($librosqr) {
            $datos = array(
                'ID' => $librosqr['id'],
                'Biblioteca' => $librosqr['biblioteca'],
                'Clasificación' => $librosqr['clasificacion'],
                'Código' => $librosqr['codigo'],
                'Cantidad' => $librosqr['cantidad'],
                'Cantidad de Ejemplar' => $librosqr['cantidadejemplar'],
                'Título' => $librosqr['titulo'],
                'Autor' => $librosqr['autor'],
                'Editorial' => $librosqr['editorial'],
                'Observaciones' => $librosqr['observaciones'],
                'Estado' => $librosqr['estado']
            );
            $datos_legibles = "";
            foreach ($datos as $key => $value) {
                $datos_legibles .= $key . ": " . $value . "\n";
            }

            $generator = new barcode_generator();
            $svg = $generator->render_svg("qr", $datos_legibles, "");
            header("Content-Type: image/svg+xml");
            echo $svg;
        } else {
            echo "No se encontró ningún préstamo con el ID proporcionado.";
        }
    }
}

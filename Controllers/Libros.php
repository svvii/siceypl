<?php
class Libros extends Controller
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
        $verificar = $this->model->verficarpermiso($id_user, 'Estadias UTP');
        $data['generaciones'] = $this->model->getGeneracion();
        $data['carreras'] = $this->model->getCarrera();
        if (!empty($verificar) || $id_user == 1) {
            $this->views->getViews($this, "index", $data);
        } else {
            header('Location:' . base_url . 'Errors/permisos');
        }
    }

    public function listar()
    {
        $data = $this->model->getLibros();
        for ($i = 0; $i < count($data); $i++) {
            if (!empty($data[$i]['pdf'])) {
                $pdfIcon = '<i class="fas fa-file-pdf fa-lg" style="color: #ffd700;"></i>';
            } else {
                $pdfIcon = '<i class="fas fa-file-pdf fa-lg" style="color: grey;"></i>';
            }
            $data[$i]['imagen'] = '<a href="' . base_url . 'Assets/Documentos/' . $data[$i]['pdf'] . '" target="_blank">' . $pdfIcon . '</a>';
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div class="btn-group" role="group" aria-label="Acciones">
                    <button class="btn btn-primary" type="button" onclick="btnEditarlibro(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarlibro(' . $data[$i]['id'] . ');"><i class="fas fa-trash-alt"></i></button>
                    <a href="' . base_url . 'Libros/descargarPdf/' . $data[$i]['id'] . '" class="btn btn-info" target="_blank"><i class="fas fa-download"></i></a>
                </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div class="btn-group" role="group" aria-label="Acciones">
                    <button class="btn btn-success" type="button" onclick="btnReingresarlibro(' . $data[$i]['id'] . ');"><i class="fas fa-circle"></i></button>
                    <a href="' . base_url . 'Libros/descargarPdf/' . $data[$i]['id'] . '" class="btn btn-info" target="_blank"><i class="fas fa-download"></i></a>
                </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $msg = '';

        // Recolectar datos del formulario
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

        $folio = isset($_POST['folio']) ? $_POST['folio'] : '';
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

        // Manejo de la imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $img = $_FILES['imagen'];
            $name = $img['name'];
            $tmpname = $img['tmp_name'];
            $destino = "Assets/Documentos/" . $name;

            if (move_uploaded_file($tmpname, $destino)) {
                // Imagen subida correctamente
            } else {
                $msg = "Error al subir la imagen.";
                echo json_encode($msg, JSON_UNESCAPED_UNICODE);
                die();
            }
        } else {
            $name = isset($_POST['foto_actual']) ? $_POST['foto_actual'] : "default.png";
        }

        // Verificar campos obligatorios
        if (empty($color_estante) || empty($id_generacion) || empty($matricula) || empty($apellido_p) || empty($apellido_m) || empty($nombre) || empty($id_carrera) || empty($codigo_estadia) || empty($nombre_proyecto) || empty($fecha_documento) || empty($nombre_empresa) || empty($tutor_academico) || empty($asesor_academico) || empty($asesor_empresarial) || empty($observaciones)) {
            $msg = "todos los campos son obligatorios";
        } else {
            if ($id == 0) {
                // Registrar nuevo libro
                $data = $this->model->registrarLibro($color_estante, $id_generacion, $matricula, $apellido_p, $apellido_m, $nombre, $id_carrera, $codigo_estadia, $nombre_proyecto, $fecha_documento, $nombre_empresa, $tutor_academico, $asesor_academico, $asesor_empresarial, $observaciones, $folio, $name);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = " ya existe";
                } else {
                    $msg = "Error al registrar el lector";
                }
            } else {
                // Modificar libro existente
                $data = $this->model->modificarLibro($color_estante, $id_generacion, $matricula, $apellido_p, $apellido_m, $nombre, $id_carrera, $codigo_estadia, $nombre_proyecto, $fecha_documento, $nombre_empresa, $tutor_academico, $asesor_academico, $asesor_empresarial, $observaciones, $name, intval($id));
                if ($data == "Modificado") {
                    $msg = "Modificado";
                } else {
                    $msg = "Error al modificar estadia";
                }
            }
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function editar(int $id)
    {
        $data = $this->model->editarlibro($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
        $data = $this->model->accionlibro(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el lector";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
        $data = $this->model->accionlibro(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar el lector";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function obtenerUltimoCodigo()
    {
        $ultimoCodigo = $this->model->obtenerUltimoCodigo();
        echo json_encode(['ultimoCodigo' => $ultimoCodigo], JSON_UNESCAPED_UNICODE);
        die();
    }
    public function descargarPdf(int $id)
    {
        $rutaPdf = $this->model->obtenerRutaPdfPorId($id);
        if ($rutaPdf !== null) {
            if (file_exists($rutaPdf)) {
                ob_clean();
                header('Content-Type: application/pdf');
                // Cambia 'attachment' por 'inline'
                header('Content-Disposition: inline; filename="Documento de Estadias.pdf"');
                header('Content-Length: ' . filesize($rutaPdf));
                header('Pragma: public');
                header('Content-Transfer-Encoding: binary');
                readfile($rutaPdf);
                exit;
            } else {
                echo "El archivo PDF no se encontró en la ruta especificada.";
            }
        } else {
            echo "No se encontró la ruta del archivo PDF en la base de datos.";
        }
    }
}

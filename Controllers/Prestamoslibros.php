<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Prestamoslibros extends Controller
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
        $verificar = $this->model->verficarpermiso($id_user, 'carreras');
        if (!empty($verificar) || $id_user == 1) {
            $this->views->getViews($this, "index");
        } else {
            header('Location:' . base_url . 'Errors/permisos');
        }
    }
    public function listar()
    {
        $data = $this->model->getPrestamosbiblio();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-info">Prestado</span>';
                $data[$i]['acciones'] = '<div class="btn-group" role="group">
                <button class="btn btn-secondary" type="button" onclick="btnEntregar(' . $data[$i]['id'] . ');"><i class="fa fa-hourglass-start"></i></button>
                <a class="btn btn-danger" href="' . base_url . 'Prestamoslibros/generarticked/' . $data[$i]['id'] . '" target="_blank"><i class="fa fa-file-pdf"></i></a>
                <button class="btn btn-warning" type="button" onclick="enviarCorreo(' . $data[$i]['id'] . ');"><i class="far fa-envelope"></i></button>
                </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge badge-success">Entregado</span>';
                $data[$i]['acciones'] = '<div class="btn-group" role="group">
                <button class="btn btn-warning" type="button" onclick="enviarCorreo(' . $data[$i]['id'] . ');"><i class="far fa-envelope"></i></button>
                <a class="btn btn-danger" href="' . base_url . 'Prestamoslibros/generarticked/' . $data[$i]['id'] . '" target="_blank"><i class="fa fa-file-pdf"></i></a>

                </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $buscar_libro = $_POST['buscar_libro'];
        $autor = $_POST['autor'];
        $editorial = $_POST['editorial'];
        $buscar_estudiante = $_POST['buscar_estudiante'];
        $cantidad = $_POST['cantidad'];
        $fecha_prestamo = $_POST['fecha_prestamo'];
        $fecha_devolucion = $_POST['fecha_devolucion'];
        $horap = $_POST['horap'];
        $observacionesp = $_POST['observacionesp'];

        if (empty($buscar_libro) || empty($autor)|| empty($editorial)|| empty($buscar_estudiante) || empty($cantidad) || empty($fecha_prestamo) || empty($fecha_devolucion) || empty($horap) || empty($observacionesp)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            $stock = $this->model->getlibro($buscar_libro);

            if ($stock['cantidad'] >= $cantidad) {
                $data = $this->model->registrarPrestamolibro($buscar_libro,$autor,$editorial, $buscar_estudiante, $cantidad, $fecha_prestamo, $fecha_devolucion, $horap, $observacionesp);
                if ($data !== 0) {
                    $nuevoStock = $stock['cantidad'] - $cantidad;
                    $actualizar = $this->model->actualizarstock($nuevoStock, $buscar_libro);

                    if ($actualizar == 1) {
                        $msg = array('mensaje' => 'Préstamo registrado correctamente', 'estado' => 'success');
                    } else {
                        $msg = "Error al actualizar stock del libro";
                    }
                } else {
                    $msg = "Error al registrar el préstamo";
                }
            } else {
                $msg = "Stock del libro no disponible. Solo hay " . $stock['cantidad'] . " unidades disponibles";
            }
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function devolucion()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['observaciones_devoluciones']) && isset($_POST['id_prestamoo'])) {
                $observaciones_devoluciones = $_POST['observaciones_devoluciones'];
                $id_prestamoo = $_POST['id_prestamoo'];
                $resultado = $this->model->devoluciones($observaciones_devoluciones, $id_prestamoo);
                $msg = "";
                if ($resultado == 1) {
                    $prestamo = $this->model->getPrestamo($id_prestamoo);
                    $stock = $this->model->getlibro($prestamo['buscar_libro']);
                    $nuevoStock = $stock['cantidad'] + $prestamo['cantidad'];
                    $actualizar = $this->model->actualizarstock($nuevoStock, $prestamo['buscar_libro']);
                    if ($actualizar == 1) {
                        $msg = "si";
                    } else {
                        $msg = "Error al actualizar stock del libro";
                    }
                    $msg = array('msg' => 'Libro recibido', 'icono' => 'success');
                } else {
                    $msg = "Error al registrar la devolución del libro";
                }
                echo json_encode($msg, JSON_UNESCAPED_UNICODE);
                die();
            } else {
                $msg = "Error: Datos insuficientes para procesar la devolución del libro";
                echo json_encode($msg, JSON_UNESCAPED_UNICODE);
                die();
            }
        } else {
            $msg = "Error: Se esperaba una solicitud POST para procesar la devolución del libro";
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
    public function generarticked($id)
    {
        require('libraries/fpdf/fpdf.php');
        $empresa = $this->model->getEmpresa();
        $prestamo = $this->model->getraerdatos($id);
        $pdf = new FPDF('P', 'mm', array(75, 155));
        $pdf->AddPage();
        $pdf->SetMargins(5, 0, 0);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->MultiCell(61, 5, utf8_decode($empresa['nombre']), 0, 'R');
        $pdf->Image('Assets/img/utp_modificado.png', 7, 9, 18, 18, 'PNG');
        $pdf->Ln(9);
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Telefono: ', 0, 0, 'L');
        $pdf->SetX(16);
        $pdf->SetFont('Arial', '', 5);
        $pdf->Cell(60, 5, $empresa['telefono'], 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Direccion: ', 0, 0, 'L');
        $pdf->SetX(16);
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(60, 5, utf8_decode($empresa['direccion']), 0, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Correo: ', 0, 0, 'L');
        $pdf->SetX(16);
        $pdf->SetFont('Arial', '', 5);
        $pdf->Cell(60, 5, $empresa['ruc'], 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(65, 5, 'Datos del Estudiante: ', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Nombre: ', 0, 0, 'L');
        $pdf->SetX(16);
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(60, 5, utf8_decode($prestamo['nombre']), 0, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Matricula: ', 0, 0, 'L');
        $pdf->SetX(16);
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(60, 5, utf8_decode($prestamo['matricula']), 0, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Carrera: ', 0, 0, 'L');
        $pdf->SetX(16);
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(60, 5, utf8_decode($prestamo['carrera']), 0, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Correo: ', 0, 0, 'L');
        $pdf->SetX(16);
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(60, 5, utf8_decode($prestamo['correo']), 0, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Telefono: ', 0, 0, 'L');
        $pdf->SetX(16);
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(60, 5, utf8_decode($prestamo['telefono']), 0, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Direccion: ', 0, 0, 'L');
        $pdf->SetX(16);
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(60, 5, utf8_decode($prestamo['direccion']), 0, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(65, 5, 'Datos del Libro: ', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Titulo: ', 0, 0, 'L');
        $pdf->SetX(16);
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(60, 5, utf8_decode($prestamo['titulo']), 0, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Cantidad: ', 0, 0, 'L');
        $pdf->SetX(16);
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(60, 5, utf8_decode($prestamo['cantidad']), 0, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Hora del Prestamo: ', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(60, 5, utf8_decode($prestamo['horap']), 0, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Fecha Prestamo: ', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(60, 5, utf8_decode($prestamo['fecha_prestamo']), 0, 'L');
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->Cell(20, 5, 'Fecha Devolucion: ', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 5);
        $pdf->MultiCell(60, 5, utf8_decode($prestamo['fecha_devolucion']), 0, 'L');
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(12, 5, 'Estado: ', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 5);
        if ($prestamo['estado'] == 1) {
            $pdf->SetTextColor(255, 0, 0);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(35, 5, 'Prestado', 0, 0, 'L');
        } else {
            $pdf->SetTextColor(0, 128, 0);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(35, 5, 'Entregado', 0, 0, 'L');
        }

        $pdf->SetX(16);
        $pdf->Output();
    }
    public function enviarCorreo($id)
    {
        $empresa = $this->model->getEmpresa();
        $prestamo = $this->model->getraerdatos($id);
        require 'vendor/autoload.php';
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'siceypl@gmail.com';
            $mail->Password   = 'virl sxsd muxa rdwn';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom($empresa['correo'], $empresa['nombre']);
            $mail->addAddress($prestamo['correo']);

            $mail->isHTML(true);
            $mail->Subject = 'Prestamo del libro - ' . $empresa['nombre'];
            $body = '<p>Querido Estudiante,</p>
                <p>Espero que este mensaje te encuentre bien. Quisiera recordarte amablemente sobre la importancia de devolver el libro en la fecha acordada.</p>
                <p>Tu compromiso con la devolución puntual no solo ayuda a mantener nuestra biblioteca en orden, sino que también permite que otros estudiantes disfruten de la oportunidad de acceder a este recurso invaluable.</p>
                <p>Apreciamos tu cooperación y comprensión en este asunto. Si necesitas alguna ayuda o tienes alguna pregunta, no dudes en ponerte en contacto con nosotros. Estamos aquí para ayudarte en todo lo que necesites.</p>
                <p>¡Gracias por tu atención y feliz lectura!</p>
                <p>Atentamente,</p>
                <p>Sistema Integral para el Control de Estadias y Prestamos de Libros</p>
                <p><a href="' . base_url . 'Prestamoslibros/generarticked/' . $id . '">Haz click aquí para ver más detalles</a></p>';

            $mail->Body = $body;

            $mail->send();


            echo json_encode(array('status' => 'success', 'message' => 'Correo Enviado'));
        } catch (Exception $e) {
            echo json_encode(array('status' => 'error', 'message' => 'Error al enviar el correo: ' . $mail->ErrorInfo));
        }
        exit;
    }
    public function reportepdf()
    {
        require('libraries/fpdf/fpdf.php');
        $empresa = $this->model->getEmpresa();
        $prestamoss = $this->model->getPrestamosbiblio();
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetMargins(5, 0, 0);
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->SetAutoPageBreak(false);
        $pdf->AddPage();
        $pdf->SetMargins(5, 5, 5);
        $pdf->Image('Assets/img/utp_modificado.png', 5, 5, 18, 18, 'PNG');
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->SetXY(75, 5);
        $pdf->MultiCell(150, 10, utf8_decode($empresa['nombre']), 0, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 8, 'Telefono: ', 0, 0, 'L');
        $pdf->SetX(26);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(70, 8, $empresa['telefono'], 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 8, 'Direccion: ', 0, 0, 'L');
        $pdf->SetX(26);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(50, 8, utf8_decode($empresa['direccion']), 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 8, 'Correo: ', 0, 0, 'L');
        $pdf->SetX(26);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(70, 8, $empresa['ruc'], 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(190, 10, 'Listado de Prestamos', 0, 1, 'L');
        $pdf->SetLineWidth(0.5);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 5, 'Id', 1, 0, 'C');
        $pdf->Cell(25, 5, 'Cantidad ', 1, 0, 'C');
        $pdf->Cell(24, 5, 'F. Prestamo', 1, 0, 'C');
        $pdf->Cell(30, 5, 'F. Devolucion ', 1, 0, 'C');
        $pdf->Cell(80, 5, 'Nombre Estudiante', 1, 0, 'C');
        $pdf->Cell(25, 5, 'Estado', 1, 0, 'C');
        $pdf->Cell(75, 5, 'Titulo', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 11);
        foreach ($prestamoss as $prestam) {
            $pdf->Cell(20, 5, ($prestam['id']), 1, 0, 'C');
            $pdf->Cell(25, 5, ($prestam['cantidad']), 1, 0, 'C');
            $pdf->Cell(24, 5, ($prestam['fecha_prestamo']), 1, 0, 'C');
            $pdf->Cell(30, 5, ($prestam['fecha_devolucion']), 1, 0, 'C');
            $pdf->Cell(80, 5, ($prestam['nombre_estudiante']), 1, 0, 'C');
            if ($prestam['estado'] == 1) {
                $pdf->Cell(25, 5, 'Prestado', 1, 0, 'C');
            } else {
                $pdf->Cell(25, 5, 'Entregado', 1, 0, 'C');
            }

            $pdf->Cell(75, 5, ($prestam['titulo']), 1, 1, 'C');
        }
        $pdf->Output();
    }
}

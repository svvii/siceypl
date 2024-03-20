<?php
class PrestamoslibrosModel extends Query
{
    private $buscar_libro, $autor,$editorial,$buscar_estudiante, $cantidad, $fecha_prestamo, $fecha_devolucion, $horap, $observacionesp, $id, $estado;
    public function __construct()
    {
        parent::__construct();
    }
    public function getPrestamosbiblio()
    {
        $sql = "SELECT p.*, e.id AS id_estudiante, e.nombre AS nombre_estudiante, l.id AS id_libro, l.titulo FROM prestamosbiblio p INNER JOIN estudiantes e ON p.buscar_estudiante = e.id INNER JOIN librosb l ON p.buscar_libro = l.id";
        $res = $this->selectAll($sql);
        return $res;
    }
    public function getPrestamo($id_prestamoo)
    {
        $sql = "SELECT * FROM prestamosbiblio WHERE id = $id_prestamoo";
        $res = $this->select($sql);
        return $res;
    }
    public function getraerdatos($id)
    {
        $sql = "SELECT e.*, p.*, l.id ,l.titulo 
        FROM prestamosbiblio p  
        INNER JOIN estudiantes e ON e.id = p.buscar_estudiante  
        INNER JOIN librosb l ON l.id = p.buscar_libro 
        WHERE p.id = $id";

        $res = $this->select($sql);
        if ($res !== false && count($res) > 0) {
            return $res;
        } else {
            return false;
        }
    }
    public function getlibro($id)
    {
        $sql = "SELECT * FROM librosb WHERE id = $id";
        $res = $this->select($sql);
        return $res;
    }
    public function actualizarstock($stock, $buscar_libro)
    {
        $sql = "UPDATE librosb SET cantidad = ? WHERE id = ?";
        $array = array($stock, $buscar_libro);
        $respuesta = $this->update($sql, $array);
        if ($respuesta == 1) {
            $res = 1;
        } else {
            $res = 0;
        }
        return $res;
    }
    public function devoluciones($observacion, $id)
    {
        $sql = "UPDATE prestamosbiblio SET observaciones_devoluciones = ?, estado = ? WHERE id = ?";
        $array = array($observacion, 0, $id);
        $respuesta = $this->update($sql, $array);
        if ($respuesta == 1) {
            return 1;
        } else {
            return 0;
        }
    }
    public function getempresa()
    {
        $sql = "SELECT * FROM configuracion";
        $res = $this->select($sql);
        return $res;
    }
    public function registrarPrestamolibro(string $buscar_libro, string $autor,string $editorial,string $buscar_estudiante, string $cantidad, string $fecha_prestamo, string $fecha_devolucion, string $horap, string $observacionesp)
    {
        $this->buscar_libro = $buscar_libro;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->buscar_estudiante = $buscar_estudiante;
        $this->cantidad = $cantidad;
        $this->fecha_prestamo = $fecha_prestamo;
        $this->fecha_devolucion = $fecha_devolucion;
        $this->horap = $horap;
        $this->observacionesp = $observacionesp;
    
        $sql = "INSERT INTO prestamosbiblio (buscar_libro, autor,editorial,buscar_estudiante, cantidad, fecha_prestamo, fecha_devolucion, horap,observacionesp) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)";
        $datos = array($this->buscar_libro, $this->autor,$this->editorial,$this->buscar_estudiante, $this->cantidad, $this->fecha_prestamo, $this->fecha_devolucion, $this->horap, $this->observacionesp);
        $data = $this->save($sql, $datos);
    
        return $data;
    }
    public function verficarpermiso(int $id_user, string $buscar_libro)
    {
        $sql = "SELECT P.id, p.permiso, d.id, d.id_usuario, d.id_permiso FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.permiso = '$buscar_libro'";
        $data = $this->selectAll($sql);
        return $data;
    }
    
}

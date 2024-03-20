<?php
class PrestamosModel extends Query{
    private $id_lector, $fecha_prestamo, $fecha_devolucion,$id,$estado;
    public function __construct()
    {
      parent::__construct();
    }
    public function getLectores()
    {
        $sql = "SELECT *FROM lectores WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getPrestamos()
    {
        $sql = "SELECT p.*, c.nombre as lectror FROM prestamos p INNER JOIN lectores c ON p.id_lector = c.id;";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarPrestamo(string $id_lector,string $fecha_prestamo,string $fecha_devolucion)
    {
        $this->id_lector = $id_lector;
        $this->fecha_prestamo = $fecha_prestamo;
        $this->fecha_devolucion = $fecha_devolucion;
        $verificar = "SELECT * FROM prestamos WHERE id_lector = '$this->id_lector'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            # code...
        $sql = "INSERT INTO prestamos(id_lector,fecha_prestamo,fecha_devolucion) VALUES(?,?,?)";
        $datos = array($this->id_lector, $this->fecha_prestamo, $this-> fecha_devolucion);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
    
    }else{
            $res = "existe";
        }
    
        return $res;
    

    }
    public function modificarPrestamo(string $id_lector,string $fecha_prestamo,string $fecha_devolucion, int $id)
    {
        $this->id_lector = $id_lector;
        $this->fecha_prestamo = $fecha_prestamo;
        $this->fecha_devolucion = $fecha_devolucion;
        $this->id = $id;
        $sql = "UPDATE prestamos SET id_lector = ?, fecha_prestamo = ?, fecha_devolucion = ? WHERE id = ?";
        $datos = array($this->id_lector, $this->fecha_prestamo, $this->fecha_devolucion, $this->id);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "Modificado";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function editarpresta(int $id)
    {
        $sql = "SELECT * FROM prestamos WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function accionpresta(int $estado,int $id,)
    {
        $this->id = $id;
        $this->estado =$estado;
        $sql = "UPDATE prestamos SET estado = ? WHERE id = ?";
        $datos = array($this->estado,$this->id);
        $data = $this->save($sql,$datos);
        return $data;
    }
    public function verficarpermiso(int $id_user,string $nombre) 
    {
       $sql = "SELECT P.id, p.permiso, d.id, d.id_usuario, d.id_permiso FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.permiso = '$nombre'";
       $data = $this->selectAll($sql);
       return $data;
    }
    }
?>
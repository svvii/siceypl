<?php
class EstudiantesModel extends Query{
    private $nombre, $matricula,$carrera,$correo,$telefono, $direccion, $id,$estado;
    public function __construct()
    {
      parent::__construct();
    }
    
    public function getCarreras()
    {
        $sql = "SELECT * FROM carreras WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getEstudiantes()
    {
        $sql = "SELECT e.*, c.nombre as nombre_carrera FROM estudiantes e INNER JOIN carreras c ON e.carrera = c.id";
        $data = $this->selectAll($sql);
        return $data;
    }
    
    public function registrarEstudiantes(string $nombre, string $matricula, string $carrera, string $correo, string $telefono, string $direccion)
    {
        $this->nombre = $nombre;
        $this->matricula = $matricula;
        $this->carrera = $carrera;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
    
        $sql = "INSERT INTO estudiantes (nombre, matricula, carrera, correo, telefono, direccion) VALUES (?, ?, ?, ?, ?, ?)";
        $datos = array($this->nombre, $this->matricula, $this->carrera, $this->correo, $this->telefono, $this->direccion);
        $data = $this->save($sql, $datos);
    
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
    
        return $res;
    }
    
    public function modificarEstudiante(string $nombre,string $matricula,string $carrera,string $correo,string $telefono, string $direccion,int $id)
    {
        $this->nombre = $nombre;
        $this->matricula = $matricula;
        $this->carrera = $carrera;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->id = $id;
        $sql = "UPDATE estudiantes SET nombre = ?, matricula = ?, carrera = ?, telefono = ?, correo = ?, direccion = ? WHERE id = ?";
        $datos = array ($this->nombre,$this->matricula,$this->carrera,$this->correo,$this->telefono, $this->direccion,$this->id);
        $data = $this->save($sql,$datos);
        if ($data == 1) { 
            $res = "Modificado";
        }else{
            $res = "error";
        }
        return $res;
    
    }
    public function editarEstudiante(int $id)
    {
        $sql = "SELECT * FROM estudiantes WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
     
    public function accionEstudiantes(int $estado,int $id,)
    {
        $this->id = $id;
        $this->estado =$estado;
        $sql = "UPDATE estudiantes SET estado = ? WHERE id = ?";
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
    public function buscarestu($valor)
    {
        $sql = "SELECT id AS id,nombre AS text, estado FROM estudiantes WHERE nombre LIKE '%" . $valor . "%' AND estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    }
?>

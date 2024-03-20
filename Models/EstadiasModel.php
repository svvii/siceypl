<?php
class EstadiasModel extends Query{
    private $nombre, $matricula,$titulo,$codigo,$estante,$color,$carrera,$generacion,$id,$estado;
    public function __construct()
    {
      parent::__construct();
    }
   
    public function getEstadias()
    {
        $sql = "SELECT * FROM estadias";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarEstadia(string $nombre, string $matricula, string $titulo, string $codigo, string $estante, string $color, string $carrera, string $generacion)
    {
        $this->nombre = $nombre;
        $this->matricula = $matricula;
        $this->titulo = $titulo;
        $this->codigo = $codigo;
        $this->estante = $estante;
        $this->color = $color;
        $this->carrera = $carrera;
        $this->generacion = $generacion;
    
        $sql = "INSERT INTO estadias(nombre, matricula, titulo, codigo, estante, color, carrera, generacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $datos = array($this->nombre, $this->matricula, $this->titulo, $this->codigo, $this->estante, $this->color, $this->carrera, $this->generacion);
        $data = $this->save($sql, $datos);
    
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }

        return $res;
    }
    
    public function modificarEstadia(string $nombre,string $matricula,string $titulo,string $codigo,string $estante,string $color,string $carrera,string $generacion,int $id)
    {
        $this->nombre = $nombre;
        $this->matricula = $matricula;
        $this->titulo = $titulo;
        $this->codigo = $codigo;
        $this->estante = $estante;
        $this->color = $color;
        $this->carrera = $carrera;
        $this->generacion = $generacion;
        $this->id = $id;
        $sql = "UPDATE estadias SET nombre = ?, matricula = ?,titulo = ?, codigo = ?,estante = ?, color = ?,carrera = ?, generacion = ? WHERE id = ?";
        $datos = array ($this->nombre, $this->matricula, $this-> titulo, $this->codigo,$this->estante, $this->color, $this->carrera, $this->generacion, $this->id);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "Modificado";
        }else{
            $res = "error";
        }
        return $res;
    
    }
    public function editarES(int $id)
    {
        $sql = "SELECT * FROM estadias WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
     
    public function accionES(int $estado,int $id,)
    {
        $this->id = $id;
        $this->estado =$estado;
        $sql = "UPDATE estadias SET estado = ? WHERE id = ?";
        $datos = array($this->estado,$this->id);
        $data = $this->save($sql,$datos);
        return $data;

    }
    
    }
?>
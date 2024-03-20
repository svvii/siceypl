<?php
class CarrerasModel extends Query{
    private $nombre, $abreviatura, $id,$estado;
    public function __construct()
    {
      parent::__construct();
    }
    public function getCarreras()
    {
        $sql = "SELECT * FROM carreras";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarCarrera(string $nombre,string $abreviatura)
    {
        $this->nombre = $nombre;
        $this->abreviatura = $abreviatura;
        $verificar = "SELECT * FROM carreras WHERE nombre = '$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            # code...
        $sql = "INSERT INTO carreras(nombre,abreviatura) VALUES(?,?)";
        $datos = array($this->nombre, $this->abreviatura);
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
    public function modificarCarrera(string $nombre,string $abreviatura, int $id)
    {
        $this->nombre = $nombre;
        $this->abreviatura = $abreviatura;
        $this->id = $id;
        $sql = "UPDATE carreras SET  nombre = ?, abreviatura = ? WHERE id = ?";
        $datos = array($this->nombre, $this->abreviatura, $this->id);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "Modificado";
        }else{
            $res = "error";
        }
        return $res;
    
    }
    public function editarCa(int $id)
    {
        $sql = "SELECT * FROM carreras WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
     
    public function accionCa(int $estado,int $id,)
    {
        $this->id = $id;
        $this->estado =$estado;
        $sql = "UPDATE carreras SET estado = ? WHERE id = ?";
        $datos = array($this->estado,$this->id);
        $data = $this->save($sql,$datos);
        return $data;

    }
    }
?>

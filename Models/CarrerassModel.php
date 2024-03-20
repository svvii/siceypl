<?php
class CarrerassModel extends Query{
    private  $nombre, $abreviatura,$id,$estado;
    public function __construct()
    {
      parent::__construct();
    }
    public function getCarrerass()
    {
        $sql = "SELECT * FROM carreras";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarCarreraa(string $nombre,string $abreviatura)
    {
        $this->nombre = $nombre;
        $this->abreviatura = $abreviatura;
        $verificar = "SELECT * FROM carreras WHERE nombre = '$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            # code...
        $sql = "INSERT INTO carreras (nombre,abreviatura) VALUES(?,?)";
        $datos = array($this->nombre, $this-> abreviatura);
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

    public function modificarCarreraa(string $nombre,string $abreviatura,int $id)
    {
        $this->nombre = $nombre;
        $this->abreviatura = $abreviatura;
        $this->id = $id;
        $sql = "UPDATE carreras SET nombre = ?, abreviatura = ? WHERE id = ?";
        $datos = array($this->nombre, $this->abreviatura, $this->id);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "Modificado";
        }else{
            $res = "error";
        }
        return $res;
    
    }
    public function editarCarr(int $id)
    {
        $sql = "SELECT * FROM carreras WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
     
    public function accionCarr(int $estado,int $id,)
    {
        $this->id = $id;
        $this->estado =$estado;
        $sql = "UPDATE carreras SET estado = ? WHERE id = ?";
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


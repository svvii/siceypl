<?php
class LectoresModel extends Query{
    private $dni, $nombre, $telefono, $direccion, $id,$estado;
    public function __construct()
    {
      parent::__construct();
    }
    
    public function getLectores()
    {
        $sql = "SELECT * FROM lectores";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarLector(string $dni,string $nombre,string $telefono, string $direccion)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $verificar = "SELECT * FROM lectores WHERE dni = '$this->dni'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            # code...
        $sql = "INSERT INTO lectores(dni,nombre,telefono,direccion) VALUES(?,?,?,?)";
        $datos = array($this->dni, $this->nombre, $this-> telefono, $this->direccion);
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
    public function modificarLector(string $dni,string $nombre,string $telefono,string $direccion,int $id)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->id = $id;
        $sql = "UPDATE lectores SET dni = ?, nombre = ?,telefono = ?, direccion = ? WHERE id = ?";
        $datos = array ($this->dni, $this->nombre, $this->telefono, $this->direccion, $this->id);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "Modificado";
        }else{
            $res = "error";
        }
        return $res;
    
    }
    public function editarLE(int $id)
    {
        $sql = "SELECT * FROM lectores WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
     
    public function accionLE(int $estado,int $id,)
    {
        $this->id = $id;
        $this->estado =$estado;
        $sql = "UPDATE lectores SET estado = ? WHERE id = ?";
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

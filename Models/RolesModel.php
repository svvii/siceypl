<?php
class RolesModel extends Query{
    private  $caja,$id,$estado;
    public function __construct()
    {
      parent::__construct();
    }
    public function getRoles()
    {
        $sql = "SELECT * FROM caja";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarRol(string $caja)
    {
        $this->caja = $caja;
        $verificar = "SELECT * FROM caja WHERE caja = '$this->caja'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            # code...
        $sql = "INSERT INTO caja (caja) VALUES(?)";
        $datos = array($this->caja);
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

    public function modificarROL(string $caja,int $id)
    {
        $this->caja = $caja;
        $this->id = $id;
        $sql = "UPDATE caja SET caja = ? WHERE id = ?";
        $datos = array($this->caja, $this->id);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "Modificado";
        }else{
            $res = "error";
        }
        return $res;
    
    }
    public function editarROL(int $id)
    {
        $sql = "SELECT * FROM caja WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
     
    public function accionROL(int $estado,int $id,)
    {
        $this->id = $id;
        $this->estado =$estado;
        $sql = "UPDATE caja SET estado = ? WHERE id = ?";
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
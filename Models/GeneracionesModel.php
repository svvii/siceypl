<?php
class GeneracionesModel extends Query{
    private  $inicio, $final,$id,$estado;
    public function __construct()
    {
      parent::__construct();
    }
    public function getGeneraciones()
    {
        $sql = "SELECT * FROM generaciones";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarGeneracion(string $inicio,string $final)
    {
        $this->inicio = $inicio;
        $this->final = $final;
        $verificar = "SELECT * FROM generaciones WHERE final = '$this->final'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            # code...
        $sql = "INSERT INTO generaciones (inicio,final) VALUES(?,?)";
        $datos = array($this->inicio, $this-> final);
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

    public function modificarGeneracion(string $inicio,string $final,int $id)
    {
        $this->inicio = $inicio;
        $this->final = $final;
        $this->id = $id;
        $sql = "UPDATE generaciones SET inicio = ?, final = ? WHERE id = ?";
        $datos = array($this->inicio, $this->final, $this->id);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "Modificado";
        }else{
            $res = "error";
        }
        return $res;
    
    }
    public function editarGeneracion(int $id)
    {
        $sql = "SELECT * FROM generaciones WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
     
    public function accionGeneracion(int $estado,int $id,)
    {
        $this->id = $id;
        $this->estado =$estado;
        $sql = "UPDATE generaciones SET estado = ? WHERE id = ?";
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
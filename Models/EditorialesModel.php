<?php
class EditorialesModel extends Query{
    private  $nombre,$id,$estado;
    public function __construct()
    {
      parent::__construct();
    }
    public function getEditoriales()
    {
        $sql = "SELECT * FROM editoriales";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarEditorial(string $nombre)
    {
        $this->nombre = $nombre;
        $verificar = "SELECT * FROM editoriales WHERE nombre = '$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            # code...
        $sql = "INSERT INTO editoriales (nombre) VALUES(?)";
        $datos = array($this->nombre);
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

    public function modificarEditorial(string $nombre,int $id)
    {
        $this->nombre = $nombre;
        $this->id = $id;
        $sql = "UPDATE editoriales SET nombre = ?  WHERE id = ?";
        $datos = array($this->nombre, $this->id);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "Modificado";
        }else{
            $res = "error";
        }
        return $res;
    
    }
    public function editarEditorial(int $id)
    {
        $sql = "SELECT * FROM editoriales WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
     
    public function accionEditorial(int $estado,int $id,)
    {
        $this->id = $id;
        $this->estado =$estado;
        $sql = "UPDATE editoriales SET estado = ? WHERE id = ?";
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
    public function buscareditorial($valor)
    {
        $sql = "SELECT id AS id,nombre AS text, estado FROM editoriales WHERE nombre LIKE '%" . $valor . "%' AND estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
   
    }
?>

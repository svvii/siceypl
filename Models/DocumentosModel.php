<?php
class DocumentosModel extends Query{
    private $color_estante,$id_generacion, $matricula, $apellido_p, $apellido_m, $nombre, $id_carrera, $codigo_estadia, $nombre_proyecto, $fecha_documento, $nombre_empresa, $tutor_academico, $asesor_academico, $asesor_empresarial, $observaciones,$id,$estado;
    public function __construct()
    {
      parent::__construct();
    }
    public function getGeneraciones()
    {
        $sql = "SELECT * FROM generaciones WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getCarreras()
    {
        $sql = "SELECT * FROM carreras WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getDocumentos()
    {
        $sql = "SELECT * FROM documentos";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarDocumento(string $color_estante,int $id_generacion,string $matricula,string $apellido_p,string $apellido_m,string $nombre,int $id_carrera,string $codigo_estadia,string $nombre_proyecto,string $fecha_documento,string $nombre_empresa,string $tutor_academico,string $asesor_academico,string $asesor_empresarial,string $observaciones)
    {
        $this->color_estante = $color_estante;
        $this->id_generacion = $id_generacion;
        $this->matricula = $matricula;
        $this->apellido_p = $apellido_p;
        $this->apellido_m = $apellido_m;
        $this->nombre = $nombre;
        $this->id_carrera = $id_carrera;
        $this->codigo_estadia = $codigo_estadia;
        $this->nombre_proyecto = $nombre_proyecto;
        $this->fecha_documento = $fecha_documento;
        $this->nombre_empresa = $nombre_empresa;
        $this->tutor_academico = $tutor_academico;
        $this->asesor_academico = $asesor_academico;
        $this->asesor_empresarial = $asesor_empresarial;
        $this->observaciones = $observaciones;
        $sql = "INSERT INTO documentos (color_estante, id_generacion, matricula, apellido_p, apellido_m, nombre, id_carrera, codigo_estadia, nombre_proyecto, fecha_documento, nombre_empresa, tutor_academico, asesor_academico, asesor_empresarial, observaciones) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        //$sql = "INSERT INTO documentos($color_estante,$id_generacion, $matricula, $apellido_p, $apellido_m, $nombre, $id_carrera, $codigo_estadia, $nombre_proyecto, $fecha_documento, $nombre_empresa, $tutor_academico, $asesor_academico, $asesor_empresarial, $observaciones) VALUES (?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?)";
        $datos = array ($this->color_estante, $this->id_generacion , $this->matricula,$this->apellido_p,$this->apellido_m, $this->nombre, $this->id_carrera,$this->codigo_estadia,$this->nombre_proyecto,$this->fecha_documento, $this->nombre_empresa, $this->tutor_academico,$this->asesor_academico,$this->asesor_empresarial,$this->observaciones);
        $data = $this->save($sql, $datos);

        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
    
        return $res;
    }
    
    public function modificarDOC(string $color_estante,int $id_generacion,string $matricula,string $apellido_p,string $apellido_m,string $nombre,int $id_carrera,string $codigo_estadia,string $nombre_proyecto,string $fecha_documento,string $nombre_empresa,string $tutor_academico,string $asesor_academico,string $asesor_empresarial,string $observaciones, int $id)
    {
        $this->color_estante = $color_estante;
        $this->id_generacion = $id_generacion;
        $this->matricula = $matricula;
        $this->apellido_p = $apellido_p;
        $this->apellido_m = $apellido_m;
        $this->nombre = $nombre;
        $this->id_carrera = $id_carrera;
        $this->codigo_estadia = $codigo_estadia;
        $this->nombre_proyecto = $nombre_proyecto;
        $this->fecha_documento = $fecha_documento;
        $this->nombre_empresa = $nombre_empresa;
        $this->tutor_academico = $tutor_academico;
        $this->asesor_academico = $asesor_academico;
        $this->asesor_empresarial = $asesor_empresarial;
        $this->observaciones = $observaciones;
        $this->id = $id;
        $sql = "UPDATE documentos SET color_estante = ?, id_generacion = ?, matricula = ?,  apellido_p = ?, apellido_m = ?, nombre = ?, id_carrera = ?, codigo_estadia = ?, nombre_proyecto = ?, fecha_documento = ?, nombre_empresa = ?, tutor_academico = ?, asesor_academico = ?, asesor_empresarial = ?,observaciones = ?,  WHERE id = ?";
        $datos = array($color_estante, $id_generacion, $matricula, $apellido_p, $apellido_m, $nombre, $id_carrera, $codigo_estadia, $nombre_proyecto, $fecha_documento, $nombre_empresa, $tutor_academico, $asesor_academico, $asesor_empresarial, $observaciones, $id);

       // $datos = array ($this->color_estante, $this->id_generacion , $this->matricula,$this->apellido_p,$this->apellido_m, $this->nombre, $this->id_carrera,$this->codigo_estadia,$this->nombre_proyecto,$this->fecha_documento, $this->nombre_empresa, $this->tutor_academico,$this->asesor_academico,$this->asesor_empresarial,$this->observaciones, $this->id);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "Modificado";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function editardoc(int $id)
    {
        $sql = "SELECT * FROM documentos WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function acciondoc(int $estado,int $id,)
    {
        $this->id = $id;
        $this->estado =$estado;
        $sql = "UPDATE documentos SET estado = ? WHERE id = ?";
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
<?php
class EstadiasBModel extends Query
{
    private $color_estante, $id_generacion, $matricula, $apellido_p, $apellido_m, $nombre, $id_carrera, $codigo_estadia, $nombre_proyecto, $fecha_documento, $nombre_empresa, $tutor_academico, $asesor_academico, $asesor_empresarial, $observaciones, $id, $estado;

    public function __construct()
    {
        parent::__construct();
    }
    public function getLibros()
    {
        $sql = "SELECT * FROM EstadiasB";
        //$sql = "SELECT d.*, c.nombre as nombre_carrera FROM documentos d INNER JOIN carreras c ON d.id_carrera = c.id;";
        //$sql = "SELECT d.*, c.nombre as nombre_carrera, g.inicio, g.final as generacion FROM documentos d INNER JOIN carreras c ON d.id_carrera = c.id INNER JOIN generaciones g ON d.id_generacion = g.id;";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarLibro(
        string $color_estante,
        string $id_generacion,
        string $matricula,
        string $apellido_p,
        string $apellido_m,
        string $nombre,
        string $id_carrera,
        string $codigo_estadia,
        string $nombre_proyecto,
        string $fecha_documento,
        string $nombre_empresa,
        string $tutor_academico,
        string $asesor_academico,
        string $asesor_empresarial,
        string $observaciones,
        string $folio
    ) {
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

        $sql = "INSERT INTO EstadiasB(color_estante, id_generacion, matricula, apellido_p, apellido_m, nombre, id_carrera, codigo_estadia, nombre_proyecto, fecha_documento, nombre_empresa, tutor_academico, asesor_academico, asesor_empresarial, observaciones, folio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
        $datos = array($this->color_estante, $this->id_generacion, $this->matricula, $this->apellido_p, $this->apellido_m, $this->nombre, $this->id_carrera, $this->codigo_estadia, $this->nombre_proyecto, $this->fecha_documento, $this->nombre_empresa, $this->tutor_academico, $this->asesor_academico, $this->asesor_empresarial, $this->observaciones, $folio);
        $data = $this->save($sql, $datos);

        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }

        return $res;
    }

    public function modificarlibro(
        string $color_estante,
        string $id_generacion,
        string $matricula,
        string $apellido_p,
        string $apellido_m,
        string $nombre,
        string $id_carrera,
        string $codigo_estadia,
        string $nombre_proyecto,
        string $fecha_documento,
        string $nombre_empresa,
        string $tutor_academico,
        string $asesor_academico,
        string $asesor_empresarial,
        string $observaciones,
        int $id,
    ) {
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
        $sql = "UPDATE EstadiasB SET color_estante = ?, id_generacion = ?, matricula = ?,  apellido_p = ?, apellido_m = ?, nombre = ?, id_carrera = ?, codigo_estadia = ?, nombre_proyecto = ?, fecha_documento = ?, nombre_empresa = ?, tutor_academico = ?, asesor_academico = ?, asesor_empresarial = ?, observaciones = ?  WHERE id = ?";
        $datos = array($this->color_estante, $this->id_generacion, $this->matricula, $this->apellido_p, $this->apellido_m, $this->nombre, $this->id_carrera, $this->codigo_estadia, $this->nombre_proyecto, $this->fecha_documento, $this->nombre_empresa, $this->tutor_academico, $this->asesor_academico, $this->asesor_empresarial, $this->observaciones, $this->id);
        $data = $this->save($sql, $datos);

        if ($data == 1) {
            $res = "Modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function editarlibro(int $id)
    {
        $sql = "SELECT * FROM EstadiasB WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function accionlibro(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE EstadiasB SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }

    public function verficarpermiso(int $id_user, string $nombre)
    {
        $sql = "SELECT P.id, p.permiso, d.id, d.id_usuario, d.id_permiso FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.permiso = '$nombre'";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function obtenerUltimoCodigoestadia()
    {
        $sql = "SELECT MAX(codigo_estadia) AS ultimoCodigo FROM EstadiasB";
        $data = $this->select($sql);
        return isset($data['ultimoCodigo']) ? $data['ultimoCodigo'] : 0;
    }

}
?>
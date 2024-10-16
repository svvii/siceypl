<?php
class EgresadosModel extends Query
{
    private  $id, $estado, $curp, $nombre, $ap_paterno, $ap_materno, $parral_balleza, $genero, $mes_anio_ingreso, $mes_anio_egreso, $fecha_egreso, $numero_cedula, $nivel, $matricula, $estatus, $titulados_utp, $fecha_cedulacion_dgp, $fecha_pase_cedula, $fecha_entrega_egresado, $observaciones, $respuesta_egresado, $observacion_egresado;
    public function __construct()
    {
        parent::__construct();
    }
    public function getEgresados()
    {
        $sql = "SELECT * FROM egresados";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getGeneracion()
    {
        $sql = "SELECT * FROM generaciones WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarEgresado(string $curp, string $nombre, string $ap_paterno, string $ap_materno, string $parral_balleza, string $genero, string $mes_anio_ingreso, string $mes_anio_egreso, string $fecha_egreso, string $numero_cedula, string $nivel, string $matricula, string $estatus, string $titulados_utp, string $fecha_cedulacion_dgp, string $fecha_pase_cedula, string $fecha_entrega_egresado, string $observaciones, string $respuesta_egresado, string $observacion_egresado)
    {
        $this->curp = $curp;
        $this->nombre = $nombre;
        $this->ap_paterno = $ap_paterno;
        $this->ap_materno = $ap_materno;
        $this->parral_balleza = $parral_balleza;
        $this->genero = $genero;
        $this->mes_anio_ingreso = $mes_anio_ingreso;
        $this->mes_anio_egreso = $mes_anio_egreso;
        $this->fecha_egreso = $fecha_egreso;
        $this->numero_cedula = $numero_cedula;
        $this->nivel = $nivel;
        $this->matricula = $matricula;
        $this->estatus = $estatus;
        $this->titulados_utp = $titulados_utp;
        $this->fecha_cedulacion_dgp = $fecha_cedulacion_dgp;
        $this->fecha_pase_cedula = $fecha_pase_cedula;
        $this->fecha_entrega_egresado = $fecha_entrega_egresado;
        $this->observaciones = $observaciones;
        $this->respuesta_egresado = $respuesta_egresado;
        $this->observacion_egresado = $observacion_egresado;

        $sql = "INSERT INTO egresados(curp,nombre,ap_paterno,ap_materno,parral_balleza,genero,mes_anio_ingreso,mes_anio_egreso,fecha_egreso,numero_cedula,nivel,matricula,estatus,titulados_utp,fecha_cedulacion_dgp,fecha_pase_cedula,fecha_entrega_egresado,observaciones,respuesta_egresado,observacion_egresado) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $datos = array($this->curp, $this->nombre, $this->ap_paterno, $this->ap_materno, $this->parral_balleza, $this->genero, $this->mes_anio_ingreso, $this->mes_anio_egreso, $this->fecha_egreso, $this->numero_cedula, $this->nivel, $this->matricula, $this->estatus, $this->titulados_utp, $this->fecha_cedulacion_dgp, $this->fecha_pase_cedula, $this->fecha_entrega_egresado, $this->observaciones, $this->respuesta_egresado, $this->observacion_egresado);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }

        return $res;
    }

    public function modificarEgresado(
        string $curp,
        string $nombre,
        string $ap_paterno,
        string $ap_materno,
        string $parral_balleza,
        string $genero,
        string $mes_anio_ingreso,
        string $mes_anio_egreso,
        string $fecha_egreso,
        string $numero_cedula,
        string $nivel,
        string $matricula,
        string $estatus,
        string $titulados_utp,
        string $fecha_cedulacion_dgp,
        string $fecha_pase_cedula,
        string $fecha_entrega_egresado,
        string $observaciones,
        string $respuesta_egresado,
        string $observacion_egresado,
        int $id
    ) {
        $this->curp = $curp;
        $this->nombre = $nombre;
        $this->ap_paterno = $ap_paterno;
        $this->ap_materno = $ap_materno;
        $this->parral_balleza = $parral_balleza;
        $this->genero = $genero;
        $this->mes_anio_ingreso = $mes_anio_ingreso;
        $this->mes_anio_egreso = $mes_anio_egreso;
        $this->fecha_egreso = $fecha_egreso;
        $this->numero_cedula = $numero_cedula;
        $this->nivel = $nivel;
        $this->matricula = $matricula;
        $this->estatus = $estatus;
        $this->titulados_utp = $titulados_utp;
        $this->fecha_cedulacion_dgp = $fecha_cedulacion_dgp;
        $this->fecha_pase_cedula = $fecha_pase_cedula;
        $this->fecha_entrega_egresado = $fecha_entrega_egresado;
        $this->observaciones = $observaciones;
        $this->respuesta_egresado = $respuesta_egresado;
        $this->observacion_egresado = $observacion_egresado;
        $this->id = $id;

        $sql = "UPDATE egresados 
                SET curp = ?, nombre = ?, ap_paterno = ?, ap_materno = ?, parral_balleza = ?, 
                    genero = ?, mes_anio_ingreso = ?, mes_anio_egreso = ?, fecha_egreso = ?, 
                    numero_cedula = ?, nivel = ?, matricula = ?, estatus = ?, titulados_utp = ?, 
                    fecha_cedulacion_dgp = ?, fecha_pase_cedula = ?, fecha_entrega_egresado = ?, 
                    observaciones = ?, respuesta_egresado = ?, observacion_egresado = ?
                WHERE id = ?";

        $datos = array(
            $this->curp,
            $this->nombre,
            $this->ap_paterno,
            $this->ap_materno,
            $this->parral_balleza,
            $this->genero,
            $this->mes_anio_ingreso,
            $this->mes_anio_egreso,
            $this->fecha_egreso,
            $this->numero_cedula,
            $this->nivel,
            $this->matricula,
            $this->estatus,
            $this->titulados_utp,
            $this->fecha_cedulacion_dgp,
            $this->fecha_pase_cedula,
            $this->fecha_entrega_egresado,
            $this->observaciones,
            $this->respuesta_egresado,
            $this->observacion_egresado,
            $this->id
        );

        // Ejecutamos la actualización
        $data = $this->save($sql, $datos);

        // Verificamos el resultado
        if ($data == 1) {
            $res = "Modificado";
        } else {
            $res = "error";
        }

        return $res;
    }

    public function editarEgresado(int $id)
    {
        $sql = "SELECT * FROM egresados WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function accionEgresado(int $estado, int $id,)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE egresados SET estado = ? WHERE id = ?";
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
}
?>

<?php
class Libros_bibliotecaModel extends Query
{
    private  $biblioteca, $clasificacion, $codigo, $cantidadejemplar, $cantidad, $titulo, $autor, $editorial, $observaciones, $id, $estado;
    public function __construct()
    {
        parent::__construct();
    }
    public function getLIBROSB()
    {
        $sql = "SELECT l.*, a.nombre AS nombre_autor, e.nombre AS nombre_editorial FROM librosb l INNER JOIN autores a ON l.autor = a.id INNER JOIN editoriales e ON l.editorial = e.id";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarLIBROB(string $biblioteca, string $clasificacion, string $codigo, string $cantidad, string $cantidadejemplar, string $titulo, string $autor, string $editorial, string $observaciones)
    {
        $this->biblioteca = $biblioteca;
        $this->clasificacion = $clasificacion;
        $this->codigo = $codigo;
        $this->cantidad = $cantidad;
        $this->cantidadejemplar = $cantidadejemplar;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->observaciones = $observaciones;
        $verificar = "SELECT * FROM librosb WHERE codigo = '$this->codigo'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            # code...
            $sql = "INSERT INTO librosb (biblioteca,clasificacion,codigo,cantidad,cantidadejemplar,titulo,autor,editorial,observaciones) VALUES(?,?,?,?,?,?,?,?,?)";
            $datos = array($this->biblioteca, $this->clasificacion, $this->codigo, $this->cantidad, $this->cantidadejemplar, $this->titulo, $this->autor, $this->editorial, $this->observaciones);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
        } else {
            $res = "existe";
        }

        return $res;
    }
    public function modificarLIBROB(string $biblioteca, string $clasificacion, string $codigo, string $cantidad, string $cantidadejemplar, string $titulo, string $autor, string $editorial, string $observaciones, int $id)
    {
        $this->biblioteca = $biblioteca;
        $this->clasificacion = $clasificacion;
        $this->codigo = $codigo;
        $this->cantidad = $cantidad;
        $this->cantidadejemplar = $cantidadejemplar;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->observaciones = $observaciones;
        $this->id = $id;
        $sql = "UPDATE librosb SET biblioteca = ?, clasificacion = ?, codigo = ?, cantidad = ?, cantidadejemplar = ?, titulo = ?, autor = ?, editorial = ?, observaciones= ? WHERE id = ?";
        $datos = array($this->biblioteca, $this->clasificacion, $this->codigo, $this->cantidad, $this->cantidadejemplar, $this->titulo, $this->autor, $this->editorial, $this->observaciones, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "Modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function editarLIBROB(int $id)
    {
        $sql = "SELECT * FROM librosb WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function accionLIBROB(int $estado, int $id,)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE librosb SET estado = ? WHERE id = ?";
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
    public function buscarlib($valor)
    {
        $sql = "SELECT id AS id,titulo AS text, estado FROM librosb WHERE titulo LIKE '%" . $valor . "%' AND estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function obtenerDatosqr($id)
    {
        $sql = "SELECT id, biblioteca, clasificacion, codigo, cantidad, cantidadejemplar, titulo, autor, editorial, observaciones, estado FROM librosb WHERE id = $id";
        $res = $this->select($sql);
        if ($res !== false && count($res) > 0) {
            return $res;
        } else {
            return false;
        }
    }
}

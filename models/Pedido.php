<?php
/**
 * Created by PhpStorm.
 * User: AlesikaPc
 * Date: 27/03/2019
 * Time: 7:51
 */

class Pedido
{
    private $id, $usuario_id, $provincia, $localidad, $direccion, $coste, $estado, $fecha, $hora, $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     */
    public function setUsuarioId($usuario_id): void
    {
        $this->usuario_id = $usuario_id;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia): void
    {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    /**
     * @return mixed
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * @param mixed $localidad
     */
    public function setLocalidad($localidad): void
    {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion): void
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    /**
     * @return mixed
     */
    public function getCoste()
    {
        return $this->coste;
    }

    /**
     * @param mixed $coste
     */
    public function setCoste($coste): void
    {
        $this->coste = $coste;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora): void
    {
        $this->hora = $hora;
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC ");
        return $productos;
    }


    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
    return $producto->fetch_object();
    }


    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES(NULL,'{$this->getUsuarioId()}','{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}', {$this->getCoste()},'confirm', CURDATE(), CURTIME())";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }


    public function save_linea()
    {
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elmento) {
            $producto = $elmento['producto'];

            $insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id},{$producto->id},{$elmento['unidades']})";
            $save = $this->db->query($insert);
        }
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;

    }

}
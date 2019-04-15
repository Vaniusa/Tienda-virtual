<?php
/**
 * Created by PhpStorm.
 * User: AlesikaPc
 * Date: 20/03/2019
 * Time: 17:44
 */

class Producto
{
    private $id, $categoria_id, $nombre, $descripcion,
        $precio, $stock, $oferta, $fecha, $imagen, $db;

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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    /**
     * @param mixed $categoria_id
     */
    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    /**
     * @return mixed
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * @param mixed $oferta
     */
    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);
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
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM
        productos ORDER BY id DESC ");
        return $productos;
    }


    public function getAllCategory()
    {
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p INNER JOIN categorias c ON c.id = p.categoria_id  WHERE p.categoria_id = {$this->getCategoriaId()}  ORDER BY id DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }


    public function getRandom($limit)
    {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }


    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM
        productos WHERE  id = {$this->getId()}");
        return $producto->fetch_object();
    }




    public function save()
    {
        $sql = "INSERT INTO productos VALUES (NULL, '{$this->getCategoriaId()}','{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getPrecio()}',
                              '{$this->getStock()}', NULL,CURDATE(),'{$this->getImagen()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }


    public function edit()
    {

        $sql = "UPDATE productos SET nombre = '{$this->getNombre()}',categoria_id = '{$this->getCategoriaId()}',descripcion = '{$this->getDescripcion()}', precio='{$this->getPrecio()}', stock='{$this->getStock()}'";


        //Comprobamos si se cambia una imagen nueva
        if ($this->getImagen() != null) {
            $sql .= " ,imagen='{$this->getImagen()}'";
        }
        $sql .= " WHERE id={$this->id} ;";


        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }


    public function delete()
    {
        $sql = "DELETE FROM productos WHERE id=($this->id)";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

}
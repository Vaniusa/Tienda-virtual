<?php
/**
 * Created by PhpStorm.
 * User: ionsa
 * Date: 17/03/2019
 * Time: 15:11
 */
require_once 'models/Categoria.php';
require_once 'models/Producto.php';

class CategoriaController
{
    public function index()
    {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }


    public function ver(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
                                                   // Conseguimos la categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();

                                                  //Conseguimos los productos
            $producto = new Producto();
            $producto->setId($id);
            $productos = $producto->getAllCategory();

        }
        require_once 'views/categoria/ver.php';
    }


    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }


    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST) && isset($_POST['nombre'])) {
            //Guardar la categoria en la BBDD
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }
        header("Location:" . base_url . "categoria/index");
    }
}
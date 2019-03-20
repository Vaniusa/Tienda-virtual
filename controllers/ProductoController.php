<?php
/**
 * Created by PhpStorm.
 * User: ionsa
 * Date: 17/03/2019
 * Time: 15:12
 */
require_once 'models/producto.php';
class ProductoController
{
    public function index(){
        require_once 'views/producto/destacados.php';
    }


    public function gestion(){

        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once 'views/producto/gestion.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once  'views/producto/crear.php';
    }


    public function save(){

    }

}
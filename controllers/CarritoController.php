<?php
/**
 * Created by PhpStorm.
 * User: AlesikaPc
 * Date: 25/03/2019
 * Time: 7:11
 */
require_once 'models/producto.php';

class CarritoController
{

    public function index()
    {
        var_dump($_SESSION['carrito']);
        echo "Controlador carrito, acion index";
    }


    public function add()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header('Location:' . base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }

        }
        if (!isset($counter) || $counter == 0) {
            //Conseguir el producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

                                            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }


        header("Location:" . base_url . "carrito/index");
    }


    public function remove()
    {

    }


    public function delete_all()
    {
        unset($_SESSION['carrito']);
        header("Location:" . base_url . "carrito/index");
    }

}
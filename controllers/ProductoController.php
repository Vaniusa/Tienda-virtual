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
    public function index()
    {
        require_once 'views/producto/destacados.php';
    }


    public function gestion()
    {

        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once 'views/producto/gestion.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }


    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;


            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoriaId($categoria);

                // Guarda la imagen
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' ||
                    $mimetype == 'image/png' || $mimetype == 'imge/gif') {

                    if (!is_dir('uploads/image')){
                        mkdir('uploads/images',0777,true);
                    }
                    $producto->setImagen($filename);
                    move_uploaded_file($file['tmp_name'],
                        'uploads/images/'.$filename);

                }

                $save = $producto->save();


                if ($save) {
                    $_SESSION['producto'] = "complete";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            } else {
                $_SESSION['producto'] = "failed";
            }

        } else {
            $_SESSION['producto'] = "failed";
        }

        header('Location:' . base_url . 'producto/gestion');
    }

}
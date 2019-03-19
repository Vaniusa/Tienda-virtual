 <?php
/**
 * Created by PhpStorm.
 * User: ionsa
 * Date: 17/03/2019
 * Time: 15:11
 */
require_once 'models/Categoria.php';
class CategoriaController
{
    public function index()
    {
         $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }
}
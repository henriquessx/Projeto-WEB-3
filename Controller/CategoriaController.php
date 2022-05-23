<?php

/**
 * Classe para determinar quais rotas...
 */
class CategoriaController 
{
    public static function index() 
    {
        include 'Model/CategoriaModel.php'; 
        $model = new CategoriaModel();
        $model->getAllRows(); 

        include 'View/modules/Categoria/ListaCategorias.php'; 
    }

    public static function form() 
    {
        include 'Model/CategoriaModel.php'; 
        $model = new CategoriaModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']); 
        include 'View/modules/Categoria/FormCategoria.php'; 
    }

    public static function save() { 

        include 'Model/CategoriaModel.php';

        $categoria = new CategoriaModel();
        $categoria->id = $_POST['id'];
        $categoria->nome = $_POST['nome'];
        $categoria->save(); 

        header('location: /categoria'); 
    }

    public static function delete()
    {
        include 'Model/CategoriaModel.php';

        $model = new CategoriaModel();
        $model->delete( (int) $_GET['id'] );

        header("Location: /categoria");
    }
}
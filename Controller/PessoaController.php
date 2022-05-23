<?php

class PessoaController 
{
    public static function index() // Listagem dos Registros
    {
        include 'Model/PessoaModel.php'; // Incluindo o arquivo Model
        $model = new PessoaModel();
        $model->getAllRows(); // Pegando todos os registros do Model

        include 'View/modules/Pessoa/ListaPessoas.php';
    }

    public static function form() // Exibição do Formulário
    {
        include 'Model/PessoaModel.php';
        $model = new PessoaModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']); // Exibição do Model com o dados do ID definido

        include 'View/modules/Pessoa/FormPessoa.php'; // Inclusão do Arquivo do Formulário
    }

    public static function save() { // Salvar Registro

        include 'Model/PessoaModel.php';

        $pessoa = new PessoaModel();
        $pessoa->id = $_POST['id'];
        $pessoa->nome = $_POST['nome'];
        $pessoa->rg = $_POST['rg'];
        $pessoa->cpf = $_POST['cpf'];
        $pessoa->data_nascimento = $_POST['data_nascimento'];
        $pessoa->email = $_POST['email'];
        $pessoa->telefone = $_POST['telefone'];
        $pessoa->endereco = $_POST['endereco'];

        $pessoa->save(); // Execução da Função de Salvar

        header('Location: /pessoa'); // Redirecionamento 
    }

    public static function delete()
    {
        include 'Model/PessoaModel.php';

        $model = new PessoaModel();
        $model->delete( (int) $_GET['id'] );

        header("Location: /pessoa");
    }
}
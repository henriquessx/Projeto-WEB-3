<?php

class PessoaDAO
{
    private $conexao;

    function __construct() {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema"; // Host & Nome do Banco de Dados
        $user = "root"; // Usuário de Acesso ao Banco de Dados
        $pass = "etecjau"; // Senha de Acesso ao Banco de Dados
        
        $this->conexao = new PDO($dsn, $user, $pass);
    }

    function insert(PessoaModel $model) { // Função de Inserção de uma Model
        
        $sql = "INSERT INTO pessoa 
                (nome, rg, cpf, data_nascimento, email, telefone, endereco) 
                VALUES (?, ?, ?, ?, ?, ?, ?)"; // Código SQL em execução
         
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome); 
        $stmt->bindValue(2, $model->rg);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->email);
        $stmt->bindValue(6, $model->telefone);
        $stmt->bindValue(7, $model->endereco);
        // Preenchimento de dados em seus respectivos espaços, aonde cada número equivale ao ?
        // Exemplo: 1 = Primeira Interrogação, 2 = Segunda Interrogação...
        $stmt->execute();
    }

    function getAllRows(){
        $sql = "SELECT * FROM pessoa";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById(int $id){ // Função de Seleção de Registro
        include_once 'Model/PessoaModel.php';

        $sql = "SELECT * FROM pessoa WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("PessoaModel");
    }

    public function update(PessoaModel $model){ // Função de Atualização de Registro
        $sql = "UPDATE pessoa SET nome=?, rg=?, cpf=?, data_nascimento=?, email=?, telefone=?, endereco=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->rg);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->email);
        $stmt->bindValue(6, $model->telefone);
        $stmt->bindValue(7, $model->endereco);
        $stmt->bindValue(8, $model->id);
        $stmt->execute();
    }

    public function delete(int $id) // Função de Exlusão de Registro pelo ID
    {
        $sql = "DELETE FROM pessoa WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
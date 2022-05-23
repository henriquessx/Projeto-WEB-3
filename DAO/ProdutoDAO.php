<?php

class ProdutoDAO
{
    private $conexao;

    function __construct() {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        $this->conexao = new PDO($dsn, $user, $pass);
    }

    function insert(ProdutoModel $model){
        $sql = "INSERT INTO produtos 
                (nome, valor, descricao, data_adicionado, id_categoria) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->valor);
        $stmt->bindValue(3, $model->descricao);
        $stmt->bindValue(4, $model->data_adicionado);
        $stmt->bindValue(5, $model->id_categoria);
        $stmt->execute();   
    }

    public function selectById(int $id){
        include_once 'Model/ProdutoModel.php';

        $sql = "SELECT * FROM produtos WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ProdutoModel");
    }

    public function update(produtoModel $model){
        $sql = "UPDATE produtos SET nome=?, valor=?, descricao=?, data_adicionado=?, id_categoria=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->valor);
        $stmt->bindValue(3, $model->descricao);
        $stmt->bindValue(4, $model->data_adicionado);
        $stmt->bindValue(5, $model->id_categoria);
        $stmt->bindValue(6, $model->id);
        $stmt->execute();
    }

    function getAllRows(){
        $sql = "SELECT p.id, p.nome, p.valor, p.descricao, p.data_adicionado, c.nome categoria FROM produtos p JOIN categorias c ON c.id = p.id_categoria";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM produtos WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
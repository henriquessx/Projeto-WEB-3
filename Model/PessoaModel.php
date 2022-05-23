<?php

class PessoaModel
{
    public $id, $nome, $rg, $cpf; 
    public $data_nascimento, $email;
    public $telefone, $endereco;
    // Atributos


    public $rows;

    public function save() // Função de Salvar
    {
        include 'DAO/PessoaDAO.php';

        $dao = new PessoaDAO();

        if(empty($this->id)) {  
            $dao->insert($this); // Execução da Inserção na DAO
        } else {
            $dao->update($this); // Execução de Atualização na DAO
        }
    }

    public function getAllRows(){ // Retorno dos Registros do Banco de Dados
        include 'DAO/PessoaDAO.php';

        $dao = new PessoaDAO();

        $this->rows = $dao->getAllRows();
    }

    public function getById(int $id){ // Retorno de Registros Específicos do Banco de Dados
        include 'DAO/PessoaDAO.php';

        $dao = new PessoaDAO();
        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new PessoaModel();
    }

    public function delete(int $id) // Exclusão "Deletar" um Registro pelo ID
    {
        include 'DAO/PessoaDAO.php';

        $dao = new PessoaDAO();
        $dao->delete($id);
    }
}
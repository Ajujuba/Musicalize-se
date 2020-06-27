<?php

class Aluno
{

    public $idaluno;
    public $email;
    public $nome;
    public $telefone;
    public $rg;
    public $cpf;
    public $adm_token;


    public function __construct($idaluno = false)
    {
        if ($idaluno) {
            $this->idaluno = $idaluno;
            $this->carregar();
        }
    }

    public static function listar()
    {
        $query = "SELECT idaluno, email, nome, telefone, rg, cpf FROM aluno ORDER BY nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query = "SELECT idaluno, email, nome, telefone, rg, cpf FROM aluno WHERE idaluno = :idaluno";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idaluno', $this->idaluno);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
    }

    public function inserir()
    {
        $query = "INSERT INTO aluno (nome) VALUES (:nome)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE categorias set nome = :nome WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM aluno WHERE idaluno = :idaluno";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idaluno', $this->idaluno);
        $stmt->execute();
    }

    public function carregarProdutos()
    {
        $this->produtos = Produto::listarPorCategoria($this->id);
    }



}

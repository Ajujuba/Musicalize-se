<?php

class preAluno
{

    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $status;


    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public static function listar()
    {
        $query = "SELECT id, nome, email, telefone  FROM contato_aluno WHERE status = 0
        ORDER BY nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }


    public function carregar()
    {
        $query = "SELECT id, nome, email, telefone FROM contato_aluno WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
        $this->email = $linha['email'];
    }

    public function inserir()
    {
        $query = "INSERT INTO contato_aluno (nome,email, telefone) VALUES (:nome, :email, :telefone)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':telefone', $this->telefone);
        $stmt->execute();
    }

    public function atualizar($id)
    {
        $query = "UPDATE contato_aluno SET status = 1 WHERE id = $id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
    }





}

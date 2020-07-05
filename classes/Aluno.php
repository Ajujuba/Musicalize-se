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
        $this->email = $linha['email'];
        $this->telefone = $linha['telefone'];
        $this->rg = $linha['rg'];
        $this->cpf = $linha['cpf'];
    }

    public function inserir()
    {
        $query = "INSERT INTO aluno (email, nome, telefone, rg, cpf, adm_token) VALUES (:email, :nome, :telefone, :rg, :cpf, :adm_token)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':telefone', $this->telefone);
        $stmt->bindValue(':rg', $this->rg);
        $stmt->bindValue(':cpf', $this->cpf);
        $stmt->bindValue(':adm_token', $this->adm_token);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE aluno set email = :email, nome = :nome, telefone = :telefone, rg = :rg, cpf = :cpf  WHERE idaluno = :idaluno";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':telefone', $this->telefone);
        $stmt->bindValue(':rg', $this->rg);
        $stmt->bindValue(':cpf', $this->cpf);
        $stmt->bindValue(':idaluno', $this->idaluno);
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

    



}

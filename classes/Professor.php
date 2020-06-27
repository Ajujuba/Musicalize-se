<?php

class Professor
{

    public $idprofessor;
    public $nome;
    public $email;
    public $rg;
    public $cpf;
    public $telefone;
    public $senha;
    public $curso;
    public $adm_token;


    public function __construct($idprofessor = false)
    {
        if ($idprofessor) {
            $this->idprofessor = $idprofessor;
            $this->carregar();
        }
    }

    public static function listar()
    {
        $query = "SELECT p.idprofessor, p.nome, p.email, p.cpf, p.telefone, p.curso, c.nome as curso_nome
        FROM professor p 
        INNER JOIN curso c ON p.curso = c.idcurso
        ORDER BY p.nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query = "SELECT idprofessor, nome, email, rg, cpf, telefone FROM professor WHERE idprofessor = :professor";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':professor', $this->idprofessor);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
        $this->email = $linha['email'];
        $this->rg = $linha['rg'];
        $this->cpf = $linha['cpf'];
        $this->telefone = $linha['telefone'];
    }

    public function inserir()
    {
        $query = "INSERT INTO professor (nome, email, rg, cpf, telefone, senha, curso, adm_token) VALUES (:nome, :email, :rg, :cpf, :telefone, :senha, :curso , :adm_token)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':rg', $this->rg);
        $stmt->bindValue(':cpf', $this->cpf);
        $stmt->bindValue(':telefone', $this->telefone);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->bindValue(':curso', $this->curso);
        $stmt->bindValue(':adm_token', $this->adm_token);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE professor set nome = :nome, email = :email, rg = :rg, cpf = :cpf, telefone = :telefone WHERE idprofessor = :idprofessor";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':rg', $this->rg);
        $stmt->bindValue(':cpf', $this->cpf);
        $stmt->bindValue(':telefone', $this->telefone);
        $stmt->bindValue(':idprofessor', $this->idprofessor);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM professor WHERE idprofessor = :idprofessor";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idprofessor', $this->idprofessor);
        $stmt->execute();
    }



}

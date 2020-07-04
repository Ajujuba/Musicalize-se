<?php

class Contato
{

    public $idcontato;
    public $nome;
    public $email;
    public $mensagem;
    public $status;


    public function __construct($idcontato = false)
    {
        if ($idcontato) {
            $this->idcontato = $idcontato;
            $this->carregar();
        }
    }

    public static function listar()
    {
        $query = "SELECT idcontato, nome, email, mensagem  FROM contato  WHERE status = 0
        ORDER BY nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }


    public function carregar()
    {
        $query = "SELECT idcontato, nome, email, mensagem FROM contato WHERE idcontato = :idcontato";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idcontato', $this->idcontato);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
        $this->mensagem = $linha['mensagem'];
    }

    public function inserir()
    {
        $query = "INSERT INTO contato (nome,email, mensagem) VALUES (:nome, :email, :mensagem)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':mensagem', $this->mensagem);
        $stmt->execute();
    }

    public function atualizar($idcontato)
    {
        $query = "UPDATE contato SET status = 1 WHERE idcontato = $idcontato";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
    }






}

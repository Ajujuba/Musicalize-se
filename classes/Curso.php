<?php

class Curso
{

    public $idcurso;
    public $nome;
    public $descricao;
    public $adm_token;


    public function __construct($idcurso = false)
    {
        if ($idcurso) {
            $this->idcurso = $idcurso;
            $this->carregar();
        }
    }

    public static function listar()
    {
        $query = "SELECT idcurso, nome, descricao, adm_token FROM curso ORDER BY nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query = "SELECT idcurso, nome, descricao, adm_token FROM curso WHERE idcurso = :idcurso";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idcurso', $this->idcurso);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
        $this->descricao = $linha['descricao'];
    }

    public function inserir()
    {
        $query = "INSERT INTO curso (nome,descricao, adm_token) VALUES (:nome, :descricao, :adm_token)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':adm_token', $this->adm_token);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE curso SET nome = :nome, descricao = :descricao WHERE idcurso = :idcurso";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':idcurso', $this->idcurso);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM curso WHERE idcurso = :idcurso";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idcurso', $this->idcurso);
        $stmt->execute();
    }

    public function carregarProdutos()
    {
        $this->produtos = Produto::listarPorCategoria($this->id);
    }



}

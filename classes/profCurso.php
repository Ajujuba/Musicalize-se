<?php

class profCurso
{

    public $professor_idprofessor;
    public $curso_idcurso;


    // public function __construct($curso_idcurso = false, $professor_idprofessor = false)
    // {
    //     if ($professor_idprofessor) {
    //         $this->idcurso = $idcurso;
    //         $this->carregar();
    //     }
    // }

    public static function listar($idprofessor)
    {
        $query = "SELECT pc.professor_idprofessor, pc.curso_idcurso, c.nome as curso_nome, p.nome as professor_nome
        FROM professor_curso pc
        INNER JOIN curso c ON pc.curso_idcurso = c.idcurso
        INNER JOIN professor p ON  pc.professor_idprofessor = p.idprofessor
        WHERE p.idprofessor = $idprofessor
        ORDER BY p.nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function verifica_prof_curso($curso_idcurso, $idprofessor)
    {
        $query = "SELECT curso_idcurso FROM professor_curso 
        WHERE professor_curso.curso_idcurso = $curso_idcurso
        AND professor_curso.professor_idprofessor = $idprofessor";
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
        $query = "INSERT INTO professor_curso (professor_idprofessor, curso_idcurso) VALUES (:professor_idprofessor, :curso_idcurso)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':professor_idprofessor', $this->professor_idprofessor);
        $stmt->bindValue(':curso_idcurso', $this->curso_idcurso);
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





}

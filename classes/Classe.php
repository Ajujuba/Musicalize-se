<?php

class Classe
{
    public $idclasse;
    public $professor_idprofessor;
    public $curso_idcurso;
    public $periodo ;

    public static function listar($x)
    {
        $query = "SELECT cl.idclasse, cl.professor_idprofessor, cl.curso_idcurso, cr.nome, cl.periodo FROM classe cl
        INNER JOIN curso cr ON cl.curso_idcurso = cr.idcurso WHERE cl.professor_idprofessor = $x AND cl.status = 0 ORDER BY cr.nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchALL();
        return $lista;
    }

    public static function listarAdm()
    {
        $query = "SELECT cl.idclasse, cl.professor_idprofessor, cl.curso_idcurso, cr.nome AS curso_nome, cl.periodo, p.nome AS professor_nome FROM classe cl
        INNER JOIN curso cr ON cl.curso_idcurso = cr.idcurso 
        INNER JOIN professor p ON cl.professor_idprofessor = p.idprofessor WHERE cl.status = 0 ORDER BY cr.nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchALL();
        return $lista;
    }

    public function atualizar($x)
    {
        $query = "UPDATE classe SET status = 1 WHERE idclasse = $x";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
    }

    public function inserir()
    {
        $query = "INSERT INTO classe (professor_idprofessor, curso_idcurso, periodo) VALUES (:professor_idprofessor, :curso_idcurso, :periodo)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':professor_idprofessor', $this->professor_idprofessor);
        $stmt->bindValue(':curso_idcurso', $this->curso_idcurso);
        $stmt->bindValue(':periodo', $this->periodo);
        $stmt->execute();
    }

}
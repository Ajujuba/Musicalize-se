<?php

class Classe
{
    public $idclasse;
    public $professor_idprofessor;
    public $curso_idcurso;
    public $periodo ;

    /* Não To usando mas provavelmente a ana vai
    public function __construct($idclasse = false)
    {
        if ($idclasse) {
            $this->idclasse = $idclasse;
            $this->carregar();
        }
    }*/

    public static function listar($x)
    {
        $query = "SELECT cl.idclasse, cl.professor_idprofessor, cl.curso_idcurso, cr.nome, cl.periodo FROM classe cl
        INNER JOIN curso cr ON cl.curso_idcurso = cr.idcurso WHERE cl.professor_idprofessor = $x ORDER BY cr.nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchALL();
        return $lista;
    }

    /* Não To usando mas provavelmente a ana vai
    public function carregar()
    {
        $query = "SELECT idclasse, professor_idprofessor, curso_idcurso, periodo FROM aluno WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->idclasse = $linha['idclasse'];
        $this->professor_idprofessor = $linha['professor_idprofessor'];
        $this->curso_idcurso = $linha['curso_idcurso'];
        $this->periodo = $linha['periodo'];

    }*/

}
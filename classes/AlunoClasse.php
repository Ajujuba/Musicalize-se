<?php

class AlunoClasse
{
    public $aluno_idaluno;
    public $classe_idclasse;

    public static function listar($x)
    {
        $query = "SELECT ac.aluno_idaluno, ac.classe_idclasse, a.nome, a.email FROM aluno_classe ac
        INNER JOIN aluno a ON ac.aluno_idaluno = a.idaluno WHERE ac.classe_idclasse = $x ORDER BY a.nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchALL();
        return $lista;
    }

    public static function inserir($idaluno,$idclasse)
    {
        $query = "INSERT INTO aluno_classe (aluno_idaluno, classe_idclasse) VALUES ($idaluno, $idclasse)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
    }


}




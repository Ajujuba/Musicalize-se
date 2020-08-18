<?php

class Administrador
{

    public $token;
    public $nome;


    // public function __construct($id = false)
    // {
    //     if ($id) {
    //         $this->id = $id;
    //         $this->carregar();
    //     }
    // }

    public static function listar()
    {
        $query = "SELECT token, nome FROM adm ORDER BY nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }


    public function validar($token, $senha)
    {
        $query = "SELECT * FROM adm
        WHERE token = $token AND senha LIKE '$senha'";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetch();
        return $lista;
    }



}

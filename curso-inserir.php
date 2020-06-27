<?php
    require_once 'global.php';

    try {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $adm_token = $_POST['adm_token'];

        $curso = new Curso();

        $curso->nome = $nome;
        $curso->descricao = $descricao;
        $curso->adm_token = $adm_token;
        $curso->inserir();

        header('Location: curso.php');


    } catch (Exception $e) {
        Erro::trataErro($e);
    }

    
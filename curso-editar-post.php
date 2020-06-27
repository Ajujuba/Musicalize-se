<?php
    require_once 'global.php';

    try {

        $idcurso = $_POST['idcurso'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        

        $curso = new Curso($idcurso);
        $curso->nome = $nome;
        $curso->descricao = $descricao;
        $curso->atualizar();

        header('Location: curso.php');

    } catch (Exception $e) {
        Erro::trataErro($e);
    }
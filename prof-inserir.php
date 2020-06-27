<?php
    require_once 'global.php';

    try {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $curso = $_POST['curso'];
        $adm_token = $_POST['adm_token'];

        $professor = new Professor();

        $professor->nome = $nome;
        $professor->email = $email;
        $professor->rg = $rg;
        $professor->cpf = $cpf;
        $professor->telefone = $telefone;
        $professor->senha = $senha;
        $professor->curso = $curso;
        $professor->adm_token = $adm_token;
        $professor->inserir();

        header('Location: professor.php');


    } catch (Exception $e) {
        Erro::trataErro($e);
    }

    
<?php
    require_once 'global.php';

    try {

        $idaluno = $_POST['idaluno'];
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        

        $aluno = new Aluno($idaluno);
        $aluno->email = $email;
        $aluno->nome = $nome;
        $aluno->telefone = $telefone;
        $aluno->rg = $rg;
        $aluno->cpf = $cpf;
        $aluno->atualizar();

        header('Location: aluno.php');

    } catch (Exception $e) {
        Erro::trataErro($e);
    }
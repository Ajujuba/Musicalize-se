<?php
    require_once 'global.php';

    try {

        $idprofessor = $_POST['idprofessor'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];

        $professor = new Professor($idprofessor);
        $professor->nome = $nome;
        $professor->email = $email;
        $professor->rg = $rg;
        $professor->cpf = $cpf;
        $professor->telefone = $telefone;
        $professor->atualizar();

        header('Location: professor.php');

    } catch (Exception $e) {
        Erro::trataErro($e);
    }
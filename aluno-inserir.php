<?php
    require_once 'global.php';
    
    
    try{

            $email = $_POST['email'];
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $rg = $_POST['rg'];
            $cpf = $_POST['cpf'];
            $adm_token = $_POST['adm_token'];
    
            $aluno = new Aluno();
    
            $aluno->email = $email;
            $aluno->nome = $nome;
            $aluno->telefone = $telefone;
            $aluno->rg = $rg;
            $aluno->cpf = $cpf;
            $aluno->adm_token = $adm_token;
            $aluno->inserir();
    
            header('Location: aluno.php');      


    } catch (Exception $e) {
        Erro::trataErro($e);
    }

    
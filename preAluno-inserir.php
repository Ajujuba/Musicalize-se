<?php
    require_once 'global.php';
    
    
    try{
        
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
    
            $preAluno = new preAluno();
    
            $preAluno->nome = $nome;
            $preAluno->email = $email;
            $preAluno->telefone = $telefone;
            $preAluno->inserir();
    
            header('Location: index.html');
       


    } catch (Exception $e) {
        Erro::trataErro($e);
    }

    
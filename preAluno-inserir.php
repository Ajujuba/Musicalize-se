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
    
            echo "<script>alert('Sua pré-matrícula foi recebida com sucesso!');";
            echo "javascript:window.location='index.html';</script>";
       


    } catch (Exception $e) {
        Erro::trataErro($e);
    }

    
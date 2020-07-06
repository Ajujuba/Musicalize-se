<?php
    require_once 'global.php';
    
    
    try{
        
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $mensagem = $_POST['mensagem'];
    
            $contato = new Contato();
    
            $contato->nome = $nome;
            $contato->email = $email;
            $contato->mensagem = $mensagem;
            $contato->inserir();
    
            echo "<script>alert('Sua mensagem foi recebida com sucesso!');";
            echo "javascript:window.location='index.html';</script>";
       


    } catch (Exception $e) {
        Erro::trataErro($e);
    }

    
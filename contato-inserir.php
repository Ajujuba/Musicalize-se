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
    
            header('Location: index.html');
       


    } catch (Exception $e) {
        Erro::trataErro($e);
    }

    
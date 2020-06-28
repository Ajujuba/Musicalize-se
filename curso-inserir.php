<?php
    require_once 'global.php';
    $nome = $_POST['nome'];
    
    try{
        
        $lista = Curso::verifica($nome);
        if($lista){
            echo "<script>alert('Não é possível salvar um curso já existente na base de dados!');";
            echo "javascript:window.location='curso.php';</script>";
        }else{

            $descricao = $_POST['descricao'];
            $adm_token = $_POST['adm_token'];
    
            $curso = new Curso();
    
            $curso->nome = $nome;
            $curso->descricao = $descricao;
            $curso->adm_token = $adm_token;
            $curso->inserir();
    
            header('Location: curso.php');
        }
        
       


    } catch (Exception $e) {
        Erro::trataErro($e);
    }

    
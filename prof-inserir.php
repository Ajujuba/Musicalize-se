<?php
    require_once 'global.php';
        // $curso = $_POST['curso'];

    try {

        // $lista = Professor::verifica($curso);
        // if($lista){
        //     echo "<script>alert('Não é possível registrar esse curso para esse professor pois ele já está sendo lecionado por outro professor!');";
        //     echo "javascript:window.location='professor.php';</script>";
        // }else{
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $rg = $_POST['rg'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
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
        // }
        


    } catch (Exception $e) {
        Erro::trataErro($e);
    }

    
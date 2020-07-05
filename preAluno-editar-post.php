<?php
    require_once 'global.php';

    try {

        $id = $_POST['id'];
        $status = $_POST['status']; 
        

        $preAluno = new preAluno($id);
        $preAluno->status = $status;
        $preAluno->atualizar($id);

        header('Location: preAluno.php');

    } catch (Exception $e) {
        Erro::trataErro($e);
    }
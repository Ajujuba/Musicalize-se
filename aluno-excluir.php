<?php
    require_once 'global.php';

    try {
        $idaluno = $_GET['id'];
        $aluno = new Aluno($idaluno);

        $aluno->excluir();

        header('Location: aluno.php');
        } catch (Exception $e) {
            Erro::trataErro($e);
        }
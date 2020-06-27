<?php
    require_once 'global.php';

    try {
        $idprofessor = $_GET['id'];
        $professor = new Professor($idprofessor);

        $professor->excluir();

        header('Location: professor.php');
        } catch (Exception $e) {
            Erro::trataErro($e);
        }
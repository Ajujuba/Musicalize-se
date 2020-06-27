<?php
    require_once 'global.php';

    try {
        $idcurso = $_GET['id'];
        $curso = new Curso($idcurso);

        $curso->excluir();

        header('Location: curso.php');
        } catch (Exception $e) {
            Erro::trataErro($e);
        }
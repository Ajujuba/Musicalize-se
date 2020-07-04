<?php
    require_once 'global.php';

    try {

        $idcontato = $_POST['idcontato'];
        $status = $_POST['status']; 
        

        $contato = new Contato($idcontato);
        $contato->status = $status;
        $contato->atualizar($idcontato);

        header('Location: contato.php');

    } catch (Exception $e) {
        Erro::trataErro($e);
    }
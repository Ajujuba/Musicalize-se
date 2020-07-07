<?php require_once 'global.php' ?>

<?php
    $id = $_GET['id'];

    try {
        Classe::atualizar($id);

    } catch (Exception $e) {
        Erro::trataErro($e);
    }

    echo "<script>alert('A classe de ID: $id foi desabilitada');";
    echo "javascript:window.location='classe-Adm.php';</script>";

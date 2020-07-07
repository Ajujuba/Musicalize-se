<?php require_once 'global.php' ?>

<?php
    $idclasse = $_GET['id'];

    echo "<script>alert('Para desabilitar a classe de ID: $idclasse clique em OK');";
    echo "javascript:window.location='classe-Adm-editar-post.php?id=$idclasse';</script>";

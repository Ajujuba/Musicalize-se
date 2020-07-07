<?php require_once 'global.php' ?>
<?php
$idclasse = $_GET['id'];
$idaluno = $_GET['ida'];

try {
    AlunoClasse::inserir($idaluno,$idclasse);
    echo "<script>alert('Aluno matriculado com sucesso!');";
    echo "javascript:window.location='aluno.php';</script>";
} catch(Exception $e) {
    Erro::trataErro($e);
}

<?php
require_once 'global.php';

    try{
        $idcurso = $_POST['idcurso'];
        $idprofessor = $_POST['professor_idprofessor'];
        $periodo = $_POST['periodo'];

        $classe = new Classe();

        $classe->professor_idprofessor = $idprofessor;
        $classe->curso_idcurso = $idcurso;
        $classe->periodo = $periodo;
        $classe->inserir();

        echo "<script>alert('Sua classe foi registrada com sucesso!');";
        echo "javascript:window.location='classe-Adm.php';</script>";
   


} catch (Exception $e) {
    Erro::trataErro($e);
}

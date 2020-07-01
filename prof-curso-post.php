<?php
    require_once 'global.php';
    $curso_idcurso = $_POST['curso_idcurso'];
    $idprofessor = $_POST['idprofessor']; 
    try{
        
        $lista = profCurso::verifica_prof_curso($curso_idcurso, $idprofessor);
        if($lista){
            echo "<script>alert('Não é possível adicionar o mesmo curso novamente para um professor!');";
            echo "javascript:window.location='professor.php';</script>";
        }else{
   
            $prof_curso = new profCurso();
    
            $prof_curso->curso_idcurso = $curso_idcurso;
            $prof_curso->professor_idprofessor = $idprofessor;

            $prof_curso->inserir();
    
            header('Location: professor.php');
        }
        
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

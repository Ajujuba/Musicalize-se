<?php require_once 'global.php' ?>
<?php
    try {
        $lista = preAluno::listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

     <title>Musicalize-se</title>
<!-- 

Known Template 

https://templatemo.com/tm-516-known

-->
<style type="text/css">
   #contact-form button[type='button']:hover {
     background: #29ca8e;
     border-color: #29ca8e;
     color: #ffffff;
     height:40px;
   }

   #contact-form button[type='button'] {
     border-radius: 50px;
     border: 1px solid transparent;
     border-color: #29ca8e;
     color: #29ca8e;
     height:40px;
   }

</style>


     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">Musicalize-se</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                    <li><a href="homeAdm.php" class="smoothScroll">Home</a></li>
                         <li><a href="aluno.php" class="smoothScroll">Alunos</a></li>
                         <li><a href="aviso.php" class="smoothScroll">Avisos</a></li>
                         <li><a href="curso.php" class="smoothScroll">Cursos</a></li>
                         <li><a href="professor.php" class="smoothScroll">Professores</a></li>
                         <li><a href="#contact" class="smoothScroll">Classe</a></li>
                         <li><a href="contato.php" class="smoothScroll">Contatos</a></li>
                         <li><a href="preAluno.php" class="smoothScroll">Pré-Matrículas</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="classes/Conexao.php"><i class="fa fa-user-circle"></i> Logout</a></li>
                    </ul>
                    
               </div>

          </div>
         
    </section>
    <div class="container">
          <div class="row">
          <br>
          <center><h3>Gerenciador de Pré-Matrícula</h3></center>
          <br>
               <div class="col-md-12">
                   <br><br>
                    <table class="table">
                         <thead>
                              <tr>
                                   <th>Id</th>
                                   <th>Nome</th>
                                   <th>Email</th>
                                   <th>Telefone</th>
                                   <th class="acao">Editar</th>
                                   <!-- <th class="acao">Excluir</th> -->
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach ($lista as $linha): ?>
                                   <tr>
                                   <td><?php echo $linha['id'] ?></td>
                                   <td><?php echo $linha['nome'] ?></td>
                                   <td><?php echo $linha['email'] ?></td>
                                   <td><?php echo $linha['telefone'] ?></td>
                                   <td><a href="preAluno-editar.php?id=<?php echo $linha['id'] ?>" class="btn btn-info">Editar</a></td>
                                   <!-- <td><a href="contato-excluir.php?id=<?php echo $linha['id'] ?>" class="btn btn-danger">Excluir</a></td> -->
                                   </tr>
                              <?php endforeach ?>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>



    <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
     <!-- <script>
          $(document).ready(function() {
          if(window.location.href.indexOf('#login') != -1) {
          $('#login').modal('show');
          }
          });
     </script>       -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>
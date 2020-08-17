<?php require_once 'global.php' ?>
<?php require_once 'verifica-adm.php' ?>
<?php
    try {
        $lista = Aluno::listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }

    try {
          $listaAdm = Administrador::listar();
     } catch (Exception $e) {
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
                         <li><a href="curso.php" class="smoothScroll">Cursos</a></li>
                         <li><a href="professor.php" class="smoothScroll">Professores</a></li>
                         <li><a href="classe-Adm.php" class="smoothScroll">Classe</a></li>
                         <li><a href="contato.php" class="smoothScroll">Contatos</a></li>
                         <li><a href="preAluno.php" class="smoothScroll">Pré-Matrículas</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="logoutAdm.php"><i class="fa fa-user-circle"></i> Logout</a></li>
                    </ul>

                  
                    
               </div>

          </div>
    </section>
<div class="container">
    <div class="row">
         <br>
          <center><h3>Gerenciador de alunos</h3></center>
          <br>
          <div class="col-md-4">
          <br>
               <form id="contact-form">
                    <button type="button" name="inserir_curso" class="form-control" data-toggle="modal" data-target="#aluno">
                            Inserir Aluno
                    </button>
                </form> 
               <!-- Modal -->
               <div class="modal fade" id="aluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                         <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Adicionar Aluno</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                              <span aria-hidden="true">&times;</span>
                              </button>
                         </div>
                         <div class="modal-body">
                              <form action="aluno-inserir.php" method="POST">
                                   <div class="form-group">
                                        <label for="email">Endereço de email</label>
                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email do aluno" required>
                                   </div>
                                   <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" aria-describedby="emailHelp" placeholder="Nome do aluno" required>
                                   </div>
                                   <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control phone-ddd-mask" id="telefone" name="telefone" placeholder="Telefone do aluno"  required>
                                   </div>
                                   <div class="form-group">
                                        <label for="telefone">RG</label>
                                        <input type="text" class="form-control" id="rg" name="rg" placeholder="RG do aluno"  required>
                                   </div>
                                   <div class="form-group">
                                        <label for="telefone">CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF do aluno"  required>
                                   </div>
                                   <div class="form-group">
                                        <label for="email">Administrador Responsável</label>
                                        <select name="adm_token" id="adm_token">
                                             <?php foreach ($listaAdm as $linha): ?>
                                             <option value="<?php echo $linha['token'] ?>"><?php echo $linha['nome'] ?></option>
                                             <?php endforeach ?>
                                        </select>
                                   </div>
                          </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-info">Cadastrar</button>
                                   </div>
                              </form>
                    </div>
               </div>
          </div>
     </div>
</div>
     <div class="container">
          <div class="row">
               <div class="col-md-12">
               <br>
                    <table class="table">
                         <thead>
                              <tr>
                                   <th>Id</th>
                                   <th>Email</th>
                                   <th>Nome</th>
                                   <th>Telefone</th>
                                   <th>RG</th>
                                   <th>CPF</th>
                                   <th class="acao">Editar</th>
                                   <th class="acao">Excluir</th>
                                   <th class="acao">Matricular</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach ($lista as $linha): ?>
                                   <tr>
                                   <td><?php echo $linha['idaluno'] ?></td>
                                   <td><?php echo $linha['email'] ?></td>
                                   <td><?php echo $linha['nome'] ?></td>
                                   <td><?php echo $linha['telefone'] ?></td>
                                   <td><?php echo $linha['rg'] ?></td>
                                   <td><?php echo $linha['cpf'] ?></td>
                                   <td><a href="aluno-editar.php?id=<?php echo $linha['idaluno']?>" class="btn btn-info">Editar</a></td>
                                   <td><a href="aluno-excluir.php?id=<?php echo $linha['idaluno']?>" class="btn btn-danger">Excluir</a></td>
                                   <td><a href="matricular.php?id=<?php echo $linha['idaluno']?>" class="btn btn-success">Matricular</a></td>
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
     <script type="text/javascript"> 
            $( document ).ready(function() {
                $('#telefone').mask('(00) 00000-0000');
                $('#cpf').mask('000.000.000-00');
            });
    </script>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>       

</body>
</html>
<?php 

require_once 'global.php'; 
// session_start inicia a sessão
if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
  session_start();
}
// as variáveis login e senha recebem os dados digitados na página anterior
$email = $_POST['email'];
$senha = $_POST['senha'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
// $con = mysql_connect("localhost", "root", "") or die
//  ("Sem conexão com o servidor");
// $select = mysql_select_db("server") or die("Sem acesso ao DB, Entre em 
// contato com o Administrador, gilson_sales@bytecode.com.br");
$conexao = Conexao::pegarConexao();
 
// A variavel $result pega as varias $token e $senha, faz uma 
//pesquisa na tabela de usuarios
$result =  Professor::validar($email, $senha);
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi 
bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do 
resultado ele redirecionará para a página site.php ou retornara  para a página 
do formulário inicial para que se possa tentar novamente realizar o login */
if($result  != false)
{
  $dados_usuario = $result;

  $_SESSION['id_usuario'] = $dados_usuario['idprofessor'];
  $_SESSION['email'] = $email;
  $_SESSION['senha'] = $senha;
  header('location:classe.php');
  
}       
else{
  unset ($_SESSION['email']);
  unset ($_SESSION['senha']);
  header('location:index.html');
  }
?>

<?php
  session_start();
  $username = "";
  $email = "";
  $errors = array();

//Conectar ao banco de dados
$db = mysqli_connect('localhost', 'root', '', 'ded');

//Se o botão Registrar for clicado
if(isset($_POST['register'])){
  $username = mysqli_real_escape_string($db, $_POST['username']); 
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  //Garantir que os campos do formulário estão preenchidos corretametee
  if (empty($username)) {
    array_push($errors, "Nome de usuário é requerido");
  }
  if (empty($email)) {
    array_push($errors, "Email é requerido");
  }
  if (empty($password_1)) {
    array_push($errors, "Senha é requerida");
  }

  if ($password_1 != $password_2) {
    array_push($errors, "Senhas não conferem");
  }

  //Se não houver erros, salvar usuário
  if (count($errors) == 0) {
    $password = md5($password_1); //Criptografar senha antes de salvá-la
    $sql = "INSERT INTO users (usuario, email, senha) VALUES ('$username', '$email', '$password')";
    mysqli_query($db, $sql);

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Você estã logado";
    header('location: login.php');// redireciona a página principal
  }
}

//Log de usuário na página de login
if (isset($_POST['login'])) {
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);

  //Garantir que os campos do formulário estão preenchidos corretametee
  if (empty($username)) {
    array_push($errors, "Nome de usuário é requerido");
  }
  if (empty($password)) {
    array_push($errors, "Senha é requerido");
  }

  //Se não houver erros, salvar usuário
  if (count($errors) == 0) {
    $password = md5($password); //Criptografar senha antes de salvá-la
    $query = "SELECT * FROM users WHERE usuario='$username' AND senha='$password'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Você estã logado";
      header('location: index.php');// redireciona a página principal
    }else {
      array_push($errors, "Usuário ou senha invalido");
    }

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Você está logado";
    header('location: index-adm.php');// redireciona a página principal
  }

}





















/*
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $tel = $_POST["tel"];

  include_once 'conexao.php';

  $sql = "insert into cliente values(null,'".$nome."','".$email."','".$tel."')";

    //echo $sql;
    if(mysql_query($sql,$con)){
        $msg = "Gravado com sucesso!";
    }else{
        $msg = "Erro ao gravar!";
    }
    mysql_close($con);

*/
 ?>

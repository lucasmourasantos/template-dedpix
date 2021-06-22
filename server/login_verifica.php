<?php
session_start();

include ("conexao.php");

$conn = conectaDB();

if (isset($_POST["login"])) {
    if (empty($_POST["usuario"]) || empty($_POST["senha"])) {
        $message = '<label>All fields are required</label>';
    } else {
        $query = "SELECT * FROM usuario WHERE usuario = :usuario AND senha = :senha";
        $statement = $conn->prepare($query);
        $statement->execute(
                array(
                    'usuario' => $_POST["usuario"],
                    'senha' => md5($_POST["senha"]) //Criptografar senha antes de salvá-la
                )
        );
        $count = $statement->rowCount();
        if ($count > 0) {
            $_SESSION["usuario"] = $_POST["usuario"];
            header("location: ../index-adm.php");
        } else {
            echo "<script>
                alert ('Usuario ou senha invalidos!');
                window.location.href= '../login.php';
                </script>";
            $message = '<label>Dados incorretos.</label>';
        }
    }
}
?>  
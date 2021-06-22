<?php

include 'conexao.php';

$conn = conectaDB();

if (isset($_POST['prof'])) {
    $instituicao_idinstituicao = $_POST['instituicao'];
    $disciplina_iddisciplina = $_POST['disciplina'];
    $nome = $_POST['nome'];

    $sql = "INSERT INTO professor (instituicao_idinstituicao, disciplina_iddisciplina, nome) "
            . "VALUES(:instituicao, :disciplina, :nome)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':instituicao', $instituicao_idinstituicao);
    $stmt->bindParam(':disciplina', $disciplina_iddisciplina);
    $stmt->bindParam(':nome', $nome);

    $result = $stmt->execute();

    if (!$result) {
        var_dump($stmt->errorInfo());
        exit();
    }
    //$_SESSION['message'] = "Record has been saved!";
    //$_SESSION['msg_type'] = "success";
    header('Location: ../cad-professor.php');
}
?>
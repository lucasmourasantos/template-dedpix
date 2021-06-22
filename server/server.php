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

if (isset($_POST['instituicao'])) {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];

    $sql = "INSERT INTO instituicao (nome, endereco) VALUES(:nome, :endereco)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':endereco', $endereco);

    $result = $stmt->execute();

    if (!$result) {
        var_dump($stmt->errorInfo());
        exit();
    }
    //$_SESSION['message'] = "Record has been saved!";
    //$_SESSION['msg_type'] = "success";
    header('Location: ../cad-instituicao.php');
}

if (isset($_POST['notas'])) {
    $idaluno = $_POST['idaluno'];
    $iddisciplina = $_POST['iddisciplina'];
    $nota = $_POST['nota'];

    $sql = "INSERT INTO notas (aluno_idaluno, disciplina_iddisciplina, nota) VALUES(:idaluno, :iddisciplina, :nota)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idaluno', $idaluno);
    $stmt->bindParam(':iddisciplina', $iddisciplina);
    $stmt->bindParam(':nota', $nota);

    $result = $stmt->execute();

    if (!$result) {
        var_dump($stmt->errorInfo());
        exit();
    }
    //$_SESSION['message'] = "Record has been saved!";
    //$_SESSION['msg_type'] = "success";
    header('Location: ../cad-notas.php');
}



if (isset($_POST['aluno'])) {
    $nome = $_POST['nome'];

    $sql = "INSERT INTO aluno (nome) VALUES(:nome)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);

    $result = $stmt->execute();

    if (!$result) {
        var_dump($stmt->errorInfo());
        exit();
    }
    //$_SESSION['message'] = "Record has been saved!";
    //$_SESSION['msg_type'] = "success";
    header('Location: ../cad-aluno.php');
}

if (isset($_POST['disciplina'])) {
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO disciplina (descricao) VALUES(:descricao)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':descricao', $descricao);

    $result = $stmt->execute();

    if (!$result) {
        var_dump($stmt->errorInfo());
        exit();
    }
    //$_SESSION['message'] = "Record has been saved!";
    //$_SESSION['msg_type'] = "success";
    header('Location: ../cad-disciplina.php');
}

if (isset($_POST['turma'])) {
    $idinstituicao = $_POST['idinstituicao'];
    $idprofessor = $_POST['idprofessor'];
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];

    $sql = "INSERT INTO turma (professor_idprofessor, instituicao_idinstituicao, descricao, tipo) "
            . "              VALUES(:idprofessor, :idinstituicao, :descricao, :tipo)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idprofessor', $idprofessor);
    $stmt->bindParam(':idinstituicao', $idinstituicao);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':tipo', $tipo);

    $result = $stmt->execute();

    if (!$result) {
        var_dump($stmt->errorInfo());
        exit();
    }
    //$_SESSION['message'] = "Record has been saved!";
    //$_SESSION['msg_type'] = "success";
    header('Location: ../cad-turma.php');
}
?>
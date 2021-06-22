<?php
//login_success.php  
session_start();
if (isset($_SESSION["usuario"])) {
//    echo '<h3>Login Success, Welcome - ' . $_SESSION["usuario"] . '</h3>';
//    echo '<br /><br /><a href="logout.php">Logout</a>';
    ?>

    <?php include 'parts/head.php'; ?>

    <div class="row painel_admin2">
        <div class="col-md-12 order-md-1 py-1 text-center">
            <h3>Cadastro de Frequência.</h3>
        </div>

        <div class="col-md-12 order-md-1">
            <form class="needs-validation" action="server/server.php" method="POST" novalidate>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">PROFESSOR</th>
                                    <th scope="col">DISCIPLINA</th>
                                    <th scope="col">INSTITUIÇÃO</th>
                                    <th scope="col">AÇÕES</th>
                                </tr>
                            </thead>
                            <?php
                            $conn = conectaDB();
                            $sql = "SELECT p.nome AS Professor, d.descricao AS Disciplina, i.nome AS Instituição FROM disciplina d JOIN professor p ON d.iddisciplina=p.disciplina_iddisciplina JOIN instituicao i on i.idinstituicao=p.instituicao_idinstituicao WHERE p.nome LIKE '%LUCCA%'";
                            $result = $conn->query($sql);

                            $pkCount = (is_array($result) ? count($result) : 0);
                            if ($pkCount == 0) {
                                foreach ($result as $res) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td><?php echo $res['Professor']; ?></td>
                                            <td><?php echo $res['Disciplina']; ?></td>
                                            <td><?php echo $res['Instituição']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                </div>
                <br>
            </form>
        </div>

        <?php include 'parts/footer.php'; ?>
        <?php
    } else {
        header("location: login.php");
    }
    ?>
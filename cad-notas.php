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
            <h3>Cadastro de Notas de Avaliações.</h3>
        </div>

        <div class="col-md-12 order-md-1">
            <form class="needs-validation" action="server/server.php" method="POST" novalidate>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <h5>Aluno: </h5>
                        <select class="form-control d-block w-100" id="layout" name="idaluno" required>
                            <option selected>Escolha...</option>
                            <?php
                            $conn = conectaDB();
                            $sql = "SELECT * FROM aluno order by nome";
                            $result = $conn->query($sql);

                            $pkCount = (is_array($result) ? count($result) : 0);
                            if ($pkCount == 0) {
                                foreach ($result as $res) {
                                    ?>
                                    <option value="<?php echo $res['idaluno']; ?>"><?php echo $res['nome']; ?></option>

                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5>Disciplina: </h5>
                        <select class="form-control d-block w-100" id="layout" name="iddisciplina" required>
                            <option selected>Escolha...</option>
                            <?php
                            $conn = conectaDB();
                            $sql = "SELECT * FROM disciplina order by descricao";
                            $result = $conn->query($sql);

                            $pkCount = (is_array($result) ? count($result) : 0);
                            if ($pkCount == 0) {
                                foreach ($result as $res) {
                                    ?>
                                    <option value="<?php echo $res['iddisciplina']; ?>"><?php echo $res['descricao']; ?></option>

                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5>Nota: </h5>
                        <input type="number" class="form-control" id="nome" name="nota" placeholder="Nota da avaliação" value="" required>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="notas">Confirmar</button>
                    </div>
                </div>
            </form>
        </div>

        <?php include 'parts/footer.php'; ?>
        <?php
    } else {
        header("location: login.php");
    }
    ?>
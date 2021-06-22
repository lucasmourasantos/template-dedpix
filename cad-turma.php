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
            <h3>Cadastro de Turmas da Instituição.</h3>
        </div>

            <div class="col-md-12 order-md-1">
                <form class="needs-validation" action="server/server.php" method="POST" novalidate>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h5>Instituição: </h5>
                            <select class="form-control d-block w-100" id="layout" name="idinstituicao" required>
                                <option selected>Escolha...</option>
                                <?php
                                $conn = conectaDB();
                                $sql = "SELECT * FROM instituicao order by nome";
                                $result = $conn->query($sql);

                                $pkCount = (is_array($result) ? count($result) : 0);
                                if ($pkCount == 0) {
                                    foreach ($result as $res) {
                                        ?>
                                        <option value="<?php echo $res['idinstituicao']; ?>"><?php echo $res['nome']; ?></option>

                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h5>Professor: </h5>
                            <select class="form-control d-block w-100" id="layout" name="idprofessor" required>
                                <option selected>Escolha...</option>
                                <?php
                                $conn = conectaDB();
                                $sql = "SELECT * FROM professor order by nome";
                                $result = $conn->query($sql);

                                $pkCount = (is_array($result) ? count($result) : 0);
                                if ($pkCount == 0) {
                                    foreach ($result as $res) {
                                        ?>
                                        <option value="<?php echo $res['idprofessor']; ?>"><?php echo $res['nome']; ?></option>

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
                            <h5>Turma: </h5>
                            <select class="form-control d-block w-100" id="layout" name="descricao" required>
                                <option selected>Escolha...</option>
                                <option value="Maternal I">Maternal I</option>
                                <option value="Maternal II">Maternal II</option>
                                <option value="Maternal III">Maternal III</option>
                                <option value="">------------------------</option>
                                <option value="Pré-Escola I">Pré-Escola I</option>
                                <option value="Pré-Escola II">Pré-Escola II</option>
                                <option value="Pré-Escola III">Pré-Escola III</option>
                                <option value="">------------------------</option>
                                <option value="1º ANO">1º ANO</option>
                                <option value="2º ANO">2º ANO</option>
                                <option value="3º ANO">3º ANO</option>
                                <option value="4º ANO">4º ANO</option>
                                <option value="5º ANO">5º ANO</option>
                                <option value="">------------------------</option>
                                <option value="6º ANO">6º ANO</option>
                                <option value="7º ANO">7º ANO</option>
                                <option value="8º ANO">8º ANO</option>
                                <option value="9º ANO">9º ANO</option>
                                <option value="">------------------------</option>
                                <option value="1ª SÉRIE">1ª SÉRIE</option>
                                <option value="2ª SÉRIE">2ª SÉRIE</option>
                                <option value="3ª SÉRIE">3ª SÉRIE</option>
                            </select>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h5>Tipo: </h5>
                            <select class="form-control d-block w-100" id="layout" name="tipo" required>
                                <option selected>Escolha...</option>
                                <option value="Educação Infantil">Educação Infantil</option>
                                <option value="Pré-escola">Pré-escola</option>
                                <option value="Ensino Fundamental">Ensino Fundamental I</option>
                                <option value="Ensino Fundamental">Ensino Fundamental II</option>
                                <option value="Ensino Médio">Ensino Médio</option>
                                <option value="Ensino Médio Técnico">Ensino Médio Técnico</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="turma">Confirmar</button>
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
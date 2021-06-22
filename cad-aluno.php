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
            <h3>Cadastro de Alunos.</h3>
        </div>

            <div class="col-md-12 order-md-1">
                <form class="needs-validation" action="server/server.php" method="POST" novalidate>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h5>Nome: </h5>
                            <input type="text" class="form-control" id="firstName" name="nome" placeholder="Nome do Aluno" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="aluno">Confirmar</button>
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
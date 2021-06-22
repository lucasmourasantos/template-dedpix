<?php
//login_success.php  
session_start();
if (isset($_SESSION["usuario"])) {
//    echo '<h3>Login Success, Welcome - ' . $_SESSION["usuario"] . '</h3>';
//    echo '<br /><br /><a href="logout.php">Logout</a>';
    ?>

    <?php include 'parts/head.php'; ?>

    <div class="row  painel_admin2">
        <div class="col-md-12 order-md-1">
            <form class="needs-validation" action="server/server.php" method="POST" novalidate>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <br>
                        <a
                            href="diario.php"
                            class="button btn btn-primary button-primary d-md-inline-block d-block mb-md-0 mb-2 mr-md-2"
                            >Diário</a>
                        <a
                            href="cadastros.php"
                            class="button btn btn-primary button-primary d-md-inline-block d-block mb-md-0 mb-2 mr-md-2"
                            >Cadastros</a>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
    </div> <!-- Fim container painel_admin -->
    
    <footer class="footer text-muted text-center text-small">
        <p class="mb-1">&copy; 2021-2022 Diário Eletrônico Digital | Pio IX</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
            crossorigin="anonymous">
    </script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" 
            crossorigin="anonymous">
    </script>
    <!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script>window.jQuery || document.write('<script src="js/jquery-3.4.0.min"><\script>')</script><script src="js/bootstrap.bundle.min.js" ></script>-->
    </body>
    </html>

    <?php
} else {
    header("location: login.php");
}
?>


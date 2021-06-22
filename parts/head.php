<?php include('server/conexao.php');       ?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="imagens/ícone ded.png">

        <title>Home | Admin</title>

        <!-- Bootstrap core CSS -->

        <link rel="stylesheet" href="css/bootstrap.min_4.3.0.css">
        <link href="css/_bootstrap.css" rel="stylesheet"/>
        <link href="css/Site.css" rel="stylesheet"/>
        <link href="css/font-awesome.css" rel="stylesheet"/>

        <!-- 
        -->

        <!-- Custom styles for this template -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/jquery-1.2.6.pack.js"></script>
        <script type="text/javascript" src="../js/jquery.maskedinput-1.1.4.pack.js"></script>

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
            .divider{
                height:0;
                margin:.3rem 0;
                overflow:hidden;
                border-top:1px solid #e9ecef;
            }
        </style>

        <style type="text/css">
            .carregando{
                color:#ff0000;
                display:none;
            }
        </style>



        <!-- Adicionando Javascript Busca Endereço pelo CEP-->
        <script type="text/javascript" >

            function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('rua').value = ("");
                document.getElementById('bairro').value = ("");
                document.getElementById('cidade').value = ("");
                document.getElementById('uf').value = ("");
                //document.getElementById('ibge').value=("");
            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('rua').value = (conteudo.logradouro);
                    document.getElementById('bairro').value = (conteudo.bairro);
                    document.getElementById('cidade').value = (conteudo.localidade);
                    document.getElementById('uf').value = (conteudo.uf);
                    //document.getElementById('ibge').value=(conteudo.ibge);
                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }

            function pesquisacep(valor) {

                //Nova variável "cep" somente com dígitos.
                var cep = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        document.getElementById('rua').value = "...";
                        document.getElementById('bairro').value = "...";
                        document.getElementById('cidade').value = "...";
                        document.getElementById('uf').value = "...";
                        //document.getElementById('ibge').value="...";

                        //Cria um elemento javascript.
                        var script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            }
            ;

        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#cpf").mask("999.999.999-99");
            });
        </script>

    </head>
    <body class="bg-light">
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <a href="#"><img class="logotipo" src="imagens/seduc-governo-piaui.png" /></a>
                    </div>
                    <div class="col-xs-12 col-md-4 siae">
                        <img class="siae_logo" src="imagens/pio 1.png" />
                        <!-- 
                        <h5>Diário Eletrônico Digital</h5>
                        -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-5">
            <div class="row painel_admin">
                <img class="d-block mx-auto login_avatar" src="imagens/users2.png" alt="" width="32" height="32">

                <div class="col">
                    <h6> <?php echo 'Login: ' . $_SESSION["usuario"]; ?> </h6>
                </div>

                <div class="col-4">
                    <a href="logout.php"><img class="d-block mx-auto login_avatar" src="imagens/sair_icon.png" alt="Sair da página" width="32" height="28"></a>
                    <a href="index-adm.php"><img class="d-block mx-auto login_avatar" src="imagens/home_2.png" alt="" width="32" height="28"></a>
                    
                </div>
            </div>
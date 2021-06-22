<?php include 'parts/head.php'; ?>

<div class="container">
    <div class="py-1">
        <img class="d-block mx-auto mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Inscrições Online</h2>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <form class="needs-validation" name="formEscola" id="formEscola" action="controllerBusca.php" method="POST">
                <div class="row">
                    <div class="input-group col-md-4 mb-3">
                        <input type="text" class="search-query form-control" id="cpf" name="cpf" placeholder="Buscar por CPF" maxlength="14" onkeypress="formatar('###.###.###-##', this);">
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-primary" name="emitir" value="Pesquisar">
                        </span>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                </div>
            </form>

            <form class="needs-validation" action="server/server.php" method="POST" novalidate>
                <div class="row">
                    <div class="col-md-8 mb-3">

                        <div class="resultadoForm">
                            <input type="hidden" name="participante_id" id="txtstart"/>
                            <table>
                                <thead>
                                    <tr>
                                        <td>CPF</td>
                                        <td>NOME</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="layout">Evento</label>
                        <select class="custom-select d-block w-100" name="id_evento" id="id_evento">
                            <option value="0">Escolha...</option>

                            <?php
                            $conn = conectaDB();
                            $sql = "SELECT * FROM evento order by nome";
                            $result = $conn->query($sql);

                            if (count($result)) {
                                foreach ($result as $res) {
                                    ?>
                                    <option value="<?php echo $res['id']; ?>"><?php echo $res['nome']; ?></option>

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
                        <label for="instituicao">Cursos disponíveis</label>
                        <span class="carregando">Carregando...</span>
                        <select class="custom-select d-block w-100" id="id_curso" name="id_curso">
                            <option value="0">Escolha...</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary btn-lg" type="submit" name="inscricao">Confirmar</button>
            </form>
        </div>
    </div>

    <script src="js/zepto.min.js"></script>
    <script src="javascript_Busca.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <script type="text/javascript">
        $(function(){
            $('#id_evento').change(function(){
                if( $(this).val() ) {
                    $('#id_curso').hide();
                    $('.carregando').show();
                    $.getJSON('buscar_curso_post.php?search=',{id_evento: $(this).val(), ajax: 'true'}, function(j){
                        var options = '<option value="">Escolha...</option>';	
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].nome + ' - ' + j[i].turno + '</option>';
                        }	
                        $('#id_curso').html(options).show();
                        $('.carregando').hide();
                    });
                } else {
                    $('#id_curso').html('<option value="">– Escolha ... –</option>');
                }
            });
        });
    </script>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2019 Pós-graduaçao</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>

<!-- ****** Simples função de colocar mascara em javascript ****** -->
<script>  function formatar(mascara, documento){   
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i);
    if (texto.substring(0,1) != saida){documento.value += texto.substring(0,1);}
}
</script>

<!-- ****** Validando o formulário (inclusive o CPF) ****** -->
<script>
$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nome: {
                validators: {
                    stringLength: {
                        min: 2
                    },
                    notEmpty: {
                        message: 'Insira o seu nome'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Insira o seu e-mail'
                    },
                    emailAddress: {
                        message: 'E-mail incorreto'
                    }
                }
            },
            cpf: {
                validators: {
                    callback: {
                        message: 'CPF Invalido',
                        callback: function(value) {
                            //retira mascara e nao numeros       
                            cpf = value.replace(/[^\d]+/g, '');
                            if (cpf == '') return false;

                            if (cpf.length != 11) return false;

                            // testa se os 11 digitos são iguais, que não pode.
                            var valido = 0;
                            for (i = 1; i < 11; i++) {
                                if (cpf.charAt(0) != cpf.charAt(i)) valido = 1;
                            }
                            if (valido == 0) return false;

                            //  calculo primeira parte  
                            aux = 0;
                            for (i = 0; i < 9; i++)
                                aux += parseInt(cpf.charAt(i)) * (10 - i);
                            check = 11 - (aux % 11);
                            if (check == 10 || check == 11)
                                check = 0;
                            if (check != parseInt(cpf.charAt(9)))
                                return false;

                            //calculo segunda parte  
                            aux = 0;
                            for (i = 0; i < 10; i++)
                                aux += parseInt(cpf.charAt(i)) * (11 - i);
                            check = 11 - (aux % 11);
                            if (check == 10 || check == 11)
                                check = 0;
                            if (check != parseInt(cpf.charAt(10)))
                                return false;
                            return true;


                        }
                    }
                }
            }
        }
    })

});
</script>
</body>
</html>
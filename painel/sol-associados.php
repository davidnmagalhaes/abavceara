<?php
$page = 5;
$search = $_GET['search'];

include('config-header.php');

$qcmb = "SELECT * FROM rfa_clubes WHERE id_clube='$clube'";
$camb = mysqli_query($link, $qcmb) or die(mysqli_error($link));
$row_camb = mysqli_fetch_assoc($camb);
$cambio = $row_camb['cambio'];


//Seleciona todos os sócios representativos
$qr = "SELECT * FROM rfa_site_associar WHERE clube='$clube' ORDER BY razao_associar ASC";
$lis = mysqli_query($link, $qr) or die(mysqli_error($link));
$row_lis = mysqli_fetch_assoc($lis);
$totalRows_lis = mysqli_num_rows($lis);



if (empty($search)) {
    //Seleciona todos os sócios honorários
    $qrh = "SELECT * FROM rfs_socios WHERE clube='$clube' AND categoria_socio='hn' ORDER BY nome_socio ASC";
    $lish = mysqli_query($link, $qrh) or die(mysqli_error($link));
    $row_lish = mysqli_fetch_assoc($lish);
    $totalRows_lish = mysqli_num_rows($lish);
} else {
    //Seleciona todos os sócios honorários
    $qrh = "SELECT * FROM rfs_socios WHERE clube='$clube' AND categoria_socio='hn' AND nome_socio LIKE '%" . $search . "%' ORDER BY nome_socio ASC";
    $lish = mysqli_query($link, $qrh) or die(mysqli_error($link));
    $row_lish = mysqli_fetch_assoc($lish);
    $totalRows_lish = mysqli_num_rows($lish);
}

$hoje = date('Y-m-d');
$semana = date('Y-m-d', strtotime($hoje . ' + 7 days'));
$mes = date('Y-m-d', strtotime($hoje . ' + 1 month'));

if ($_GET['hoje'] == "hoje") {
    $qr = "SELECT * FROM rfa_pagar INNER JOIN rfa_bancos ON rfa_pagar.origem_pagar = rfa_bancos.id_conta WHERE rfa_pagar.data_pagar='$hoje' AND rfa_pagar.user='$user'";
    $lis = mysqli_query($link, $qr) or die(mysqli_error($link));
    $row_lis = mysqli_fetch_assoc($lis);
    $totalRows_lis = mysqli_num_rows($lis);
}

if ($_GET['hoje'] == "semana") {
    $qr = "SELECT * FROM rfa_pagar INNER JOIN rfa_bancos ON rfa_pagar.origem_pagar = rfa_bancos.id_conta WHERE rfa_pagar.data_pagar<'$semana' AND rfa_pagar.user='$user'";
    $lis = mysqli_query($link, $qr) or die(mysqli_error($link));
    $row_lis = mysqli_fetch_assoc($lis);
    $totalRows_lis = mysqli_num_rows($lis);
}

if ($_GET['hoje'] == "mes") {
    $qr = "SELECT * FROM rfa_pagar INNER JOIN rfa_bancos ON rfa_pagar.origem_pagar = rfa_bancos.id_conta WHERE rfa_pagar.data_pagar<'$mes' AND rfa_pagar.user='$user'";
    $lis = mysqli_query($link, $qr) or die(mysqli_error($link));
    $row_lis = mysqli_fetch_assoc($lis);
    $totalRows_lis = mysqli_num_rows($lis);
}

$s = "SELECT * FROM rfa_tipo_cob WHERE clube='$clube'";
$tipocob = mysqli_query($link, $s) or die(mysqli_error($link));
$row_tipocob = mysqli_fetch_assoc($tipocob);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Gestão do Rotary Fortaleza Alagadiço">
    <meta name="author" content="David Magalhães">
    <meta name="keywords" content="rotary alagadiço, rotary fortaleza alagadiço, fortaleza alagadiço">

    <!-- Title Page-->
    <title><?php echo $nomeclube; ?></title>

    <?php include("head.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!--Mask Money-->
    <script language="javascript">
        function moeda(a, e, r, t) {
            let n = "",
                h = j = 0,
                u = tamanho2 = 0,
                l = ajd2 = "",
                o = window.Event ? t.which : t.keyCode;
            if (13 == o || 8 == o)
                return !0;
            if (n = String.fromCharCode(o),
                -1 == "0123456789".indexOf(n))
                return !1;
            for (u = a.value.length,
                h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
            ;
            for (l = ""; h < u; h++)
                -
                1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
            if (l += n,
                0 == (u = l.length) && (a.value = ""),
                1 == u && (a.value = "0" + r + "0" + l),
                2 == u && (a.value = "0" + r + l),
                u > 2) {
                for (ajd2 = "",
                    j = 0,
                    h = u - 3; h >= 0; h--)
                    3 == j && (ajd2 += e,
                        j = 0),
                    ajd2 += l.charAt(h),
                    j++;
                for (a.value = "",
                    tamanho2 = ajd2.length,
                    h = tamanho2 - 1; h >= 0; h--)
                    a.value += ajd2.charAt(h);
                a.value += r + l.substr(u - 2, u)
            }
            return !1
        }
    </script>

    <!--Pergunta antes de ação-->
    <script language="JavaScript" type="text/javascript">
        $(document).ready(function() {
            $(".remove").click(function(e) {
                if (!confirm('Tem certeza que deseja emitir boleto(s)?')) {
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
    </script>

    <script language="JavaScript" type="text/javascript">
        $(document).ready(function() {
            $("a.exclui").click(function(e) {
                if (!confirm('Tem certeza que deseja excluir esta solicitação?')) {
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
    </script>

    <script type="text/javascript">
        function ShowLoading(e) {
            var div = document.createElement('div');
            var img = document.createElement('img');
            img.src = 'http://granjasaojorge.com.br/img/loading1.gif';
            div.innerHTML = "";
            div.style.cssText = 'position: fixed; top: 20%; left: 40%; z-index: 5000; width: 200px; text-align: center;';
            div.appendChild(img);
            document.body.appendChild(div);
            return true;
            // These 2 lines cancel form submission, so only use if needed.
            //window.event.cancelBubble = true;
            //e.stopPropagation();
        }
    </script>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <div class="page-wrapper">

        <?php include("menu-desktop.php"); ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <?php include("topo.php"); ?>


            <?php include("menu-mobile.php"); ?>

            <!-- END HEADER DESKTOP-->




            <div class="main-content">
                <div class="col-lg-12">
                    <!-- USER DATA-->
                    <div class="user-data m-b-30">



                        <h3 class="title-3 m-b-30">
                            <i class="zmdi zmdi-balance-wallet"></i>Solicitações para Associados
                        </h3>

                        <br>



                        <!--<div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">Todos</option>
                                                <option value="">Itaú</option>
                                                <option value="">Bradesco</option>
												<option value="">Banco do Brasil</option>
												<option value="">Santander</option>
												<option value="">Caixa</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">Todos</option>
                                                <option value="">Corrente</option>
                                                <option value="">Poupança</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>-->
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                    <tr>

                                        <td style="text-align:center">Associado</td>
                                        <td style="text-align:center">E-mail</td>
                                        <td style="text-align:center">Telefone</td>
                                        <td style="text-align:center">Ativar sócio?</td>

                                        <td colspan="2" style="text-align:center"><?php echo "<strong style='margin-right: 5px; color: #ff0000;'>Total de solicitações: </strong>" . $totalRows_lis; ?></td>

                                    </tr>
                                </thead>
                                <tbody>


                                    <?php if ($totalRows_lis <= 0) {
                                    } else { ?>
                                        <?php do { ?>
                                            <tr>

                                                <td style="text-align:center">
                                                    <div class="table-data__info">
                                                        <h6><?php echo $row_lis['razao_associar']; ?></h6>

                                                    </div>
                                                </td>
                                                <td style="text-align:center">
                                                    <div class="table-data__info">

                                                        <span class="block-email">
                                                            <a href="mailto:<?php echo $row_lis['email_associar']; ?>"><?php echo $row_lis['email_associar']; ?></a>
                                                        </span>
                                                    </div>
                                                </td>

                                                <td style="text-align:center">
                                                    <span class="block-email">
                                                        <?php echo $row_lis['telefone_associar']; ?>
                                                    </span>
                                                </td>


                                                <td style="text-align:center">
                                                    <form action="confirma-cadastro-socio.php" method="post" id="entrega">
                                                        <input type="checkbox" data-toggle="toggle" onChange="this.form.submit()" value="1" data-on="Sim" data-off="Não" data-onstyle="success" data-offstyle="danger" name="statusentrega">
                                                        <input type="hidden" name="idassociar" value="<?php echo $row_lis['id_associar']; ?>">
                                                        <input type="hidden" name="clube" value="<?php echo $clube; ?>">
                                                    </form>
                                                </td>


                                                <td style="text-align:center">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalExemplo<?php echo $row_lis['id_associar']; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td style="text-align:center">
                                                    <a href="excluir-sol-associado.php?id_associar=<?php echo $row_lis['id_associar']; ?><?php echo '&clube=' . $clube; ?>" class="exclui">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>

                                                </td>
                                            </tr>


                                            <!-- Modal -->
                                            <div class="modal fade" id="modalExemplo<?php echo $row_lis['id_associar']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Informações do Solicitante</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Fechar">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <strong>Razão Social: </strong><?php echo $row_lis['razao_associar']; ?><Br>
                                                            <strong>Nome Fantasia: </strong><?php echo $row_lis['fantasia_associar']; ?><Br>
                                                            <strong>CNPJ: </strong><?php echo $row_lis['cnpj_associar']; ?><Br>
                                                            <strong>E-mail: </strong><?php echo $row_lis['email_associar']; ?><Br>
                                                            <strong>Titular: </strong><?php echo $row_lis['titular_associar']; ?><Br>
                                                            <strong>E-mail Titular: </strong><?php echo $row_lis['emailtitular_associar']; ?><Br>
                                                            <strong>Endereço: </strong><?php echo $row_lis['endereco_associar']; ?><Br>
                                                            <strong>Número: </strong><?php echo $row_lis['numero_associar']; ?><Br>
                                                            <strong>Bairro: </strong><?php echo $row_lis['bairro_associar']; ?><Br>
                                                            <strong>Cidade: </strong><?php echo $row_lis['cidade_associar']; ?><Br>
                                                            <strong>Estado: </strong><?php echo $row_lis['estado_associar']; ?><Br>
                                                            <strong>CEP: </strong><?php echo $row_lis['cep_associar']; ?><Br>
                                                            <strong>Telefone: </strong><?php echo $row_lis['telefone_associar']; ?><Br>
                                                            <strong>Financeiro: </strong><?php echo $row_lis['financeiro_associar']; ?><Br>
                                                            <strong>E-mail Financeiro: </strong><?php echo $row_lis['emailfin_associar']; ?><Br>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                        <?php } while ($row_lis = mysqli_fetch_assoc($lis)); ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <!--<div class="user-data__footer">
                                        <button class="au-btn au-btn-load">Ver mais</button>
                                    </div>-->
                    </div>
                    <!-- END USER DATA-->
                </div>
            </div>


            <?php include("footer.php"); ?>


            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <script>
        function trocaMoeda() {
            var naoconverte = document.querySelector("#converter1");
            var converte = document.querySelector("#converter2");
            var moeda = document.querySelector("#md");
            var valor = document.querySelector("#valor");
            if (converte.checked) {
                moeda.value = "U$";
                valor.placeholder = "Em dólar"
            } else {
                moeda.value = "R$";
                valor.placeholder = "Em real"
            }
        }
    </script>

    <script>
        // Para selecionar todos os checkboxes dos sócios
        $('#select-all').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>

    <script>
        $('input[name="radios"]').change(function() {
            if ($('input[name="radios"]:checked').val() === "manual") {

                $('.exibedatapagamento').show();
            } else {
                $('.exibedatapagamento').hide();
            }
        });
    </script>



    <?php include("scripts-footer.php"); ?>



</body>
<script type="text/javascript">
    SyntaxHighlighter.all()
</script>

</html>
<!-- end document-->
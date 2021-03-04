<?php
$page = 3;

include('config-header.php');

//Seleciona todos os bancos em ordem crescente pelo nome nome do banco
$sql = "SELECT * FROM rfa_bancos WHERE clube='$clube'";
$listabancos = mysqli_query($link, $sql) or die(mysqli_error($link));

$totalRows_listabancos = mysqli_num_rows($listabancos);

//Seleciona todos os tipos de bancos em ordem crescente pelo nome nome do tipo de banco
$query = "SELECT * FROM rfa_lista_tipo_banco WHERE clube='$clube' ORDER BY nome_lista_tipo ASC";
$listatipobanco = mysqli_query($link, $query) or die(mysqli_error($link));
$row_listatipobanco = mysqli_fetch_assoc($listatipobanco);
$totalRows_listatipobanco = mysqli_num_rows($listatipobanco);

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
    <title>Cadastro de Contas a Pagar - Rotary Fortaleza Alagadiço</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <?php include("head.php");?>
	
	<!-- Start Ativa Tooltip no formulário -->
	<script>
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	<!-- Final Ativa Tooltip no formulário -->
	<style>
    .toggle{
        width: 110.453px !important;
    height: 37.7266px !important;
    }
    </style>
<script>
//isso você coloca em um arquivo js externo, a ser chamado depois do jquery, ou na tag script de uma página
            jQuery.fn.preventDoubleSubmit = function() {
              jQuery(this).submit(function() {
                if (this.beenSubmitted)
                  return false;
                else
                  this.beenSubmitted = true;
              });
            };

            //isso você coloca dentro do $(document).ready
    $(document).ready(function() 
    { 
      jQuery('form').preventDoubleSubmit(); 
    }
</script>

	<!--Mask Money-->
<script language="javascript">   
function moeda(a, e, r, t) {
    let n = ""
      , h = j = 0
      , u = tamanho2 = 0
      , l = ajd2 = ""
      , o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
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
	
</head>

<body class="animsition">

    <div class="page-wrapper">
	
        <?php include("menu-desktop.php");?>

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
			<?php include("topo.php");?>
            
            
			<?php include("menu-mobile.php");?>
			
            <!-- END HEADER DESKTOP-->

            
 <div class="main-content">
			<form method="post" action="proc_cd_a_pagar.php" name="form-contabancaria">
            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Cadastro</strong>
                                        <small> despesas</small>
                                    </div>
                                    <div class="card-body card-block">
                                    <div class="row">
                                    <div class="col-12 col-md-10">
                                        <div class="form-group">
											<label for="origem" class=" form-control-label">Origem </label>
                                                <select name="origem_pagar" id="origem_pagar" class="form-control" required>
                                                    <option selected disabled>Selecione uma conta...</option>
													<?php if($totalRows_listabancos <= 0){}else{?>
                                                    <?php while($row_listabancos = mysqli_fetch_array($listabancos)){?>
													<option value="<?php echo $row_listabancos['cod_banco'];?>"><?php echo $row_listabancos['favorecido'];?> </option>
													<?php }?>
														<?php }?>
                                                 </select>
                                        </div>
                                        
                                        </div>
                                        <div class="col-12 col-md-2">
                                        <label>Recorrente?</label><br>
                                        <input type="checkbox" id="recorrente" name="recorrente" data-toggle="toggle" data-on="Sim" data-off="Não" data-onstyle="success" data-offstyle="danger" value="">
                                        </div>
                                        </div>
                                        <div class="alert alert-success row" id="datasrecorrencias" style="display:none;">
                                                        <div class="col">
                                                            <label>Dia de vencimento</label>
                                                            <input type="number" class="form-control" name="diavencimento_recorrencia">
                                                        </div>
                                                        <div class="col">
                                                            <label>Data inicial</label>
                                                            <input type="month" class="form-control" name="datainicial_recorrencia">
                                                        </div>
                                                        <div class="col">
                                                            <label>Data final</label>
                                                            <input type="month" class="form-control" name="datafinal_recorrencia">
                                                        </div>
                                        </div>
										<div class="row">
										<div class="col">
											<div class="form-group">
												<label for="descricao_pagar" class=" form-control-label">Descrição</label>
												<input type="text" name="descricao_pagar" id="descricao_pagar" placeholder="Ex.: Conta de Luz" class="form-control" required>
											</div>
										</div>
										<div class="col" id="vencimento">
											<div class="form-group">
												<label for="data_pagar" class=" form-control-label">Vencimento</label>
												<input type="date" name="data_pagar" id="data_pagar" class="form-control">
											</div>
										</div>
										</div>
                                        <div class="row form-group">
                                            
                                            <div class="col">
                                                <div class="form-group exibetipopessoapf">
                                                    <label for="status" class="form-control-label">Status</label>
												<select name="status_pagar" class="form-control">
													<option value="1">Pendente</option>
													<option value="2">Pago</option>
												</select>
											
                                                </div>
												
                                            </div>
											<div class="col">
                                                <div class="form-group">
                                                    <label for="valor_pagar" class=" form-control-label">Valor</label>
													<div class="input-group mb-2">
													<div class="input-group-prepend">
													  <div class="input-group-text">R$</div>
													</div>
													<input type="text" name="valor_pagar" onKeyPress="return(moeda(this,'.',',',event))" id="valor_pagar" class="form-control" required data-toggle="tooltip" data-placement="top" title="Este valor será debitado da conta de origem escolhida.">
													</div>
                                                    
                                                </div>
												
                                            </div>
                                        </div>
										
										
										<input type="hidden" name="por" value="<?= $_SESSION['nome'] ?>">
										<input type="hidden" name="user" value="<?= $_SESSION['id_usuario'] ?>">
										<input type="hidden" name="club" value="<?php if($_GET['clube']){echo $clube;}else{echo $clube;}?>">
										
										
										<div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
                                                    
                                                    <span id="payment-button-amount"><i class="fas fa-paper-plane"></i> Cadastrar</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                         </div>
                                        
                                    </div>
                                </div>
                            </div>
							</form>
							
							
							
</div>
            

            <?php include("footer.php"); ?>
			
            
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
	
	<script type="text/javascript">


window.onload = function () {
    var input = document.querySelector('input[type=checkbox]');
    
    function check() {
        var a = input.checked ? "1" : "0";
        var func = document.getElementById('datasrecorrencias');
        document.getElementById('recorrente').value = a;

        if ($('input[name="recorrente"]:checked').val() === "1") {
        $('#datasrecorrencias').show();
        $('#vencimento').hide();
    } else {
        $('#datasrecorrencias').hide();
        $('#vencimento').show();
    }

    }
    input.onchange = check;
    check();
}
</script>
	
    <?php include("scripts-footer.php"); ?>

</body>

</html>
<!-- end document-->
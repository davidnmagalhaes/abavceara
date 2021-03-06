<?php 
$page = 8;

include('config-header.php');

$sql = "SELECT * FROM rfa_clubes WHERE id_clube='$clube'";
$paghiper = mysqli_query($link, $sql) or die(mysqli_error($link));
$row_paghiper = mysqli_fetch_assoc($paghiper);

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

    <?php include("head.php");?>
	
	<!-- Start Ativa Tooltip no formulário -->
	<script>
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	<!-- Final Ativa Tooltip no formulário -->
	
	
	
</head>

<body class="animsition">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <div class="page-wrapper">
	
        <?php include("menu-desktop.php");?>

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
			<?php include("topo.php");?>
            
            
			<?php include("menu-mobile.php");?>
			
            <!-- END HEADER DESKTOP-->

            
 <div class="main-content">
			
							
							<form method="post" action="proc_edt_integracao.php" name="form-contabancaria">
			<div class="row">
				<div class="col">
					<img src="images/logo-paghiper.png" style="margin-left: 20px"/>
					<div class="alert alert-danger" role="alert" style="margin: 10px 16px">
							<strong>URL de Retorno:</strong> 
							<input type="text" class="form-control" value="<?php echo "https://".$_SERVER['HTTP_HOST']."/".basename(__DIR__)."/retorno_paghiper.php?id=".$clube; ?>">
							<br><p>
							<strong>Instruções de integração:</strong><br>
							1. Acesse sua conta na <a href="https://paghiper.com/" target="_blank">Paghiper</a>;<br>
							2. No menu esquerdo clique em <strong>Ferramentas</strong> e <strong>Retorno automático</strong>;<br>
							3. Copie a URL de retorno acima e cole no campo <strong>Página de retorno</strong> no painel da Paghiper;<Br>
							4. Para preencher os campos abaixo, ainda no painel da Paghiper copie as informações Appkey e Token na opção <strong>Minha conta > Credenciais</strong>.
							</p>
					</div>
				</div>
			</div>
			
            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Integração</strong>
                                        <small>PagHiper</small>
                                    </div>
                                    <div class="card-body card-block">
                                        
												
										<div class="row">
										<div class="col-12 col-md-5">
											<div class="form-group">
												<label for="descricao_receber" class=" form-control-label">App Key PagHiper</label>
												<input type="text" name="appkeypaghiper" placeholder="Digite o App Key informado no painel Paghiper" class="form-control" value="<?php echo $row_paghiper['paghiper_appkey'];?>" required>
											</div>
										</div>
										<div class="col-12 col-md-5">
											<div class="form-group">
												<label for="n_conta" class=" form-control-label">Token PagHiper</label>
												<input type="text" name="tokenpaghiper" id="tokenpaghiper" class="form-control" value="<?php echo $row_paghiper['paghiper_token'];?>" required placeholder="Digite o Token informado no painel Paghiper">
											<input type="hidden" name="user" value="<?php echo $_SESSION['id_usuario'];?>">
											<input type="hidden" name="club" value="<?php if($_GET['clube']){echo $clube;}else{echo $clube;}?>">
											</div>
										</div>
										<div class="col-12 col-md-2">
											<div class="form-group">
												<label for="descricao_receber" class=" form-control-label">Taxa por Boleto</label>
											
											<div class="input-group mb-2">
													<div class="input-group-prepend">
													  <div class="input-group-text">R$</div>
													</div>
												<input type="text" name="taxapaghiper" readonly placeholder="O padrão atual é de R$ 2,49" class="form-control" value="2,49" required data-toggle="tooltip" title="Essa taxa não pode ser atualizada, somente no caso de alterações realizadas pela Paghiper.">
													</div>
											</div>
										</div>
										</div>
										
										
										
										
										
										<div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                                    
                                                    <span id="payment-button-amount"><i class="fas fa-paper-plane"></i> Atualizar</span>
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
	
    <?php include("scripts-footer.php"); ?>

</body>

</html>
<!-- end document-->
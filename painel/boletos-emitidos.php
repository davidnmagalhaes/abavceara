<?php 
$page = 3;

include('config-header.php');
$page = $_GET['page'];

$sql = "SELECT * FROM rfa_boletos WHERE clube='$clube'";
$boletos = mysqli_query($link, $sql) or die(mysqli_error($link));

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
			
			
			<div class="modal fade" id="addBoleto" tabindex="-1" aria-labelledby="addBoleto" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Criar boleto avulso</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form method="post" action="paghiper-avulso.php" target="_blank">
				<div class="modal-body">
				
				<input type="hidden" name="clube" value="<?php echo $clube;?>">	
					<div class="row">
						<div class="col">
							<label>Nome</label>
							<input type="text" class="form-control" name="nome" placeholder="Digite o nome completo" required/>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>CPF / CNPJ</label>
							<input type="text" class="form-control" name="cpf" placeholder="Digite o CPF / CNPJ" required/>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>E-mail</label>
							<input type="email" class="form-control" name="email" placeholder="Digite o e-mail" required/>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>Telefone</label>
							<input type="phone" class="form-control" name="phone" placeholder="Digite o telefone" required/>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>Vencimento</label>
							<input type="date" class="form-control" name="date" required/>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>Descrição</label>
							<input type="text" class="form-control" name="descricao" required/>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>Valor</label>
							<div class="input-group mb-3">
							<span class="input-group-text" id="valor">R$</span>
							<input type="text" class="form-control" name="valor" onKeyPress="return(moeda(this,'.',',',event))" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>Desconto</label>
							<div class="input-group mb-3">
							<span class="input-group-text" id="valor">%</span>
							<input type="text" class="form-control" name="desconto_cob" placeholder="Ex.: 15" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>Permitir após vencimento</label>
							<select class="form-control" name="pagamentoate_cob" required>
								<option selected disabled>Selecione...</option>
								<option value="5">5 dias</option>
								<option value="10">10 dias</option>
								<option value="15">15 dias</option>
								<option value="20">20 dias</option>
								<option value="25">25 dias</option>
								<option value="30">30 dias</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>Multa</label>
							<select class="form-control" name="multa" required>
								<option selected disabled>Selecione...</option>
								<option value="1">1% de multa</option>
								<option value="2">2% de multa</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>Juros</label>
							<select class="form-control" name="juros" required>
								<option value="false" selected disabled>Selecione...</option>
								<option value="true">1% ao mês</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>Parcelas</label>
							<select class="form-control" name="parcelas" required>
								<?php 
									for($i=1; $i<=12; $i++){
										echo "<option value='".$i."'>".$i." parcelas</option>";
									}
								?>
							</select>
						</div>
					</div>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-primary">Criar boleto</button>
				</div>
				</form>
				</div>
			</div>
			</div>
			
            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Boletos</strong>
                                        <small>PagHiper</small>
										<button type="button" class="ml-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBoleto"><i class="fas fa-plus"></i> Boleto avulso</button>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                                <tr>
													<th></th>
                                                    <th>Nome</th>
                                                    <th>E-mail</th>
                                                    <th>CPF</th>
                                                    <th>Telefone</th>
                                                    <th>Vencimento</th>
                                                    <th>Descrição</th>
													<th>Valor</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
										<?php 
										    while($row_boletos = mysqli_fetch_array($boletos)){
										?>
										    <tr>
												<td>
												<?php 
												if($row_boletos['status_pgto'] == "0"){
													echo '<i class="fas fa-circle" style="color: #dc7c2a"></i>';
												}elseif($row_boletos['status_pgto'] == "1"){
													echo '<i class="fas fa-circle" style="color: #1f8612"></i>';
												}elseif($row_boletos['status_pgto'] == "2"){
													echo '<i class="fas fa-circle" style="color: #0d6efd"></i>';
												}else{
													echo '<i class="fas fa-circle" style="color: #fd0d0d"></i>';
												}
												?>
												</td>
										        <td><?php echo $row_boletos['nome']?></td>
										        <td><?php echo $row_boletos['email']?></td>
										        <td><?php echo $row_boletos['cpf']?></td>
										        <td><?php echo $row_boletos['telefone']?></td>
										        <td><?php echo date("d/m/Y", strtotime($row_boletos['vencimento']))?></td>
										        <td><?php echo $row_boletos['descricao']?></td>
												<td>R$ <?php echo number_format($row_boletos['valor'],2,',', '.')?></td>
										        <td><a href="<?php echo $row_boletos['link_boleto']."/pdf"?>" target="_blank"><i class="fas fa-barcode" style="font-size: 30px"></i></a></td>
										    </tr>
										<?php
										    }
										?>
										</tbody>
										</table>
										</div>
										
										
                                    </div>
									<div>
                                                
                                         </div>
                                </div>
                            </div>
							
							
			
							
		
							
</div>
            

            <?php include("footer.php"); ?>
			
            
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
	<!-- Start Script para trocar tipo de pessoa -->
<script>
		$('input[name="tipopessoa"]').change(function () {
    if ($('input[name="tipopessoa"]:checked').val() === "pj") {
        $('.exibetipopessoapj').show();
		 $('.exibetipopessoapf').hide();
    } else {
        $('.exibetipopessoapj').hide();
		$('.exibetipopessoapf').show();
    }
});
	</script>
	<!-- End Script para trocar tipo de pessoa -->
	
    <?php include("scripts-footer.php"); ?>

</body>

</html>
<!-- end document-->
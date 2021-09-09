<?php
$page = 5;

include('config-header.php');


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

	<!-- Start Ativa Tooltip no formulário -->
	<script>
		$(function() {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	<!-- Final Ativa Tooltip no formulário -->

	<script type="text/javascript">
		function fMasc(objeto, mascara) {
			obj = objeto
			masc = mascara
			setTimeout("fMascEx()", 1)
		}

		function fMascEx() {
			obj.value = masc(obj.value)
		}

		function mTel(tel) {
			tel = tel.replace(/\D/g, "")
			tel = tel.replace(/^(\d)/, "($1")
			tel = tel.replace(/(.{3})(\d)/, "$1)$2")
			if (tel.length == 9) {
				tel = tel.replace(/(.{1})$/, "-$1")
			} else if (tel.length == 10) {
				tel = tel.replace(/(.{2})$/, "-$1")
			} else if (tel.length == 11) {
				tel = tel.replace(/(.{3})$/, "-$1")
			} else if (tel.length == 12) {
				tel = tel.replace(/(.{4})$/, "-$1")
			} else if (tel.length > 12) {
				tel = tel.replace(/(.{4})$/, "-$1")
			}
			return tel;
		}

		function mCNPJ(cnpj) {
			cnpj = cnpj.replace(/\D/g, "")
			cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2")
			cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")
			cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2")
			cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2")
			return cnpj
		}

		function mCPF(cpf) {
			cpf = cpf.replace(/\D/g, "")
			cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
			cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
			cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
			return cpf
		}

		function mCEP(cep) {
			cep = cep.replace(/\D/g, "")
			cep = cep.replace(/^(\d{2})(\d)/, "$1.$2")
			cep = cep.replace(/\.(\d{3})(\d)/, ".$1-$2")
			return cep
		}

		function mNum(num) {
			num = num.replace(/\D/g, "")
			return num
		}
	</script>

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

	<script>
		function valida_cpf(cpf) {
			cpf = cpf.replace('.', '');
			cpf = cpf.replace('-', '');
			var numeros, digitos, soma, i, resultado, digitos_iguais;
			digitos_iguais = 1;
			if (cpf.length < 11)
				return false;
			for (i = 0; i < cpf.length - 1; i++)
				if (cpf.charAt(i) != cpf.charAt(i + 1)) {
					digitos_iguais = 0;
					break;
				}
			if (!digitos_iguais) {
				numeros = cpf.substring(0, 9);
				digitos = cpf.substring(9);
				soma = 0;
				for (i = 10; i > 1; i--)
					soma += numeros.charAt(10 - i) * i;
				resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
				if (resultado != digitos.charAt(0))
					return false;
				numeros = cpf.substring(0, 10);
				soma = 0;
				for (i = 11; i > 1; i--)
					soma += numeros.charAt(11 - i) * i;
				resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
				if (resultado != digitos.charAt(1))
					return false;
				return true;
			} else
				return false;
		}

		function faz() {
			document.getElementById('msgOK').style.display = 'none';
			document.getElementById('msgErro').style.display = 'none';
			var cpf = document.getElementById('cpf_socio').value;
			cpf = cpf.replace('.', '');
			cpf = cpf.replace('-', '');

			if (valida_cpf(cpf)) {
				document.getElementById('msgOK').style.display = 'block';
			} else {
				document.getElementById('msgErro').style.display = 'block';
				alert("Digite um CPF válido!");
				return false;
			}
		}
	</script>

	<script>
		function somenteNumeros(e) {
			var charCode = e.charCode ? e.charCode : e.keyCode;
			// charCode 8 = backspace   
			// charCode 9 = tab
			if (charCode != 8 && charCode != 9) {
				// charCode 48 equivale a 0   
				// charCode 57 equivale a 9
				if (charCode < 48 || charCode > 57) {
					return false;
				}
			}
		}
	</script>
	<style>
		.file-drop-area {
			position: relative;
			display: flex;
			align-items: center;
			width: 100%;
			max-width: 100%;
			padding: 25px;
			border: 2px dashed rgb(66, 114, 215);
			border-radius: 3px;
			transition: 0.2s;

			&.is-active {
				: ;
				background-color: rgba(255, 255, 255, 0.05);
			}

			:;
		}

		.fake-btn {
			flex-shrink: 0;
			background-color: rgba(255, 255, 255, 0.04);
			border: 1px solid rgba(255, 255, 255, 0.1);
			border-radius: 3px;
			padding: 8px 15px;
			margin-right: 10px;
			font-size: 16px;
			text-transform: uppercase;
		}

		.file-msg {
			font-size: small;
			font-weight: 300;
			line-height: 1.4;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}

		.file-input {
			position: absolute;
			left: 0;
			top: 0;
			height: 100%;
			width: 100%;
			cursor: pointer;
			opacity: 0;

			&:focus {
				outline: none;
			}
		}
	</style>
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
				<form method="post" action="proc_cd_socios.php" enctype="multipart/form-data" id="formsocios" name="form-socios" runat="server" onsubmit="ShowLoading(); ">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<strong>Cadastro</strong>
								<small> de Associados</small>
							</div>
							<div class="card-body card-block">



								<div class="row">
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="classificacao" class=" form-control-label">Classificação</label>
											<select name="classificacao" class="form-control">
												<option selected disabled>Selecione...</option>
												<option value="agencia">Agência</option>
												<option value="hotel">Hotel</option>
												<option value="restaurante">Restaurante</option>
												<option value="barraca">Barraca de Praia</option>
												<option value="casa_noturna">Casa Noturna</option>
												<option value="parque">Parque Temático</option>
												<option value="operadora">Operadora</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="nome_socio" class=" form-control-label">Nome do Associado</label>
											<input type="text" name="nome_socio" id="nome_socio" placeholder="Digite o nome completo do associado" class="form-control" required>
										</div>
									</div>



									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="cpf_socio" class="form-control-label ">CNPJ do Associado</label>
											<input type="text" name="cpf_socio" maxlength="18" onkeydown="javascript: fMasc( this, mCNPJ );" id="cpf_socio" class="form-control" required>
										</div>



									</div>


									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="id_ri_socio" class=" form-control-label">Nº de Registro</label>
											<input type="text" name="id_ri_socio" maxlength="45" id="id_ri_socio" class="form-control" required placeholder="Digite o número de registro">
										</div>
									</div>

								</div>




								<div class="row form-group">
								<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="tipo_cnpj" class=" form-control-label">Tipo de CNPJ</label>
											<select name="tipo_cnpj" class="form-control">
												<option selected disabled>Selecione...</option>
												<option value="ss">Sociedade Simples (SS)</option>
												<option value="mei">Microempreendedor Individual (MEI)</option>
												<option value="ei">Empresa Individual (EI)</option>
												<option value="eireli">Empresa Individual de Responsabilidade Limitada (EIRELI)</option>
												<option value="sa">Sociedade Anônima (SA)</option>
												<option value="ltda">Sociedade Empresária Limitada (LTDA)</option>
												<option value="asfl">Associações Sem Fins Lucrativos.</option>
												<option value="slu">Sociedade Limitada Unipessoal (SLU)</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="email_socio" class=" form-control-label">E-mail do Associado</label>
											<input type="email" name="email_socio" id="email_socio" class="form-control" required>
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="telefone_socio" class=" form-control-label">Telefone fixo do Associado</label>
											<input type="tel" name="telefone_socio" id="telefone_socio" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" class="form-control telefone" required>
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="telefone_socio" class=" form-control-label">Celular do Associado</label>
											<input type="tel" name="celular_socio" id="celular_socio" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" class="form-control telefone">
										</div>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-12 col-md-2">
										<div class="form-group">
											<label for="cep_socio" class=" form-control-label">CEP</label>
											<input type="text" name="cep_socio" id="cep_socio" onkeypress="return somenteNumeros(event)" maxlength="8" class="form-control" required>
										</div>
									</div>
									<div class="col-12 col-md-2">
										<div class="form-group">
											<label for="cep_socio" class=" form-control-label">Data Filiação</label>
											<input type="date" name="data_admissao" id="data_admissao" class="form-control" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="email_socio" class=" form-control-label">Endereço do Sócio</label>
											<input type="text" name="endereco_socio" id="endereco_socio" class="form-control" required>
										</div>
									</div>
									<div class="col-12 col-md-2">
										<div class="form-group">
											<label for="telefone_socio" class=" form-control-label">Número</label>
											<input type="text" name="numero_end_socio" id="numero_end_socio" onkeypress="return somenteNumeros(event)" class="form-control" required>
										</div>
									</div>

								</div>


								<div class="row form-group">
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="cep_socio" class=" form-control-label">Bairro</label>
											<input type="text" name="bairro_socio" id="bairro_socio" class="form-control" required>
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="email_socio" class=" form-control-label">Complemento</label>
											<input type="text" name="complemento_socio" id="complemento_socio" class="form-control" required>
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="telefone_socio" class=" form-control-label">Cidade</label>
											<input type="text" name="cidade_socio" id="cidade_socio" class="form-control" required>
										</div>
									</div>
									<div class="col-12 col-md-3">
										<div class="form-group">
											<label for="telefone_socio" class=" form-control-label">Estado</label>
											<select name="estado_socio" id="estado_socio" class="form-control">
												<option value="AC">Acre</option>
												<option value="AL">Alagoas</option>
												<option value="AP">Amapá</option>
												<option value="AM">Amazonas</option>
												<option value="BA">Bahia</option>
												<option value="CE">Ceará</option>
												<option value="DF">Distrito Federal</option>
												<option value="ES">Espírito Santo</option>
												<option value="GO">Goiás</option>
												<option value="MA">Maranhão</option>
												<option value="MT">Mato Grosso</option>
												<option value="MS">Mato Grosso do Sul</option>
												<option value="MG">Minas Gerais</option>
												<option value="PA">Pará</option>
												<option value="PB">Paraíba</option>
												<option value="PR">Paraná</option>
												<option value="PE">Pernambuco</option>
												<option value="PI">Piauí</option>
												<option value="RJ">Rio de Janeiro</option>
												<option value="RN">Rio Grande do Norte</option>
												<option value="RS">Rio Grande do Sul</option>
												<option value="RO">Rondônia</option>
												<option value="RR">Roraima</option>
												<option value="SC">Santa Catarina</option>
												<option value="SP">São Paulo</option>
												<option value="SE">Sergipe</option>
												<option value="TO">Tocantins</option>
												<option value="EX">Estrangeiro</option>
											</select>
										</div>
									</div>

								</div>





							</div>
						</div>

						<div class="card">
							<div class="card-header">
								<strong>Titulares</strong> <button type="button" name="add" id="add" class="btn btn-primary" style="margin-left: 30px;"><i class="fas fa-child" style="margin-right: 5px"></i> Adicionar mais titular</button>

							</div>
							<div class="card-body card-block" id="dynamic_field">

								<div class="row form-group">

									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="nome_filho" class=" form-control-label">Nome do Titular</label>
											<input type="text" name="nome_filho[]" id="nome_filho" class="form-control">
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label for="data_nascto_filho" class=" form-control-label">Data de Nascto. Titular</label>
											<input type="date" name="data_nascto_filho[]" id="data_nascto_filho" class="form-control">
										</div>
									</div>
								</div>




							</div>



						</div>

						<input type="hidden" name="user" value="<?= $_SESSION['id_usuario'] ?>">
						<input type="hidden" name="club" value="<?php if ($_GET['clube']) {
																											echo $clube;
																										} else {
																											echo $clube;
																										} ?>">

						<div class="card">
							<div class="card-header">
								<strong>Mensalidade</strong>

							</div>
							<div class="card-body card-block">
								<div class="row form-group">


									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="valor_mensalidade_socio" class=" form-control-label">Valor da Mensalidade</label>
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text">R$</div>
												</div>

												<input type="tel" name="valor_mensalidade_socio" onKeyPress="return(moeda(this,'.',',',event))" maxlength="15" id="valor_mensalidade_socio" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="vencimento_mensalidade_socio" class="form-control-label">Dia de Vencimento</label>
											<input type="text" max="31" maxlength="2" name="vencimento_mensalidade_socio" id="vencimento_mensalidade_socio" class="form-control" placeholder="Ex.: 15" required>
										</div>
									</div>
									<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="primeiro_mensalidade_socio" class=" form-control-label" style="width: 100%">Data do primeiro vencimento</label>
											<!--<input type="date" name="primeiro_mensalidade_socio" style="width: 45%; float:left; margin-right: 5px" id="primeiro_mensalidade_socio" class="form-control" data-toggle="tooltip" data-placement="top" title="Insira uma data do mês em que o sistema começará a cobrar mensalidades deste sócio." required>-->
											<select name="primeiro_mes_socio" style="width: 45%; float:left; margin-right: 5px" class="form-control" data-toggle="tooltip" data-placement="top" title="Selecione o mês da primeira cobrança referente a mensalidade deste sócio" required>
												<option>Selecione o mês...</option>
												<?php
												$m = 1;
												$m12 = 13;
												$mdif = $m12 - $m;
												for ($i = $m; $i < $m12; $i++) { ?>
													<option><?php echo $i; ?></option>
												<?php } ?>
											</select>
											<select name="primeiro_ano_socio" style="width: 45%; float:left; margin-right: 5px" class="form-control" data-toggle="tooltip" data-placement="top" title="Selecione o ano da primeira cobrança referente a mensalidade deste sócio" required>
												<option>Selecione o ano...</option>
												<?php
												$a = date('Y');
												$au = $a + 3;
												for ($e = $a; $e < $au; $e++) {
												?>
													<option><?php echo $e; ?></option>
												<?php } ?>

											</select>
										</div>
									</div>
								</div>
							</div>
							<div>
								<button id="payment-button" type="submit" onClick="return faz()" class="btn btn-lg btn-success btn-block vld">

									<span id="payment-button-amount"><i class="fas fa-paper-plane"></i> Cadastrar</span>
									<span id="payment-button-sending" style="display:none;">Sending…</span>
								</button>
							</div>
						</div>

					</div>
				</form>




			</div>


			<?php include("footer.php"); ?>
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

			<!-- END PAGE CONTAINER-->
		</div>

	</div>

	<!--Script para busca de endereços por CEP-->
	<script type="text/javascript">
		$("#cep_socio").focusout(function() {
			$.ajax({
				url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode/',
				dataType: 'json',
				success: function(resposta) {
					$("#endereco_socio").val(resposta.logradouro);
					$("#complemento_socio").val(resposta.complemento);
					$("#bairro_socio").val(resposta.bairro);
					$("#cidade_socio").val(resposta.localidade);
					$("#estado_socio").val(resposta.uf);
					$("#numero_socio").focus();
					document.getElementById("endereco").style.display = "block";
				}
			});
		});
	</script>
	<script>
		var $fileInput = $('.file-input');
		var $droparea = $('.file-drop-area');

		// highlight drag area
		$fileInput.on('dragenter focus click', function() {
			$droparea.addClass('is-active');
		});

		// back to normal state
		$fileInput.on('dragleave blur drop', function() {
			$droparea.removeClass('is-active');
		});

		// change inner text
		$fileInput.on('change', function() {
			var filesCount = $(this)[0].files.length;
			var $textContainer = $(this).prev();

			if (filesCount === 1) {
				// if single file is selected, show file name
				var fileName = $(this).val().split('\\').pop();
				$textContainer.text(fileName);
			} else {
				// otherwise show number of files
				$textContainer.text(filesCount + ' arquivos selecionados');
			}
		});
	</script>
	<script>
		$(document).ready(function() {
			var i = 1;
			$('#add').click(function() {
				i++;
				$('#dynamic_field').append('<div class="row form-group" id="row' + i + '"><div class="col-12 col-md-4"><div class="form-group"><label for="nome_filho" class=" form-control-label">Nome do Filho</label><input type="text" name="nome_filho[]" id="nome_filho" class="form-control" required></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="data_nascto_filho" class=" form-control-label">Data de Nascto. Filho</label><input type="date" name="data_nascto_filho[]" id="data_nascto_filho" class="form-control" required></div></div><div class="col-12 col-md-4" ><div class="form-group"><br><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button> REMOVER</div></div></div>');

			});


			$(document).on('click', '.btn_remove', function() {
				var button_id = $(this).attr("id");
				$('#row' + button_id + '').remove();
			});



		});
	</script>


	<?php include("scripts-footer.php"); ?>

</body>

</html>
<!-- end document-->
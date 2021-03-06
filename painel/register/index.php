<?php 
include("../config.php");

$plano = $_GET['plan'];


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Clube Digital</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/acc-wizard-master/release/acc-wizard.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
<script src="https://kit.fontawesome.com/13f03eba23.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
            function fMasc(objeto,mascara) {
                obj=objeto
                masc=mascara
                setTimeout("fMascEx()",1)
            }
            function fMascEx() {
                obj.value=masc(obj.value)
            }
            function mTel(tel) {
                tel=tel.replace(/\D/g,"")
                tel=tel.replace(/^(\d)/,"($1")
                tel=tel.replace(/(.{3})(\d)/,"$1)$2")
                if(tel.length == 9) {
                    tel=tel.replace(/(.{1})$/,"-$1")
                } else if (tel.length == 10) {
                    tel=tel.replace(/(.{2})$/,"-$1")
                } else if (tel.length == 11) {
                    tel=tel.replace(/(.{3})$/,"-$1")
                } else if (tel.length == 12) {
                    tel=tel.replace(/(.{4})$/,"-$1")
                } else if (tel.length > 12) {
                    tel=tel.replace(/(.{4})$/,"-$1")
                }
                return tel;
            }
            function mCNPJ(cnpj){
                cnpj=cnpj.replace(/\D/g,"")
                cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
                cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
                cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
                cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
                return cnpj
            }
            function mCPF(cpf){
                cpf=cpf.replace(/\D/g,"")
                cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
                cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
                cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
                return cpf
            }
            function mCEP(cep){
                cep=cep.replace(/\D/g,"")
                cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
                cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
                return cep
            }
            function mNum(num){
                num=num.replace(/\D/g,"")
                return num
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

</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <div class="main">

        <div class="container">
                <div class="row">
                <div class="col" style="text-align:center;padding-top: 5px;">
                    <h1><strong>Cadastro no Clube Digital</strong></h1>
                </div>
            </div>
            <div class="acc-wizard">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default active">
                        <div class="panel-heading" id="headingOne">
                            <h3>
                                <a href="#collapseOne" data-toggle="collapse" data-parent="#accordion">Informações do Presidente</a>
                            </h3>
                        </div>

                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <form method="POST" action="../login-seguro/proc_assinatura.php">
                                    <input type="hidden" name="plano" value="<?php echo $plano;?>">
                                    <fieldset>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="first_name" class="form-label">Primeiro nome</label>
                                                <input type="text" name="primeiro_nome" id="primeiro_nome" placeholder="Digite o nome do presidente" required/>
                                            </div>
    
                                            <div class="form-group">
                                                <label for="last_name" class="form-label">Último nome</label>
                                                <input type="text" name="ultimo_nome" id="ultimo_nome" placeholder="Digite o último nome do presidente" required/>
                                            </div>
                                        </div>
    
                                        <div class="form-row">
                                            <div class="form-group-flex">
                                                
                                                <div class="form-date">
                                                    <label for="birth_date" class="form-label">Data de Nascimento</label>
                                                <div class="form-date-group">
                                                    
                                                        <div class="form-date-item">
                                                            <select id="birth_date" name="birth_day" required></select>
                                                        </div>
                                                        <div class="form-date-item">
                                                        <select id="birth_month" name="birth_month" required></select>
                                                    </div>
                                                        <div class="form-date-item">
                                                            <select id="birth_year" name="birth_year" required></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="form-group">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input type="email" name="email" id="email" placeholder="Ex.: email@email.com" required/>
                                            </div>
                                        </div>

                                        

                                    </fieldset>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" id="headingTwo">
                            <h3>
                                <a href="#collapseTwo" data-toggle="collapse" data-parent="#accordion">Informações do Clube</a>
                            </h3>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                
                                    <fieldset>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="text" class="form-label">Nome do Clube</label>
                                                <input type="text" name="clube" id="clube" required/>
                                            </div>

                                            <div class="form-group">
                                                <label for="text" class="form-label">Distrito</label>
                                                <input type="text" name="distrito" id="distrito" placeholder="Ex.: 4490" required/>
                                            </div>
                        
                                            <div class="form-group">
                                                <label for="phone" class="form-label">CEP</label>
                                                <input type="text" name="cep" id="cep" onkeypress="return somenteNumeros(event)" maxlength="8" required/>
                                            </div>
                                        </div>
                                        <div id="enderec" style="display:none;">
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="city" class="form-label">Endereço</label>
                                                <input type="text" name="endereco" id="endereco" required/>
                                            </div>
    
                                            <div class="form-group">
                                                <label for="pincode" class="form-label">Número</label>
                                                <input type="text" name="numero" id="numero" required/>
                                            </div>

                                            <div class="form-group">
                                                <label for="pincode" class="form-label">Bairro</label>
                                                <input type="text" name="bairro" id="bairro" required/>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="city" class="form-label">Cidade</label>
                                                <input type="text" name="cidade" id="cidade" required/>
                                            </div>
    
                                            <div class="form-group">
                                                <label for="pincode" class="form-label">Estado</label>
                                                <input type="text" name="estado" id="estado" require>
                                            </div>

                                            <div class="form-group">
                                                <label for="phone" class="form-label">Senha</label>
                                                <input type="password" name="senha" id="senha" required/>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Telefone</label>
                                                <input type="text" name="telefone" id="telefone" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" required/>
                                            </div>
                        
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Whatsapp</label>
                                                <input type="text" name="whatsapp" id="whatsapp" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" required/>
                                            </div>

                                            <div class="form-group">
                                                <label for="phone" class="form-label">CNPJ</label>
                                                <input type="text" name="cnpj" id="cnpj" maxlength="18" onkeydown="javascript: fMasc( this, mCNPJ );" required/>
                                            </div>

                                            
                                        </div>
                                    </div>
                                    <div class="form-submit">
                                       
                                        <button class="au-btn" type="submit"><i class="fas fa-shopping-cart" style="margin-right: 5px"></i> PAGAR..</button>
                                    </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Script para busca de endereços por CEP-->
    <script type="text/javascript">
        
        $("#cep").focusout(function(){
            $.ajax({
                url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
                dataType: 'json',
                success: function(resposta){
                    $("#endereco").val(resposta.logradouro);
                    $("#complemento").val(resposta.complemento);
                    $("#bairro").val(resposta.bairro);
                    $("#cidade").val(resposta.localidade);
                    $("#estado").val(resposta.uf);
                    $("#numero").focus();
                    document.getElementById("enderec").style.display = "block";
                }
            });
        });
    </script>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/boostrap/bootstrap.min.js"></script>
    <script src="vendor/acc-wizard-master/release/acc-wizard.min.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="vendor/minimalist-picker/dobpicker.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
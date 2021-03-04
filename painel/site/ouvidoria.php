<?php 
//Conexão com banco de dados
include_once("../config.php");

$clube = $_GET['clube'];

$sql = "SELECT * FROM rfa_site_topo WHERE clube='$clube'";
$topo = mysqli_query($link, $sql) or die(mysqli_error($link));
$row_topo = mysqli_fetch_assoc($topo);
$totalRows_top = mysqli_num_rows($topo);

$sblog = "SELECT * FROM rfa_site_blog WHERE clube='$clube' ORDER BY data_blog, hora_blog DESC LIMIT 2";
$blog = mysqli_query($link, $sblog) or die(mysqli_error($link));
$totalRows_blog = mysqli_num_rows($blog);

$ssoc = "SELECT * FROM rfs_socios WHERE clube='$clube' ORDER BY nome_socio ASC";
$socios = mysqli_query($link, $ssoc) or die(mysqli_error($link));

$totalRows_socios = mysqli_num_rows($socios);

$sconteudo = "SELECT * FROM rfa_site_conteudo WHERE clube='$clube'";
$conteudo = mysqli_query($link, $sconteudo) or die(mysqli_error($link));
$row_conteudo = mysqli_fetch_assoc($conteudo);
$totalRows_conteudo = mysqli_num_rows($conteudo);

$sblog2 = "SELECT * FROM rfa_site_blog WHERE clube='$clube' ORDER BY data_blog, hora_blog DESC LIMIT 4";
$blog2 = mysqli_query($link, $sblog2) or die(mysqli_error($link));
$totalRows_blog2 = mysqli_num_rows($blog2);


?>

<!DOCTYPE html>
<html lang="pt-br">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <!-- Site Metas -->
   <title><?php echo $row_topo['title_seo']; ?></title>
   <meta name="keywords" content="<?php echo $row_topo['keyword_seo']; ?>">
   <meta name="description" content="<?php echo $row_topo['description_seo']; ?>">
   <meta name="author" content="David Magalhães">
   
<?php include('head.php');?>


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
    &.is-active {: ;
    background-color: rgba(255, 255, 255, 0.05);
    }: ;
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

.grid-width-100 {
    padding: 10px !important;
}
</style>
   </head>
   <body class="game_info" data-spy="scroll" data-target=".header">
      
      <section id="top">
         
<?php include('header.php'); ?>

         <div class="inner-page-banner">
            <div class="container">
<h1 class="titulo-topo">Ouvidoria</h1>
            </div>

         </div>

      </section>
      
      <section id="contant" class="contant main-heading team">
         <div class="row">
            <div class="container">
               <div class="contact">
                  
                  
                  <div class="col-md-12">
                     <div class="contact-us">
                        <form method="post" class="comments-form"  action="proc_ouvidoria.php" enctype="multipart/form-data">
                           <h1>Dados Pessoais</h1>
                           <input type="hidden" name="clube" value="<?php echo $clube;?>"> 
                           <div class="row">
                              <div class="col">
                                 <input type="text" id="nomedemandante" name="nomedemandante" class="required" placeholder="Nome do Demandante" required>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col">
                                 <input type="text" id="email" name="email" class="required email" placeholder="E-mail" required>
                              </div>
                           </div>
                             
                              

                           <div class="row">
                              <div class="col-12 col-md-1"><strong>Sexo:</strong></div>
                              <div class="col-12 col-md-5">
                                    <input type="radio" id="sexo" name="sexo" value="m" style="width: 20px; float:left"> <span style="float:left">Masculino</span> <input type="radio" id="sexo" name="sexo" value="f" style="margin-left: 10px; width: 20px; float:left"> <span style="float:left">Feminino</span>
                              </div>
                              <div class="col-12 col-md-1"><strong>Tipo:</strong></div>
                              <div class="col-12 col-md-5">
                                    <input type="radio" id="tipo" name="tipo" value="pf" style="width: 20px; float:left"> <span style="float:left">Pessoa física</span> <input type="radio" id="tipo" name="tipo" value="pj" style="margin-left: 10px; width: 20px; float:left"> <span style="float:left">Pessoa jurídica</span>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-12">
                                 <input type="text" name="cpf" placeholder="CPF" >
                              </div>
                              <div class="col-12" id="cnpj">
                                 <input type="text" name="cnpj" placeholder="CNPJ" >
                              </div>
                           </div>

                           <h1>Endereço</h1>

                           <div class="row">
                              <div class="col-12 col-md-6">
                                 <input type="text" name="cep" id="cep" maxlength="8" placeholder="CEP" required>
                              </div>
                              <div class="col-12 col-md-6">
                                 <input type="text" name="logradouro" id="endereco" placeholder="Logradouro" required>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-12 col-md-6">
                                 <input type="text" name="numero" placeholder="Número" required>
                              </div>
                              <div class="col-12 col-md-6">
                                 <input type="text" name="bairro" id="bairro" placeholder="Bairro" required>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-12 col-md-6">
                                 <input type="text" name="cidade" id="cidade" placeholder="Cidade" required>
                              </div>
                              <div class="col-12 col-md-6">
                                 <input type="text" name="estado" id="estado" placeholder="Estado" required>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-12 col-md-6">
                                 <input type="text" name="pais" placeholder="País" required>
                              </div>
                              <div class="col-12 col-md-6">
                                 <input type="text" name="complemento" placeholder="Complemento" required>
                              </div>
                           </div>
                           
                           <h1>Telefone</h1>

                           <div class="row">
                              <div class="col-12 col-md-6">
                                 <select name="tipo_telefone" style="width: 100%; padding: 10px 15px; border: solid #ccc 1px;">
                                    <option>Residencial</option>
                                    <option>Celular</option>
                                    <option>Comercial</option>
                                 </select>
                              </div>
                              <div class="col-12 col-md-6">
                                 <input type="text" name="telefone" id="telefone" placeholder="Telefone" onkeydown="javascript: fMasc( this, mTel );" required>
                              </div>
                           </div>

                           

                           <h1>Tipo de Demanda</h1>

                           <div class="row">
                              <div class="col-12 col-md-6">
                                 <select name="tipo_demanda" style="width: 100%; padding: 10px 15px; border: solid #ccc 1px;">
                                    <option>Solicitação</option>
                                    <option>Reclamação</option>
                                    <option>Elogio</option>
                                    <option>Denúncia</option>
                                 </select>
                              </div>
                              <div class="col-12 col-md-6">
                                 <input type="text" name="assunto" placeholder="Assunto" required>
                              </div>
                              <div class="col-12">
                                 <textarea name="descricao" placeholder="Descrição"></textarea>
                              </div>
                           </div>

                           <div class="row" style="margin: 15px 0;">
                              <div class="col">
                                 <div class="file-drop-area" style="margin-bottom: 10px">
                                                <span class="fake-btn"><strong style="color:#4272d7"><i class="fas fa-cloud-upload-alt" style="margin-right: 15px"></i> Enviar documento</strong></span>
                                                <span class="file-msg">Clique ou arraste e solte...</span>
                                                <input class="file-input" type="file" name="documento" required>
                                              </div>
                              </div>
                           </div>

                           <h1>Como deseja uma resposta da ouvidoria</h1>

                           <div class="row" style="margin-bottom: 15px">
                                 <div class="col-12 col-md-12">
                                 <select name="tipo_resposta" style="width: 100%; padding: 10px 15px; border: solid #ccc 1px;">
                                    <option>E-mail</option>
                                    <option>Telefone</option>
                                    <option>Correspondência</option>
                                    <option>Não deseja receber resposta</option>
                                 </select>
                              </div>
                           </div>

                           <input class="thbg-color" type="submit" value="Solicitar" style="background: #40a02e; color: #fff">
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php include('footer.php'); ?>

      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
      <!-- ALL JS FILES -->
      <script src="js/all.js"></script>
      <!-- ALL PLUGINS -->
      <script src="js/custom.js"></script>
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
<script type="text/javascript">
      
      $("#cep").focusout(function(){
         $.ajax({
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            dataType: 'json',
            success: function(resposta){
               $("#endereco").val(resposta.logradouro);
               $("#bairro").val(resposta.bairro);
               $("#cidade").val(resposta.localidade);
               $("#estado").val(resposta.uf);
               $("#numero").focus();
               
            }
         });
      });
   </script>

   </body>
</html>
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
<h1 class="titulo-topo">Central de Vistos</h1>
            </div>

         </div>

      </section>
      
      <section id="contant" class="contant main-heading team">
         <div class="row">
            <div class="container">
               <div class="contact">
                  
                  <div class="col-md-6">
                     <div class="contact-info">
                        
                        <div class="kode-forminfo">
                           <p><a href="../<?php echo $row_conteudo['doc_visto'];?>" target="_blank" class="btn btn-primary"><i class="fas fa-download" style="margin-right: 5px"></i> BAIXAR MODELO DE PREENCHIMENTO</a></p>
                           <p>
                              <?php echo $row_conteudo['vistos'];?>
                           </p>
                           
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="contact-us">
                        <form method="post" class="comments-form"  action="proc_vistos.php" enctype="multipart/form-data">
                           <ul>
                              <li>
                                 
                                              
                                              <div class="file-drop-area" style="margin-bottom: 10px">
                                                <span class="fake-btn"><strong style="color:#4272d7"><i class="fas fa-cloud-upload-alt" style="margin-right: 15px"></i> Enviar documento</strong></span>
                                                <span class="file-msg">Clique ou arraste e solte...</span>
                                                <input class="file-input" type="file" name="documento" required>
                                              </div>
                                          
                              </li>
                              <li><input type="text" id="nome" name="nome" class="required" placeholder="Nome completo" required></li>
                              <li><input type="text" id="email" name="email" class="required email" placeholder="Email" required></li>
                              <li><input type="text" name="telefone" id="telefone" placeholder="Telefone" onkeydown="javascript: fMasc( this, mTel );" required></li>
                              
                              <input type="hidden" name="clube" value="<?php echo $clube;?>"> 
                              <li><input class="thbg-color" type="submit" value="Solicitar" style="background: #40a02e; color: #fff"></li>
                           </ul>
                           
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
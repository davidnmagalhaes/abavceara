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

$ssoc = "SELECT * FROM rfa_site_galeria WHERE clube='$clube' ORDER BY ano_rotario_i DESC";
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
   <body class="game_info" data-spy="scroll" data-target=".header">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
      <section id="top">
         


      </section>
      <section id="contant" class="contant main-heading team">

         <div class="row">
            <div class="col">
               <h2 style="font-size: 45px; line-height: 45px;">Questionário de Doação</h2>
            </div>
         </div>

         <div class="row">
            <div class="container">
               <div class="contact">
                  
                  
                  <div class="col-md-12">
                     <div class="contact-us">
                        <form method="post" class="comments-form" id="contactform" action="proc-doacoes.php">
                           <ul>
                              <li><input type="text" id="cpf" name="cpf" class="required" placeholder="Qual é o seu CPF?"></li>
                              <li><input type="text" id="rg" name="rg" class="required" placeholder="Qual é o seu RG?"></li>
                              <li>
                                 <select class="form-control required" style="margin-bottom: 25px; height: 42px;">
                                    <option>Qual é a sua escolaridade?</option>
                                     <option value="ensino-fundamental">Ensino fundamental</option>
                                     <option value="ensino-fundamental-incompleto">Ensino fundamental incompleto</option>
                                     <option value="ensino-medio">Ensino médio</option>
                                     <option value="ensino-medio-incompleto">Ensino médio incompleto</option>
                                     <option value="ensino-superior">Ensino superior</option>
                                     <option value="ensino-superior-incompleto">Ensino superior incompleto</option>
                                 </select>
                              </li>
                              <li>
                                 <select class="form-control required" style="margin-bottom: 25px; height: 42px;">
                                    <option>Qual é a renda familiar?</option>
                                     <option value="menos-baixa">Abaixo de 1 salário mínimo</option>
                                     <option value="baixa">De 1 a 2 salários</option>
                                     <option value="media-baixa">De 5 a 10 salários</option>
                                     <option value="media">De 10 a 15 salários</option>
                                     <option value="alta-media">De 15 a 20 salários</option>
                                     <option value="alta">Acima de 20 salários</option>
                                 </select>
                              </li>
                              <li>
                                 <input type="text" name="deficiencia" placeholder="Qual é a sua deficiência? Ex.: Paraplégico">
                              </li>
                              <li style="text-align:left;">
                                 <label>Qual é a sua necessidade?</label><br>
                                 <ul>
                                    <li>
                                      <input type="radio" name="necessidade" style="width: 5%"> Cadeira de Rodas
                                    </li>
                                 </ul>
                                 <ul>
                                    <li>
                                      <input type="radio" name="necessidade" style="width: 5%"> Cadeira de Banho
                                    </li>
                                 </ul>
                              </li>
                              <li>
                                 <select class="form-control required" style="margin-bottom: 25px; height: 42px;">
                                    <option>Como soube do banco de cadeiras de rodas?</option>
                                     <option value="google">Google</option>
                                     <option value="amigo">Amigo</option>
                                     <option value="folder">Folder</option>
                                     <option value="facebook">Facebook</option>
                                     <option value="instagram">Instagram</option>
                                     <option value="email">E-mail</option>
                                     <option value="outdoor">Outdoor</option>
                                 </select>
                              </li>

                              <li><input class="thbg-color" type="submit" value="FINALIZAR SOLICITAÇÃO"></li>
                           </ul>
                           <div class="hidden-me" id="contact_form_responce">
                              <p></p>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
<?php include('footer.php'); ?>

      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

      <script type="text/javascript">
      
      $("#cep").focusout(function(){
         $.ajax({
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            dataType: 'json',
            success: function(resposta){
               $("#endereco").val(resposta.logradouro);
               $("#cidade").val(resposta.localidade);
               $("#estado").val(resposta.uf);
               $("#numero").focus();
               
            }
         });
      });
   </script>
      <!-- ALL JS FILES -->
      <script src="js/all.js"></script>
      <!-- ALL PLUGINS -->
      <script src="js/custom.js"></script>
   </body>
</html>
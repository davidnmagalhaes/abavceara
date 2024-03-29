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

$ssoc = "SELECT * FROM rfa_usuario WHERE clube='$clube' ";
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

   </head>
   <body class="game_info" data-spy="scroll" data-target=".header">
      
      <section id="top">
         
<?php include('header.php'); ?>

         <div class="inner-page-banner">
            <div class="container">
<h1 class="titulo-topo" style="font-size: 70px !important;">Diretoria</h1>
            </div>

         </div>

      </section>
      <section id="contant" class="contant main-heading team">
         <div class="row">
            <div class="container">

               <?php while($row_socios = mysqli_fetch_array($socios)){ ?>
               <div class="col-md-3 column">
                  <div class="card2">
                     <img class="img-responsive" src="../login-seguro/<?php if(empty($row_socios['imagem']) ){echo 'images/male.jpg';}else{echo $row_socios['imagem'];}?>" style="width:100%">
                     <div class="">
                        <h4><?php echo $row_socios['nome'];?></h4>
                        <p class="title"><?php echo "<strong>Função: </strong>";

                        if($row_socios['funcao'] == 2){
                           echo "Presidente";
                        }elseif($row_socios['funcao'] == 3){
                           echo "Vice-Presidente";
                        }elseif($row_socios['funcao'] == 4){
                           echo "Diretor(a) Secretário(a)";
                        }elseif($row_socios['funcao'] == 5){
                           echo "Diretor(a) Tesoureiro(a)";
                        }elseif($row_socios['funcao'] == 6){
                           echo "Diretor(a) Social";
                        }elseif($row_socios['funcao'] == 7){
                           echo "Diretor(a) de Patrimônio";
                        }elseif($row_socios['funcao'] == 8){
                           echo "Diretor(a) de Turismo Receptivo";
                        }else{
                           echo "Secretário(a) Executivo(a)";
                        }

                        ?></p>
                        <p>
                        <!--<div class="center"><button class="button">Contact</button></div>-->
                        </p>
                     </div>
                  </div>
               </div>
               <?php } ?>
               
            </div>
         </div>
      </section>
      
<?php include('footer.php'); ?>

      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
      <!-- ALL JS FILES -->
      <script src="js/all.js"></script>
      <!-- ALL PLUGINS -->
      <script src="js/custom.js"></script>
   </body>
</html>
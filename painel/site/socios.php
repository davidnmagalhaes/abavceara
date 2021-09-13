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

$ssoc = "SELECT * FROM rfs_socios WHERE clube='$clube' AND status_socio=1  ORDER BY nome_socio ASC";
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
<h1 class="titulo-topo">Associados</h1>
            </div>

         </div>

      </section>
      <section id="contant" class="contant main-heading team">
         <?php while($row_socios = mysqli_fetch_array($socios)){ 
         $today = date('Y-m-d');
         $datetime = Datetime::createFromFormat('Y-m-d', $today);
         $datetime->modify('-3 months');
         $datemonths = $datetime->format('Y-m-d');
         
         $idsoc = $row_socios['id_socio'];
         $querymsl = "SELECT * FROM rfa_mensalidades WHERE clube='$clube' AND id_socio='$idsoc' AND pagamento = 0 AND data_mensalidade >= $datemonths";
         $listCurrencies = mysqli_query($link, $querymsl) or die(mysqli_error($link));
         $totalRows_currencies = mysqli_num_rows($listCurrencies);   
         if($totalRows_currencies <= 3){
         ?>
         
         
         <div class="row">
            <div class="container">
               <div class="col-md-2">
                  <div class="card">
                     <img class="img-responsive" src="<?php if(empty($row_socios['imagem']) && $row_socios['sexo'] =='m'){echo 'images/male.jpg';}elseif(empty($row_socios['imagem']) && $row_socios['sexo'] =='f'){echo 'images/female.jpg';}else{echo '../'.$row_socios['imagem'];}?>" style="width:100%">
                     
                  </div>
               </div>

               <div class="col-md-10 ">
                  <div class="card">
                     
                     <div class="">
                        <h2 style="margin-top: 15px"><?php echo $row_socios['nome_socio'];?> | <?php echo $row_socios['id_ri_socio'];?></h2>
                        <p class="title"><?php echo $row_socios['endereco_socio'].", ".$row_socios['numero_end_socio'].", ".$row_socios['bairro_socio'].", ".$row_socios['cidade_socio'].", ".$row_socios['estado_socio'];?></p>
                        <p class="title">
                           <?php echo "<strong>Contatos: </strong>".$row_socios['telefone_socio'];?>
                           <?php if(empty($row_socios['celular_socio'])){}else{echo " | ".$row_socios['celular_socio'];}?>
                           <br>
                           <?php echo $row_socios['email_socio'];?>
                        <!--<div class="center"><button class="button">Contact</button></div>-->
                        </p>
                     </div>
                  </div>
               </div>
               
               
            </div>
         </div>
         <?php }} ?>
      </section>
      
<?php include('footer.php'); ?>

      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
      <!-- ALL JS FILES -->
      <script src="js/all.js"></script>
      <!-- ALL PLUGINS -->
      <script src="js/custom.js"></script>
   </body>
</html>
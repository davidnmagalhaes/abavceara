<?php 
//Conexão com banco de dados
include_once("../config.php");

$clube = $_GET['clube'];
$hotel = $_GET['hotel'];

$sql = "SELECT * FROM rfa_site_topo WHERE clube='$clube'";
$topo = mysqli_query($link, $sql) or die(mysqli_error($link));
$row_topo = mysqli_fetch_assoc($topo);
$totalRows_top = mysqli_num_rows($topo);

$sblog = "SELECT * FROM rfa_site_blog WHERE clube='$clube' ORDER BY data_blog, hora_blog DESC LIMIT 2";
$blog = mysqli_query($link, $sblog) or die(mysqli_error($link));
$totalRows_blog = mysqli_num_rows($blog);

$queryhotel = "SELECT * FROM rfa_site_hoteis WHERE clube='$clube' AND id_hotel='$hotel'";
$hotel = mysqli_query($link, $queryhotel) or die(mysqli_error($link));
$hoteldata = mysqli_fetch_assoc($hotel);


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
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <title><?php echo $row_topo['title_seo']; ?></title>
   <meta name="keywords" content="<?php echo $row_topo['keyword_seo']; ?>">
   <meta name="description" content="<?php echo $row_topo['description_seo']; ?>">
   <meta name="author" content="David Magalhães">
   
<?php include('head.php');?>

<style>
    img {
  block-size: auto;
  max-inline-size: 100%;
  vertical-align: middle;
}

/* Embed */

.embed {
  overflow: hidden;
  padding-block-start: 100%;
  position: relative;
}

.embed--1-2 {
  padding-top: calc(100% / (1 / 2));
}

.embed--2-1 {
  padding-top: calc(100% / (2 / 1));
}

.embed--2-3 {
  padding-top: calc(100% / (2 / 3));
}

.embed > * {
  height: 100%;
  left: 0;
  object-fit: cover;
  padding: 0.25em;
  position: absolute;
  top: 0;
  width: 100%;
}

/* Gallery  */

.gallery {
  display: grid;
  grid-template-columns: repeat(8, 1fr);
  grid-template-rows: repeat(5, 1fr);
}

.gallery__item--h-2 {
  grid-column-end: span 2;
}

.gallery__item--h-3 {
  grid-column-end: span 3;
}

.gallery__item--v-2 {
  grid-row-end: span 2;
}

.gallery__item--v-3 {
  grid-row-end: span 3;
}

#mapa iframe{
    width: 100% !important;
}

</style>
   </head>
   <body class="game_info" data-spy="scroll" data-target=".header">
      
      <section id="top">
         
<?php include('header.php'); ?>

         <div class="inner-page-banner">
            <div class="container">
<h1 class="titulo-topo"><?php echo $hoteldata['nome_hotel']; ?></h1>
            </div>

         </div>

      </section>
      <section id="contant" class="contant main-heading team">
         <div class="row">
            <div class="container">

               <div class="row">
               <div class="col-md-2">
                  <div class="card">
                     <img class="img-responsive" src="../<?php echo $hoteldata['imagem_hotel'];?>" style="width:100%">
                     
                  </div>
               </div>

               <div class="col-md-10 ">
                  <div class="card">
                     
                     
                        <h2 style="margin-top: 15px"><?php echo $hoteldata['nome_hotel'];?>
                        <i class="fas fa-star" style="color: #f7cd00"></i>
                        <i class="fas fa-star" style="color: #f7cd00"></i>
                        <i class="fas fa-star" style="color: #f7cd00"></i>
                        <i class="fas fa-star" style="color: #f7cd00"></i>
                        <i class="far fa-star" style="color: #f7cd00"></i>
                        </h2>
                        <p class="title"><?php echo $hoteldata['endereco_hotel'].", ".$hoteldata['numero_hotel'].", ".$hoteldata['bairro_hotel'].", ".$hoteldata['cidade_hotel'].", ".$hoteldata['estado_hotel'];?></p>
                        <p class="title">
                           <?php echo "<strong>Contatos: </strong>".$hoteldata['telefone_hotel'];?>
                          
                           <br>
                           <?php echo $hoteldata['email_hotel'];?>
                        <!--<div class="center"><button class="button">Contact</button></div>-->
                        </p>
                    
                  </div>
               </div>
               
               <div class="col-md-12 ">
                  <div class="card">
                     
                   <div class="gallery">
  <div class="gallery__item">
    <div class="embed">
      <img src="images/hoteis/foto1.jpg" />
    </div>
  </div>
  <div class="gallery__item">
    <div class="embed">
      <img src="images/hoteis/foto2.jpg" />
    </div>
  </div>
  <div class="gallery__item">
    <div class="embed">
      <img src="images/hoteis/foto3.jpg" />
    </div>
  </div>
  <div class="gallery__item gallery__item--v-2">
    <div class="embed embed--1-2">
      <img src="images/hoteis/foto4.jpg" />
    </div>
  </div>
  <div class="gallery__item">
    <div class="embed">
      <img src="images/hoteis/foto5.jpg" />
    </div>
  </div>
  <div class="gallery__item gallery__item--h-2">
    <div class="embed embed--2-1">
      <img src="images/hoteis/foto6.jpg" />
    </div>
  </div>
  <div class="gallery__item gallery__item--v-2">
    <div class="embed embed--1-2">
      <img src="images/hoteis/foto7.jpg" />
    </div>
  </div>
  <div class="gallery__item gallery__item--h-2">
    <div class="embed embed--2-1">
      <img src="images/hoteis/foto8.jpg" />
    </div>
  </div>
  <div class="gallery__item gallery__item--v-2">
    <div class="embed embed--1-2">
      <img src="images/hoteis/foto9.jpg" />
    </div>
  </div>
  <div class="gallery__item gallery__item--h-2 gallery__item--v-2">
    <div class="embed">
      <img src="images/hoteis/foto10.jpg" />
    </div>
  </div>
  <div class="gallery__item">
    <div class="embed">
      <img src="images/hoteis/foto11.jpg" />
    </div>
  </div>
  <div class="gallery__item gallery__item--h-2 gallery__item--v-2">
    <div class="embed">
      <img src="images/hoteis/foto12.jpg" />
    </div>
  </div>
  <div class="gallery__item">
    <div class="embed">
      <img src="images/hoteis/foto13.jpg" />
    </div>
  </div>
  <div class="gallery__item gallery__item--h-2 gallery__item--v-3">
    <div class="embed embed--2-3">
      <img src="images/hoteis/foto14.jpg" />
    </div>
  </div>
  <div class="gallery__item gallery__item--h-2 gallery__item--v-2">
    <div class="embed">
      <img src="images/hoteis/foto15.jpg" />
    </div>
  </div>
  <div class="gallery__item gallery__item--v-2">
    <div class="embed embed--1-2">
      <img src="images/hoteis/foto16.jpg" />
    </div>
  </div>
  <div class="gallery__item">
    <div class="embed">
      <img src="images/hoteis/foto17.jpg" />
    </div>
  </div>
  <div class="gallery__item">
    <div class="embed">
      <img src="images/hoteis/foto18.jpg" />
    </div>
  </div>
  <div class="gallery__item">
    <div class="embed">
      <img src="images/hoteis/foto19.jpg" />
    </div>
  </div>
  <div class="gallery__item">
    <div class="embed">
      <img src="images/hoteis/foto20.jpg" />
    </div>
  </div>
</div>
         
                  </div>
               </div>
               
               
               <div class="row">
                   <div class="col-12"><h1>Depoimentos</h1></div>
               </div>
               
               <div class="col-md-12 ">
                  <div class="card">
                     
                     
                        <h2 style="margin-top: 15px">Marcos Paulo de Oliveira
                        <i class="fas fa-star" style="color: #f7cd00"></i>
                        <i class="fas fa-star" style="color: #f7cd00"></i>
                        <i class="fas fa-star" style="color: #f7cd00"></i>
                        <i class="fas fa-star" style="color: #f7cd00"></i>
                        <i class="far fa-star" style="color: #f7cd00"></i>
                        </h2>
                        <p class="title">
                            O hotel é sensacional, desde o check-in até o check-out, a atendente Paula foi ótima. Os quartos com ar-condicionado funcionando perfeitamente, e as piscinas são show!
                        </p></p>
                       
                  </div>
               </div>
               
               <?php
               if(empty($hoteldata['frame'])){}else{
               ?>
               <div class="col-md-12 mb-5">
                   <div id="mapa" style="width: 100%; min-height: 300px">
                       <?php echo $hoteldata['frame'];?>
                   </div>
               </div>
               <?php }?>
               
               
               </div>
               
            </div>
         </div>
      </section>
      
<?php include('footer.php'); ?>

      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
   
  
      <script src="js/all.js"></script>
      <script src="js/custom.js"></script>
      
   </body>
</html>
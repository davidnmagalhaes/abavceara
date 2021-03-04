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

$ssoc = "SELECT * FROM rfa_site_cursos WHERE clube='$clube' ORDER BY titulo_curso ASC";
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
<h1 class="titulo-topo" style="font-size: 70px !important;">Cursos</h1>
            </div>

         </div>

      </section>
      <section id="contant" class="contant main-heading team">
         <div class="row">
            <div class="container">

               <?php while($row_socios = mysqli_fetch_array($socios)){ ?>
               <div class="col-md-3 column">
                  <div class="card2">
                     <img class="img-responsive" src="../<?php echo $row_socios['imagem_curso'];?>" style="width:100%">
                     <div class="">
                        <h4><?php echo $row_socios['titulo_curso'];?></h4>
                        <p style="text-align: center;">
                           <a href="#" class="btn btn-primary" style="margin:5px auto; float:none" data-toggle="modal" data-target="#modalExemplo<?php echo $row_socios['id_curso'];?>">VER CURSO</a>
                        </p>
                        <p>
                        <!--<div class="center"><button class="button">Contact</button></div>-->
                        </p>
                     </div>
                  </div>
               </div>


               <!-- Modal -->
               <div class="modal fade" id="modalExemplo<?php echo $row_socios['id_curso'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h3 class="modal-title" id="exampleModalLabel"><Strong><?php echo $row_socios['titulo_curso'];?></Strong></h3>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body" style="padding: 20px 20px 40px 20px">
                       <?php echo $row_socios['descricao_curso'];?>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                       <a href="<?php echo $row_socios['linkcompra_curso'];?>" type="button" class="btn btn-primary">Comprar</a>
                     </div>
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
<?php 
//Conexão com banco de dados
include_once("../config.php");

$clube = $_GET['clube'];

$sql = "SELECT * FROM rfa_site_topo WHERE clube='$clube'";
$topo = mysqli_query($link, $sql) or die(mysqli_error($link));
$row_topo = mysqli_fetch_assoc($topo);
$totalRows_top = mysqli_num_rows($topo);

$sqlsld = "SELECT * FROM rfa_site_slides WHERE clube='$clube'";
$toposld = mysqli_query($link, $sqlsld) or die(mysqli_error($link));
$totalRows_topsld = mysqli_num_rows($toposld);

$sqlsld2 = "SELECT * FROM rfa_site_slides WHERE clube='$clube'";
$toposld2 = mysqli_query($link, $sqlsld2) or die(mysqli_error($link));
$totalRows_topsld2 = mysqli_num_rows($toposld2);

$hoje = date('Y-m-d');
$sqr = "SELECT * FROM rfa_reuniao WHERE clube='$clube' AND data_reuniao >= '$hoje' ORDER BY data_reuniao ASC";
$reuniao = mysqli_query($link, $sqr) or die(mysqli_error($link));
$row_reuniao = mysqli_fetch_assoc($reuniao);
$totalRows_reuniao = mysqli_num_rows($reuniao);
$idreun = $row_reuniao['id_reuniao'];

$sqpt = "SELECT * FROM rfa_pauta WHERE clube='$clube' AND ref_reuniao='$idreun'";
$paut = mysqli_query($link, $sqpt) or die(mysqli_error($link));
$row_paut = mysqli_fetch_assoc($paut);
$idloc = $row_paut['id_local'];

$sqlc = "SELECT * FROM rfa_local_reuniao WHERE clube='$clube' AND id_local='$idloc'";
$lci = mysqli_query($link, $sqlc) or die(mysqli_error($link));
$row_lci = mysqli_fetch_assoc($lci);
$nomeloc = $row_lci['nome_local'];

//Pega Presidente
$squ = "SELECT * FROM rfa_usuario WHERE clube='$clube' AND funcao = '2'";
$usuario = mysqli_query($link, $squ) or die(mysqli_error($link));
$row_usuario = mysqli_fetch_assoc($usuario);
$totalRows_usuario = mysqli_num_rows($usuario);

//Pega Secretário
$ssec = "SELECT * FROM rfa_usuario WHERE clube='$clube' AND funcao = '3'";
$secretario = mysqli_query($link, $ssec) or die(mysqli_error($link));
$row_secretario = mysqli_fetch_assoc($secretario);
$totalRows_secretario = mysqli_num_rows($secretario);

//Pega Contador
$scont = "SELECT * FROM rfa_usuario WHERE clube='$clube' AND funcao = '4'";
$contador = mysqli_query($link, $scont) or die(mysqli_error($link));
$row_contador = mysqli_fetch_assoc($contador);
$totalRows_contador = mysqli_num_rows($contador);

//Pega Secretário executivo
$ssecex = "SELECT * FROM rfa_usuario WHERE clube='$clube' AND funcao = '5'";
$secexecutivo = mysqli_query($link, $ssecex) or die(mysqli_error($link));
$row_secexecutivo = mysqli_fetch_assoc($secexecutivo);
$totalRows_secexecutivo = mysqli_num_rows($secexecutivo);

//Pega Tesoureiro
$stes = "SELECT * FROM rfa_usuario WHERE clube='$clube' AND funcao = '6'";
$tesoureiro = mysqli_query($link, $stes) or die(mysqli_error($link));
$row_tesoureiro = mysqli_fetch_assoc($tesoureiro);
$totalRows_tesoureiro = mysqli_num_rows($tesoureiro);

//Pega Tesoureiro
$sdpat = "SELECT * FROM rfa_usuario WHERE clube='$clube' AND funcao = '7'";
$diretorpat = mysqli_query($link, $sdpat) or die(mysqli_error($link));
$row_diretorpat = mysqli_fetch_assoc($diretorpat);
$totalRows_diretorpat = mysqli_num_rows($diretorpat);

//Pega Tesoureiro
$sdtur = "SELECT * FROM rfa_usuario WHERE clube='$clube' AND funcao = '8'";
$diretortur = mysqli_query($link, $sdtur) or die(mysqli_error($link));
$row_diretortur = mysqli_fetch_assoc($diretortur);
$totalRows_diretortur = mysqli_num_rows($diretortur);

//Pega Tesoureiro
$ssecex = "SELECT * FROM rfa_usuario WHERE clube='$clube' AND funcao = '9'";
$secexec = mysqli_query($link, $ssecex) or die(mysqli_error($link));
$row_secexec = mysqli_fetch_assoc($secexec);
$totalRows_secexec = mysqli_num_rows($secexec);

$sblog = "SELECT * FROM rfa_site_blog INNER JOIN rfa_usuario ON rfa_site_blog.por_blog = rfa_usuario.cod_usuario WHERE rfa_site_blog.clube='$clube' ORDER BY data_blog, hora_blog DESC LIMIT 2";
$blog = mysqli_query($link, $sblog) or die(mysqli_error($link));
$totalRows_blog = mysqli_num_rows($blog);

$sblog2 = "SELECT * FROM rfa_site_blog WHERE clube='$clube' ORDER BY data_blog, hora_blog DESC LIMIT 4";
$blog2 = mysqli_query($link, $sblog2) or die(mysqli_error($link));
$totalRows_blog2 = mysqli_num_rows($blog2);

$sconteudo = "SELECT * FROM rfa_site_conteudo WHERE clube='$clube'";
$conteudo = mysqli_query($link, $sconteudo) or die(mysqli_error($link));
$row_conteudo = mysqli_fetch_assoc($conteudo);
$totalRows_conteudo = mysqli_num_rows($conteudo);

//Datas atuais
$Week = date('w'); /* Semana atual... */
$FirstDay = date('d', strtotime('-'.$Week.' days'));
$LastDay = date('d', strtotime('+'.(6-$Week).' days'));
$Month = date('m');
$DiaAtual = date('Y-m-d');
$AnoAtual = date('Y');

//Serviços à comunidade
$sc = "SELECT * FROM rfa_servicos_comunidade WHERE (dia_servico BETWEEN '$FirstDay' AND '$LastDay') AND mes_servico='$Month' AND clube='$clube' ORDER BY dia_servico ASC";
$pegacomunidade= mysqli_query($link, $sc) or die(mysqli_error($link));
$row_pegacomunidade = mysqli_fetch_assoc($pegacomunidade);
$totalRows_pegacomunidade = mysqli_num_rows($pegacomunidade);

$dataserv = "";
if($totalRows_pegacomunidade <= 0){$dataserv = "Não há serviços à comunidade esta semana!";}else{
foreach($pegacomunidade as $pegacom){
   $dataserv .= "<li><a href='#'>".$pegacom['dia_servico']." - ".$pegacom['nome_servico']."</a></li>";
}
}

//Serviços Profissionais
$sp = "SELECT * FROM rfa_servicos_profissionais WHERE (dia_prof BETWEEN '$FirstDay' AND '$LastDay') AND mes_prof='$Month' AND clube='$clube' ORDER BY dia_prof ASC";
$pegaprofissional= mysqli_query($link, $sp) or die(mysqli_error($link));
$row_pegaprofissional = mysqli_fetch_assoc($pegaprofissional);
$totalRows_pegaprofissional = mysqli_num_rows($pegaprofissional);

$dataprof = "";
if($totalRows_pegaprofissional <= 0){$dataprof = "Não há serviços profissionais esta semana!";}else{
foreach($pegaprofissional as $pegaprof){
   $dataprof .= "<li><a href='#'>".$pegaprof['dia_prof']." - ".$pegaprof['nome_prof']."</li>";
}
}

//Datas Importantes
$si = "SELECT * FROM rfa_datas_importantes WHERE (dia_data_imp BETWEEN '$FirstDay' AND '$LastDay') AND mes_data_imp='$Month' AND clube='$clube' ORDER BY dia_data_imp ASC";
$pegaimportante= mysqli_query($link, $si) or die(mysqli_error($link));
$row_pegaimportante = mysqli_fetch_assoc($pegaimportante);
$totalRows_pegaimportante = mysqli_num_rows($pegaimportante);

$dataimp = "";
if($totalRows_pegaimportante <= 0){$dataimp = "Não há datas importantes esta semana!";}else{
foreach($pegaimportante as $pegaimp){
   $dataimp .= "<li><a href='#'>".$pegaimp['dia_data_imp']." - ".$pegaimp['nome_data_imp']."</li>";
}
}

//Aniversariantes Sócios
$sani = "SELECT * FROM rfs_socios WHERE (DAY(data_nascto_socio) BETWEEN '$FirstDay' AND '$LastDay') AND MONTH(data_nascto_socio)='$Month' AND clube='$clube' ORDER BY nome_socio ASC";
$pegaaniversario= mysqli_query($link, $sani) or die(mysqli_error($link));
$row_pegaaniversario = mysqli_fetch_assoc($pegaaniversario);
$totalRows_pegaaniversario = mysqli_num_rows($pegaaniversario);

$dataani = "";
if($totalRows_pegaaniversario <= 0){$dataani = "Não há sócios aniversariando esta semana!";}else{
foreach($pegaaniversario as $pegaani){
   $dataani .= "<li><a href='#'>".date('d/m',strtotime($pegaani['data_nascto_socio']))." - ".$pegaani['nome_socio']."</li>";
}
}

//Aniversariantes Cônjuges
$sanicon = "SELECT * FROM rfs_socios WHERE (DAY(data_nascto_conjuge) BETWEEN '$FirstDay' AND '$LastDay') AND MONTH(data_nascto_conjuge)='$Month' AND clube='$clube' ORDER BY conjuge ASC";
$pegaaniversariocon= mysqli_query($link, $sanicon) or die(mysqli_error($link));
$row_pegaaniversariocon = mysqli_fetch_assoc($pegaaniversariocon);
$totalRows_pegaaniversariocon = mysqli_num_rows($pegaaniversariocon);

$dataanicon = "";
if($totalRows_pegaaniversariocon <= 0){$dataanicon = "Não há cônjuges aniversariando esta semana!";}else{
foreach($pegaaniversariocon as $pegaanicon){
   $dataanicon .= "<li><a href='#'>".date('d/m',strtotime($pegaanicon['data_nascto_conjuge']))." - ".$pegaanicon['conjuge']." <strong>(Cônjuge de ".$pegaanicon['nome_socio'].")</strong></li>";
}
}

//Aniversariantes Filhos
$sanifilho = "SELECT * FROM rfa_socios_filhos INNER JOIN rfs_socios ON rfs_socios.ref_socio = rfa_socios_filhos.id_socio WHERE (DAY(data_nascto_filho) BETWEEN '$FirstDay' AND '$LastDay') AND MONTH(data_nascto_filho)='$Month' AND clube='$clube' GROUP BY nome_filho ORDER BY nome_filho ASC";
$pegaaniversariofilho= mysqli_query($link, $sanifilho) or die(mysqli_error($link));
$row_pegaaniversariofilho = mysqli_fetch_assoc($pegaaniversariofilho);
$totalRows_pegaaniversariofilho = mysqli_num_rows($pegaaniversariofilho);

$dataanifilho = "";
if($totalRows_pegaaniversariofilho <= 0){$dataanifilho = "Não há filhos de sócios aniversariando esta semana!";}else{
foreach($pegaaniversariofilho as $pegaanifilho){
   $dataanifilho .= "<li><a href='#'>".date('d/m',strtotime($pegaanifilho['data_nascto_filho']))." - ".$pegaanifilho['nome_filho']." <strong>(Filho de ".$pegaanifilho['nome_socio'].")</strong></li>";
}
}

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

<style>
/*we need to style the popup with CSS so it is placed as a popup does*/
#popup {
    display:none;
    position:absolute;
    margin:0 auto;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    box-shadow: 0px 0px 50px 2px #000;
    z-index: 9999;
}
.modal-dialog {
      max-width: 1300px;
      margin: 30px auto;
  }



.modal-body {
  position:relative;
  padding:0px;
}
.close {
  position:absolute;
  right:-30px;
  top:0;
  z-index:999;
  font-size:2rem;
  font-weight: normal;
  color:#fff;
  opacity:1;
}
</style>
<link rel="stylesheet" href="swc.css?verson=<?php echo rand(); ?>">   
   </head>

   <body class="game_info" data-spy="scroll" data-target=".header">

  
      <!-- LOADER 
      <div id="preloader">
         <img class="preloader" src="images/loading-img.gif" alt="">
      </div>
       END LOADER -->

<!-- Modal do vídeo -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg " role="document">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

<div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
</div>
</div>
</div>
</div>
</div>


      <section id="top">
         
<?php include('header.php'); ?>

         <div class="full-slider">
            <div id="carousel-example-generic" class="carousel slide">
               <!-- Indicators -->
               <ol class="carousel-indicators">

                  <?php 
                     $count = 0;
                     while($row_toposld2 = mysqli_fetch_array($toposld2)){
                     $count += 1;
                  ?>

                      <li data-target='#carousel-example-generic' data-slide-to="<?php echo ($count-1);?>" <?php if($row_toposld2['ativo']=="active"){echo "class='active'";}?>></li>
                   
                   <?php } ?>

               </ol>
               <!-- Wrapper for slides -->
               <div class="carousel-inner" role="listbox">
                  <!-- First slide -->

                  <?php while($row_toposld = mysqli_fetch_assoc($toposld)){?>
                  <div class="item <?php echo $row_toposld['ativo']; ?> slide<?php echo $row_toposld['id_slide']; ?>"  data-ride="carousel" data-interval="5000">
                     <div class="carousel-caption">
                        <div class="container">
                        <?php if($row_toposld['lado']=="left"){?>
                           <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"></div>
                           <div class="col-lg-8 col-md-5 col-sm-12 col-xs-12">
                        <?php }else{?>
                           <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"></div>
                           <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <?php } ?>
                           <div class="slider-contant" data-animation="animated fadeInRight">
                              <h3><!--<span class="color-yellow"></span>--><?php if(empty($row_toposld['banner_title'])){echo "";}else{echo $row_toposld['banner_title'];} ?></h3>
                              <p><?php if(empty($row_toposld['banner_sub'])){echo "";}else{echo $row_toposld['banner_sub'];} ?>
                              </p>
                              <a href="<?php echo $row_toposld['link_botao']; ?>" class="btn btn-primary btn-lg" style="line-height: 30px"><?php if(empty($row_toposld['banner_btn'])){echo "Saiba mais";}else{echo $row_toposld['banner_btn'];} ?></a>
                           </div>
                        </div>
                     </div>
                     </div>
                  </div>
                  <?php } ?>
               
                 <!--
                  <div class="item skyblue" data-ride="carousel" data-interval="5000">
                     <div class="carousel-caption">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"></div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                           <div class="slider-contant" data-animation="animated fadeInRight">
                              <h3>If you Don’t Practice<br>You <span class="color-yellow">Don’t Derserve</span><br>to win!</h3>
                              <p>You can make a case for several potential winners of<br>the expanded European Championships.</p>
                              <button class="btn btn-primary btn-lg">Button</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  
                  <div class="item darkerskyblue" data-ride="carousel" data-interval="5000">
                     <div class="carousel-caption">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"></div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                           <div class="slider-contant" data-animation="animated fadeInRight">
                              <h3>If you Don’t Practice<br>You <span class="color-yellow">Don’t Derserve</span><br>to win!</h3>
                              <p>You can make a case for several potential winners of<br>the expanded European Championships.</p>
                              <button class="btn btn-primary btn-lg">Button</button>
                           </div>
                        </div>
                     </div>
                  </div>
                 -->
               </div>
               <!-- /.carousel-inner -->
               <!-- Controls -->
               <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
               </a>
            </div>
            <!-- /.carousel -->
            <div class="news">
               <div class="container">
                  <div class="heading-slider">
                     <p class="headline"><i class="fa fa-star" aria-hidden="true"></i> Notícias :</p>
                     <!--made by vipul mirajkar thevipulm.appspot.com-->
                     <h1>
                     <a href="" class="typewrite" data-period="2000" data-type='[ "<?php if(empty($row_topo['linha_noticia'])){echo "Não há notícias...";}else{echo $row_topo['linha_noticia'];} ?>"]'>
                     <span class="wrap"></span>
                     </a>
                     </h1>	   
                     <span class="wrap"></span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div class="matchs-info">
         <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="row">
               <div class="full">
                  <div class="left-match-time">
                     <div class="row">
                     <div class="col-12 col-md-4 posicaopresidente"><img src="../login-seguro/<?php if($row_usuario['imagem'] == ""){echo "images/avatar.png";}else{echo $row_usuario['imagem'];} ?>" class="img-presidente"></div>
                     <div class="col-12 col-md-8 posicaotexto">
                        <h2>
                           <span>Atual Presidente</span><br>
                           <?php if($row_usuario['nome'] == ""){echo "Sem presidente vinculado.";}else{echo $row_usuario['nome'];}?></h2>
                     </div></div>
                     
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="row">
               <div class="full">
                  <div class="right-match-time">

                     <?php if(!empty($row_reuniao['url_reuniao'])){ ?>
                        <h2>Próxima reunião</h2>
                        <ul id="countdown-1" class="countdown">
                           <li><span class="days"><?php if($totalRows_reuniao <= 0){echo "Nenhuma reunião agendada!";}else{ echo $row_reuniao['nome_reuniao'];} ?></span> </li>
                           
                        </ul>
                        <span><?php if($totalRows_reuniao <= 0){echo "&nbsp;";}else{echo date('d/m/Y',strtotime($row_reuniao['data_reuniao'])); }?></span>
                     <?php }else{ ?>
                        <h3 style="color: #fff;font-size: 40px;">Próxima Reunião</h3>
                        <ul>
                           <li><?php if($totalRows_reuniao <= 0){echo "Nenhuma reunião agendada!";}else{ echo $row_reuniao['nome_reuniao'];} ?></li>
                        </ul>
                        <span><?php if($totalRows_reuniao <= 0){echo "&nbsp;";}else{echo date('d/m/Y',strtotime($row_reuniao['data_reuniao']))." às ".date('H:i',strtotime($row_paut['inicio_reuniao'])); }?></span>
                        <a href="<?php echo $row_paut['url_reuniao']; ?>" class="btn btn-primary" style="float:none" target="_blank"><i class="fas fa-desktop"></i> Acessar reunião</a>
                     <?php }?>

                  </div>
               </div>
            </div>
         </div>
      </div>
      <section id="contant" class="contant">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-4 col-xs-12">
                  <aside id="sidebar" class="left-bar">
                     <div class="banner-sidebar">
                        <img class="img-responsive" src="../<?php if(empty($row_conteudo['img_destaque'])){echo "images/avatar-imgdestaque.jpg";}else{echo $row_conteudo['img_destaque'];} ?>" alt="#" />
                        <h3><?php if(empty($row_conteudo['title_destaque'])){echo "Não há destaque!";}else{echo $row_conteudo['title_destaque'];} ?></h3>
                     </div>
                  </aside>
                  
                  

                  

                  

                  <div class="content-widget top-story" style="background: url(images/top-story-bg.jpg);">
                     <div class="top-stroy-header">
                        <h2>Datas Importantes <a href="#" class="fa fa"></a></h2>
                        <span class="date">da semana</span>
                        <!--<h2>Other Headlines</h2>-->
                     </div>
                     <ul class="other-stroies">
                        <?php echo $dataimp;?>
                     </ul>
                  </div>

               </div>
               <div class="col-lg-8 col-sm-8 col-xs-12">
                  <div class="news-post-holder">

                     <?php if($totalRows_blog <= 0){echo "
                        <div class='news-post-widget'>
                        <div class='news-post-detail'>
                           
                           <h2 align='center'>Não há posts cadastrados!</h2>
                          
                        </div>
                     </div>
                     ";}else{ ?>
                     <?php while($row_blog = mysqli_fetch_array($blog)){ ?>
                     <div class="news-post-widget">
                        <img class="img-responsive" src="../<?php echo $row_blog['imagem_blog']; ?>" alt="">
                        <div class="news-post-detail">
                           <span class="date"><?php echo date('d/m/Y',strtotime($row_blog['data_blog'])); ?> | <?php echo date('H:i',strtotime($row_blog['hora_blog'])); ?> | Por <strong><?php echo $row_blog['nome']; ?></strong></span>
                           <h2><a href="single-blog.php?clube=<?php echo $clube;?>&id_blog=<?php echo $row_blog['id_blog'];?>"><?php echo $row_blog['titulo_blog']; ?></a></h2>
                           <p class="short-description"><?php echo $row_blog['descricao_blog']; ?></p>
                         
                        </div>
                     </div>
                  <?php } ?>
                    <?php } ?>

                  </div>
                  
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main-heading sytle-2">
                        <h2><?php if(empty($row_conteudo['title_video'])){echo "Sem título";}else{echo $row_conteudo['title_video'];} ?></h2>
                        <p><?php if(empty($row_conteudo['sub_video'])){echo "Semsubtítulo";}else{echo $row_conteudo['sub_video'];} ?></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="video_section_main theme-padding middle-bg vedio">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="match_vedio">
                        <a href="#" role="button" class="video-btn" data-toggle="modal" data-src="<?php echo "https://www.youtube.com/embed/".$row_conteudo['link_video']; ?>" data-target="#myModal"><img class="img-responsive" src="../<?php if(empty($row_conteudo['img_video'])){echo "images/avatarbanner.jpg";}else{echo $row_conteudo['img_video'];} ?>" alt="#" /></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div class="team-holder theme-padding">
         <div class="container">
            <div class="main-heading-holder">
               <div class="main-heading sytle-2">
                  <h2><?php if(empty($row_conteudo['title_equipe'])){echo "Sem título";}else{echo $row_conteudo['title_equipe'];} ?></h2>
                  <p><?php if(empty($row_conteudo['sub_equipe'])){echo "Sem subtítulo";}else{echo $row_conteudo['sub_equipe'];} ?></p>
               </div>
            </div>
            <div id="team-slider">
               <div class="container">
                 <!-- <div class="col-md-3">
                     <div class="team-column style-2">
                        <img src="images/img-1-1.jpg" alt="">
                        <div class="player-name">
                           <div class="desination-2">Defender</div>
                           <h5>Charles Wheeler</h5>
                           <span class="player-number">12</span>
                        </div>
                        <div class="overlay">
                           <div class="team-detail-hover position-center-x">
                              <p>Lacus vulputate torquent mollis venenatis quisque suspendisse fermentum primis,</p>
                              <ul class="social-icons style-4 style-5">
                                 <li><a class="facebook" href="#" tabindex="0"><i class="fa fa-facebook"></i></a></li>
                                 <li><a class="twitter" href="#" tabindex="0"><i class="fa fa-twitter"></i></a></li>
                                 <li><a class="youtube" href="#" tabindex="0"><i class="fa fa-youtube-play"></i></a></li>
                                 <li><a class="pinterest" href="#" tabindex="0"><i class="fa fa-pinterest-p"></i></a></li>
                              </ul>
                              <a class="btn blue-btn" href=" /soccer/team-detail.html" tabindex="0">View Detail</a>
                           </div>
                        </div>
                     </div>
                  </div>-->

                  <div class="col-md-3">
                     <div class="team-column style-2 equipe">
                        <img src="../login-seguro/<?php echo $row_usuario['imagem'];?>" alt="">
                        <div class="player-name">
                           <div class="desination-2">Presidente</div>
                           <h5>
                           <?php if($totalRows_usuario <= 0){echo "Sem Presidente vinculado!";}else{?>
                              <?php echo $row_usuario['nome'];?>
                           <?php } ?>
                           </h5>
                          
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-md-3">
                     <div class="team-column style-2 equipe" >
                        <img src="../login-seguro/<?php echo $row_secretario['imagem'];?>" alt="">
                        <div class="player-name">
                           <div class="desination-2">Vice-Presidente</div>
                           <h5>
                           <?php if($totalRows_secretario <= 0){echo "Sem vice-presidente vinculado!";}else{?>
                              <?php echo $row_secretario['nome'];?>
                           <?php } ?>      
                           </h5>
                           
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="team-column style-2 equipe">
                        <img src="../login-seguro/<?php echo $row_contador['imagem'];?>" alt="">
                        <div class="player-name">
                           <div class="desination-2">Diretor(a) Secretário(a)</div>
                           <h5>
                           <?php if($totalRows_contador <= 0){echo "Sem diretor(a) secretário(a) vinculado!";}else{?>
                              <?php echo $row_contador['nome'];?>
                           <?php } ?>      
                           </h5>
                           
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="team-column style-2 equipe">
                        <img src="../login-seguro/<?php echo $row_secexecutivo['imagem'];?>" alt="">
                        <div class="player-name">
                           <div class="desination-2">Diretor(a) Tesoureiro(a)</div>
                           <h5>
                           <?php if($totalRows_secexecutivo <= 0){echo "Sem Diretor(a) Tesoureiro(a) vinculado!";}else{?>
                              <?php echo $row_secexecutivo['nome'];?>
                           <?php } ?>
                           </h5>
                           
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="team-column style-2 equipe">
                        <img src="../login-seguro/<?php echo $row_tesoureiro['imagem'];?>" alt="">
                        <div class="player-name">
                           <div class="desination-2">Diretor(a) Social</div>
                           <h5>
                           <?php if($totalRows_tesoureiro <= 0){echo "Sem Diretor(a) Social vinculado!";}else{?>
                              <?php echo $row_tesoureiro['nome'];?>
                           <?php } ?>
                           </h5>
                          
                        </div>
                     </div>
                  </div>

                  <div class="col-md-3">
                     <div class="team-column style-2 equipe">
                        <img src="../login-seguro/<?php echo $row_diretorpat['imagem'];?>" alt="">
                        <div class="player-name">
                           <div class="desination-2">Diretor(a) de Patrimônio</div>
                           <h5>
                           <?php if($totalRows_diretorpat <= 0){echo "Sem Diretor(a) de Patrimônio vinculado!";}else{?>
                              <?php echo $row_diretorpat['nome'];?>
                           <?php } ?>
                           </h5>
                          
                        </div>
                     </div>
                  </div>

                  <div class="col-md-3">
                     <div class="team-column style-2 equipe">
                        <img src="../login-seguro/<?php echo $row_diretortur['imagem'];?>" alt="">
                        <div class="player-name">
                           <div class="desination-2">Diretor(a) de Turismo Receptivo</div>
                           <h5>
                           <?php if($totalRows_diretortur <= 0){echo "Sem Diretor(a) de Turismo Receptivo vinculado!";}else{?>
                              <?php echo $row_diretortur['nome'];?>
                           <?php } ?>
                           </h5>
                          
                        </div>
                     </div>
                  </div>

                  <div class="col-md-3">
                     <div class="team-column style-2 equipe">
                        <img src="../login-seguro/<?php echo $row_secexec['imagem'];?>" alt="">
                        <div class="player-name">
                           <div class="desination-2">Secretário(a) Executivo(a)</div>
                           <h5>
                           <?php if($totalRows_secexec <= 0){echo "Sem Secretário(a) Executivo(a) vinculado!";}else{?>
                              <?php echo $row_secexec['nome'];?>
                           <?php } ?>
                           </h5>
                          
                        </div>
                     </div>
                  </div>

                  

               </div>
            </div>
         </div>
      </div>
      <script src="swc.js"></script>
      <script>
         //with this first line we're saying: "when the page loads (document is ready) run the following script"
$(document).ready(function () {
    //select the POPUP FRAME and show it
    $("#popup").hide().fadeIn(1000);

    //close the POPUP if the button with id="close" is clicked
    $("#close").on("click", function (e) {
        e.preventDefault();
        $("#popup").fadeOut(1000);
    });
});
      </script>
<?php include('footer.php'); ?>

      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
      <!-- ALL JS FILES -->
<script src='https://code.jquery.com/jquery-3.1.1.slim.min.js'></script>
<script id="rendered-js">
      $(document).ready(function () {

  // Gets the video src from the data-src on each button

  var $videoSrc;
  $('.video-btn').click(function () {
    $videoSrc = $(this).data("src");
  });
  console.log($videoSrc);



  // when the modal is opened autoplay it  
  $('#myModal').on('shown.bs.modal', function (e) {

    // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
    $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
  });



  // stop playing the youtube video when I close the modal
  $('#myModal').on('hide.bs.modal', function (e) {
    // a poor man's stop video
    $("#video").attr('src', $videoSrc);
  });






  // document ready  
});
      //# sourceURL=pen.js
    </script>

      <script src="js/all.js"></script>
      <!-- ALL PLUGINS -->
      <script src="js/custom.js"></script>
   </body>
</html>
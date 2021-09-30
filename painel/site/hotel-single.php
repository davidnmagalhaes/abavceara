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

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title><?php echo $row_topo['title_seo']; ?></title>
  <meta name="keywords" content="<?php echo $row_topo['keyword_seo']; ?>">
  <meta name="description" content="<?php echo $row_topo['description_seo']; ?>">
  <meta name="author" content="David Magalhães">

  <?php include('head.php'); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lightgallery.css'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-zoom.css'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-thumbnail.css'>

  <style>
    .inline-gallery-container {
      width: 98%;
      height: 450px;
      display: flex;
    }

    .header {
      width: 100%;
      height: 400px;
      background: #000
    }

    .titulo-topo-hotel {
      position: relative;
      top: 372px;
      color: #fff;
      font-size: 70px;
      font-variant-caps: all-small-caps;
    }

    .gallery-hotel {
      height: 500px;
      display: flex;
      justify-content: center;

    }
  </style>

  <link rel="stylesheet" href="css/lightbox.css">
</head>

<body class="game_info" data-spy="scroll" data-target=".header">

  <section id="top">
    <?php include('header.php'); ?>
    <div class="inner-page-banner">
      <div class="container">
        <h1 class="titulo-topo-hotel"><?php echo $hoteldata['nome_hotel'] ?></h1>
      </div>
    </div>
  </section>

  <section id="contant" class="contant main-heading team" style="padding: 50px 0 0 0">
    <div class="row">
      <div class="container">

        <div class="col-md-2">
          <div class="card">
            <img class="img-responsive" src="../<?php echo $hoteldata['imagem_hotel']; ?>" style="width:100%">

          </div>
        </div>

        <div class="col-md-10 ">
          <div class="card">

            <div class="">
              <h2 style="margin-top: 15px"><?php echo $hoteldata['nome_hotel']; ?></h2>
              <p class="title"><?php echo $hoteldata['endereco_hotel'] . ", " . $row_socios['numero_hotel'] . ", " . $hoteldata['bairro_hotel'] . ", " . $row_socios['cidade_hotel'] . ", " . $hoteldata['estado_hotel']; ?></p>
              <p class="title">
                <?php echo "<strong>Contatos: </strong>" . $hoteldata['telefone_hotel']; ?>

                <br>
                <?php echo $hoteldata['email_hotel']; ?>
                <!--<div class="center"><button class="button">Contact</button></div>-->
              </p>
            </div>
          </div>
        </div>


      </div>
    </div>

  </section>

  <div class="container d-flex justify-content-center gallery-hotel">
    <div id="inline-gallery-container" class="inline-gallery-container"></div>
  </div>

  <script id="rendered-js" type="module">
    import lightGallery from "https://cdn.skypack.dev/lightgallery@2.0.0-beta.3";

    import lgZoom from "https://cdn.skypack.dev/lightgallery@2.0.0-beta.3/plugins/zoom";
    import lgThumbnail from "https://cdn.skypack.dev/lightgallery@2.0.0-beta.3/plugins/thumbnail";

    const $lgContainer = document.getElementById("inline-gallery-container");

    const inlineGallery = lightGallery($lgContainer, {
      container: $lgContainer,
      dynamic: true,
      // Turn off hash plugin in case if you are using it
      // as we don't want to change the url on slide change
      hash: false,
      // Do not allow users to close the gallery
      closable: false,
      // Add maximize icon to enlarge the gallery
      showMaximizeIcon: true,
      // Append caption inside the slide item
      // to apply some animation for the captions (Optional)
      appendSubHtmlTo: ".lg-item",
      // Delay slide transition to complete captions animations
      // before navigating to different slides (Optional)
      // You can find caption animation demo on the captions demo page
      slideDelay: 400,
      plugins: [lgZoom, lgThumbnail],
      dynamicEl: [{
          src: "https://images.unsplash.com/photo-1542103749-8ef59b94f47e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1400&q=80",
          responsive: "https://images.unsplash.com/photo-1542103749-8ef59b94f47e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=480&q=80 480, https://images.unsplash.com/photo-1542103749-8ef59b94f47e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80 800",
          thumb: "https://images.unsplash.com/photo-1542103749-8ef59b94f47e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80",

        },

        {
          src: "https://images.unsplash.com/photo-1473876988266-ca0860a443b8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1400&q=80",
          responsive: "https://images.unsplash.com/photo-1473876988266-ca0860a443b8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=480&q=80 480, https://images.unsplash.com/photo-1473876988266-ca0860a443b8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80 800",
          thumb: "https://images.unsplash.com/photo-1473876988266-ca0860a443b8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=240&q=80",

        },

      ],

      // Completely optional
      // Adding as the codepen preview is usually smaller
      thumbWidth: 60,
      thumbHeight: "40px",
      thumbMargin: 4
    });


    setTimeout(() => {
      inlineGallery.openGallery();
    }, 200);
    //# sourceURL=pen.js
  </script>
  <?php include('footer.php'); ?>

  <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
  <!-- ALL JS FILES -->
  <script src="js/all.js"></script>
  <!-- ALL PLUGINS -->
  <script src="js/custom.js"></script>
</body>

</html>
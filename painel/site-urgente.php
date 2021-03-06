<?php
$page = 4;

include('config-header.php');

//Seleciona todos os sócios honorários
$qrh = "SELECT * FROM rfa_site_urgente WHERE clube='$clube'";
$lish = mysqli_query($link, $qrh) or die(mysqli_error($link));
$totalRows_lish = mysqli_num_rows($lish);

$qclb = "SELECT * FROM rfa_clubes WHERE id_clube='$clube'";
$liclb = mysqli_query($link, $qclb) or die(mysqli_error($link));
$row_liclb = mysqli_fetch_array($liclb);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Gestão do Rotary Fortaleza Alagadiço">
    <meta name="author" content="David Magalhães">
    <meta name="keywords" content="rotary alagadiço, rotary fortaleza alagadiço, fortaleza alagadiço">

    <!-- Title Page-->
    <title><?php echo $nomeclube; ?></title>

    <?php include("head.php");?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>


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

span.tag.label.label-info {
    background: #4272d7;
    border-radius: 10px;
    padding: 1px 10px;
}

.grid-width-100 {
    padding: 10px !important;
}
</style>


  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>

    <script src="js/summernote-pt-BR.js"></script>
    <script src="js/summernote-ext-elfinder.js"></script>

</head>

<body >

    <div class="page-wrapper">
	
        <?php include("menu-desktop.php");?>

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
			<?php include("topo.php");?>
            
            
			<?php include("menu-mobile.php");?>
			
            <!-- END HEADER DESKTOP-->


            
 <div class="main-content">
 
            <div class="col-lg-12">
               <!-- USER DATA-->
                <div class="card">
                                    <div class="card-header">
                                        <strong>Notícias</strong>
                                        <small> Urgentes</small>
                                       <form action="status-urgente.php" method="post" id="urgente">
                                                       <input type="checkbox" <?php if($row_liclb['status_urgente'] == 1){echo "checked";}else{} ?> data-toggle="toggle" onChange="this.form.submit()" data-on="Ativado" data-off="Desativado" data-onstyle="success" data-offstyle="danger" name="statusurgente" value="<?php if($row_liclb['status_urgente'] == 0){echo "1";}else{echo "0";} ?>" >
                                                       
                                                       <input type="hidden" name="clube" value="<?php echo $clube;?>">
                                      </form>
                                    </div>
                                    <div class="card-body card-block">
                   <form action="proc_cd_site_urgente.php" method="post" enctype="multipart/form-data">
                                      <div class="row">
                                          
                                          <div class="col-12">
                                              
                                              <div class="file-drop-area">
                                                <span class="fake-btn"><strong style="color:#4272d7"><i class="fas fa-cloud-upload-alt" style="margin-right: 15px"></i> Imagem do Post</strong></span>
                                                <span class="file-msg">ou arraste e solte aqui...</span>
                                                <input class="file-input" type="file" name="img_urgente">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-12">
                                              <label for="titulo" class="col-form-label">Título do Post:</label>
                                              <input type="text" name="titulo" class="form-control" placeholder="Digite o título do post" >
                                          </div>
                                          
                                      </div>

                                      <div class="row">
                                          <div class="col-12">
                                              <div class="adjoined-bottom">
                                        <div class="grid-container">
                                          <div class="grid-width-100">
                                            <label for="titulo" class="col-form-label">Descrição:</label>
                                            
                                            <textarea id="summernote" name="descricao"></textarea>
    <script>

  $('#summernote').summernote({
        toolbar: [
  ['style', ['style']],
  ['font', ['bold', 'underline', 'clear', 'fontsize', 'fontsizeunit', 'strikethrough', 'superscript', 'subscript']],
  ['fontname', ['fontname']],
  ['color', ['color', 'forecolor', 'backcolor']],
  ['para', ['ul', 'ol', 'paragraph', 'style', 'height']],
  ['table', ['table']],
  ['insert', ['link', 'picture', 'video']],
  ['view', ['fullscreen', 'codeview', 'help', 'undo', 'redo']],
],

        callbacks: {
            onImageUpload: function(files) {
                for(let i=0; i < files.length; i++) {
                    $.upload(files[i]);
                }
            }
        },
        height: 500,
        lang: 'pt-BR',
        placeholder: 'Digite seu conteúdo aqui...',

    });

    $.upload = function (file) {
        let out = new FormData();
        out.append('file', file, file.name);

        $.ajax({
            method: 'POST',
            url: 'envia-img-summernote.php',
            contentType: false,
            cache: false,
            processData: false,
            data: out,
            success: function (img) {
                $('#summernote').summernote('insertImage', img);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    };


</script>
                                          </div>
                                        </div>
                                      </div>
                                          </div>
                                      </div>



                                        
                                    </div>
                                    <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    
                                                    <span id="payment-button-amount"><i class="fas fa-paper-plane"></i> Postar</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                         </div>
                                </div>
                                <input type="hidden" name="club" value="<?php if($_GET['clube']){echo $clube;}else{echo $clube;}?>">
                                <input type="hidden" name="por" value="<?= $_SESSION['id_usuario'] ?>">
  </form>



                                

                                         <div class="card" style="margin-top: 20px">
                                    <div class="card-header">
                                        <strong>Posts Urgentes Criados</strong>
                                        
                                    </div>
                                    <div class="card-body card-block">
                  
                                      
<table class="table table-striped">
  <?php if($totalRows_lish <= 0){echo "<tr><td colspan='5' align='center'><strong>Não há posts cadastrados!</strong></td></tr>";}else{ ?>
  <thead>
    <tr>
      <th scope="col">Imagem</th>
      <th scope="col">Data/Hora</th>
      <th scope="col">Título</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    
    <?php while($row_lish = mysqli_fetch_array($lish)){ ?>
    <tr>
      <th style="vertical-align:middle;"><img src="<?php echo $row_lish['imagem_urgente']; ?>" style="width: 150px"></th>
      <td style="vertical-align:middle;"><?php echo date('d/m/Y',strtotime($row_lish['data_urgente'])); ?> | <?php echo date('H:i',strtotime($row_lish['hora_urgente'])); ?></td>
      <td style="vertical-align:middle;"><?php echo $row_lish['titulo_urgente']; ?></td>
      <td style="vertical-align:middle;"><a href="edt-urgente.php?idurgente=<?php echo $row_lish['id_urgente']; ?>&clube=<?php if($_GET['clube']){echo $clube;}else{echo $clube;}?>"><i class="fas fa-pen-alt"></i></a></td>
      <td style="vertical-align:middle;"><a href="excluir-site-urgente.php?id_urgente=<?php echo $row_lish['id_urgente']; ?>&clube=<?php if($_GET['clube']){echo $clube;}else{echo $clube;}?>"><i class="fas fa-trash"></i></a></td>
    </tr>
    <?php } ?>
  
  </tbody>
  <?php } ?>
</table>

                                        
                                    </div>
                                </div>
                                <!-- END USER DATA-->
                </div>
              
</div>
            

            <?php include("footer.php"); ?>
			
            
            <!-- END PAGE CONTAINER-->
        </div>

    </div>



	


    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
	
	

</body>
<script>
  initSample();
</script>
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
		SyntaxHighlighter.all()
	</script>
</html>
<!-- end document-->
<?php
$page = 4;

include('config-header.php');

//Seleciona o conteúdo principal
$qrh = "SELECT * FROM rfa_site_conteudo WHERE clube='$clube'";
$lish = mysqli_query($link, $qrh) or die(mysqli_error($link));
$row_lish = mysqli_fetch_assoc($lish);
$totalRows_lish = mysqli_num_rows($lish);

//Seleciona o conteúdo "O Clube"
$qcl = "SELECT * FROM rfa_site_clube WHERE clube='$clube'";
$oclube = mysqli_query($link, $qcl) or die(mysqli_error($link));
$row_oclube = mysqli_fetch_assoc($oclube);
$totalRows_oclube = mysqli_num_rows($oclube);

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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>

    <script src="js/summernote-pt-BR.js"></script>
    <script src="js/summernote-ext-elfinder.js"></script>


 <script type="text/javascript">
    function ShowLoading(e) {
        var div = document.createElement('div');
        var img = document.createElement('img');
        img.src = 'http://granjasaojorge.com.br/img/loading1.gif';
        div.innerHTML = "";
        div.style.cssText = 'position: fixed; top: 20%; left: 40%; z-index: 5000; width: 200px; text-align: center;';
        div.appendChild(img);
        document.body.appendChild(div);
        return true;
        // These 2 lines cancel form submission, so only use if needed.
        //window.event.cancelBubble = true;
        //e.stopPropagation();
    }
</script>

<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

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

<body>

    <div class="page-wrapper">
	
        <?php include("menu-desktop.php");?>

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
			<?php include("topo.php");?>
            
            
			<?php include("menu-mobile.php");?>
			
            <!-- END HEADER DESKTOP-->


            
 <div class="main-content">
  <form action="proc_cd_site_conteudo.php" method="post" enctype="multipart/form-data">
            <div class="col-lg-12">
               <!-- USER DATA-->
                <div class="card">
                                    <div class="card-header">
                                        <strong>Conteúdos</strong>
                                        <small> Configuração de conteúdos</small>
                                    </div>
                                    <div class="card-body card-block">
                  
                                      <div class="row">
                                          
                                          <div class="col-12">
                                              
                                              <div class="file-drop-area">
                                                <span class="fake-btn"><strong style="color:#4272d7"><i class="fas fa-cloud-upload-alt" style="margin-right: 15px"></i> Imagem de destaque lateral</strong></span>
                                                <span class="file-msg">ou arraste e solte aqui...</span>
                                                <input class="file-input" type="file" name="img_destaque">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-12">
                                              <label for="titulo" class="col-form-label">Título do destaque lateral:</label>
                                              <input type="text" name="titulo_destaque" class="form-control" maxlength="70" placeholder="Máximo de 70 caracteres" value="<?php echo $row_lish['title_destaque'];?>">
                                          </div>
                                          
                                      </div>  

                                      <div class="row">
                                          <div class="col-12 col-md-6">
                                              <label for="titulo" class="col-form-label">Título da Equipe:</label>
                                              <input type="text" name="title_equipe" class="form-control" maxlength="70" placeholder="Máximo de 70 caracteres" value="<?php echo $row_lish['title_equipe'];?>">
                                          </div>
                                          <div class="col-12 col-md-6">
                                              <label for="titulo" class="col-form-label">Subtítulo da Equipe:</label>
                                              <input type="text" name="sub_equipe" class="form-control"  value="<?php echo $row_lish['sub_equipe'];?>">
                                          </div>
                                          
                                      </div> 
                                        
                                    
                  
                                      <div class="row">
                                          <div class="col-12">
                                              
                                              <div class="file-drop-area" style="margin-top: 15px">
                                                <span class="fake-btn"><strong style="color:#4272d7"><i class="fas fa-cloud-upload-alt" style="margin-right: 15px"></i> Plano de fundo do vídeo</strong></span>
                                                <span class="file-msg">ou arraste e solte aqui (<strong>Tamanho indicado:</strong> 1920 x 793px)</span>
                                                <input class="file-input" type="file" name="img_background">
                                              </div>
                                          </div>
                                          
                                      </div>

                                      <div class="row">
                                          <div class="col-12">
                                              
                                              <div class="file-drop-area" style="margin-top: 15px">
                                                <span class="fake-btn"><strong style="color:#4272d7"><i class="fas fa-cloud-upload-alt" style="margin-right: 15px"></i> Imagem miniatura do vídeo</strong></span>
                                                <span class="file-msg">ou arraste e solte aqui (<strong>Tamanho indicado:</strong> 1170 x 650px)</span>
                                                <input class="file-input" type="file" name="img_miniatura">
                                              </div>
                                          </div>
                                          
                                      </div>

                                      <div class="row">
                                          <div class="col-12 col-md-6">
                                              <label for="titulo" class="col-form-label">Título do Vídeo:</label>
                                              <input type="text" name="titulo_video" class="form-control" maxlength="60" placeholder="Máximo de 60 caracteres" value="<?php echo $row_lish['title_video'];?>">
                                          </div>
                                          <div class="col-12 col-md-6">
                                              <label for="keyword" class="col-form-label">Subtítulo do Vídeo:</label>
                                              <input type="text" name="sub_video" class="form-control" maxlength="130" placeholder="Máximo de 130 caracteres" value="<?php echo $row_lish['sub_video'];?>">
                                          </div>
                                          
                                      </div>

                                      <div class="row">
                                          <div class="col-12">
                                              <label for="titulo" class="col-form-label">ID do Vídeo no Youtube:</label>
                                              <input type="text" name="url_video" class="form-control" value="<?php echo $row_lish['link_video'];?>" placeholder="Digite o id do vídeo. Ex.: https://www.youtube.com/watch?v=AQUI-VAI-O-ID">
                                          </div>
                                          
                                      </div>

                                      <div class="row">
                                        <div class="col-12" style="margin: 15px 0 15px 0">
                                            <h1>Associe-se</h1>
                                          </div>
                                          <div class="col-12">
                                              <div class="adjoined-bottom">
                                        <div class="grid-container">
                                          <div class="grid-width-100">
                                            <label for="titulo" class="col-form-label">Texto para novos associados:</label>
                                            <textarea id="summernote" name="associar" placeholder="Digite um texto com passos para novos associados.">
                                              <?php echo $row_lish['associar'];?>
                                            </textarea>
                                          </div>
                                        </div>
                                      </div>
                                          </div>
                                      </div>

                                      <script>

$('#summernote').summernote({
      toolbar: [
['style', ['style']],
['font', ['bold', 'underline', 'clear', 'fontsize', 'fontsizeunit', 'strikethrough', 'superscript', 'subscript']],
['fontname', ['fontname']],
['color', ['color', 'forecolor', 'backcolor']],
['para', ['ul', 'ol', 'paragraph', 'style', 'height']],
['table', ['table']],
['insert', ['link']],
['view', ['fullscreen', 'codeview', 'help', 'undo', 'redo']],
],

      callbacks: {
          onImageUpload: function(files) {
              for(let i=0; i < files.length; i++) {
                  $.upload(files[i]);
              }
          }
      },
      height: 200,
      lang: 'pt-BR',
      placeholder: 'Digite seu conteúdo aqui...',

  });


</script>

                                      
                                    </div>
                                </div>



<input type="hidden" name="club" value="<?php if($_GET['clube']){echo $clube;}else{echo $clube;}?>">
                                <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    
                                                    <span id="payment-button-amount"><i class="fas fa-paper-plane"></i> Atualizar</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                         </div>
                                <!-- END USER DATA-->
                </div>
              </form>


              <!-- ///////////////////////////////////////////-->


            


             

</div>
            

            <?php include("footer.php"); ?>
			
            
            <!-- END PAGE CONTAINER-->
        </div>

    </div>



	

    <?php include("scripts-footer.php"); ?>
	
	

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
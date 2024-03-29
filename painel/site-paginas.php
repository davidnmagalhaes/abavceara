<?php
$page = 4;

include('config-header.php');

//Seleciona todos os sócios honorários
$qrh = "SELECT * FROM rfa_site_menu_pages WHERE clube='$clube'";
$lish = mysqli_query($link, $qrh) or die(mysqli_error($link));
$totalRows_lish = mysqli_num_rows($lish);

$query = "SELECT * FROM rfa_site_menu WHERE clube='$clube'";
$limenu = mysqli_query($link, $query) or die(mysqli_error($link));



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

span.tag.label.label-info {
    background: #4272d7;
    border-radius: 10px;
    padding: 1px 10px;
}

.grid-width-100 {
    padding: 10px !important;
}
</style>

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
  <form action="proc_cd_site_paginas.php" method="post" enctype="multipart/form-data">
            <div class="col-lg-12">

<div class="card" style="margin-top: 20px">
                                    <div class="card-header">
                                        <strong>Páginas Criadas</strong>
                                        
                                    </div>
                                    <div class="card-body card-block">
                  
                                      
<table class="table table-striped">
  <?php if($totalRows_lish <= 0){echo "<tr><td colspan='5' align='center'><strong>Não há páginas cadastradas!</strong></td></tr>";}else{ ?>
  <thead>
    <tr>
      <th scope="col">Nome da Página</th>
      <th scope="col">Menu Pai</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    
    <?php while($row_lish = mysqli_fetch_array($lish)){ ?>
    <tr>
    
      
      <td style="vertical-align:middle;"><?php echo $row_lish['nome_page']; ?></td>
      <td style="vertical-align:middle;">
        <?php 
          $refmenu = $row_lish['ref_menu'];
          $sqlmenu = "SELECT * FROM rfa_site_menu WHERE clube='$clube' AND id_menu='$refmenu'";
          $nmenu = mysqli_query($link, $sqlmenu) or die(mysqli_error($link));
          $row_nmenu = mysqli_fetch_array($nmenu);
          echo $row_nmenu['nome_menu'];
        ?> 
      </td>
      <td><a href="<?php echo "https://".$_SERVER['HTTP_HOST']."/".basename(__DIR__)."/site/page.php?id_page=".$row_lish['id_page']."&clube=".$clube; ?>" target="_blank"><i class="fas fa-link"></i></a></td>
      <td style="vertical-align:middle;"><a href="edt-paginas.php?id_page=<?php echo $row_lish['id_page']; ?>&clube=<?php if($_GET['clube']){echo $clube;}else{echo $clube;}?>"><i class="fas fa-pen-alt"></i></a></td>
      <td style="vertical-align:middle;"><a href="excluir-site-paginas.php?id_page=<?php echo $row_lish['id_page']; ?>&clube=<?php if($_GET['clube']){echo $clube;}else{echo $clube;}?>"><i class="fas fa-trash"></i></a></td>
    </tr>
    <?php } ?>
  
  </tbody>
  <?php } ?>
</table>

                                        
                                    </div>
                                </div>
                                <!-- END USER DATA-->

               <!-- USER DATA-->
                <div class="card">
                                    <div class="card-header">
                                        <strong>Páginas</strong>
                                        <small> Gestão de Páginas</small>
                                    </div>
                                    <div class="card-body card-block">
                  
                                     

                                      <div class="row">
                                          <div class="col-12 col-md-6">
                                              <label for="titulo" class="col-form-label">Nome da Página:</label>
                                              <input type="text" name="titulo" class="form-control" placeholder="Exemplo: Serviços" >
                                          </div>

                                          <div class="col-12 col-md-6">
                                              <label for="titulo" class="col-form-label">Menu Pai:</label>
                                              <select name="menu" class="form-control">
                                                <?php 
                                                while($row_limenu = mysqli_fetch_array($limenu)){
                                                  if($row_limenu['nome_menu'] == "Início"){}else{
                                                    echo "<option value='".$row_limenu['id_menu']."'>".$row_limenu['nome_menu']."</option>";
                                                  }
                                                }
                                                ?>
                                                
                                              </select>
                                          </div>
                                          
                                      </div>

                                      <div class="row" style="margin-top: 20px">
                                          <div class="col-12">
                                             
    <textarea name="descricao" id="summernote" rows="10" cols="80"></textarea>
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
      height: 200,
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
                                    <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    
                                                    <span id="payment-button-amount"><i class="fas fa-paper-plane"></i> Cadastrar</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                         </div>
                                </div>
                                <input type="hidden" name="club" value="<?php if($_GET['clube']){echo $clube;}else{echo $clube;}?>">
                                <input type="hidden" name="por" value="<?= $_SESSION['id_usuario'] ?>">
  </form>



                                

                                         
                </div>
              
</div>
            

            <?php include("footer.php"); ?>
      
            
            <!-- END PAGE CONTAINER-->
        </div>

    </div>



  

    <?php include("scripts-footer.php"); ?>
  
  

</body>

<script>
    tinymce.init({
    selector: '#editor',
    height: 800,
    menubar: 'edit view insert format tools table help',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker image addcomment a11ycheck showcomments',
      toolbar: 'code | undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl table',
      toolbar_drawer: 'floating',
      tinycomments_mode: 'embedded',
      language: 'pt_BR',
      images_upload_base_path: '/uploads',
      images_upload_handler: function (blobInfo, success, failure) {
    var xhr, formData;

    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', 'postAcceptor.php');

    xhr.onload = function() {
      var json;

      if (xhr.status != 200) {
        failure('HTTP Error: ' + xhr.status);
        return;
      }

      json = JSON.parse(xhr.responseText);

      if (!json || typeof json.location != 'string') {
        failure('Invalid JSON: ' + xhr.responseText);
        return;
      }

      success(json.location);
    };

    formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());

    xhr.send(formData);
  }
      //tinydrive_token_provider: 'jwt/jwt.php',
      //tinydrive_upload_path: '/uploads'
    });
  </script>


  <script type="text/javascript">
    SyntaxHighlighter.all()
  </script>
</html>
<!-- end document-->
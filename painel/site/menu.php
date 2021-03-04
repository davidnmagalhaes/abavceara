<li class="active"><a href="clube<?php echo $clube; ?>">Início</a></li>


 
<li class="nav-item dropdown">
        <a class="dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Abav
        </a>
        <div class="dropdown-menu menu-mobile" aria-labelledby="navbarDropdownMenuLink" style="min-height: 20px !important;  width: 300px">

          <?php 
              $query1 = "SELECT * FROM rfa_site_menu_pages WHERE clube='$clube' AND ref_menu='2'";
              $li1 = mysqli_query($link, $query1) or die(mysqli_error($link));
              $totalRows_li1 = mysqli_num_rows($li1);

              while($row_li1 = mysqli_fetch_array($li1)){
                echo '<a class="dropdown-item" href="page.php?id_page='.$row_li1['id_page'].'&clube='.$clube.'" style="width: 100%; padding: 10px 10px;">'.$row_li1['nome_page'].'</a>';
              }
          ?>
         
          <a class="dropdown-item" href="diretoria.php?clube=<?php echo $clube; ?>" style="width: 100%; padding: 10px 10px;">Diretoria</a>
          <a class="dropdown-item" href="galeria.php?clube=<?php echo $clube; ?>" style="width: 100%; padding: 10px 10px;">Galeria</a>
          
        </div>
      </li>

<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Agências
        </a>
        <div class="dropdown-menu menu-mobile" aria-labelledby="navbarDropdownMenuLink" style="min-height: 20px !important;  width: 300px">

          <?php 
              $query2 = "SELECT * FROM rfa_site_menu_pages WHERE clube='$clube' AND ref_menu='3'";
              $li1 = mysqli_query($link, $query2) or die(mysqli_error($link));
              $totalRows_li2 = mysqli_num_rows($li2);

              while($row_li2 = mysqli_fetch_array($li2)){
                echo '<a class="dropdown-item" href="page.php?id_page='.$row_li2['id_page'].'&clube='.$clube.'" style="width: 100%; padding: 10px 10px;">'.$row_li2['nome_page'].'</a>';
              }
          ?>

          <a class="dropdown-item" href="socios<?php echo $clube; ?>" style="width: 100%; padding: 10px 10px;">Associadas</a>
          <a class="dropdown-item" href="associar<?php echo $clube; ?>" style="width: 100%; padding: 10px 10px;">Associe-se</a> 
          
        </div>
      </li>


<?php 
              $query9 = "SELECT * FROM rfa_site_menu_pages WHERE clube='$clube' AND ref_menu='10'";
              $li9 = mysqli_query($link, $query9) or die(mysqli_error($link));
              $totalRows_li9 = mysqli_num_rows($li9);

              if($totalRows_li9 <= 0){
                echo '<li><a href="vantagens'.$clube.'">Benefícios</a></li>';
              }else{
        ?>

                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dicas
        </a>
        <div class="dropdown-menu menu-mobile" aria-labelledby="navbarDropdownMenuLink" style="min-height: 20px !important;  width: 300px">

          <?php
              echo '<li><a href="vantagens'.$clube.'">Benefícios</a></li>';
              while($row_li9 = mysqli_fetch_array($li9)){
                echo '<a class="dropdown-item" href="page.php?id_page='.$row_li9['id_page'].'&clube='.$clube.'" style="width: 100%; padding: 10px 10px;">'.$row_li9['nome_page'].'</a>';
              }
          ?>
          
        </div>
      </li>

             <?php } ?>

<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Serviços
        </a>
        <div class="dropdown-menu menu-mobile" aria-labelledby="navbarDropdownMenuLink" style="min-height: 20px !important;  width: 300px">
          <a class="dropdown-item" href="vistos<?php echo $clube; ?>" style="width: 100%; padding: 10px 10px;">Central de Vistos</a>
          <?php 
              $query3 = "SELECT * FROM rfa_site_menu_pages WHERE clube='$clube' AND ref_menu='4'";
              $li3 = mysqli_query($link, $query3) or die(mysqli_error($link));
              $totalRows_li3 = mysqli_num_rows($li3);

              while($row_li3 = mysqli_fetch_array($li3)){
                echo '<a class="dropdown-item" href="page.php?id_page='.$row_li3['id_page'].'&clube='.$clube.'" style="width: 100%; padding: 10px 10px;">'.$row_li3['nome_page'].'</a>';
              }
          ?>
          
         

         
        </div>
      </li>

<?php 
              $query4 = "SELECT * FROM rfa_site_menu_pages WHERE clube='$clube' AND ref_menu='5'";
              $li4 = mysqli_query($link, $query4) or die(mysqli_error($link));
              $totalRows_li4 = mysqli_num_rows($li4);

              if($totalRows_li4 <= 0){
                echo '<li><a href="blog'.$clube.'">Dicas</a></li>';
              }else{
        ?>

                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dicas
        </a>
        <div class="dropdown-menu menu-mobile" aria-labelledby="navbarDropdownMenuLink" style="min-height: 20px !important;  width: 300px">

          <?php

              while($row_li4 = mysqli_fetch_array($li4)){
                echo '<a class="dropdown-item" href="page.php?id_page='.$row_li4['id_page'].'&clube='.$clube.'" style="width: 100%; padding: 10px 10px;">'.$row_li4['nome_page'].'</a>';
              }
          ?>
          
        </div>
      </li>

             <?php } ?>

        <?php 
              $query5 = "SELECT * FROM rfa_site_menu_pages WHERE clube='$clube' AND ref_menu='6'";
              $li5 = mysqli_query($link, $query5) or die(mysqli_error($link));
              $totalRows_li5 = mysqli_num_rows($li5);

              if($totalRows_li5 <= 0){
          ?>

          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Parceiros
        </a>
        <div class="dropdown-menu menu-mobile" aria-labelledby="navbarDropdownMenuLink" style="min-height: 20px !important;  width: 300px">

          <a class="dropdown-item" href="hoteis<?php echo $clube; ?>">Hotéis</a>
          <a class="dropdown-item" href="parques<?php echo $clube; ?>">Parques Temáticos</a>
          <a class="dropdown-item" href="cias<?php echo $clube; ?>">Cias Aéreas</a>
          <a class="dropdown-item" href="entidades<?php echo $clube; ?>">Entidades</a>
          
        </div>
      </li>

          <?php 
              }else{
        ?>

                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Parceiros
        </a>
        <div class="dropdown-menu menu-mobile" aria-labelledby="navbarDropdownMenuLink" style="min-height: 20px !important;  width: 300px">

          <a class="dropdown-item" href="hoteis<?php echo $clube; ?>" style="width: 100%; padding: 10px 10px;">Hotéis</a>
          <a class="dropdown-item" href="parques<?php echo $clube; ?>" style="width: 100%; padding: 10px 10px;">Parques Temáticos</a>
          <a class="dropdown-item" href="cias<?php echo $clube; ?>" style="width: 100%; padding: 10px 10px;">Cias Aéreas</a>
          <a class="dropdown-item" href="entidades<?php echo $clube; ?>" style="width: 100%; padding: 10px 10px;">Entidades</a>

          <?php

              while($row_li5 = mysqli_fetch_array($li5)){
                echo '<a class="dropdown-item" href="page.php?id_page='.$row_li5['id_page'].'&clube='.$clube.'" style="width: 100%; padding: 10px 10px;">'.$row_li5['nome_page'].'</a>';
              }
          ?>
          
        </div>
      </li>

             <?php } ?>






<!--<li><a href="blog.php?clube=<?php //echo $clube; ?>">Galeria</a></li>-->

<?php 
              $query6 = "SELECT * FROM rfa_site_menu_pages WHERE clube='$clube' AND ref_menu='7'";
              $li6 = mysqli_query($link, $query6) or die(mysqli_error($link));
              $totalRows_li6 = mysqli_num_rows($li6);

              if($totalRows_li6 <= 0){
                echo '<li><a href="cursos'.$clube.'">Cursos</a></li>';
              }else{
        ?>

                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cursos
        </a>
        <div class="dropdown-menu menu-mobile" aria-labelledby="navbarDropdownMenuLink" style="min-height: 20px !important;  width: 300px">

          <?php
          echo '<li><a href="cursos'.$clube.'">Todos os cursos</a></li>';
              while($row_li6 = mysqli_fetch_array($li6)){
                echo '<a class="dropdown-item" href="page.php?id_page='.$row_li6['id_page'].'&clube='.$clube.'" style="width: 100%; padding: 10px 10px;">'.$row_li6['nome_page'].'</a>';
              }
          ?>
          
        </div>
      </li>

             <?php } ?>

<?php 
              $query7 = "SELECT * FROM rfa_site_menu_pages WHERE clube='$clube' AND ref_menu='8'";
              $li7 = mysqli_query($link, $query7) or die(mysqli_error($link));
              $totalRows_li7 = mysqli_num_rows($li7);

              if($totalRows_li7 <= 0){
                echo '<li><a href="blog'.$clube.'">Blog</a></li>';
              }else{
        ?>

                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Blog
        </a>
        <div class="dropdown-menu menu-mobile" aria-labelledby="navbarDropdownMenuLink" style="min-height: 20px !important;  width: 300px">

          <?php
            echo '<li><a href="blog'.$clube.'">Blog</a></li>';
              while($row_li7 = mysqli_fetch_array($li7)){
                echo '<a class="dropdown-item" href="page.php?id_page='.$row_li7['id_page'].'&clube='.$clube.'" style="width: 100%; padding: 10px 10px;">'.$row_li7['nome_page'].'</a>';
              }
          ?>
          
        </div>
      </li>

             <?php } ?>

<?php 
              $query8 = "SELECT * FROM rfa_site_menu_pages WHERE clube='$clube' AND ref_menu='9'";
              $li8 = mysqli_query($link, $query8) or die(mysqli_error($link));
              $totalRows_li8 = mysqli_num_rows($li8);

              if($totalRows_li8 <= 0){
                echo '<li><a href="ouvidoria'.$clube.'">Ouvidoria</a></li>';
              }else{
        ?>

                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ouvidoria
        </a>
        <div class="dropdown-menu menu-mobile" aria-labelledby="navbarDropdownMenuLink" style="min-height: 20px !important;  width: 300px">

          <?php
              echo '<li><a href="ouvidoria'.$clube.'">Ouvidoria</a></li>';
              while($row_li8 = mysqli_fetch_array($li8)){
                echo '<a class="dropdown-item" href="page.php?id_page='.$row_li8['id_page'].'&clube='.$clube.'" style="width: 100%; padding: 10px 10px;">'.$row_li8['nome_page'].'</a>';
              }
          ?>
          
        </div>
      </li>

             <?php } ?>


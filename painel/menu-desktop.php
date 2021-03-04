

<!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#" style="width:50%; margin:0 auto;">
                    <img src="<?php if($row_logotopo['logo_clube'] == ""){echo "images/clube-digital.png";}else{echo $row_logotopo['logo_clube'];} ?>" alt="Logotipo"/>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2" style="text-align:center;">
                    <div class="image img-cir img-120">
                        <img src="login-seguro/<?= $_SESSION['imagem'] ?>" />
                    </div>
                    <h4 class="name"><?= $_SESSION['nome'] ?></h4>
					<?php if($_SESSION['funcao'] == 1){echo "Administrador(a)";}elseif($_SESSION['funcao'] == 2){echo "Presidente";}elseif($_SESSION['funcao'] == 3){echo "Vice-Presidente";}elseif($_SESSION['funcao'] == 4){echo "Diretor(a) Secretário(a)";}elseif($_SESSION['funcao'] == 5){echo "Diretor(a) Tesoureiro(a)";}elseif($_SESSION['funcao'] == 6){echo "Diretor(a) Social";}elseif($_SESSION['funcao'] == 7){echo "Diretor(a) de Patrimônio";}elseif($_SESSION['funcao'] == 8){echo "Diretor(a) de Turismo Receptivo";}else{echo "Secretário(a) Executivo(a)";} ?>
                    <a href="logout.php">Sair</a>
                </div>

                <?php if($_SESSION['funcao'] == 1){ ?>
                    <form action="" method="get">
                        <div class="row">
                            <div class="col" style="margin: 10px 25px 0 25px">
                               <select class="form-control" name="clube" onChange="this.form.submit()">
                                    <option>Escolha um clube...</option>
                                    <option value="0">Administração</option>
                                   <?php 
                                  $sqcl = "SELECT * FROM rfa_clubes";
                                  $showclub = mysqli_query($link, $sqcl) or die(mysqli_error($link));
                                  while($row_showclub = mysqli_fetch_array($showclub)){
                                    
                                      echo "<option value='".$row_showclub['id_clube']."'>".$row_showclub['nome_clube']."</option>";
                                  }
                                 ?>
                               </select>
                            </div>
                        </div>
                    </form>
                <?php } ?>

                <nav class="navbar-sidebar2">
                    <?php include("ul-menu.php");?>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
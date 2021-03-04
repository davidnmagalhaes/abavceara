


<aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo-white.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="login-seguro/<?= $_SESSION['imagem'] ?>" alt="John Doe" />
                    </div>
                    <h4 class="name"><?= $_SESSION['nome'] ?></h4>
										<?php if($_SESSION['funcao'] == 1){echo "Administrador(a)";}elseif($_SESSION['funcao'] == 2){echo "Presidente";}elseif($_SESSION['funcao'] == 3){echo "Vice-Presidente";}elseif($_SESSION['funcao'] == 4){echo "Diretor(a) Secretário(a)";}elseif($_SESSION['funcao'] == 5){echo "Diretor(a) Tesoureiro(a)";}elseif($_SESSION['funcao'] == 6){echo "Diretor(a) Social";}elseif($_SESSION['funcao'] == 7){echo "Diretor(a) de Patrimônio";}elseif($_SESSION['funcao'] == 8){echo "Diretor(a) de Turismo Receptivo";}else{echo "Secretário(a) Executivo(a)";} ?>

                    <a href="logout.php">Sair</a>
                </div>
                <nav class="navbar-sidebar2">
                    <?php include("ul-menu.php");?>    
                </nav>
                </div>
            </aside>
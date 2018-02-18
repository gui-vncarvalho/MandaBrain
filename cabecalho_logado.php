
<!-- Navigation -->
        <nav class="navbar navbar_cor navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header page-scroll">
                    <a class="navbar-brand page-scroll" href=" 
                            <?php include('conexao.php');

                           $sqlsel=('select idUsuario,senha,idTipoUsuario from usuario where email="'.$_SESSION['login'].'";');
                             $resul=mysqli_query($conexao,$sqlsel);
                             $con=mysqli_fetch_array($resul);
                             $_SESSION['id']=$con['idUsuario'];
                            if($con['idTipoUsuario']==1){
                                echo('home_aluno.php');
                            }else if($con['idTipoUsuario']==2){
                                echo('home_professor.php"');
                            }else{
                                echo('admin.php');
                            }?>">
                        <img src="img/logo.png" width="250" height="50" class="sobe">
                    </a>
                </div>

                <!-- Coletar os links da nav -->
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Hidden - oculta campo -->
                        <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a>
                        </li>
                        </li>
                        <li>
                            <?php
                            
                            include('conexao.php');

                           $sqlsel=('select idUsuario,senha,idTipoUsuario from usuario where email="'.$_SESSION['login'].'";');
                             $resul=mysqli_query($conexao,$sqlsel);
                             $con=mysqli_fetch_array($resul);
                             $_SESSION['id']=$con['idUsuario'];
                            if($con['idTipoUsuario']==1){
                                echo('<a class="page-scroll" href="home_aluno.php"> Home </a>');
                            }else if($con['idTipoUsuario']==2){
                                echo('<a class="page-scroll" href="home_professor.php"> Home </a>');
                            }else{
                                echo('<a class="page-scroll" href="admin.php"> Home </a>');
                            }

                            ?>
    
                        </li>
                        <li>
                            <a class="page-scroll" href="agenda.php"> Agenda </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="conteudo.php"> Conteúdo </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="desconto.php"> Bolsas </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="destruir.php"> Sair </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
<?php 
	include('conexao.php');
		session_start();
		if($_SESSION['login']){
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Detalhes Curso</title>

		<meta charset="utf-8"/>
	        
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen"/>
	        
	    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen"/>

	    <link href="css/scrolling-nav.css" rel="stylesheet">

	    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon"/>

	    <style type="text/css">
		#map-container { 
			width: 100%;
		}
		.navbar{
			background: #3c4759;
			border: none;
		}
		</style>
		

	</head>
	<body>
	<?php
		$sqlsel=('select idUsuario,senha,idTipoUsuario from usuario where email="'.$_SESSION['login'].'";');
        $resul=mysqli_query($conexao,$sqlsel);
        $con=mysqli_fetch_array($resul);
		include('cabecalho_logado.php');
	?>
		<div class="container  espaco_cabecalho">
			<div class="form-group text-center">
					<h1><?php 
						$nome_curso=$_POST['nome_curso']; 
						$idUniversidade=$_POST['idUniversidade'];
						include('conexao.php');
						$sqlsel=('SELECT * FROM Cursos WHERE nome="'.$nome_curso.'";');
						$resul=mysqli_query($conexao,$sqlsel);
						$con=mysqli_fetch_array($resul);
						echo($con['nome']);
					?></h1>
			</div>
			<div class="row text-center">
				<h1><?php
					$select_img=('SELECT * FROM cursos WHERE idUniversidade="'.$idUniversidade.'"; ');
					$resul_img=mysqli_query($conexao,$select_img);
					$con_img=mysqli_fetch_array($resul_img);
					echo('<img class="img-responsive" src="img/upload/cursos/'.$con_img['imagem_curso'].'">');

				?></h1>
			</div>

			<div class="row">
				<div class="form-group text-center">
					<h1><?php 
						include('conexao.php');
						$sqlsel_id=('SELECT * FROM cursos WHERE nome="'.$nome_curso.'";');
						$resul_id=mysqli_query($conexao,$sqlsel);
						$con_id=mysqli_fetch_array($resul_id);
						$sqlsel=('SELECT nomeUniversidade,nome FROM Universidade,cursos WHERE Universidade.idUniversidade='.$con_id['id_cursos'].';');
						$resul=mysqli_query($conexao,$sqlsel);
						$con=mysqli_fetch_array($resul);
						echo('A '.$con['nomeUniversidade'].' oferece um dos melhores cursos de '.$con['nome'].' que você já viu');
					?> </h1>
				</div>
				
				<div class="col-xs-6 form-group text-justify">
					<?php
					$sqlsel=('SELECT descricao FROM Universidade,cursos WHERE  Universidade.idUniversidade='.$con_id['id_cursos'].';');
						$resul=mysqli_query($conexao,$sqlsel);
						$con=mysqli_fetch_array($resul);
						echo($con['descricao']);
					?>
				</div>
			
				<div class="col-xs-6 ">
					<div class="form-group ">
						<h1 class="letra_branca"></h1>
					</div>

					 <div class="col-xs-6 ">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                	<h3 class="text-center">Valor <b>sem</b> MandaBrain</h3>
                                	<center><img class="img-responsive" src="img/icones/ebooks/dinheiro.png" width="150" ></center>
                                </div>
                                <div class="panel-body">
                                   <h3 class="text-center"><?php
                                    $sqlsel_valorcom=('SELECT * FROM cursos WHERE id_cursos='.$con_id['id_cursos'].';');
                                    $resul_valarcom=mysqli_query($conexao,$sqlsel_valorcom);
                                    $con_valorcom=mysqli_fetch_array($resul_valarcom);
                                    echo('R$'.$con_valorcom['sem_mandabrain']);
                                    ?></h3>
                                    <br>
                                </div>
                            </div>
                        </div>

                         <div class="col-xs-6 sobrepor">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                <h3 class="text-center">Valor <b>com</b> MandaBrain</h3>
      								<center><img class="img-responsive" src="img/box.jpg" width="170" ></center>
                                </div>
                                <div class="panel-body">
                                    <h3 class="text-center"><?php
                                    $sqlsel_valorcom=('SELECT * FROM cursos WHERE id_cursos='.$con_id['id_cursos'].';');
                                    $resul_valarcom=mysqli_query($conexao,$sqlsel_valorcom);
                                    $con_valorcom=mysqli_fetch_array($resul_valarcom);
                                    echo('R$'.$con_valorcom['com_mandabrain']);
                                    ?></h3>
                                    <br>
                                </div>
                            </div>
                        </div>

					<div class="form-group">
						<div class="col-xs-8 col-xs-offset-2 espaco_bot">
							<!-- Botão buscar -->

							<form method="POST" action="pdf/index.php" name="bolsa">
								<?php
									$sqlsel=('SELECT * FROM Universidade,cursos WHERE Universidade.idUniversidade='.$con_id['id_cursos'].';');
									$resul=mysqli_query($conexao,$sqlsel);
									$uni=mysqli_fetch_array($resul);

									$_SESSION['nome']=$uni['nomeUniversidade'];
									$_SESSION['rua']=$uni['rua'];
									$_SESSION['numero']=$uni['numero'];
									$_SESSION['bairro']=$uni['bairro'];
									$_SESSION['telefone']=$uni['telefone'];
									$_SESSION['curso']=$uni['nome'];
									$_SESSION['tipo']=$uni['tipo'];
									$_SESSION['forma']=$uni['forma'];
								?>

							 	<input type="submit" class="btn btn-lg btn-warning botao_buscar_desconto" name="buscar" value="Garanta já sua bolsa"/>
							 </form>

						</div>
					</div>
				</div>
			</div>
                  
                   
			<div class="row text-center ">
				<div class="col-xs-12  bordas">
					<div class="form-group">
						<h1><b>Endereço</b></h1>
					</div>
						<?php
							include('api_maps.php');
						?>
						<div class="glyphicon glyphicon-home">  Rua Doutor Almeida Lima, 1134, São Paulo</div>‎<br>
						<div class="glyphicon glyphicon-earphone">  (11) 4007-1192</div><br>
						<div>De segunda a sexta, das 8h às 21h e, sábado, das 8h às 15h</div>
				</div>
           </div>
		</div>
	<script src="js/jquery-3.2.1.min.js"></script>
        
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    
    <script src="js/jquery.easing.min.js"></script>
    
    <script src="js/scrolling-nav.js"></script>
	<?php
	
		
	}
	else
	{
		header('location:index.php');
	}
		include('rodape_logado.php');
	?>
	</body>
</html>
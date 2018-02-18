<?php 
	include('conexao.php');
		session_start();
		if($_SESSION['login']){
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <title>Descontos</title>
        <meta charset="utf-8">
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen"/>
        
        <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen"/>

        <link href="css/scrolling-nav.css" rel="stylesheet">

        <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon"/>

        <style type="text/css">
        .navbar {
                background-color: #3c4759;
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

	<section id="formulario" class="formulario_section img-responsive">	
			<div class="container-fluid ">
			<!-- Título de desconto !-->
				<div class="row">
					<div class="col-xs-offset-7 col-xs-5">
						<h2 class="letra_branca">Encontre sua bolsa de desconto</h2>
					</div>
				</div>
				
			<!-- Formulário !-->
			<form method="POST" action="#" name="bolsa">
				<div class="row">
					<div class="col-xs-offset-6 col-xs-6">

						<div class="form-group">
							<div class="col-xs-12 margem_top">
								<!-- Botão Curso -->
									<select class="form-control" name="curso">
										<option>Escolha seu curso de interesse</option>
										<?php
											$sqlcurso = "SELECT * FROM Cursos";
											$resul = mysqli_query($conexao,$sqlcurso);

											while($consultaCurso = mysqli_fetch_array($resul))
											{
												echo "<option>".$consultaCurso['nome']."</option>";
											}
										?>
									</select>
							</div>
						</div>
						
						<div class="form-group radio text-center centro_radio">
							<div class="col-xs-6 margem_top rigth_radio">
								<input type="radio" id="graduacao" name="tipo" value="1" checked="">
								<label for="graduacao">Graduação</label>
							</div>
										
							<div class="col-xs-6 margem_top meio_radio">
								<input type="radio" name="tipo" id="pos" value="2">
								<label for="pos">Pós-Graduação</label>
							</div>
						</div>
						
						<div class="form-group radio text-center centro_radio">
							<div class="col-xs-6 margem_top">
								<input type="radio" name="forma" id="Presencial" value="1" checked="">
								<label for="Presencial">Presencial</label>
							</div>
										
							<div class="col-xs-6 margem_top meio_radio">
								<input type="radio" id="distancia" name="forma" value="2"/>
								<label for="distancia">À Distância</label>
							</div>
						</div>

						
						
						<div class="form-group">
							<div class="col-xs-12 margem_top">
								<!-- Botão localização -->
									<select class="form-control" name="local">
										<option>Localidade</option>
										<?php
											$sqluni = "SELECT * FROM Universidade";
											$resul = mysqli_query($conexao,$sqluni);
											while($consultaUni = mysqli_fetch_array($resul))
											{
												echo "<option>".$consultaUni['cidade']."</option>";
											}
										?>
									</select>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-xs-12 margem_top">
								<!-- Botão buscar -->
									<input type="submit" class="btn btn-warning botao_buscar_desconto" name="buscar" value="Buscar bolsa"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
	
	<?php
		if(isset($_POST['buscar']))
		{
			$curso = $_POST['curso'];
			$tipo = $_POST['tipo'];
			$forma = $_POST['forma'];
			$local = $_POST['local'];
			if (empty($curso)&&empty($tipo)&&empty($forma)&&empty($local))
			{
				
			}
			else
			{
			$sqlbusca='SELECT * FROM Cursos WHERE tipo = "'.$tipo.'" OR forma = "'.$forma.'" OR nome = "'.$curso.'";';
			$resulbusca=mysqli_query($conexao,$sqlbusca);
	?>

	<!-- Bolsas Section -->
	<section id="ebooks" class="ebooks_section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<h1> Bolsas </h1>

					<br><br>

					<?php
						
						while ($consultaBusca = mysqli_fetch_array($resulbusca))
						{
							if ($consultaBusca['tipo'] == "graduacao")
							{
								$consultaBusca['tipo'] = "Graduação";
							}
							else
							{
								$consultaBusca['tipo'] = "Pós Graduação";
							}

							echo ('
							<form method="POST" action="detalhes_curso.php">
								<div class="col-xs-4">
									<div class="panel panel-success ebooks_section_color">
										<div class="panel-heading branco">
											<img src="img/faculdades/anhembi.jpg" width="250" height="243">
										</div>
										<div class="panel-body">
										   	A bolsa do curso de '.$consultaBusca['tipo'].' em <b>'.$consultaBusca['nome'].'</b> é perfeita para você
											<br><br>
											<input type="hidden" value="'.$consultaBusca['nome'].'" name="nome_curso">
											<input type="hidden" value="'.$consultaBusca['idUniversidade'].'" name="idUniversidade">
											<input name="enviar_bolsas" type="submit" value="Confira já" class="btn btn-lg botao_amarelo"> 
										</div>
									</div>
								</div>
							</form>
							');
						}
					?>
		
				</div>
			   
			</div>
		</div>
	</section>

	
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
   
        <!-- Scrolling Nav JavaScript -->
    
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    
    <script type="text/javascript" src="js/scrolling-nav.js"></script>
    
<?php
			}
		}
	}
	else
	{
		header('location:index.php');
	}
	require('rodape.php');
?>
	</body>
</html>
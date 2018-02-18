<?php
	

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Admin</title>

		<meta charset="utf-8">
		
		<link rel="stylesheet" type="text/css" href="css/pushmenu.css">

		<link rel="stylesheet" type="text/css" href="css/home.css">
		
		<style>
		    #pm_menu {
		    background:#3c4759;
		    color:#fff;
		    text-align:center
		  }
	 	</style>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <link rel="stylesheet" type="text/css" href="css/estilo.css">

	    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	    <link rel="stylesheet" type="text/css" href="css/scrolling-nav.css">

		<link rel='stylesheet' href="css/perfect-scrollbar.css">

		<link rel="stylesheet" href="css/clndr.css" type="text/css" />

	    <link rel="shortcut icon" type="imagem/x-icon" href="img/icon.ico"/>

	    <script type="text/javascript" src="tinymce/js/tinymce/jquery.tinymce.min.js"></script>

		<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>

		<script type="text/javascript">
			tinymce.init({
			  selector: 'textarea',
			  height: 400,
			  menubar: false,
			  plugins: [
			    'advlist autolink lists link image charmap print preview anchor textcolor',
			    'searchreplace visualblocks code fullscreen',
			    'insertdatetime media table contextmenu paste code help'
			  ],
			  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
			  content_css: [
			    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
			    '//www.tinymce.com/css/codepen.min.css']
			});
		</script>

	    <style type="text/css">
	    	.navbar{
	    		background: #3c4759;
	    		border: none;
	    	}
	    	body{
	    		background: #313742;
	    	}
	    </style>

	</head>
	<body>
		<?php
		 session_start();
      
        include('cabecalho_logado.php');
		?>
		<div class="container-fluid fundo_admin">

				<form action="#" method="GET" enctype="multipart/form-data">
					<div id="professor" class="section">

						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							
							<div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingOne">
							      <h4 class="panel-title">
							        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
										<div class="text-left"><h1>Lista de professores</h1></div>
									</a>
							      </h4>
							    </div>
							    <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
	      							<div class="panel-body">
										<div class="scroll_direita">
				<?php
					include('conexao.php');
					$sqlsel=('SELECT * FROM usuario WHERE idTipoUsuario=2;');

					$resul=mysqli_query($conexao,$sqlsel);
						echo('
										<table class="table" >
											<thead>
												<tr class="letra_amarela">
													<th>Nome</th>
													<th>Sobrenome</th>
													<th>CPF</th>
													<th>RG</th>
													<th>E-mail</th>
													<th>Telefone</th>
													<th>Escola/Universidade</th>
													<th>Sexo</th>
													<th>Data de Nascimento</th>
													<th>Banir</th>
												</tr>
										</thead><tbody>');
									while($con=mysqli_fetch_array($resul))
									{							
												
										echo('<tr><td>'.$con['nome'].'</td>');
										echo('<td>'.$con['sobrenome'].'</td>');
										echo('<td>'.$con['cpf'].'</td>');
										echo('<td>'.$con['rg'].'</td>');
										echo('<td>'.$con['email'].'</td>');
										echo('<td>'.$con['telefone'].'</td>');
										echo('<td>'.$con['escola_universidade'].'</td>');
										echo('<td>'.$con['sexo'].'</td>');
										echo('<td>'.$con['dt_nasc'].'</td>');
										echo('<td> <a href="admin.php?ex='.$con['idUsuario'].'"><img src="img/icones/admin/remove-user.png" width="40px"></a></td></tr>');
									}
									echo('</tbody></table>');

		if(isset($_GET['ex'])){
		$id=$_GET['ex'];
		$sqlex=('delete from usuario where idUsuario='.$id.';');
		mysqli_query($conexao,$sqlex);
		echo "<script>window.alert('Excluido com sucesso!'); window.location='admin.php';</script>";
	}


	?>	
						</div>
						</div>
						</div>
						</div>
					</div>
				</form>
				
				<form action="#" method="GET" enctype="multipart/form-data">
					<div id="aluno" class="section ">

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading2">
							    <h4 class="panel-title">
							    	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
										<div class="text-left"><h1>Lista de alunos</h1></div>
									</a>
							    </h4>
							</div>


							<div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
	      						<div class="panel-body">
									<div class="scroll_direita">
				<?php
					include('conexao.php');
					$sqlsel=('SELECT * FROM usuario WHERE idTipoUsuario=1;');

					$resul=mysqli_query($conexao,$sqlsel);
						echo('
										<table class="table" >
											<thead>
												<tr class="letra_amarela">
													<th>Nome</th>
													<th>Sobrenome</th>
													<th>CPF</th>
													<th>RG</th>
													<th>E-mail</th>
													<th>Telefone</th>
													<th>Sexo</th>
													<th>Data de Nascimento</th>
													<th>Banir</th>
												</tr>
										</thead><tbody>');
									while($con=mysqli_fetch_array($resul))
									{							
												
										echo('<tr><td>'.$con['nome'].'</td>');
										echo('<td>'.$con['sobrenome'].'</td>');
										echo('<td>'.$con['cpf'].'</td>');
										echo('<td>'.$con['rg'].'</td>');
										echo('<td>'.$con['email'].'</td>');
										echo('<td>'.$con['telefone'].'</td>');
										echo('<td>'.$con['sexo'].'</td>');
										echo('<td>'.$con['dt_nasc'].'</td>');
										echo('<td> <a href="admin.php?ex='.$con['idUsuario'].'"><img src="img/icones/admin/remove-user.png" width="40px"></a></td></tr>');
									}
									echo('</tbody></table');

		if(isset($_GET['ex'])){
		$id=$_GET['ex'];
		$sqlex=('delete from usuario where idUsuario='.$id.';');
		mysqli_query($conexao,$sqlex);
		echo('<script>window.alert("Excluido com sucesso!");window.location="admin.php";</script>');
	}


	?>	
							</div>
					</div>
				</div>
			</div>
		</div><

				</form>

				<form action="#" method="POST" enctype="multipart/form-data">
					<div id="usuario" class="section linha">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading3">
							    <h4 class="panel-title">
							    	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">

										<div class="text-left">
											<div class="col-xs-3">
												<h2>Buscar Usuário</h2>
											</div>

											<div class="col-xs-6 top">
												<input type="text" name="usuario" class="form-control">
											</div>
											<div class="col-xs-3 top">
												<input type="submit" name="buscar_usuario" class="btn botao_amarelo">
											</div>
										</div>
									</a>
							    </h4>
							</div>

							<div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading3">
	      						<div class="panel-body">
									<div class="scroll_direita">
<?php							
if(isset($_POST['buscar_usuario']))
	{
		$pesq=$_POST['usuario'];
		$sqlpes=('SELECT * FROM usuario WHERE idTipoUsuario=1 OR idTipoUsuario=2 AND nome like "%'.$pesq.'%";');
		$resul=mysqli_query($conexao,$sqlpes);
		if(mysqli_num_rows($resul))
		{
			echo ('<h2 class="text-center">Campos encontrados:</h2>');
			echo('
										<table class="table" >
											<thead>
												<tr class="letra_amarela">
													<th>Nome</th>
													<th>Sobrenome</th>
													<th>CPF</th>
													<th>RG</th>
													<th>E-mail</th>
													<th>Telefone</th>
													<th>Escola/Universidade</th>
													<th>Sexo</th>
													<th>Data de Nascimento</th>
													<th>Banir</th>
												</tr>
										</thead><tbody>');
			while($con=mysqli_fetch_array($resul))
									{							
												
										echo('<tr><td>'.$con['nome'].'</td>');
										echo('<td>'.$con['sobrenome'].'</td>');
										echo('<td>'.$con['cpf'].'</td>');
										echo('<td>'.$con['rg'].'</td>');
										echo('<td>'.$con['email'].'</td>');
										echo('<td>'.$con['telefone'].'</td>');
										echo('<td>'.$con['escola_universidade'].'</td>');
										echo('<td>'.$con['sexo'].'</td>');
										echo('<td>'.$con['dt_nasc'].'</td>');
										echo('<td> <a href="admin.php?ex='.$con['idUsuario'].'"><img src="img/icones/admin/remove.png"></a></td></tr>');
									}
									echo('</tbody></table');


		}
		else
		{
			echo('<h2 class="text-center">Nenhum campo encontrado com '.$pesq.'</h2>');
		}		
	}
		?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<br>

				<form action="#" method="POST" enctype="multipart/form-data">

					<div class="section">

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading4">
							    <h4 class="panel-title">
							    	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">

										<div class="text-left"><h2>Inserir Página 	</h2></div>

									</a>
							    </h4>
							</div>

						<div id="collapse4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading4">
	      						<div class="panel-body">

									<div class="col-xs-12 ">
										<label class="control-label">Página</label>
										<input type="text" name="paginas" class="form-control">
									</div>

									<div class="col-xs-12 text-center linha">
										<br>
										<input type="submit" class="btn botao_amarelo" name="pagina">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>

		 			

				<form action="#" method="POST" enctype="multipart/form-data">
					<div id="desconto" class="section ">

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading6">
							    <h4 class="panel-title">
							    	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">

										<div class="text-left"><h2>Inserir Curso</h2></div>

									</a>
							    </h4>
							</div>

							<div id="collapse6" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading6">
	      						<div class="panel-body">
									<div class="col-xs-12">
										<label class="control-label">Nome do curso:</label>
										<input type="text" name="nome_curso" class="form-control" required="">
									</div>

									<div class="col-xs-12">
										<label class="control-label" for="nome_faculdade">Faculdade</label>
										<select class="form-control" id="nome_faculdade" name="nome_faculdade" required="">
												<option>Escolha a faculdade</option>
										<?php
													include('conexao.php');
													$sqlsel=('SELECT * FROM Universidade;');
													$resul=mysqli_query($conexao,$sqlsel);
													while($con=mysqli_fetch_array($resul)){
														echo('<option value="'.$con['nomeUniversidade'].'">'.$con['nomeUniversidade'].'</option>');
													}
												?>
										</select>
									</div>

									<div class="col-xs-12 radio ">
										<div><label class="control-label">Formação:</label></div>
										<div class="col-xs-6  rigth_radio">
											<input type="radio" class="" id="graduacao" name="formacao" value="graduacao" checked="" >
											<label for="graduacao">Graduação</label>
										</div>
													
										<div class="col-xs-6  meio_radio">
											<input type="radio" name="formacao" id="pos" value="posgraduacao">
											<label for="pos">Pós-Graduação</label>
										</div>
									</div>

									<div class="col-xs-12 radio ">
										<div><label class="control-label">Localidade:</label></div>
										<div class="col-xs-6  rigth_radio">
											<input type="radio" class="" id="distancia" name="tipo_curso" value="distancia" checked="">
											<label for="distancia">À distância</label>
										</div>
													
										<div class="col-xs-6  meio_radio">
											<input type="radio" name="tipo_curso" id="tipo_curso" value="presencial">
											<label for="tipo_curso">Presencial</label>
										</div>
									</div>

									<div class="col-xs-12">
										<label class="control-label" for="file">Escolher foto faculdade:</label>
										<input type="file" name="imagem_faculdade" required="">
										<br>
										<label class="control-label" for="descricao">Descrição do curso:</label>
										<textarea name="descricao"></textarea>
									</div>

									<div class="col-xs-12">
										<div class="col-xs-6 espaco_left_mesma_linha">
											<label class="control-label" for="">Valor sem MandaBrain:</label>
											<input type="text" name="sem_mandabrain" class="form-control" required="">
										</div>
										<div class="col-xs-6 espaco_rigth_mesma_linha">
											<label class="control-label" for="">Valor com MandaBrain:</label>
											<input type="text" name="com_mandabrain" class="form-control" required="">
										</div>
									</div>

									<div class="col-xs-12 text-center linha">
										<br>
										<input type="submit" class="btn botao_amarelo" name="inserir_curso" value="Inserir bolsas">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>

				<form action="#" method="POST"  enctype="multipart/form-data">
					<div id="faculdade" class="section">

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading7">
							    <h4 class="panel-title">
							    	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">

										<div class="text-left"><h2>Inserir faculdade</h2></div>

									</a>
							    </h4>
							</div>

							<div id="collapse7" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading7">
	      						<div class="panel-body">
									<div class="col-xs-12">
										<label class="control-label">Nome:</label>
											<input type="text" class="form-control" name="nome_faculdade">
									</div>

									<div class="col-xs-12">
										<label class="control-label">E-Mail:</label>
											<input type="text" name="email" class="form-control">
									</div>

									<div class="col-xs-12">
										<label class="control-label" for="file">CNPJ:</label>
										<input type="text" name="cnpj" class="form-control">
									</div>

									<div class="col-xs-12">
										<label class="control-label" for="file">Telefone:</label>
										<input type="text" name="telefone" class="form-control">
									</div>

									<div class="col-xs-6">
										<label class="control-label" for="file">Cidade:</label>
										<input type="text" name="cidade" class="form-control">
									</div>

									<div class="col-xs-6">
										<label class="control-label" for="file">Rua:</label>
										<input type="text" name="rua" class="form-control">
									</div>

									<div class="col-xs-6">
										<label class="control-label" for="file">Número:</label>
										<input type="text" name="numero" class="form-control">
									</div>

									<div class="col-xs-6">
										<label class="control-label" for="file">Bairro:</label>
										<input type="text" name="bairro" class="form-control">
									</div>


									<div class="col-xs-12 linha text-center">
										<br>
										<input type="submit" class="btn botao_amarelo" name="inserir_faculdade" value="Inserir Faculdade">
									</div>
							</div>
						</div>
						</div>
						</div>

				</form>

			</div>
		</div>
	</div>

		
		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>

		<script type="text/javascript" src="js/bootstrap.js"></script>
		
		<!-- Scrolling Nav JavaScript -->
    
        <script src="js/jquery.easing.min.js"></script>
    
        <script src="js/scrolling-nav.js"></script>

        <!--Perfect ScrollBar-->

        <script src="js/jquery_aja.js"></script>	

		<script src="js/perfect-scrollbar.min.js"></script>
		</div>
    </div>
</div> 
      <?php
      	
      	include('conexao.php');
		

      	if(isset($_POST['pagina'])){
      		$pagina=$_POST['paginas'];
      		echo($pagina);
      		$sqlin=('INSERT INTO paginas(paginas) VALUES ("'.$pagina.'");');
      		mysqli_query($conexao,$sqlin);
      		
      	}


      	if(isset($_POST['inserir_curso'])){

      			$nome_faculdade=$_POST['nome_faculdade'];
      			$sqlsel_faculdade=('SELECT idUniversidade FROM Universidade WHERE nomeUniversidade="'.$nome_faculdade.'";');
      			$resul_faculdade=mysqli_query($conexao,$sqlsel_faculdade);
      			$con_faculdade=mysqli_fetch_array($resul_faculdade);
      			echo($con_faculdade['idUniversidade']);

      			$idUniversidade=$con_faculdade['idUniversidade'];
      			$nome_curso=$_POST['nome_curso'];
	      		$tipo=$_POST['formacao'];
	      		$forma=$_POST['tipo_curso'];
	      		$descricao=$_POST['descricao'];
	      		$sem_mandabrain=$_POST['sem_mandabrain'];
	      		$com_mandabrain=$_POST['com_mandabrain'];

	      		if (isset($_FILES['imagem_faculdade'])){
       			$sqlsel=('SELECT * FROM cursos WHERE nome="'.$nome_curso.'";');
	      		$resul=mysqli_query($conexao,$sqlsel);
	      		$con=mysqli_fetch_array($resul);
	      		//UPANDO IMAGEM
	      		$extensao=strtolower(substr($_FILES['imagem_faculdade']['name'], -4));
	            $novo_nome=md5(time().$con['id_cursos']).$extensao;
	            $diretorio="img/upload/cursos/";
	            move_uploaded_file($_FILES['imagem_faculdade']['tmp_name'], $diretorio.$novo_nome);
	            //quando o php recebe um arquivo de upload ele é armazenado temporariamente em uma pasta com seus arquivos de sistema
	 $sqlin=('INSERT INTO cursos(tipo,forma,nome,imagem_curso,data_imagem,descricao,com_mandabrain,sem_mandabrain,idUniversidade) VALUES ("'.$tipo.'","'.$forma.'","'.$nome_curso.'","'.$novo_nome.'",NOW(),"'.$descricao.'","'.$com_mandabrain.'","'.$sem_mandabrain.'",'.$idUniversidade.');');
	      		 mysqli_query($conexao,$sqlin);
	      	 echo('<script> window.alert("Cadastrado com sucesso");</script>');
	        }
	    }


      	if(isset($_POST['inserir_faculdade'])){	
      		$nome_faculdade=$_POST['nome_faculdade'];
      		$email=$_POST['email'];
      		$cnpj=$_POST['cnpj'];
      		$cidade=$_POST['cidade'];
      		$rua=$_POST['rua'];
      		$numero=$_POST['numero'];
      		$telefone=$_POST['telefone'];
      		$bairro=$_POST['bairro'];		
			
      		$sqlin=('insert into Universidade(cnpj,email,cidade,telefone,rua,numero,bairro,nomeUniversidade)values("'.$cnpj.'","'.$email.'","'.$cidade.'","'.$telefone.'","'.$rua.'","'.$numero.'","'.$bairro.'","'.$nome_faculdade.'");');
      		mysqli_query($conexao,$sqlin);
      		echo('<script>window.alert("Cadastrado com sucesso!");window.location="admin.php";</script>');
 	
    	}
      	
      
    	include('rodape.php'); 	
    	?>


	</body>
</html>
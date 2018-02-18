<?php
		session_start();
		include('conexao.php');
		$sqlsel=('select idUsuario,senha,idTipoUsuario from usuario where email="'.$_SESSION['login'].'";');
        $resul=mysqli_query($conexao,$sqlsel);
        $con=mysqli_fetch_array($resul);
        if($_SESSION['login']){
		if($con['idTipoUsuario']==2){
?>
<!DOCTYPE html>
<html>
	<head>

		
		<title> Home </title>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="css/home.css">

		<link rel="stylesheet" type="text/css" href="css/estilo.css">

		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

		<link rel="stylesheet" type="text/css" href="css/sala_h.css">
		
        <link rel="shortcut icon" type="imagem/x-icon" href="img/icon.ico"/>

        <style type="text/css">
		      .navbar{
		        border: none;
      }
    </style>

	</head>
	<body>
		<?php
			include('cabecalho_logado.php');
		?>

		<div class="container-fluid">
			<div class="row">
				<!-- Home Section -->
		        <section id="home" class="home-section">
		            <div class="container-fluid">
		                <div class="row">
		                    <div class="col-xs-3 borda botao_criar_sala">
								<?php
		                    	include('conexao.php');
		                    	$login=$_SESSION['login'];
								$sqlsel=('select * from usuario where email="'.$_SESSION['login'].'";');
								$resul=mysqli_query($conexao,$sqlsel);
								$con=mysqli_fetch_array($resul);
								
		                        echo('<div class="col-xs-offset-1 col-xs-10"><img src="img/upload/usuario/'.$con['imagem_usuario'].'" width="240" height="240" class="img_usu img-circle img-responsive text-center"></div>');

		                        echo('<h2 class="text-center nome_usu"> '.$con['nome'].'</h2>');
		                        ?>
		                        <form action="#" method="POST" enctype="multipart/form-data">
			                        <div class="fileUpload btn btn-lg botao_amarelo">
										<span>Selecionar imagem</span>
										<input type="file" class="upload" name="imagem_usuario" />
									</div>	
									
									<div class="fileUpload botao_amarelo btn btn-md" >
										<input type="submit" class="botao_amarelo btn" name="atualizar_imagem" value="Atualizar"/>
									</div>
								</form><div class="scroll">
		                        <?php
		                        echo('<h2 class="text-center nome_usu"> Minhas Salas </h2>');
		                        $sqlsel_sala=('SELECT * FROM sala WHERE idUsuario="'.$_SESSION['id'].'";');
		                        $resul_sala=mysqli_query($conexao,$sqlsel_sala);
		                        if(mysqli_num_rows($resul_sala)){

		                        while ($con_sala=mysqli_fetch_array($resul_sala)) {
								?>
									<form method="GET" action="sala.php">
									<ul id="lista_participantes">
										<li class="iten_part letra_branca">
											<img src="img/sala.png" width="40px">
											<a name="ir_sala" class="btn btn-lg btn-link" href="sala.php?id=<?php echo $con_sala['id_sala']; ?>">
												<?php echo ($con_sala['nome']); 
												?></a>
										</li>
	
									</ul>
									</form>
								
							<?php
								}
							}else
							{
								echo('<span class=" text-center letra_amarela">Nenhuma sala criada</span>');
							}

								?></div>
							
							<!-- Button trigger modal -->
							<button type="button" class="btn botao_amarelo btn-lg" data-toggle="modal" data-target="#myModal">
							 	Criar Sala
							</button>	

						</div>

							<form action="#" method="POST">
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header cor_escura_rodape">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h3 class="modal-title" id="myModalLabel">Criar Sala</h3>
							      </div>
							      <div class="modal-body fundo_admin">
							        <div class="row letra_branca">
								      		<div class="col-xs-6">
								      			<label class="control-label" for="nome_sala">Nome da Sala: </label>
								      			<input type="text" name="nome_sala" class="form-control">
								      		</div>

								      		<div class="col-xs-6">
								      			<label class="control-label" for="tipo_sala">Tipo da sala: </label>
								      			<select class="form-control" name="tipo_sala">
								      				<option>Escolha o tipo da sala</option>
								      				<option>Cursinho</option>
								      				<option>Escola</option>
								      				<option>Faculdade</option>
								      				<option>Outros</option>
								      			</select>

								    		</div>
								    </div>
							<div class="row letra_branca">

					
							<br>
							
								<div class="modal-footer cor_escura_rodape">
									<div class="col-xs-9">
							    		<input type="submit" name="criar_sala" value="Criar Sala" class="btn botao_amarelo">
							   	 	</div>
							     </div>
							</div>
							</div>
						</div>
					</div>
				</div>
</form>
					        <div class="col-xs-9">

						        <div>
						        	<div class="col-xs-12">
										<h1 class="letra_amarela linha"> Meus Dados Pessoais </h1>
									</div>
									<br>

									<form action="#" method="POST">
										<div class="form-group col-xs-6">
										    <label for="nome"> Nome </label>
										    <input type="text" name="nome_alt" class="form-control" id="nome" value="<?php echo($con['nome']);?>">
										</div>

										<div class="form-group col-xs-6">
										    <label for="sobrenome"> Sobrenome </label>
										    <input type="text" name="sobrenome_alt" class="form-control" id="sobrenome" value="<?php echo($con['sobrenome']);?>">
										</div>

										<div class="form-group col-xs-12">
										    <label for="email"> Email </label>
										    <input type="email" name="email_alt" class="form-control" id="email" value="<?php echo($con['email']);?>">
										</div>

										<div class="form-group col-xs-12">
										    <label for="tel"> Telefone </label>
										    <input type="text" name="tel_alt" class="form-control" id="tel" value="<?php
										    echo($con['telefone']);
										    ?>">
										</div>

										<div class="form-group col-xs-6">
										    <label for="cpf"> CPF </label>
										    <input type="text" name="cpf_alt" class="form-control" id="cpf" value="<?php echo($con['cpf']);?>">
										</div>

										<div class="form-group col-xs-6">
										    <label for="rg"> RG </label>
										    <input type="text" name="rg_alt" class="form-control" id="rg" value="<?php echo($con['rg']);?>">
										</div>

										<div class="form-group col-xs-12">
										    <label for="sobrenome"> Data de Nascimento </label>
										    <input type="date" name="dtnasc_alt" class="form-control" id="sobrenome" value="<?php echo($con['dt_nasc']);?>">
										</div>
										<div class="form-group col-xs-12">
										<button type="submit" name="alterar" class="btn btn-info btn-md"> Atualizar dados pessoais </button>
										</div>
									</form>

									<br>

									<div class="col-xs-12">
										<h1 class="letra_amarela linha"> Senha </h1>
									</div>
									<br>

									<form action="#" method="POST" name="senha">
										<div class="form-group col-xs-6">
										    <label for="senha"> Senha atual </label>
										    <input type="password" name="senhaantiga_alt" class="form-control" id="senha" placeholder="°°°°°°°°">
										</div>

										<div class="form-group col-xs-6">
										    <label for="sobrenome"> Nova senha </label>
										    <input type="password" name="senhanova_alt" class="form-control" id="senha" placeholder="°°°°°°°°">
										</div>

										<div class="form-group col-xs-12">
											<button type="submit" name="alt_senha" class="btn btn-info btn-md"> Atualizar Senha </button>
										</div>
									</form>
									<div class="col-xs-12">
										<button type="button" name="excluir_conta" class="btn btn-md botao_vermelho" style="width: 100%;" data-toggle="modal" data-target="#myModal2">Apagar conta</button>
									</div>
<form action="#" method="POST">
		     <!-- Modal 3 -->
		<div class="modal fade" id="myModal2	 " tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-header cor_escura_rodape">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <h3 class="modal-title letra_amarela" id="myModalLabel">Digite sua senha para apagar sua conta!</h3>
				        </div>
				        <div class="modal-body cor_clara_rodape">
				               <div class="form-group">
				               		<label class="control-label" for="senha">Senha: </label>
				               		<input type="password" name="senha" class="form-control">
				               </div>
				               <div class="form-group">
				               		<label class="control-label" for="conf_senha">Confirmar senha: </label>
				               		<input type="password" name="conf_senha" class="form-control">
				               </div>
				        </div>
				       	<div class="modal-footer cor_escura_rodape">
				       		<input type="submit" class="btn btn-default botao_verde" data-dismiss="modal" value="Cancelar">
		       			 	<input type="submit" class="btn btn-primary botao_vermelho" value="Apagar conta" name="apagar">
		            	</div>
		        </div>
		    </div>
		</div>
		</form>
		<?php
		    if(isset($_POST['apagar'])){
		    	$senha=base64_encode($_POST['senha']);
		    	$conf_senha=base64_encode($_POST['conf_senha']);
		    	if($senha==$conf_senha){
		        $sqlex=('DELETE FROM usuario WHERE idUsuario='.$_SESSION['id'].';');
		            mysqli_query($conexao,$sqlex);
		        $sqlex2=('DELETE FROM sala_temporaria WHERE idUsuario='.$_SESSION['id'].';');
		        	mysqli_query($conexao,$sqlex2);
		        $sqlex3=('DELETE FROM sala WHERE idUsuario='.$_SESSION['id'].';');
		        	mysqli_query($conexao,$sqlex3);
		            echo('<script>window.alert("Desculpe-nos por qualquer imprevisto, esperamos sua volta!");window.location="index.php";</script>');
		          }else{
		          	echo('<script>window.alert("Senhas diferentes!");</script>');
		          }
		    }
    ?>

						<?php
						$select_declaracao=('SELECT escola_universidade,imagem_declaracao,data_declaracao FROM usuario WHERE idUsuario='.$_SESSION['id'].';');
						$resul_declaracao=mysqli_query($conexao,$select_declaracao);
						if(mysqli_num_rows($resul_declaracao)){

		
							
							}else{
								echo('<div class="col-xs-12">
											<h1 class="linha letra_amarela"> Informações do Professor </h1>
									</div>
									<br>

									<form action="#" method="POST" enctype="multipart/form-data">
										
										<div class="form-group col-xs-12">
										    <label for="universidade"> Universidade </label>
										    <input type="text" name="universidade" class="form-control" id="universidade">
										</div>

										<div class="form-group col-xs-12 ">
											<label for="declaracao" class="control-label text-left">Declaração</label>
										    <div class="fileUpload btn btn-md botao_amarelo ">
													<span>Selecionar imagem</span>
													<input type="file" class="upload" name="imagem_declaracao" />
											</div>	
											
										</div>
										<div class="col-xs-12">
											<button type="submit" name="enviar_informacoes" class="btn btn-info btn-md"> Enviar </button>
										</div>
									</form>');
							}
								?>

						        </div>

					        </div>


					        <!-- /.col-lg-9 -->
		                </div>
		            </div>
		        </section>
			</div>
		</div>
		<script type="text/javascript">
			$('button:contains("buscar_usuario")').prop('disabled',true);
		</script>

		<?php
			include('rodape_logado.php');

			if(isset($_POST['enviar_informacoes'])){

				$universidade=$_POST['universidade'];

				$sqlsel=('SELECT * FROM usuario WHERE idUsuario="'.$_SESSION['id'].'";');
	      		$resul=mysqli_query($conexao,$sqlsel);
	      		$con=mysqli_fetch_array($resul);
				//UPANDO IMAGEM
	      		$extensao=strtolower(substr($_FILES['imagem_declaracao']['name'], -4));
	            $novo_nome=md5(time().$con['idUsuario']).$extensao;
	            $diretorio="img/upload/usuario/declaracao/";
	            move_uploaded_file($_FILES['imagem_declaracao']['tmp_name'], $diretorio.$novo_nome);
	            //quando o php recebe um arquivo de upload ele é armazenado temporariamente em uma pasta com seus arquivos de sistema
	            $sqlalt=('UPDATE usuario SET escola_universidade="'.$universidade.'",imagem_declaracao="'.$novo_nome.'",data_declaracao=NOW() WHERE idUsuario='.$_SESSION['id'].';');
	            mysqli_query($conexao,$sqlalt);
	            echo('<script>window.alert("Imagem atualizada com sucesso!");window.location="home_professor.php";</script>');
			}
				

			if(isset($_POST['atualizar_imagem'])){

				$sqlsel=('SELECT * FROM usuario WHERE idUsuario="'.$_SESSION['id'].'";');
	      		$resul=mysqli_query($conexao,$sqlsel);
	      		$con=mysqli_fetch_array($resul);
				//UPANDO IMAGEM
	      		$extensao=strtolower(substr($_FILES['imagem_usuario']['name'], -4));
	            $novo_nome=md5(time().$con['idUsuario']).$extensao;
	            $diretorio="img/upload/usuario/";
	            move_uploaded_file($_FILES['imagem_usuario']['tmp_name'], $diretorio.$novo_nome);
	            //quando o php recebe um arquivo de upload ele é armazenado temporariamente em uma pasta com seus arquivos de sistema
	            $sqlalt=('UPDATE usuario SET imagem_usuario="'.$novo_nome.'",data_imagem=NOW() WHERE idUsuario='.$_SESSION['id'].';');
	            mysqli_query($conexao,$sqlalt);
	            echo('<script>window.alert("Imagem atualizada com sucesso!");window.location="home_professor.php";</script>');
			}

			if(isset($_POST['alterar'])){
				$sqlsel=('SELECT * FROM usuario WHERE idUsuario="'.$_SESSION['id'].'";');
	      		$resul=mysqli_query($conexao,$sqlsel);
	      		$con=mysqli_fetch_array($resul);
				$nome=$_POST['nome_alt'];
				$sobrenome=$_POST['sobrenome_alt'];
				$cpf=$_POST['cpf_alt'];
				$rg=$_POST['rg_alt'];
				$tel=$_POST['tel'];
				$email=$_POST['email_alt'];
				$dtnasc=$_POST['dtnasc_alt'];
				$sqlalt=('UPDATE usuario SET nome="'.$nome.'",sobrenome="'.$sobrenome.'",cpf="'.$cpf.'",rg="'.$rg.'",email="'.$email.'",telefone="'.$tel.'",dt_nasc="'.$dtnasc.'" WHERE idUsuario='.$con['idUsuario'].';');
				mysqli_query($conexao,$sqlalt);
				echo('<script>window.alert("Alterado com sucesso!");window.location="home_professor.php";</script>');
			}
			if(isset($_POST['alt_senha'])){
				$sqlsel=('SELECT * FROM usuario WHERE idUsuario="'.$_SESSION['id'].'";');
	      		$resul=mysqli_query($conexao,$sqlsel);
	      		$con=mysqli_fetch_array($resul);
				$senhaantiga=$_POST['senhaantiga_alt'];
				$senhanova=$_POST['senhanova_alt'];
				$senhanova=base64_encode($senhanova);
				if(base64_decode($con['senha'])==$senhaantiga){
					if($con['senha']==$senhanova){
						echo('<script>window.alert("As senhas são iguais!");</script>');
					}
					else{
						$sqlalt=('UPDATE usuario SET senha="'.$senhanova.'" WHERE idUsuario='.$con['idUsuario'].';');
						mysqli_query($conexao,$sqlalt);
						echo('<script>window.alert("Alterado com sucesso!");window.location="home_professor.php";</script>');
					}
				}else{
					echo('<script>window.alert("Senha antiga incorreta!");</script>');
				}

			}

			if(isset($_POST['criar_sala'])){
				$nome_sala=$_POST['nome_sala'];
				$tipo_sala=$_POST['tipo_sala'];
				$sqlin=('INSERT INTO sala(nome,descricao,idUsuario) VALUES ("'.$nome_sala.'","'.$tipo_sala.'","'.$_SESSION['id'].'");');
				mysqli_query($conexao,$sqlin);
				$sqlsel_sala=('SELECT * FROM sala WHERE idUsuario="'.$_SESSION['id'].'";');
		        $resul_sala=mysqli_query($conexao,$sqlsel_sala);
		        $con_sala=mysqli_fetch_array($resul_sala);
			
				echo('<script>window.alert("Sala cadastrada com sucesso!");window.location="home_professor.php"</script>');
				
				}
				}elseif($con['idTipoUsuario']==1){
					header('location:home_aluno.php');
				}elseif($con['idTipoUsuario']==3){
					header('location:admin.php');
				}
			}
			else
			{
				header('location:index.php');
			}

				?>

		<script src="js/jquery-3.2.1.min.js"></script>
        
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    
    <script src="js/jquery.easing.min.js"></script>
    
    <script src="js/scrolling-nav.js"></script>
	</body>
</html>
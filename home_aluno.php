<?php
		session_start();
		include('conexao.php');
		$sqlsel=('select idUsuario,senha,idTipoUsuario from usuario where email="'.$_SESSION['login'].'";');
        $resul=mysqli_query($conexao,$sqlsel);
        $con=mysqli_fetch_array($resul);
       	if($_SESSION['login']){
		if($con['idTipoUsuario']==1){
?>
<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">

		<title> Home </title>

		<link rel="stylesheet" type="text/css" href="css/home.css">

		<link rel="stylesheet" type="text/css" href="css/sala_h.css">

        <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon"/>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->

        <link href="css/scrolling-nav.css" rel="stylesheet">

        <link href="css/estilo.css" rel="stylesheet">

        <style type="text/css">
            .navbar {
                background-color: #3c4759;
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
		                    <div class="col-xs-3 borda">
		                    	<?php
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
									<div>
										<input type="submit" class="botao_amarelo btn" name="atualizar_imagem" value="Atualizar"/>
									</div>
								</form>
								<div class="scroll">
		                        <?php
		                        echo('<h2 class="text-center nome_usu"> Minhas Salas </h2>');
		                        $select_id=('SELECT * FROM sala_temporaria WHERE idUsuario='.$_SESSION['id'].';');
		                        $resul_id=mysqli_query($conexao,$select_id);
		                        $con_id=mysqli_fetch_array($resul_id);
		                        //echo('<h1>'.$con_id['id_sala'].'</h1>');
		                        if(!empty($con_id['id_sala'])){
		                        $sqlsel_sala=('SELECT * FROM sala WHERE id_sala='.$con_id['id_sala'].';');
		                        //echo('<h1>'.$sqlsel_sala.'</h1>');
		                        $resul_sala=mysqli_query($conexao,$sqlsel_sala);
		                        $test=mysqli_num_rows($resul_sala);
		                        if($test>0){
		                        while ($con_sala=mysqli_fetch_array($resul_sala)) {
								?>
									<form method="GET" action="sala.php">
									<ul id="lista_participantes">
										<li class="iten_part letra_branca">
											<img src="img/sala.png" width="40px">
											<a name="ir_sala" class="btn btn-lg btn-link" href="sala_aluno.php?id=<?php echo $con_sala['id_sala']; ?>">
												<?php echo ($con_sala['nome']); 
												?></a>
										</li>
	
									</ul>
									</form>
								
							<?php
							}
						}
						else
						{
							echo('<span class="letra_amarela">Você não está em nenhuma sala!</span>');
						}
						}
						else
						{
							echo('<span class="letra_amarela">Você não está em nenhuma sala!</span>');
						}
								?>
									
								</div>
		                    </div>

	<form action="#" method="POST">
		     <!-- Modal 3 -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
										<div class="col-xs-12">
										<button type="button" name="excluir_conta" class="btn btn-md botao_vermelho" style="width: 100%;" data-toggle="modal" data-target="#myModal">Apagar conta</button>
										</div>
									</form>

						        </div>

					        </div>
					        <!-- /.col-lg-9 -->
		                </div>
		            </div>
		        </section>
			</div>
		</div>
		<?php
			include('rodape_logado.php');
			include('conexao.php');
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
	            echo('<script>window.alert("Imagem atualizada com sucesso!");window.location="home_aluno.php";</script>');
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
				echo('<script>window.alert("Alterado com sucesso!");window.location="home_aluno.php";</script>');
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
						echo('<script>window.alert("Alterado com sucesso!");window.location="home_aluno.php";</script>');
					}
				}else{
					echo('<script>window.alert("Senha antiga incorreta!");</script>');
				}

			}
		}elseif($con['idTipoUsuario']==2){
			header('location:home_professor.php');
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
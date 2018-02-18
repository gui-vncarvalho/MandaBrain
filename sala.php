<?php
	include('conexao.php');
		session_start();
		if($_SESSION['login']){
			$sqlsel=('select idUsuario,senha,idTipoUsuario from usuario where idUsuario='.$_SESSION['id'].';');
	        $resul=mysqli_query($conexao,$sqlsel);
	        $con=mysqli_fetch_array($resul);
			if($con['idTipoUsuario']==2){
				$sqlsel_sala=('SELECT nome FROM sala WHERE idUsuario='.$con['idUsuario'].';');
				$resul_sala=mysqli_query($conexao,$sqlsel_sala);
				$conSala=mysqli_fetch_array($resul_sala);
				if(mysqli_num_rows($resul_sala)){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/sala_h.css">

		<link rel="stylesheet" type="text/css" href="css/cards.css">
		
		<link rel="stylesheet" type="text/css" href="css/scrolling-nav.css">
		
		<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		
		<link rel="shortcut icon" href="img/icon.ico" type="image/x-icon"/>

		<title><?php echo('Sala '.$conSala['nome']);?></title>		
		
		<style>	
		.navbar{
			background: #3c4759;
			border: none;
		} /*Rodapé*/

	.cor_clara_rodape{
	    background:#3c4759 !important;
	    border: none !important;
	    color: white !important;
	   
	}
	.cor_escura_rodape{
	    background: #29303c !important;
	    border: none !important;
	    border-radius: 0 !important;
	    color: white !important;
	}
	.espaco_rodape{
		padding-bottom: 3%;
	    padding-top: 3%;
	}
	.botao_margin{
		margin-top: 10%;
		margin-bottom: 10%;
	}
	.espaco_left_rodape{
		margin-left: 5%;
	}
	.espaco_right{
		margin-right: 5%;
	}
	.letra_grande_rodape{
		font-size:130%; 
	}
	.letra_cinza_rodape{
		color:gray;
	}
	.facebook{
		background: url('img/facebook.png');
		width: 40px;
		height: 40px;
	}
	.facebook:hover{
		background: url('img/facebook_branco.png');
		width: 40px;
		height: 40px;
	}
	.twitter{
		background: url('img/twitter.png');
		width: 40px;
		height: 40px;
	}
	.twitter:hover{
		background: url('img/twitter_branco.png');
		width: 40px;
		height: 40px;
	}
	.insta{
		background: url('img/instagram.png');
		width: 40px;
		height: 40px;
	}
	.insta:hover{
		background: url('img/instagram_branco.png');
		width: 40px;
		height: 40px;
	}
	.rede_social_rodape li{
		 float: left;
	    list-style: none;
	}

	.espaco_cabecalho_2{
		margin-top: 10.9%;
	}
/* Fecha Rodapé*/
ul{
	list-style:none;
	list-style-type: none; 
}
ol{
	list-style:none;
	list-style-type: none; 
}
li{
	list-style:none;
	list-style-type: none; 
}
		</style>
		
	
	</head>
	<body>
		<form action="#" method="POST" enctype="multipart/form-data">
	<?php 
		
		include('cabecalho_logado.php');

	?>
	
	
		<div id="tudo" class="espaco_cabecalho_2">
			<div id="esquerdo" > 
				<div id="nome_sala" ><p class="text-center">Classrom 
					<?php
						if(isset($_GET['id'])){

						$id=$_GET['id'];
						$sqlsel_nome=('SELECT * FROM sala WHERE id_sala="'.$id.'";');
						$resul_nome=mysqli_query($conexao,$sqlsel_nome);
						$con_nome=mysqli_fetch_array($resul_nome);
						echo($con_nome['nome']);	
					?>
					
				</p></div>
				<div id="nome_sala_membros"><p class="text-center">Membros</p></div>
				<div id="mostrar"><p>
						<div class="scroll">
						<?php

						$select_checagem=('SELECT idUsuario FROM sala_temporaria WHERE id_sala='.$id.';');
						$checagem=mysqli_query($conexao,$select_checagem);
						if(mysqli_num_rows($checagem)){
						
						$select_checagem=('SELECT idUsuario FROM sala_temporaria WHERE id_sala='.$id.';');
						$checagem=mysqli_query($conexao,$select_checagem);
						while($con_id=mysqli_fetch_array($checagem)){

						$select_usuario=('SELECT nome,imagem_usuario FROM usuario WHERE idUsuario='.$con_id['idUsuario'].';');
						$resul_usuario=mysqli_query($conexao,$select_usuario);

						while($con_usuario=mysqli_fetch_array($resul_usuario)){
							echo('<ul >
									<li class="iten_part">
										<img class="img-circle" src="img/upload/usuario/'.$con_usuario['imagem_usuario'].'" width="40px">
								'.$con_usuario['nome'].'
									</li>
								</ul>');
							}
						}

						}else
						{
							echo('<br><div class="col-xs-12"><h3 class="letra_amarela text-center">Nenhum aluno adicionado</h3></div>');
						}

							?>
						</div>
						 <p><input class="btn btn-lg btn-primary" type="submit" name="adc" role="button" id="adc_membro" value="Adicionar Membro"></p>
						 <p><button class="btn btn-lg btn-primary" type="submit"  name="ex" role="button" id="adc_membro_e">Excluir Membro</button></p>
						 <p><button class="btn btn-lg btn-primary" type="submit"  name="adc_arquivo"  id="adc_membro_e">Adicionar arquivo</button></p>
						 <p><button class="btn btn-lg btn-primary" type="submit"  name="ex_arquivos"  id="adc_membro_e">Excluir arquivo</button></p>
						</form>
						<p><button class="btn btn-lg " type="button"  name="excluir_sala"  id="adc_membro_e"  data-toggle="modal" data-target="#myModal_ex">Excluir sala</button></p>
						<form action="#" method="POST">
						

		<div class="modal fade" id="myModal_ex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-header cor_escura_rodape">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <h3 class="modal-title letra_amarela" id="myModalLabel">Digite sua senha para apagar a <?php echo($conSala['nome'])?>!</h3>
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
		       			 	<input type="submit" class="btn btn-primary botao_vermelho" value="Apagar sala" name="apagar">
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
		        $sqlex=('DELETE FROM sala WHERE idUsuario='.$_SESSION['id'].';');
		            mysqli_query($conexao,$sqlex);
		        $sqlex2=('DELETE FROM sala_temporaria WHERE idUsuario='.$_SESSION['id'].';');
		        	mysqli_query($conexao,$sqlex2);
		            echo('<script>window.alert("Sala excluida com sucesso!");window.location="home_professor.php";</script>');
		          }else{
		          	echo('<script>window.alert("Senhas diferentes!");</script>');
		          }
		    }
		    
	?>
				</p></div>
			</div>
<div class="col-xs-9 text-center">
				<?php
			if(isset($_POST['ex_arquivos'])){
				$sqlUsu='SELECT * FROM arquivos where id_sala='.$id.';';
				$resulUsu=mysqli_query($conexao,$sqlUsu);
				$conUsu=mysqli_fetch_array($resulUsu);	

				if(mysqli_num_rows($resulUsu)){
				$sqlArq=('SELECT * FROM arquivos WHERE id_sala='.$id.';');
				//echo('<h1>'.$sqlsel_adicionar.'</h1>');
				$resulArq=mysqli_query($conexao,$sqlArq);
				
						
						echo('<form action="#" method="POST"><table class="table text-center " >

									<thead class="letra_amarela text-center">
										<tr>
											<th class="text-center">Nome do arquivo</th>
											<th class="text-center">Assunto do arquivo</th>
											<th class="text-center"></th>
											
										</tr>
									</thead>			
									<tbody>');
									while($conArq=mysqli_fetch_array($resulArq))
									{							
												
										echo('<tr class="letra_amarela"><td>'.$conArq['arquivo'].'</td>');
										echo('<td>'.$conArq['assunto'].'</td>');
										echo('<td class="text-center"><input type="checkbox" name="ex_arq[]" value="'.$conArq['id_arquivo'].'"></td>');
										}
									echo('</tbody></table>
										<div class="col-xs-6">
											<input type="submit" name="ex_td" value="Excluir arquivo" class="btn botao_amarelo"></form>
										</div>');
			}else{
				echo('<h3 class="letra_amarela text-center">Nenhum arquivo encontrado!</h3>');
			}
		}

		if(isset($_POST['ex_td'])){

			  if (count($_POST['ex_arq'])) {
			       foreach ($_POST['ex_arq'] as $key => $selecionado) {
			        $usuario = $_POST['ex_arq'][$key];
					$sqldel=('DELETE FROM arquivos WHERE id_arquivo='.$usuario.';'); 
					mysqli_query($conexao,$sqldel);
					echo '<script>window.alert("Excluido com sucesso!");window.location="sala.php?id='.$id.'";</script>';	
					    }
			  }
			}
?>
</div>



			<?php

	if(isset($_POST['adc_arquivo'])){
		?>
		<div class="esp">
			<div class="col-xs-4">
				<input type="text" name="assunto" class="form-control" placeholder="Assunto">
			</div>
			<div class="col-xs-2">
				<div class="fileUpload btn btn-md botao_amarelo"/>
					<span>Arquivo</span>
					<input type="file" class="upload" name="arquivo" />
				</div>
			</div>
			<div class="col-xs-2">
			<input type="submit" name="enviar_arquivo" value="Enviar Arquivo" class="btn btn-md botao_amarelo">
			</div>
		</div>
		<?php
	}


	if(isset($_POST['enviar_arquivo']))
	{
		$assunto=$_POST['assunto'];
		$sqlsel=('SELECT * FROM usuario WHERE idUsuario="'.$_SESSION['id'].'";');
	    $resul=mysqli_query($conexao,$sqlsel);
	    $con=mysqli_fetch_array($resul);
		//UPANDO IMAGEM
	    $extensao=strtolower(substr($_FILES['arquivo']['name'], -4));
	    //echo('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1 class="letra_amarela">'.$extensao.'</h1>');
	    if($extensao=='docx'){
	    	$novo_nome=md5(time().$con['idUsuario']).'.'.$extensao;
	    }
	    elseif($extensao=='.pdf'||$extensao=='.jpg'||$extensao=='.png'||$extensao=='.gif'||$extensao=='.rar'||$extensao=='.tar'||$extensao=='.ppx'||$extensao=='.zip'||$extensao=='.doc')
	    {
	    	$novo_nome=md5(time().$con['idUsuario']).$extensao;	

	    }

	    $diretorio="img/upload/arquivo/";
	    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
	    //quando o php recebe um arquivo de upload ele é armazenado temporariamente em uma pasta com seus arquivos de sistema
	    $sqlin=('INSERT INTO arquivos(arquivo,assunto,data_arquivo,idUsuario,id_sala) VALUES ("'.$novo_nome.'","'.$assunto.'",NOW(),'.$_SESSION['id'].','.$id.');');
	    mysqli_query($conexao,$sqlin);
	    $sqlsel_sala=('SELECT * FROM sala WHERE idUsuario="'.$_SESSION['id'].'";');
		$resul_sala=mysqli_query($conexao,$sqlsel_sala);
		 while ($con_sala=mysqli_fetch_array($resul_sala)) {
	    echo('<script>window.alert("Arquivo cadastrado com sucesso!");window.location="sala.php?id="'.$con_sala['id_sala'].'";</script>');
				}
			}	
				
?>
	
			<!-- fim da parte esquerda e começo da parte de cima direita -->
			
			<div id="direito_cima" class="col-xs-3">
				<?php
			if(isset($_POST['ex'])){
				$sqlUsu='SELECT idUsuario FROM sala_temporaria where id_sala='.$id.';';
				$resulUsu=mysqli_query($conexao,$sqlUsu);
				$conUsu=mysqli_fetch_array($resulUsu);
				
				if(mysqli_num_rows($resulUsu)){
				$sqlsel_adicionar=('SELECT * FROM usuario WHERE idTipoUsuario=1 AND idUsuario='.$conUsu['idUsuario'].';');
				//echo('<h1>'.$sqlsel_adicionar.'</h1>');
				$resul_adicionar=mysqli_query($conexao,$sqlsel_adicionar);
				
						
						echo('<form action="#" method="POST"><table class="table text-center " >

									<thead class="letra_amarela text-center">
										<tr>
											<th class="text-center">Nome</th>
											<th class="text-center">Sobrenome</th>
											<th class="text-center">E-mail</th>
											<th class="text-center">Telefone</th>
											<th class="text-center">Data de nascimento</th>
											<th class="text-center">Adicionar</th>
										</tr>
									</thead>			
									<tbody>');
									while($con_adicionar=mysqli_fetch_array($resul_adicionar))
									{							
												
										echo('<tr class="letra_branca"><td>'.$con_adicionar['nome'].'</td>');
										echo('<td>'.$con_adicionar['sobrenome'].'</td>');
										echo('<td>'.$con_adicionar['email'].'</td>');
										echo('<td>'.$con_adicionar['telefone'].'</td>');
										echo('<td>'.$con_adicionar['dt_nasc'].'</td>');
										echo('<td class="text-center"><input type="checkbox" name="adc_usuario[]" value="'.$con_adicionar['idUsuario'].'"></td>');
										}
									echo('</tbody></table>
										<div class="col-xs-6">
											<input type="hidden" name="id_usu" value="'.$con_adicionar['idUsuario'].'">
											<input type="submit" name="ex_usuario" value="Excluir usuario" class="btn botao_amarelo"></form>
										</div>');
			}else{
				echo('<h3 class="letra_amarela text-center">Nenhum usuario encontrado!</h3>');
			}
		}
			if(isset($_POST['ex_usuario'])){
			$sqlsel_adicionar=('SELECT * FROM usuario WHERE idTipoUsuario=1;');
			$resul_adicionar=mysqli_query($conexao,$sqlsel_adicionar);	
			$con_adicionar=mysqli_fetch_array($resul_adicionar);
			
			$id_usu=$_POST['id_usu'];
			$select_quant=('SELECT * FROM usuario WHERE idUsuario='.$con_adicionar['idUsuario'].';');
			$resul_quant=mysqli_query($conexao,$select_quant);
			$adc_usuario=$_POST['adc_usuario'];				
			  if (count($_POST['adc_usuario'])) {
			       foreach ($_POST['adc_usuario'] as $key => $selecionado) {
			        $usuario = $_POST['adc_usuario'][$key];
			        $select_sala=('SELECT * FROM sala WHERE id_sala="'.$id.'";');
					$resul_sala=mysqli_query($conexao,$select_sala);
					$con_sala=mysqli_fetch_array($resul_sala);
					$sqldel=('DELETE FROM sala_temporaria WHERE idUsuario='.$usuario.''); 
					mysqli_query($conexao,$sqldel);
			      }
			  }

			
			echo('<script>window.alert("Excluido com sucesso!");window.location="sala.php?id='.$id.'";</script>');
			}
			if(isset($_POST['adc'])){
				echo('
						<form action="#" method="POST">
								<div class="row">
									<div class="col-xs-8">
										<label for="pesq" class="control-label letra_branca">Buscar Usuário:</label>
										<input class="form-control" name="pesq" type="text">
									</div>
									<div class="col-xs-2">
										<label for="pesquisar" class="control-label letra_branca">&nbsp;</label><br>
										<input class="btn btn-md btn-primary" name="pesquisar" value="Pesquisar" type="submit">
									</div>
								</div>
							</form>
					');
				}
				if(isset($_POST['pesquisar'])){
				$nome=$_POST['pesq'];
				$sqlsel_adicionar=('SELECT * FROM usuario WHERE idTipoUsuario=1 and nome like "%'.$nome.'%";');
				$resul_adicionar=mysqli_query($conexao,$sqlsel_adicionar);
						if(mysqli_num_rows($resul_adicionar)){
						echo('
							<form action="#" method="POST"><table class="table text-center " >
									<thead class="letra_amarela text-center">
										<tr>
											<th class="text-center">Nome</th>
											<th class="text-center">Sobrenome</th>
											<th class="text-center">E-mail</th>
											<th class="text-center">Telefone</th>
											<th class="text-center">Data de nascimento</th>
											<th class="text-center">Adicionar</th>
										</tr>
									</thead>			
									<tbody>');
									while($con_adicionar=mysqli_fetch_array($resul_adicionar))
									{							
												
										echo('<tr class="letra_branca"><td>'.$con_adicionar['nome'].'</td>');
										echo('<td>'.$con_adicionar['sobrenome'].'</td>');
										echo('<td>'.$con_adicionar['email'].'</td>');
										echo('<td>'.$con_adicionar['telefone'].'</td>');
										echo('<td>'.$con_adicionar['dt_nasc'].'</td>');
										echo('<td class="text-center"><input type="checkbox" name="adc_usuario[]" value="'.$con_adicionar['idUsuario'].'"</td>');
										}
									echo('</tbody></table>
										<div class="col-xs-6">
											<input type="hidden" name="id_usu" value="'.$con_adicionar['idUsuario'].'">
											<input type="submit" name="adicionar_usuario" value="Adicionar usuario" class="btn botao_amarelo"></form>
										</div>');
								
				}
				else
				{
					echo '<h3 class="letra_amarela text-center">Nenhum usuário encontrado!</h3>';
				}
			
			}
			if(isset($_POST['adicionar_usuario'])){

			$sqlsel_adicionar=('SELECT * FROM usuario WHERE idTipoUsuario=1;');
			$resul_adicionar=mysqli_query($conexao,$sqlsel_adicionar);	
			$con_adicionar=mysqli_fetch_array($resul_adicionar);
			
			$id_usu=$_POST['id_usu'];
			$select_quant=('SELECT * FROM usuario WHERE idUsuario='.$con_adicionar['idUsuario'].';');
			$resul_quant=mysqli_query($conexao,$select_quant);
			
			$select_usuario= 'SELECT idUsuario FROM sala_temporaria;';
			$resul_usuario=mysqli_query($conexao,$select_usuario);
			$conUsu=mysqli_fetch_array($resul_usuario);

			$adc_usuario=$_POST['adc_usuario'];	
			if($_POST['adc_usuario']==$conUsu['idUsuario']){
				echo ('<script>window.alert("Usuário já cadastrado!");window.location="sala.php?id='.$id.'";</script>');
			}
			elseif($_POST['adc_usuario']==!$conUsu['idUsuario'])
			{

			  if (count($_POST['adc_usuario'])) {
			       foreach ($_POST['adc_usuario'] as $key => $selecionado) {
			        $usuario = $_POST['adc_usuario'][$key];
			        $select_sala=('SELECT * FROM sala WHERE id_sala='.$id.';');
					$resul_sala=mysqli_query($conexao,$select_sala);
					$con_sala=mysqli_fetch_array($resul_sala);
					$sqlin_usuario=('INSERT INTO sala_temporaria(id_sala,idUsuario) VALUES ('.$con_sala['id_sala'].','.$usuario.');'); 
					mysqli_query($conexao,$sqlin_usuario);
					echo('<script>window.alert("Adicionado com sucesso!");window.location="sala.php?id='.$id.'";</script>');
			      }
			  }
			
			}
		}	
			?>
				<br>
				<br>
				<div id="titulo_direita_topo"><h1>Arquivos Enviados</h1></div>
				<div id="titulo_direita_topo_pagina">Professor <?php
						$sqlsel_nome=('SELECT * FROM sala WHERE id_sala="'.$id.'";');
						$resul_nome=mysqli_query($conexao,$sqlsel_nome);
						$con_nome=mysqli_fetch_array($resul_nome);
						$select_prof=('SELECT * FROM usuario WHERE idUsuario='.$con_nome['idUsuario'].';');
						$resul_prof=mysqli_query($conexao,$select_prof);
						$con_prof=mysqli_fetch_array($resul_prof);
						echo($con_prof['nome']);
				?></div>
				<div class="scroll_direita">
							<ul id="lista_participantes_direita">
				<?php
				 $select_arquivos=('SELECT * FROM arquivos WHERE id_sala='.$id.';');
				 $resul_arquivos=mysqli_query($conexao,$select_arquivos);
				 if(mysqli_num_rows($resul_arquivos)){
				 while($con_arquivos=mysqli_fetch_array($resul_arquivos)){
				 
					$file='img/upload/arquivos/';
					echo('
						<form action="download.php" method="GET">
							<div class="row">
								<div class="col-xs-4 ">
									<img src="img/arquivo.png" width="40px">
								</div>
								<div class="col-xs-4">
									<h3 class=" letra_amarela">
										&nbsp;&nbsp;'.$con_arquivos['assunto'].'
									</h3>
								</div>
								<div class="col-xs-4 ">
									<br>
									
										<input type="hidden" name="file" value="'.$file.'">
										<input type="hidden" name="nome" value="'.$con_arquivos['arquivo'].'">
									<button class="btn-link btn" name="download" type="submit">
										Download
									</button>
								</div>
							</div>
						</form>
						');

			}
		}else{
			echo('<h2 class="letra_amarela">Nenhum arquivo enviado</h2>');
		}
	}
				?>
				</ul>
				</div>
			</div>
			<!-- fim da parte de cima direita e começo da parte de baixo direita -->
			<div id="direito_baixo">
				
					
			<!-- Abre o CAlendarioooooooooooooooooooooooooooooooooooooo -->					
					
<div class="espaco_cabecalho">
  	<div class="container-fluid">
  		<div class="row">
  			<form action="#" method="POST">
  				<div class="form-group text-center">
  					<br>
  					<label for="adc_compromisso" class="control-label">
  						Adicionar compromisso:
  						<input type="submit" name="adc_compromisso" class="btn btn-md botao_amarelo" value="Adicione um novo compromisso">
  					</label>
  				</div>
  			</form>
  			<?php
  			if(isset($_POST['adc_compromisso'])){
  			?>
  			<form action="#" method="POST">
  			<label class="control-label" for="tipo_comp">&nbsp;&nbsp;&nbsp;&nbsp;Tipo compromisso:</label>
              <div class="form-group">

                <div class="col-xs-6">
                      <input type="radio" class="lado_direito " name="tipo_comp" id="Escolar" value="Escolar" checked="">
                      <label for="Escolar" class="lado_direito_sexo text-center"> Escolar</label>
                </div>
                <div class="col-xs-6 direita_cadastro">
                      <input type="radio" class="centro_radio direita_cadastro" id="Pessoal" name="tipo_comp" value="Pessoal">
                      <label for="Pessoal" class="meio text-center">  Pessoal </label>
                </div>
              </div>
  			<div class="form-group">
  				<div class="col-xs-6">
  					<label class="control-label" for="nome_comp">Nome compromisso:</label>
  					<input type="text" name="nome_comp" class="form-control" placeholder="Ex: Prova">
  				</div>
  				<div class="col-xs-6">
  					<label class="control-label" for="desc_comp">Descrição compromisso:</label>
  					<input type="text" name="desc_comp" class="form-control" placeholder="Ex: Prova de Matemática, a matéria será numeros complexos!">
  				</div>
  			</div>
  			<label class="control-label" for="dt_nasc">&nbsp;&nbsp;&nbsp;&nbsp;Data do compromisso: </label>
            <div class="form-group">
              <div class="col-xs-4">
                    <select name="dia" class="form-control select">
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                      <option value="06">06</option>
                      <option value="07">07</option>
                      <option value="08">08</option>
                      <option value="09">09</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <select name="mes" class="form-control select">
                      <option value="01">Janeiro</option>
                      <option value="02">Fevereiro</option>
                      <option value="03">Março</option>
                      <option value="04">Abril</option>
                      <option value="05">Maio</option>
                      <option value="06">Junho</option>
                      <option value="07">Julho</option>
                      <option value="08">Agosto</option>
                      <option value="09">Setembro</option>
                      <option value="10">Outubro</option>
                      <option value="11">Novembro</option>
                      <option value="12">Dezembro</option>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <select name="ano" class="form-control select">
                      <option value="1970">1970</option>
                      <option value="1971">1971</option>
                      <option value="1972">1972</option>
                      <option value="1973">1973</option>
                      <option value="1974">1974</option>
                      <option value="1975">1975</option>
                      <option value="1976">1976</option>
                      <option value="1977">1977</option>
                      <option value="1978">1978</option>
                      <option value="1979">1979</option>
                      <option value="1980">1980</option>
                      <option value="1981">1981</option>
                      <option value="1982">1982</option>
                      <option value="1983">1983</option>
                      <option value="1984">1984</option>
                      <option value="1985">1985</option>
                      <option value="1986">1986</option>
                      <option value="1987">1987</option>
                      <option value="1988">1988</option>
                      <option value="1989">1989</option>
                      <option value="1990">1990</option>
                      <option value="1991">1991</option>
                      <option value="1992">1992</option>
                      <option value="1993">1993</option>
                      <option value="1994">1994</option>
                      <option value="1995">1995</option>
                      <option value="1996">1996</option>
                      <option value="1997">1997</option>
                      <option value="1998">1998</option>
                      <option value="1999">1999</option>
                      <option value="2000">2000</option>
                      <option value="2001">2001</option>
                      <option value="2002">2002</option>
                      <option value="2003">2003</option>
                      <option value="2004">2004</option>
                      <option value="2005">2005</option>
                      <option value="2006">2006</option>
                      <option value="2007">2007</option>
                      <option value="2008">2008</option>
                      <option value="2009">2009</option>
                      <option value="2010">2010</option>
                      <option value="2011">2011</option>
                      <option value="2012">2012</option>
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                    </select>
                </div>
              </div>
              <br>
              <br>
              <div class="form-group">
              	<div class=" col-xs-offset-2 col-xs-10">
              		<input type="submit" name="enviar_comp" class="btn btn-md botao_amarelo" value="Cadastrar compromisso">
              	</div>
              </div>
  			</form>
  			<?php
  			}
  			if(isset($_POST['enviar_comp'])){
          if(empty($nome)&&empty($desc)){
  				$dt_nasc[0]=$_POST['ano'];
		        $dt_nasc[1]=$_POST['mes'];
		        $dt_nasc[2]=$_POST['dia'];
		        $dt_nascf=implode('-',$dt_nasc);
		        $nome=$_POST['nome_comp'];
		        $desc=$_POST['desc_comp'];
		        $tipo=$_POST['tipo_comp'];
		        $sqlin=('INSERT INTO compromissos (nome,descricao,data,tipo,idUsuario) VALUES ("'.$nome.'","'.$desc.'","'.$dt_nascf.'","'.$tipo.'",'.$_SESSION['id'].');');
		        mysqli_query($conexao,$sqlin);
		        echo('<script>window.alert("Comprimisso registrado com sucesso!");window.location="agenda.php";</script>');
  			 }
         else
         {
          echo('<script>window.alert("Preencha todos os campos!");window.location="agenda.php";</script>');
         }
        }

  			?>
  		</div>
  	</div>
</div>
<div class="">
<?php
  		$sqlsel_card=('SELECT * FROM compromissos WHERE idUsuario='.$_SESSION['id'].' ORDER BY data DESC;');
  		$resul_card=mysqli_query($conexao,$sqlsel_card);
if(mysqli_num_rows($resul_card)){
    //echo('<h1 class="">'.$sqlsel_card.'</h1>');
    if(mysqli_num_rows($resul_card)>=1){
       $total_reg=4;
      @	$paginas=$_GET['pagina'];
      if (!empty($paginas)) {
      $pc = 1;
      } else {
      $pc = $paginas;
      }
     // echo $pc.'<br>';
      $inicio = $pc ;
      
     // echo $inicio;
      $inicio = $inicio * $total_reg;
      $sqlsel_pag=('SELECT * FROM compromissos WHERE idUsuario='.$_SESSION['id'].' ORDER BY data DESC LIMIT '.$inicio.','.$total_reg.';');
     // echo('<h1>'.$sqlsel_pag.'</h1>');
      $limite = mysqli_query($conexao,$sqlsel_pag);
      $todos = mysqli_query($conexao,$sqlsel_card);
      $tr = mysqli_num_rows($todos); // verifica o número total de registros
      $tp = $tr / $total_reg; // verifica o número total de páginas
      
          // vamos criar a visualização
           
        echo('<div class="container-fluid">
            <div class="row">
              <div class="col-xs-12">
          ');
      while($con_card=mysqli_fetch_array($limite)){
        $data=explode('-',$con_card['data']);
        if($data[1]==1){
          $mes="Janeiro";
        }
        elseif($data[1]==2)
        {
          $mes="Fevereiro";
        }
        elseif($data[1]==3)
        {
          $mes="Março";
        }
        elseif($data[1]==4)
        {
          $mes="Abril";
        }
        elseif($data[1]==5)
        {
          $mes="Maio";
        }
        elseif($data[1]==6)
        {
          $mes="Junho";
        }
        elseif($data[1]==7)
        {
          $mes="Julho";
        }
        elseif($data[1]==8)
        {
          $mes="Agosto";
        }
        elseif($data[1]==9)
        {
          $mes="Setembro";
        }
        elseif($data[1]==10)
        {
          $mes="Outubro";
        }
        elseif($data[1]==11)
        {
          $mes="Novembro";
        }
        elseif($data[1]==12)
        {
          $mes="Dezembro";
        }

        echo('
            <div class="card-container col-xs-3">
            <div class="card ">
              <div class="card-image"></div>
              <div class="card-info">
                <div class="card-title letra_amarela">'.$con_card['nome'].'</div>
                <div class="card-detail">'.$con_card['descricao'].'</div>
              </div>
              <div class="card-social">
                <b class="alinha_letra">
                  <span class="letra_branca">Dia</span>
                  <span class="letra_amarela">'.$data[2].'</span>
                  <span class="letra_branca"> de </span>
                  <span class="letra_amarela">'.$mes.'</span>
                </b>
              </div>
            </div>
          </div>
        ');
      }
      echo('</div></div></div>');
    
  }
    
     
      // agora vamos criar os botões "Anterior e próximo"
      $anterior = $pc -1;
      $proximo = $pc +1;
     
      
      if ($pc<=$tp) {
      echo " <div class='letra_amarela text-center'><a href='agenda.php?pagina=$proximo' class='btn btn-md btn-primary text-center'> Data +></a></div><br>";
      }
    }else
    {
    echo('<br>
  <br>
  <br>
  <br>
  <h3 class="letra_amarela text-center">Nenhum compromisso encontrado!</h3><br>
  <br>
  <br>');
    }
  		?>
</div>	

			<!-- Final do CAlendarioooooooooooooooooooooooooooooooooooooo -->			

					
					
				</div>
			</div>
<?php
	}
				else
				{
					echo('<script>window.location="home_aluno.php";</script>');
				}
			
			}
			else if($con['idTipoUsuario']==2) 
			{
				echo('<script>window.location="home_professor.php";</script>');
			}
			else if($con['idTipoUsuario']==3)
			{
				echo('<script>window.location="admin.php";</script>');
			}
		}
		else
		{
			echo('<script>window.location="index.php";</script>');
		}

	include('rodape_logado.php');	
?>
	 <!-- Scrolling Nav JavaScript -->
    
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery-3.2.1.js"></script>
    
    <script src="js/scrolling-nav.js"></script>

    
    <!-- jQuery (necessary JavaScript plugins) -->
	
	<script src="js/bootstrap.js"></script>

	</body>
</html>
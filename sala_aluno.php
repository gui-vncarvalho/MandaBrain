
<?php
	include('conexao.php');
		session_start();
		if($_SESSION['login']){
		$sqlsel=('SELECT * FROM usuario WHERE idUsuario='.$_SESSION['id'].';');
        $resul=mysqli_query($conexao,$sqlsel);
        $con=mysqli_fetch_array($resul);
	        if($con['idTipoUsuario']==1){
	        	$sqlsel_sala=('SELECT id_sala FROM sala_temporaria WHERE idUsuario='.$con['idUsuario'].';');
				$resul_sala=mysqli_query($conexao,$sqlsel_sala);
				$conSala=mysqli_fetch_array($resul_sala);
				if(mysqli_num_rows($resul_sala)){
					?>

<!DOCTYPE >
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/sala_h.css">

		<link rel="stylesheet" type="text/css" href="css/cards.css">
		
		<link rel="stylesheet" type="text/css" href="css/scrolling-nav.css">
		
		<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
		
		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		
		<link rel="shortcut icon" href="img/icon.ico" type="image/x-icon"/>

		<script src="js/perfect-scrollar.min.js"></script>
		
		<title><?php echo('Sala '.$conSala['nome']);?></title>

		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		
		
		<script>
			function n(){
				$("#ap").css('display', 'block');
				$("#tp").css('display', 'block');
				$("#n").css('display', 'block');
			}
		</script>
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
	.espaco_cabecalho{
	    padding-top: 0%;

	}
	.espaco_cabecalho_2{
		margin-top: 8.1%;
	}
/* Fecha Rodapé*/
		</style>
		
		

		
		
	</head>
	<body>
		<form action="#" method="POST">
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
				<div id="nome_sala_membros"><p class="text-center">Professores</p></div>
				<div id="mostrar"><p>
						<div class="scroll">
						<?php

						$select_checagem=('SELECT idUsuario FROM sala WHERE id_sala='.$id.';');
						$checagem=mysqli_query($conexao,$select_checagem);
						if(mysqli_num_rows($checagem)){
						
						$select_checagem=('SELECT idUsuario FROM sala WHERE id_sala='.$id.';');
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
					</p>
				</div>
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
					</p>
				</div>
			</form>
		</div>
			<!-- fim da parte esquerda e começo da parte de cima direita -->
			
			<div id="direito_cima" class="col-xs-3">
				<br><br>
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

					
					
			}
		
		else{
			echo('<h2 class="letra_amarela">Nenhum arquivo enviado</h2>');
		}
	}
		}
		
    
				?>
				</ul>
				</div>			</div>
			<!-- fim da parte de cima direita e começo da parte de baixo direita -->
			<div id="direito_baixo">
				

					
					
					
					
				
			<!-- Abre o CAlendarioooooooooooooooooooooooooooooooooooooo -->					
					
<div class="espaco_cabecalho">
  	<div class="container-fluid">
  		<div class="row">
  			<form action="#" method="POST">
  				<div class="form-group text-center">
  					<br>
  					<label for="adc_compromisso" arclass="control-label">
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
		
		
		else
		{
			echo('<script>window.location="index.php";</script>');
		}
		
	

	include('rodape_logado.php');	
?>
	 <!-- Scrolling Nav JavaScript -->
    
    <script src="js/jquery.easing.min.js"></script>
    
    <script src="js/scrolling-nav.js"></script>

    
    <!-- jQuery (necessary JavaScript plugins) -->
	
	<script src="js/bootstrap.js"></script>

	</body>
</html>
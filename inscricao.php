<?php
	include('conexao.php');
		session_start();
		if($_SESSION['login']){
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<title>Inscrição</title>

		<meta charset="utf-8"/>
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen"/>
        
        <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen"/>

        <link href="css/scrolling-nav.css" rel="stylesheet">

        <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon"/>     

        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

        <style type="text/css">.navbar {
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
	<section id="normal" class="espaco_cabecalho">
		<div class="container-fluid">
			<div class="row fundo_inscricao" >
				
				<div class="col-xs-offset-6 col-xs-6">
					<h1 class="letra_amarela centro">Antes precisamos de alguns dados</h1>
				<form>
					<label class="control-label" for="nome">Nome: </label>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1"><img src="img\icones\admin\user.png" width="20px"></span>
					  <input type="text" name="nome" class="form-control" placeholder="João Vitor"/>
					</div>

					<label class="control-label" for="CPF">CPF: </label>
					<div class="input-group">
  						<span class="input-group-addon" id="basic-addon1"><img src="img\icones\inscricao\cpf.png" width="20px"></span></span>
  						<input type="text" name="cpf" class="form-control" placeholder="123.123.123-x"/>
					</div>
					
					<label class="control-label" for="dt_nasc">Data de nascimento: </label>
					<div class="input-group">
  						<span class="input-group-addon" id="basic-addon1"><img src="img\icones\inscricao\dt_nasc.png" width="20px"></span>
  						<input type="text" name="dt_nasc" class="form-control" placeholder="22/12/99"/>
					</div>
					

					<label class="control-label" for="email">Email: </label>
					<div class="input-group">
  						<span class="input-group-addon" id="basic-addon1"><img src="img\icones\inscricao\email.png" width="20px"></span>
  						<input type="text" name="email" class="form-control" placeholder="joao.vitor@hotmail.com"/>
					</div>
					

					<label class="control-label" for="telefone">Telefone: </label>
					<div class="input-group">
  						<span class="input-group-addon" id="basic-addon1"><img src="img\icones\inscricao\telefone.png" width="20px"></span>
  						<input type="text" name="telefone" class="form-control" placeholder="(11)99672-8386"/>
					</div>
					

					<label class="control-label" for="CEP">CEP</label>
					<div class="input-group">
  						<span class="input-group-addon" id="basic-addon1"><img src="img\icones\inscricao\cep.png" width="20px"></span>
  						<input type="text" name="CEP" class="form-control" placeholder="07500-000"/>
					</div>
					

					<div class="col-xs-6 espaco_left_mesma_linha">
						<!-- Estado -->
						<label class="control-label" for="estado">Estado: </label>
						<div class="input-group">
	  						<span class="input-group-addon" id="basic-addon1"><img src="img\icones\inscricao\estado.png" width="20px"></span>
	  						<select id="estados" class="form-control">
								<option value=""></option>
							</select>
						</div>
					</div>

					<div class="col-xs-6 espaco_right_mesma_linha">
						<label class="control-label" for="cidade">Cidade: </label>
						<div class="input-group">
	  						<span class="input-group-addon" id="basic-addon1"><img src="img\icones\inscricao\cidade.png" width="20px"></span>
	  						<select id="cidades" class="form-control">
							</select>
						</div>
							
					</div>

					<label class="control-label" for="rua">Rua: </label>
					<div class="input-group">
  						<span class="input-group-addon" id="basic-addon1"><img src="img\icones\inscricao\rua.png" width="20px"></span>
  						<input type="text" name="rua" class="form-control" placeholder="Rua Iara"/>
					</div>
					

					<div class="col-xs-6 espaco_left_mesma_linha">
						<label class="control-label" for="numero">Número: </label>
						<div class="input-group">
	  						<span class="input-group-addon" id="basic-addon1"><img src="img\icones\inscricao\numero.png" width="20px"></span>
	  						<input type="text" name="rua" class="form-control" placeholder="215"/>
						</div>
						
					</div>
					<div class="col-xs-6 espaco_right_mesma_linha">
						<label class="control-label" for="complemento">Complemento: </label>
						<div class="input-group">
	  						<span class="input-group-addon" id="basic-addon1"><img src="img\icones\inscricao\complemento.png" width="20px"></span>
	  						<input type="text" name="complemento" class="form-control" placeholder="Casa de Ferramentas Martins"/>
						</div>
						
					</div>

					<label class="control-label" for="bairro">Bairro: </label>
						<div class="input-group">
	  						<span class="input-group-addon" id="basic-addon1"><img src="img\icones\inscricao\bairro.png" width="20px"></span>
	  						<input type="text" name="bairro" class="form-control" placeholder="13 de maio"/>
						</div>
					

					 <div class="checkbox">
					    <label class="control-label" for="termos_uso">
					      <input type="checkbox" checked> Termos de uso
					    </label>
					 </div>

					 <div class="checkbox">
					    <label class="control-label" for="termos_uso">
					      <input type="checkbox" checked> Receber novidade do MandaBrain
					    </label>
					 </div>

					<div class="col-xs-12">
						<button type="button" class="btn btn-warning tamanho_100 " onclick="validation();" name="inscricao">Cadastrar</button>	
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="js/estados.js"></script>
        
   	<script type="text/javascript" src="js/bootstrap.min.js"></script>
   
    <!-- Scrolling Nav JavaScript -->
    
	<script type="text/javascript" src="js/jquery.easing.min.js"></script>
	    
	<script type="text/javascript" src="js/scrolling-nav.js"></script>

	<script type="text/javascript" src="js/sweetalert.min.js"></script>

	<script type="text/javascript">
		function validation(){
			swal({ 
				title: "Cadastrado!", 
				text: "Seu cadastro foi realizado com sucesso!", 
				type: "success"});
		}
	</script>

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
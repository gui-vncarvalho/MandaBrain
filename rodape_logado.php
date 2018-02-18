<footer class="footer">
	<div class="panel-default cor_escura_rodape">
	  <div class="panel-body">
	    <div class="col-xs-12 ">
	        <div class="col-xs-3">
	            <span class=""><img class="img-responsive" src="img/logo.png"/></span>
	        </div>
	        <div class="col-xs-offset-1 col-xs-5">
	         <?php   
	         	$sqlsel=('select idUsuario,senha,idTipoUsuario from usuario where email="'.$_SESSION['login'].'";');
                             $resul=mysqli_query($conexao,$sqlsel);
                             $con=mysqli_fetch_array($resul);
                             $_SESSION['id']=$con['idUsuario'];
                            if($con['idTipoUsuario']==1){
                                echo(' <a href="home_aluno.php" class="btn btn-link">Home</a>');
                            }else if($con['idTipoUsuario']==2){
                                echo(' <a href="home_professor.php" class="btn btn-link">Home</a>');
                            }else{
                                echo(' <a href="admin.php" class="btn btn-link">Home</a>');
                            }
	        ?>
	            <a href="agenda.php" class="btn btn-link">Agenda</a>
	            <a href="conteudo.php" class="btn btn-link">Conteúdos</a>
	            <a href="desconto.php" class="btn btn-link">Bolsas</a>

	     
	        </div>
	        <div class="col-xs-3">
				<ul class="rede_social_rodape">	
		        	<a href="https://pt-br.facebook.com/"><li class="espaco_left_rodape facebook"></li></a>
		        	<a href="https://www.instagram.com/?hl=pt-br"><li class="espaco_left_rodape insta"></li></a>
		        	<a href="https://twitter.com/login?lang=pt"><li class="espaco_left_rodape twitter"></li></a>
	        	</ul>
			</div>
			
	    </div>
	  </div>
	  <div class="container-fluid cor_clara_rodape">
		  	<div class="row">
		        <div class="col-xs-12 espaco_rodape ">
		            <div class=" col-xs-3 ">
		              <h4>Receba novidades em seu e-mail</h4>
		            </div>    
			            <div class="col-xs-6 ">
			            	<input class="form-control" placeholder="Digite aqui seu e-mail"> 
			            </div>
			            <div class="col-xs-3">
			            	<button class="btn btn-warning botao_amarelo" type="button">Enviar</button>
			            </div>
		    	</div>
		    </div>
		</div>
			<div class="container-fluid cor_clara_rodape">
				<div class="row">
					<div class="col-xs-4">
					</div>
					<div class="col-xs-4 letra_cinza_rodape">
						&copy; 2017 MandaBrain-Todos os direitos reservados.
					</div>
					<div class="col-xs-4">
					</div>
				</div>
			</div>
	 </div>
</footer>
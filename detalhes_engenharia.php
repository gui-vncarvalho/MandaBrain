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
		include('cabecalho_logado.php');
	?>
		<div class="container-fluid  espaco_cabecalho">
			<div class="form-group text-center">
					<h1>A bolsa de 60% no curso de <b>Engenharia Química</b> é perfeita para você</h1>
			</div>
			<div class="row text-center">
				<h1><img class="img-responsive" src="img/faculdades/quimica.jpg"</h1>
			</div>

			<div class="row">
				<div class="form-group text-center">
					<h1>Informações do curso</h1>
				</div>
				
				<div class="col-xs-12 form-group text-justify">
					Física, matemática e, principalmente, química, estão presentes em todo o curso. Os recentes avanços da biotecnologia faz com que disciplinas relacionadas é Ciências Biológicas sejam aos poucos incorporadas ao currículo. A partir do terceiro ano, o conhecimento adquirido nessas disciplinas passa a ser aplicado a processos físico-químicos, nos quais o aluno aprende a identificar as reações, a analisar e a purificar compostos químicos e a projetar equipamentos relacionados com as diversas transformações que ocorrem na indústria química. As aulas em laboratório, inclusive nos de informática, ocupam parte significativa da carga horária. O estágio e o trabalho de conclusão de curso são obrigatórios. Atenção: a Furg, em Santo António da Patrulha (RS), oferece o curso de Engenharia Agroindustrial Agroquímica, que forma o profissional que vai atuar na indústria química ligada á agroindústria (fertilizantes, papel, celulose, resinas, biocombustíveis etc.). A FTC, em Salvador (BA), tem á base em petróleo e g.
				</div>
			</div>

			<div class="row text-center ">
				<div class="col-xs-12 fundo_rosa_detalhes_curso ">
					<div class="form-group ">
						<h1 class="letra_branca"></h1>
					</div>

					 <div class="col-xs-4 col-xs-offset-1">
                            <div class="panel panel-success">
                                <div class="panel-heading ">
                                	<h3 class="text-center">Valor <b>sem</b> MandaBrain</h3>
                                    <center><img class="img-responsive" src="img/icones/ebooks/dinheiro.png" width="250" width="224"></center>
                                </div>
                                <div class="panel-body">
                                   <h3 class="text-center">R$1500,00</h3>
                                    <br>
                                </div>
                            </div>
                        </div>

                         <div class="col-xs-4 col-xs-offset-2">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                <h3 class="text-center">Valor <b>com</b> MandaBrain</h3>
                                    <center><img class="img-responsive" src="img/icones/ebooks/dinheiro.png" width="250" width="224"></center>
                                </div>
                                <div class="panel-body">
                                    <h3 class="text-center">R$750,00</h3>
                                    <br>
                                </div>
                            </div>
                        </div>

					<div class="form-group">
						<div class="col-xs-8 col-xs-offset-2 espaco_bot">
							<!-- Bot? buscar -->
							 	<input type="submit" class="btn btn-lg btn-warning botao_buscar_desconto" name="buscar" value="Garanta já sua bolsa"/>
						</div>
					</div>
				</div>
			</div>

			<div class="row text-center letra_branca">
				<div class="col-xs-12 fundo_azul_detalhes_curso  bordas">
					<div class="form-group">
						<h1><b>Endereço</b></h1>
					</div>
						<?php
							include('api_maps.php');
						?>
						<div class="glyphicon glyphicon-home">  Rua Doutor Almeida Lima, 1134, São Paulo</div>?<br>
						<div class="glyphicon glyphicon-earphone">  (11) 4007-1192</div><br>
						<div>De segunda a sexta, das 8h ás 21h e, sábado, das 8h ás 15h</div>
				</div>
			</div>
			<div class="row text-center">
                    <div class="col-xs-12">

                        <h1>Confira mais bolsas oferecidas pela Anhembi Morumbi</h1>

                        <br><br>

                        <div class="col-xs-4">
                            <div class="panel panel-success ebooks_section_color">
                                <div class="panel-heading">
                                    <img src="img/faculdades/fam.jpg" width="250" height="223">
                                </div>
                                <div class="panel-body">
                                    <h3>10% no curso de Fonoaudiologia</h3>
									<h3>De R$500,00 por R$450,00 </h3>
                                    <button class="btn btn-lg botao_amarelo"> Confira já</button>
                                </div>
                            </div>
                        </div>
                    

                        <div class="col-xs-4">
                            <div class="panel panel-success ebooks_section_color">
                                <div class="panel-heading">
                                    <img src="img/faculdades/mackenzie.jpg" width="250" height="223">
                                </div>
                                <div class="panel-body">
                                    <h3>50% no curso de Jornalismo</h3>
									<h3>De R$500,00 por R$250,00 </h3>
                                    <button class="btn btn-lg botao_amarelo"> Confira já</button>
                                </div>
                            </div>
                        </div>
                    

                        <div class="col-xs-4">
                            <div class="panel panel-success ebooks_section_color">
                                <div class="panel-heading ">
                                    <img src="img/faculdades/cruzeirodosul.jpg" width="250" height="223">
                                </div>
                                <div class="panel-body ">
                                    <h3>20% no curso de Pedagogia</h3>
                                    
									<h3>De R$200,00 por R$180,00 </h3>
                                    <button class="btn btn-lg botao_amarelo"> Confira já</button>
                                </div>
                            </div>
                        </div>

                    </div>
                   
                </div>
		</div>
	<script src="js/jquery-3.2.1.min.js"></script>
        
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    
    <script src="js/jquery.easing.min.js"></script>
    
    <script src="js/scrolling-nav.js"></script>
	<?php
		include('rodape.php');
	?>
	</body>
</html>
<?php
 $conexao=mysqli_connect('127.0.0.1','root','','mandabrain') or die('Falha na conexão!'.mysqli_error());

 session_start();
 if ($_SESSION['login'])
 {

	 $sql=('SELECT * FROM usuario WHERE idUsuario='.$_SESSION['id'].';');
	 $resul=mysqli_query($conexao,$sql);
	 $usu=mysqli_fetch_array($resul);

	 if ($_SESSION['tipo'] == "graduacao")
	 {
		 $_SESSION['tipo'] = "Graduação";
	 }
	 else
	 {
	 	 $_SESSION['tipo'] = "Pós Graduação";
	 }

	 if ($_SESSION['forma'] == "presencial")
	 {
		 $_SESSION['forma'] = "Presencial";
	 }
	 else
	 {
	 	 $_SESSION['forma'] = "A Distância";
	 }

	 date_default_timezone_set('America/Sao_Paulo');
	 $date = date('d - m - y');
	 $dia = date('d');
	 $diaFinal = $dia+10;

	 

	 include("mpdf60/mpdf.php");

	 $html = "
	 <fieldset>
	 	 <div class='center'> <img src='img/logo_original.png'> </div>

		 <h2>Comprovante de Inscrição para Bolsa de Desconto</h2>

		 <p class='justificado'>
		 	<div> <strong> Nome: </strong> ".$usu['nome']." ".$usu['sobrenome']."</div>
		 	<div> <strong> CPF: </strong> ".$usu['cpf']."</div>
		 	<div> <strong> RG: </strong> ".$usu['rg']."</div>
		 	<div> <strong> Email: </strong> ".$usu['email']."</div>

		 	<div> <h3> Faculdade </h3> </div>
		 	<div> <strong> Nome: </strong> ".$_SESSION['nome']."</div>
		 	<div> <strong> Endereço: </strong> ".$_SESSION['rua'].",".$_SESSION['numero']." - ".$_SESSION['bairro']."</div>
		 	<div> <strong> Telefone: </strong> ".$_SESSION['telefone']."</div>

		 	<div> <h3> Curso Escolhido </h3> </div>
		 	<div> <strong> Nome do Curso: </strong> ".$_SESSION['curso']."</div>
		 	<div> <strong> ".$_SESSION['tipo']." </strong> </div>
		 	<div> <strong> ".$_SESSION['forma']." </strong> </div>
		 </p>

		 <p class='center'> São Paulo, ".$date." </p>

		 <p class='center'> Validade: ".date( $diaFinal.' - m - y')." </p>

	 </fieldset>
	 ";

	 

	 $mpdf=new mPDF(); 
	 $mpdf->SetDisplayMode('fullpage');
	 $css = file_get_contents("css/estilo.css");
	 $mpdf->WriteHTML($css,1);
	 $mpdf->WriteHTML($html);
	 $mpdf->Output();

	 exit;
 }
?>
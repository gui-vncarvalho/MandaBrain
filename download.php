<?php
	include('conexao.php');

		if(isset($_GET['download'])){
		$file=$_GET['file'].$_GET['nome'];

		$nome=$_GET['nome'];
		echo '<h1>'.$nome.'</h1>';
		$extensao=explode('.', $nome);
		echo '<h1>'.$extensao.'</h1>';
		$tipo=$extensao[1];

		function setHeaders($nome,$file,$tipo){

			header("content-disposition: attachment; filename=".$nome."");
			header("content-type: application/{".$tipo."}");

			readfile($file);
		}

		setHeaders($nome, $file, $tipo);
}
		

		
?>
<?php
	session_start();
	include('conexao.php');
		if(isset($_POST['enviar'])){
			$email=$_POST['email_login'];
			$senha=$_POST['senha_login'];
			$senha2=base64_encode($senha);
			if(!empty($email)&&!empty($senha)){
				$sqlsel=('select idUsuario,senha,idTipoUsuario from usuario where email="'.$email.'";');
				$resul=mysqli_query($conexao,$sqlsel);
				
					if(mysqli_num_rows($resul)){
						while($con=mysqli_fetch_array($resul)){

							
							if($senha2==$con['senha']){
								$_SESSION['login']=$email;
								$_SESSION['id']=$con['idUsuario'];
								if($con['idTipoUsuario']==1){
									header('location:home_aluno.php');
								}elseif ($con['idTipoUsuario']==2) {
									header('location:home_professor.php');
								}
							}
							else{
								echo('<script>window.alert("Senha invalida!");window.location="index.php";</script>');
							}


							if($senha==$con['senha']){
								$_SESSION['login']=$email;
								$_SESSION['id']=$con['idUsuario'];
								if($con['idTipoUsuario']==3){
									header('location:admin.php');
								}
							}
							else{
								echo('<script>window.alert("Senha invalida!");window.location="index.php";</script>');
							}


						}
					} else{
						echo('<script>window.alert("E-mail invalido!");window.location="index.php";</script>');
					}
			} 
			else
			{
				echo('<script>window.alert("Preencha todos os campos!");window.location="index.php";</script>');
			}
		}
		else
		{
			header('location:index.php');
		}
		echo('<form action="cabecalho.php" method="POST"><input type="hidden" name="email" value="'.$email.'"></form>');
?>
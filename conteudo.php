<?php
    include('conexao.php');
        session_start();
        if($_SESSION['login']){
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <title>Conteúdos</title>
        
        <meta charset="utf-8"/>
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen"/>
        
        <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen"/>

        <link href="css/scrolling-nav.css" rel="stylesheet">

        <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon"/>

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

    <div class="margem_top">
        <?php
            include('slide.php');
        ?>
    </div>
	
	<!-- Parte do cadastro!-->
	<div class="container-fluid cor_escura_rodape">
	  	<div class="row">
	  		<div class="col-xs-offset-3 col-xs-9">
	  			<h3>Cadastre-se para receber nossos e-books mensalmente</h3>
	  		</div>
	  	</div>
	  	<div class="row">
	  		<div class="col-xs-offset-5 col-xs-3">
	  			<h4>Digite seu e-mail abaixo e cadastre-se</h4>
	  		</div>
	  	</div>
	  	<div class="row">
	        <div class="col-xs-12 espaco_rodape "> 
            <form action="#" method="POST">   
		            <div class="col-xs-offset-3 col-xs-6 ">
		            	<input class="form-control" placeholder="Digite aqui seu e-mail e cadastre-se" name="email_ebook_geral"> <input type="hidden" name="tipo_ebook_geral" value="geral">
		            </div>
		            <div class="col-xs-3">
		            	<input value="Cadastrar" class="btn btn-md botao_amarelo" type="submit" name="cadastrar">
		            </div>
            </form>

<?php
    include('conexao.php');
    if(isset($_POST['cadastrar'])){
        $email_ebook_geral=$_POST['email_ebook_geral'];
        $tipo_ebook_geral=$_POST['tipo_ebook_geral'];
            $sqlin=('INSERT INTO email_ebook (email_ebook,tipo_email,idUsuario) VALUES ("'.$email_ebook_geral.'","'.$tipo_ebook_geral.'",'.$_SESSION['id'].');');
            mysqli_query($conexao,$sqlin);
           echo('<script>window.alert("E-mail cadastrado com sucesso!");window.location="conteudo.php";</script>');
    }
?>
	    	</div>
	    </div>
	</div>
	<!-- Parte dos conteúdos!-->
	<div id="ebooks" class="ebooks_section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <h1> E-books </h1>

                        <br><br>
                        <form action="download.php" method="GET">
                        <div class="col-xs-4">
                            <div class="panel panel-success ebooks_section_color">
                                <div class="panel-heading">
                                    <img src="img/icones/ebooks/ebook1.png" width="250" width="224">
                                </div>
                                <div class="panel-body">
                                    <h2 class="text-center"> MandaProfissões </h2>
                                    <div class="text-justify">Já decidiu a carreira que vai seguir ou está confuso? O guia MandaProfissões tira todas as suas duvidas das diversas profissões, além de te ajudar a fazer as melhores escolhas!</div> 
                                    <br>
                                        <input type="hidden" name="file" value="img/upload/arquivos/">
                                        <input type="hidden" name="nome" value="MANDAPROFISSOES.pdf">
                                    <button class="btn btn-lg botao_amarelo" name="download" type="submit">
                                        Receba agora
                                    </button>
                            </form>
                                </div>
                            </div>
                        </div>
                    

                        <div class="col-xs-4">
                            <div class="panel panel-success ebooks_section_color">
                                <div class="panel-heading">
                                    <img src="img/icones/ebooks/ebook2.png" width="250" width="224">
                                </div>
                                <div class="panel-body">
                                    <h2 class="text-center"> MandaRedação </h2>
                                    <div class="text-justify">Sabe aquele tão sonhado 1000 na redação do Enem? Com o guia MandaRedação você pode realizar esse sonho. Ele conta com exemplos de redações, dicas e as estruturas mais adequadas seguindo um texto dissertativo-argumentativo.</div>
                                    <br>
                                    <button class="btn btn-lg botao_amarelo " data-toggle="modal" data-target="#myModal2"> Receba agora </button>
                                </div>
                            </div>
                        </div>
                    

                        <div class="col-xs-4">
                            <div class="panel panel-success ebooks_section_color">
                                <div class="panel-heading ">
                                    <img src="img/icones/ebooks/ebook3.png" width="250" width="224">
                                </div>
                                <div class="panel-body ">
                                    <h2 class="text-center"> MandaVestibular </h2>
                                    <div class="text-justify">Está chegando a época de vestibulares e com o guia MandaVestibular você fica preparado para enfrentar todos os desafios na hora da prova, contando com dicas, técnicas e macetes.</div>
                                    <br>
                                    <button class="btn btn-lg botao_amarelo" data-toggle="modal" data-target="#myModal3"> Receba agora </button>
                                </div>
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
   
 <!-- Modal -->
<form action="#" method="POST">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header cor_escura_rodape">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title letra_amarela" id="myModalLabel">Título do modal</h4>
            </div>
            <div class="modal-body cor_clara_rodape">
                <label class="control-label" for="email">E-mail: </label><input type="text" name="email_profissao" class="form-control" placeholder="Digite seu email">
                <input type="hidden" name="tipo_email_profissao" value="MandaProfissoes">
            </div>
            <div class="modal-footer cor_escura_rodape">
                <div class="col-xs-offset-4 col-xs-8">
                    <input name="enviar_emailProfissao" type="submit" class="text-center btn btn-md botao_amarelo" value="Enviar email">
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php
    if(isset($_POST['enviar_emailProfissao'])){
        $email_ebook=$_POST['email_profissao'];
        $tipo_email=$_POST['tipo_email_profissao'];
            $sqlinprof=('INSERT INTO email_ebook (email_ebook,tipo_email,idUsuario) VALUES ("'.$email_ebook.'","'.$tipo_email.'",'.$_SESSION['id'].');');
            mysqli_query($conexao,$sqlinprof);
           echo('<script>window.alert("E-mail cadastrado com sucesso!");window.location="conteudo.php";</script>');
    }
?>
<form action="#" method="POST">
    <!-- Modal 2 -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header cor_escura_rodape">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title letra_amarela" id="myModalLabel">Receba novidades</h4>
        </div>
        <div class="modal-body cor_clara_rodape">
            <label class="control-label" for="email">E-mail: </label><input type="text" name="email_redacao" class="form-control" placeholder="Digite seu email">
            <input type="hidden" name="tipo_email_redacao" value="MandaRedacao">
        </div>
        <div class="modal-footer cor_escura_rodape">
                <div class="col-xs-offset-4 col-xs-8"><input name="enviar_emailRedacao" type="submit" class="text-center btn btn-md botao_amarelo" value="Enviar email"></div>
            </div>
        </div>
    </div>
</div>
</form>
<?php
    if(isset($_POST['enviar_emailRedacao'])){
        $email_ebook=$_POST['email_redacao'];
        $tipo_email=$_POST['tipo_email_redacao'];
            $sqlinred=('INSERT INTO email_ebook (email_ebook,tipo_email,idUsuario) VALUES ("'.$email_ebook.'","'.$tipo_email.'",'.$_SESSION['id'].');');
            mysqli_query($conexao,$sqlinred);
           echo('<script>window.alert("E-mail cadastrado com sucesso!");window.location="conteudo.php";</script>');
    }
?>
<form action="#" method="POST">
     <!-- Modal 3 -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header cor_escura_rodape">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title letra_amarela" id="myModalLabel">Título do modal</h4>
            </div>
            <div class="modal-body cor_clara_rodape">
                <label class="control-label" for="email">E-mail: </label><input type="text" name="email_vestibular" class="form-control" placeholder="Digite seu email">
                <input type="hidden" name="tipo_email_vestibular" value="MandaVestibular">
            </div>
            <div class="modal-footer cor_escura_rodape">
                <div class="col-xs-offset-4 col-xs-8"><input name="enviar_emailVestibular" type="submit" class="text-center btn btn-md botao_amarelo" value="Enviar email"></div>
            </div>
        </div>
    </div>
</div>
</form>
<?php
    if(isset($_POST['enviar_emailVestibular'])){
        $email_ebook=$_POST['email_vestibular'];
        $tipo_email=$_POST['tipo_email_vestibular'];
            $sqlinvest=('INSERT INTO email_ebook (email_ebook,tipo_email,idUsuario) VALUES ("'.$email_ebook.'","'.$tipo_email.'",'.$_SESSION['id'].');');
            mysqli_query($conexao,$sqlinvest);
           echo('<script>window.alert("E-mail cadastrado com sucesso!");window.location="conteudo.php";</script>');
    }
}
else
{
    header('location:index.php');
}
require('rodape_logado.php');
?>
<script>
	$('.carousel').carousel({
		interval:500;	
	});
</script>
	</body>
</html>
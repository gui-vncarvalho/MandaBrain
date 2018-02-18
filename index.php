<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="MandaBrain">

        <meta name="author" content="MandaBrain">

        <link rel="stylesheet" type="text/css" href="css/estilo.css" />

        <script type="text/javascript" src="js/modernizr.custom.79639.js"></script>

        <link rel="shortcut icon" type="imagem/x-icon" href="img/icon.ico"/>

        <title> MandaBrain </title>

        <!--Modal-->

        <!-- Custom CSS -->
        <link href="css/scrolling-nav.css" rel="stylesheet">

        <!-- Rodape CSS -->

        <meta name="description" content="Fullscreen Slit Slider with CSS3 and jQuery" />

        <meta name="keywords" content="slit slider, plugin, css3, transitions, jquery, fullscreen, autoplay" />

        <meta name="author" content="Codrops" />

        <link rel="stylesheet" type="text/css" href="css/demo.css" />

        <link rel="stylesheet" type="text/css" href="css/style.css" />

        <link rel="stylesheet" type="text/css" href="css/custom.css" />

        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

        <script type="text/javascript" src="js/modernizr.custom.79639.js"></script>

        <noscript>
            <link rel="stylesheet" type="text/css" href="css/styleNoJS.css" />
        </noscript>

        <style type="text/css">
            .navbar {
                background-color: #3c4759;
                border: none;
            }

        </style>

    </head>
    <body id="page-top">

        <?php
            include('cabecalho.php');  
            include('conexao.php');          
        ?>

       <div class="container-fluid slide espaco_cabecalho">
            <div class="row">
                <div class="teste">
                    <?php
                         include('slide_index.html'); 
                    ?>
                </div>
            </div>
        </div>

        <!-- Setinha Section -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 seta_slide text-center">
                        <a class="page-scroll" href="#sobre"> <img src="img/icones/setinha.png" width="150" height="150" class="img-circle" class="img-responsive img_direita"> </a>
                    </div>
                </div>
            </div>
 <!-- Sobre Section -->
        <div id="sobre" class="sobre-section">
            <div class="container">
                <div class="row">
                    <div class="fundo_lilas text-center">
                        <h1> Sobre Nós </h1>
                            <h3>Quem somos?</h3>
                            <p>Somos uma startup brasileira que surgiu no ano de 2017 através de um trabalho de conclusão de curso na Etec de Santa Isabel.</p>

                            <h3>Qual nosso objetivo?</h3>
                            <p>O nome MandaBrain significa exatamente o que queremos fazer: auxiliar você a mandar bem nos seus estudos com eficiência e rapidez, além de melhorar a interação entre aluno-professor fora da sala de aula e oferecer bolsas de desconto em nossas faculdades parceiras para facilitar o seu ingresso em faculdades pois acreditamos a educação é um dos principais meios para transformar realidades.</p>

                            <h3>Não abrimos mãos de nossos valores:</h3> 
                            <p>Procuramos sempre trabalhar com planejamento, organização e simplicidade, procurando sempre superar as expectativas para oferecer uma área de organização cada vez mais completa e cativante para alunos e professores para tornarmos referência, a princípio, no estado de São Paulo.</p>

                            <h3>A MandaBrain é gratuita?</h3>
                            <p>O acesso à e-books e conteúdos você consegue de maneira rápida e fácil.Já para ter alcance as demais funcionalidades do site, basta você realizar seu cadastro!Sempre de forma gratuita.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cadastro Section -->
        <div id="cadastro" class="cadastro-section">
            <div class="container">
                <h1> Quem você é? </h1>
                <div class="row">
                    <div class="col-xs-4">
                        <h2 class="text-center"> Aluno </h2>
                        <img src="img/icones/cadastro/aluno.png" width="150" height="150" class="img-responsive img_direita ">
                        <p>Organize seus trabalhos, eventos pessoais e compromissos, além de receber materiais de seus professores e bolsas de desconto em nossas faculdades parceiras.</p>
                        <a href="cadastrar.php"><button class="btn btn-info btn-lg"> Cadastre-se </button></a>
                    </div>
                    <div class="col-xs-4">
                        <h2  class="text-center"> Professor </h2>
                        <img src="img/icones/cadastro/professor.png" width="150" height="150" class="img-responsive img_direita">
                        <p>Organize suas aulas e compromissos e melhore sua interação extraescolar com seu aluno enviando materiais das aulas. Além de ser beneficiado(a) com bolsas de desconto.</p>
                        <a href="cadastrar.php"><button class="btn btn-info btn-lg"> Cadastre-se </button></a>
                    </div>
                    <div class="col-xs-4">
                        <h2 class="text-center"> Universidade </h2>
                        <img src="img/icones/cadastro/universidade.png" width="150" height="150" class="img-responsive img_direita">
                        <p>Quer fazer uma parceria com a MandaBrain e divulgar ainda mais seus cursos?</p>
                        <button class="btn btn-info btn-lg"> Entre em Contato </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Funções Section -->
        <div id="bolsas" class="bolsas-section">
            <div class="container">
                <div class="row">
                    <h1> Está terminando o ensino médio ou em busca de uma faculdade? </h1>
                    <div class="recuo"> 
                        <p> Com a MandaBrain você consegue as melhores bolsas de desconto e a chance de ingressar na faculdades do seu sonho.</p>
                        <button class="btn btn-success btn-lg"  data-toggle="modal" data-target="#modal_login"> Garanta aqui sua bolsa de desconto! </button> 
                    </div>    
                </div>
            </div>
        </div>
        <!-- E-books Section -->
        <div id="ebooks" class="ebooks-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="text-center"> Nossos conteúdos </h1>
                        <div class="col-xs-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <img src="img/icones/ebooks/ebook1.png" class="img-responsive img_direita_conteudo" width="250" >
                                </div>
                                <div class="panel-body">
                                    <h2 class="text-center"> MandaProfissões </h2> 
                                    <p>Já decidiu a carreira que vai seguir ou está confuso? O guia MandaProfissões tira todas as suas duvidas das diversas profissões, além de te ajudar a fazer as melhores escolhas! </p>
                                    <button class="btn btn-lg btn-success"> Receba agora </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <img src="img/icones/ebooks/ebook2.png" class="img-responsive img_direita_conteudo" width="250">
                                </div>
                                <div class="panel-body">
                                    <h2 class="text-center"> MandaRedação </h2>
                                    <p>Sabe aquele tão sonhado 1000 na redação do Enem? Com o guia MandaRedação você pode realizar esse sonho. Ele conta com exemplos de redações, dicas e as estruturas mais adequadas seguindo um texto dissertativo-argumentativo.</p>
                                    <button class="btn btn-lg btn-success"> Receba agora </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <img src="img/icones/ebooks/ebook3.png" width="250" class="img-responsive img_direita_conteudo">
                                </div>
                                <div class="panel-body">
                                    <h2 class="text-center"> MandaVestibular </h2>
                                    <p> Está chegando a época de vestibulares e com o guia MandaVestibular você fica preparado para enfrentar todos os desafios na hora da prova, contando com dicas, técnicas e macetes.</p>
                                    <button class="btn btn-lg btn-success"> Receba agora </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Parcerias Section -->
        <div id="parcerias" class="parcerias-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1> Parcerias </h1>
                        <div class="espaco">
                            <div class="col-xs-4">
                                 <p> <img src="img/faculdades/cruzeirodosul.png" class="img-responsive">
                            </div>
                            <div class="col-xs-4">
                                <img src="img/faculdades/uninove.jpg" class="img-responsive">
                            </div>
                            <div class="col-xs-4">
                                <img src="img/faculdades/ung.jpg" class="img-responsive"> 
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <img src="img/faculdades/anhembi.png" class="img-responsive"> 
                        </div>
                        <div class="col-xs-4">
                            <img src="img/faculdades/anhanguera.png" class="img-responsive">
                        </div>
                        <div class="col-xs-4">
                            <img src="img/faculdades/mackenzie.jpg" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contato Section -->
        <div id="contato" class="contato-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div>
                            <form class="form-horizontal col-xs-6 col-xs-offset-3">
                                <p>
                                    <div class="input-group">
                                        <span class="input-group-addon"> Nome: </span>
                                        <input type="text" class="form-control" placeholder="Jorge Augusto" required>
                                    </div>
                                </p>
                                <p>
                                    <div class="input-group">
                                        <span class="input-group-addon"> Email: </span>
                                        <input type="text" class="form-control" placeholder="jorge_2007@bol.com" required>
                                    </div>
                                </p>
                                <p>
                                    <div class="input-group">
                                        <span class="input-group-addon"> Telefone: </span>
                                        <input type="text" class="form-control" placeholder="11 95461-1234" required>
                                    </div>
                                </p>
                                <p>
                                    <div class="input-group">
                                        <span class="input-group-addon"> Assunto: </span>
                                        <input type="text" class="form-control" placeholder="Dica" required>
                                    </div>
                                </p>
                                <p>
                                    <div class="input-group">
                                        <span class="input-group-addon"> Mensagem: </span>
                                        <textarea class="form-control" required> </textarea>
                                    </div>
                                </p>
                                <p>
                                    <div class="form-group">
                                        
                                            <button type="submit" class="btn btn-info btn-lg"> Enviar </button>
                                        </div>
                                    </div>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" >
                               
                     <!-- Modal -->
                        <div class="modal fade " id="modal_login" role="dialog" >
                             <div class="modal-dialog">
                                    
                    <!-- Modal content-->
                        <div class="modal-content">

                        <div class="modal-header modal-login-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Faça agora seu login</h4>   
                       </div>

                    <form action="verificar.php" method="POST" >

                        <div class="modal-body modal-login-body">
                                             
                            <p>Preenchar os campos abaixo</p>

                        <div class="input-group">
                              <span class="input-group-addon " aria-hidden="true"><span><img src="img/icones/inscricao/email.png" width="20px" ></span></span>
                              <input type="text" class="form-control" placeholder="E-mail para Acesso" name="email_login" required="">
                        </div>
                              <br>

                            <div class="input-group">
                                <span class="input-group-addon" id="senha"><span><img src="img/icones/inscricao/senha.png" width="20px"></span></span>
                                <input type="password" class="form-control" placeholder="Senha de Acesso" name="senha_login" required="">
                            </div>
                       </div>

                        <div class="modal-footer modal-login-body">
                                           
                        <div class="form-group">
                              <div class="col-xs-8">
                                <input type="submit" class="btn btn-success" name="enviar" value="Enviar"/>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar </button>
                              </div>
                        </div>
                    </form>
                        <div class="form-group">
                            <div class="col-xs-10">
                                 <br>
                              <a href="cadastrar.php" class="letra_amarela">Ainda não é cadastrado? Clique aqui e se cadastre!</a>
                            </div>
                        </div>
                    </div>

                  </div>
                </div>
             </div>
     </div>
        <?php
            include('rodape.php');
        ?>

        <!-- jQuery -->
        <script src="js/jquery-3.2.1.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>


        <!-- Java Fullscreen slit slider-->

        <script type="text/javascript" src="js/jquery.ba-cond.min.js"></script>

        <script type="text/javascript" src="js/jquery.slitslider.js"></script>

        <!-- Scrolling Nav JavaScript -->
    
        <script src="js/jquery.easing.min.js"></script>
    
        <script src="js/scrolling-nav.js"></script>

        <script type="text/javascript" src="js/sweetalert.min.js"></script>
   

        <script type="text/javascript"> 



            $(function() {
            
                var Page = (function() {

                    var $navArrows = $( '#nav-arrows' ),
                        $nav = $( '#nav-dots > span' ),
                        slitslider = $( '#slider' ).slitslider( {
                            onBeforeChange : function( slide, pos ) {

                                $nav.removeClass( 'nav-dot-current' );
                                $nav.eq( pos ).addClass( 'nav-dot-current' );

                            }
                        } ),

                        init = function() {

                            initEvents();
                            
                        },
                        initEvents = function() {

                            // add navigation events
                            $navArrows.children( ':last' ).on( 'click', function() {

                                slitslider.next();
                                return false;

                            } );

                            $navArrows.children( ':first' ).on( 'click', function() {
                                
                                slitslider.previous();
                                return false;

                            } );

                            $nav.each( function( i ) {
                            
                                $( this ).on( 'click', function( event ) {
                                    
                                    var $dot = $( this );
                                    
                                    if( !slitslider.isActive() ) {

                                        $nav.removeClass( 'nav-dot-current' );
                                        $dot.addClass( 'nav-dot-current' );
                                    
                                    }
                                    
                                    slitslider.jump( i + 1 );
                                    return false;
                                
                                } );
                                
                            } );

                        };

                        return { init : init };

                })();

                Page.init();

                /**
                 * Notes: 
                 * 
                 * example how to add items:
                 */

                /*
                
                var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');
                
                // call the plugin's add method
                ss.add($items);

                */
            
            });
        </script>


    </body>
</html>
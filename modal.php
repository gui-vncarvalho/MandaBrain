<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="modal.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style type="text/css">
            .modal-login-header
            {
                color: #fff;
                background: #29303c;
                border: none;
            }

            .modal-login-body
            {
                color: #fff;
                background: #3c4759;
                border: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal"> Login </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header modal-login-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Faça agora seu login</h4>
                </div>
                <div class="modal-body modal-login-body">
                	<form action="#" method="POST" name="login"> 
                  		<p>Preenchar os campos abaixo</p>
                        <div class="input-group">
                          	<span class="input-group-addon " aria-hidden="true"><span class="glyphicon glyphicon-user"></span></span>
                          	<input type="text" class="form-control" placeholder="Nome de Usuário">
                        </div>
                        <br>
                        <div class="input-group">
                          	<span class="input-group-addon" id="senha"><span class="glyphicon glyphicon-check"></span></span>
                          	<input type="password" class="form-control" placeholder="Senha de Acesso">
                        </div>
                </div>
                <div class="modal-footer modal-login-body">
                		<input type="submit" class="btn btn-success" data-dismiss="modal" value="Enviar"/>
                  		<button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar </button>
                    </form>
                </div>
              </div>
              
            </div>
          </div>
          
        </div>

    </body>
</html>
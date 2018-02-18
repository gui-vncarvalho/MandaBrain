<!doctype html>
<html lang="pt-br" class="no-js">
    <head>
          <meta charset="UTF-8" />
          <title> Cadastro </title>
          <script type='text/javascript' src='js/jquery-3.2.1.js'></script>
          <script type='text/javascript' src='js/mask.js'></script>
          <script type='text/javascript' src='js/demo.js'></script>
          <link rel="stylesheet" type="text/css" href="css/estilo.css">
          <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

          <link rel="shortcut icon" type="imagem/x-icon" href="img/icon.ico"/>
    </head>

    <body>

    <style type="text/css">
      .navbar{
        border: none;
      }
      body{
        background: url('img/cadastro.jpg');
      }
    </style>

    <div class="container">
      <div class="row"> 
          <div class="form-group">
            <br>
            <div class="row">
              <div class="col-xs-12">

                <div class="col-xs-2">
                  <a href="index.php"><button type="button" class="btn btn-md botao_amarelo">Voltar</button></a>
                </div>

                <div class="col-xs-8">
                  <h2 class="letra_amarela text-center">Cadastre-se</h2>
                </div>

              </div>
            </div>

          </div>
            <form action="#" method="POST" name="login">
              <div class="form-group">
                <div class="col-xs-6">
                  <label class="control-label" for="nomw">Nome: </label>
                  <input type="text" name="nome" required class="form-control" placeholder="Nome">

                </div>

                <div class="col-xs-6">
                  <label class="control-label" for="sobrenome">Sobrenome: </label>
                  <input type="text" name="sobrenome" required class="form-control"  placeholder="Sobrenome">

                </div>
              </div>
            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label" for="dt_nasc">Data de Nascimento: </label>
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
              
              <label class="control-label" for="sexo">&nbsp;&nbsp;&nbsp;&nbsp;Sexo:</label>
              <div class="form-group">

                <div class="col-xs-6">
                      <input type="radio" class="lado_direito " name="sexo" id="Masculino" value="Masculino" checked="">
                      <label for="Masculino" class="lado_direito_sexo text-center"> Masculino</label>
                </div>
                <div class="col-xs-6 direita_cadastro">
                      <input type="radio" class="centro_radio direita_cadastro" id="Feminino" name="sexo" value="Feminino">
                      <label for="Feminino" class="meio text-center">  Feminino </label>
                </div>
              </div>
              <label class="control-label" for="tipo_usuario">&nbsp;&nbsp;&nbsp;&nbsp;Tipo Usuário:</label>
                <div class="form-group">
                  <div class="col-xs-6">
                      <input type="radio" class="lado_direito" name="tipo_usuario" id="aluno" value="1" checked="">
                      <label for="aluno" class="lado_direito text-center"> Aluno</label>
                  </div>
                  <div class="col-xs-6 direita_cadastro">
                      <input type="radio" class="centro_radio" id="professor" name="tipo_usuario" value="2">
                      <label for="professor" class="meio text-center">  Professor </label>
                </div>
          
              <div class="form-group">
                <div class="col-xs-6">
                  <label class="control-label" for="rg">RG: </label>
                  <input type="text" name="rg" id="rg" class="form-control"  required placeholder="RG" maxlength="13" />
                </div>
                <br>

                <div class="col-xs-6">
                  <label class="control-label">CPF: </label>
                  <input name="cpf" type="text" id="cpf" class="form-control" required placeholder="CPF" maxlength="15" />
                </div>
              </div>


              <div class="form-group">
                <div class="col-xs-6">
                  <label class="control-label" for="email">E-mail: </label>
                  <input type="email" name="email" required class="form-control"  placeholder="E-mail">
                </div>
                <div class="col-xs-6">
                  <label class="control-label" for="telefone">Telefone: </label>
                  <input type="text" name="telefone" id="telefone" required class="form-control" maxlength="15" placeholder="Telefone">
                </div>
              </div>

              <div class="form-group">  
               <div class="col-xs-6">
                <label class="control-label" for="senha">Senha: </label>
                  <input type="password" name="senha" required class="form-control"  placeholder="Senha">
                </div>
                <div class="col-xs-6">
                  <label class="control-label" for="conf_senha">Confirme sua senha: </label>
                  <input type="password" name="conf_senha" required class="form-control"  placeholder="Confirmar senha">
                </div>
              </div>

              <div class="col-xs-12 text-center">
                <br>  
                <input type="submit" name="enviar" value="Cadastrar" class="btn btn-md botao_amarelo" >  
              </div> 

            </form>     
            <br>

        </div>
    </div>
  </div>
  <br>
    <?php
      include('conexao.php');
      include('rodape.php');

      if (isset($_POST['enviar'])) {
        
        $nome=$_POST['nome'];
        $nome=ucfirst($nome);
        $sobrenome=$_POST['sobrenome'];
        $sobrenome=ucfirst($sobrenome);
        $dt_nasc[0]=$_POST['ano'];
        $dt_nasc[1]=$_POST['mes'];
        $dt_nasc[2]=$_POST['dia'];
        $dt_nascf=implode('-',$dt_nasc);
        $tipo_usuario=$_POST['tipo_usuario'];
        $rg=$_POST['rg'];
        $cpf=$_POST['cpf'];
        $sexo=$_POST['sexo'];
        $telefone=$_POST['telefone'];
        $email=$_POST['email'];
        $senha=$_POST['senha'];
        $senha=base64_encode($senha);
        $conf_senha=$_POST['conf_senha'];
        $conf_senha=base64_encode($conf_senha);
        $padrao="padrao.png";
          $sqlsel=('select senha from usuario where email="'.$email.'";');
          $resul=mysqli_query($conexao,$sqlsel);
          if(mysqli_num_rows($resul)){
            echo('<script>window.alert("E-mail já cadastrado!");</script>');    
          }
          else
          {
            if($senha==$conf_senha){
              $sqlin=('INSERT INTO usuario(nome,sobrenome,cpf,rg,email,telefone,sexo,dt_nasc,imagem_usuario,data_imagem,senha,idTipoUsuario) VALUES("'.$nome.'","'.$sobrenome.'","'.$cpf.'","'.$rg.'","'.$email.'","'.$telefone.'","'.$sexo.'","'.$dt_nascf.'","'.$padrao.'",NOW(),"'.$senha.'","'.$tipo_usuario.'");');
              mysqli_query($conexao,$sqlin);
              echo('<script>window.alert("Cadastrado com sucesso");window.location="index.php";</script>');
            }
            else{
              echo('<script>window.alert("As senhas são diferentes!");</script>');
            } 
    }
}

?>
  <script type="text/javascript">
   function validation(){ 
    swal({ 
        title: "Cadastrado!", 
        text: "Seu cadastro foi realizado com sucesso!", 
        type: "success"});
  }
  </script>
  <script type="text/javascript" src="js/sweetalert.min.js"></script>

  <script type="text/javascript">
    function good(){
      swal({"Good job!", "You clicked the button!", "success"});
    }

    function error(){
    swal({
          'Oops...',
          'Something went wrong!',
          'error'
        });
  }
  </script>

  <!-- Mascaras Formulário -->
  <script type="text/javascript">
    $(document).ready(function(){ $("#cpf").mask("999.999.999-99"); }); 
  </script>

  <script>
    jQuery(function($){
     $("#telefone").mask("(99) 99999-9999");
    });
  </script>

  <br>
   </body>
</html>

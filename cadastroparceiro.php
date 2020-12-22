<?php
//session_start();
	//if(!isset($_SESSION['idUsuario'])){
	//header("location:index2.php");
	//exit;
//}
require_once 'viacep.php';
require_once 'cadastroip.php';
$c = new Cadastroip



?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Projeto login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="cssphp/estilocssAP.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <a class="navbar-brand mr-auto mr-lg-5" href="#"><h1>FOCUS</h1></a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastro/Baixa</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="listaParceiro.php">Listar/Editar/Excluir itens</a>
              <a class="dropdown-item" href="cadastroparceiro.php">Cadastrar Parceiro</a>
       </div>
          </li>
        </ul>
      </div>
    </nav>
  </head>
  <body>

 <form method="POST">

  <div class="form-all">
  	<div class="form-group col">
    		<label for="inputAddress">CEP</label>
    		<input type="int" maxlength="12" class="form-control" id="cep" placeholder="*87035-052" name="cep" value="<?php echo $endereco->cep ?? '' ?>">
    		<button type="submit" class="btn btn-primary" value = "Buscar">Buscar</button>
  		</div>
  	<div class="form-row">
    	<div class="form-group col-md-6">
      		<label for="inputNome">Nome Completo(*)</label>
      		<input type="text" maxlength="50"class="form-control" id="inputNome" placeholder="*Ex: João da Silva" name="nomeParceiro">
    	</div>
    <div class="form-group col-md-6">
      <label for="inputDataNascimento">Data de Nascimento(*)</label>
      <input type="date" class="form-control" id="inputDataNascimento" placeholder="*Ex: 03/01/1996" name="dataNascimento">
    </div>

  </div>
  	<div class="form-row">
  		<div class="form-group col-md-6">
    		<label for="inputAddress">Sexo(*)</label>
    		<select id="inputSexo" class="form-control" name="sexo">
    			<option selected>Masculino</option>
 				<option selected>Feminino</option>
 				<option selected>Outros</option>
 				<option></option>
 			</select>
  		</div>
  		<div class="form-group col-md-2">
      		<label for="inputCity">Número</label>
      		<input type="int" maxlength="7" class="form-control" id="inputNumero" name="numero">
    	</div>
    	<div class="form-group col-md-4">
      		<label for="inputCity">Complemento</label>
      		<input type="text" maxlength="30" class="form-control" id="inputComplemento" name="complemento">
    	</div>
  	</div>
  	<div class="form-row">
    	<div class="form-group col-md-6">
      		<label for="inputCity">Endereço</label>
      		<input type="text" maxlength="30" class="form-control" id="inputEndereco" name="andress" value="<?php echo $endereco->logradouro ?? '' ?>">
    	</div>
    	
    	<div class="form-group col-md-6">
      		<label for="inputCity">Bairro</label>
      		<input type="text" maxlength="30" class="form-control" id="inputBairro" name="bairro"value="<?php echo $endereco->bairro ?? '' ?>">
    	</div>
    		<div class="form-group col-md-6">
      			<label for="inputState">Estado</label>
      			<input type = "text" id="inputState" class="form-control" name="estado" value="<?php echo $endereco->uf ?? '' ?>">
    		</div>
    	<div class="form-group col-md-6">
      		<label for="inputCity">Cidade</label>
      		<input type="text" class="form-control" id="inputCidade" name="cidade" value="<?php echo $endereco->localidade ?? '' ?>">
    	</div>
  	</div>
  		<button type="submit" class="btn btn-primary" value = "Cadastrar">Cadastrar</button>
  		<!-- <input type="submit" value = "Cadastrar"> -->
  </div>
</form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<?php
if(isset($_POST['nomeParceiro'])){
	$nomeParceiro 	= addslashes($_POST['nomeParceiro']);
	$dataNascimento = addslashes($_POST['dataNascimento']);
	$sexo 			= addslashes($_POST['sexo']);
	$cep 			= addslashes($_POST['cep']);
	$andress 		= addslashes($_POST['andress']);
	$numero 		= addslashes($_POST['numero']);
	$complemento 	= addslashes($_POST['complemento']);
	$cidade 		= addslashes($_POST['cidade']);
	$bairro 		= addslashes($_POST['bairro']);
	$estado 		= addslashes($_POST['estado']);
	
	//Validando obrigatoriedade dos seguintes campos
	if(!empty($nomeParceiro) && !empty($dataNascimento) && !empty($sexo)){
		$c->conectar("hudson","localhost","root","");
		if($c->msgErro == ""){
				if($c->cadastrar($cep,$bairro,$cidade,$complemento,$dataNascimento,$andress,$estado,$nomeParceiro,$numero,$sexo)){
					?>
					<div id="msg-sucesso">Cadastrado com sucesso!</div>
				<?php
					
				}		
		}else{
			?>
			<div class="msg-erro">
			<?php echo "ERROR: ".$c->msgErro;?>

			</div>
			<?php
		}
	}else{
		?>
		<div class="msg-erro">Preencha todos os campos obrigatórios!</div>
		<?php
		
	}
}
?>
  </body>
</html>


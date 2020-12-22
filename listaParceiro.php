<?php

// session_start();
// if(!isset($_SESSION['idUsuario'])){
//  header("location:index2.php");
//  exit;
// }
?>
<?php
require_once 'cadastroip.php';
$c = new Cadastroip;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/cssinterno.css">
    <link rel="stylesheet" href="assets/css/demo.css">
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
              <a class="dropdown-item" href="cadastroparceiro.php">Cadastrar Parceiro/Produto</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST">
          <input class="form-control mr-sm-2" type="text" name = "pesquisar" placeholder="Nome do Parceiro" aria-label="Search">
          <button class="btn btn-outline-success my-0 my-sm-0" type="submit" values = "enviar">Pesquisar</button>
      
          <?php
          if(isset($_POST['pesquisar'])){
            $pesquisar = addslashes($_POST['pesquisar']);
        
            $c->conectar("hudson","localhost","root","");
            global $pdo;
            $sql = $pdo->prepare("SELECT idParceiro, cep, bairro, cidade, complemento, DATE_FORMAT(dataNascimento, '%d/%m/%y') AS dataNascimento, endereco, estado, nomeParceiro, numero, sexo, situacao FROM cad_parceiro WHERE nomeParceiro LIKE '%$pesquisar%' ORDER BY situacao = 'Ativo' desc LIMIT 50");
            $sql->execute();

            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
          }
          ?>
        </form>
      </div>
    </nav>
  </head>
  <body>
  </br></br></br></br>
  <div class ="tables">

    <table class="table table-dark">
    <thead>
    <tr>
      <th scope="col">idParceiro</th>
      <th scope="col">Nome do Parceiro</th>
      <th scope="col">Dt. Nascimento</th>
      <th scope="col">Sexo</th>
      <th scope="col">CEP</th>
      <th scope="col">Bairro</th>
      <th scope="col">Endereço</th>
      <th scope="col">Complemento</th>
      <th scope="col">Numero</th>
      <th scope="col">Cidade</th>
      <th scope="col">Estado</th>
      <th scope="col">situacao</th>
    </tr>
  </thead>
  <?php 
       $i= 0;
      while(!empty($result[$i])){ 
    $bairro           = $result[$i]['bairro'];
    $cidade           = $result[$i]['cidade'];
    $complemento      = $result[$i]['complemento'];
    $dataNascimento   = $result[$i]['dataNascimento'];
    $andress          = $result[$i]['endereco'];
    $estado           = $result[$i]['estado'];
    $nomeParceiro     = $result[$i]['nomeParceiro'];
    $numero           = $result[$i]['numero'];
    $sexo             = $result[$i]['sexo'];
    $idParceiro       = $result[$i]['idParceiro'];
    $cep              = $result[$i]['cep'];
    $situacao         = $result[$i]['situacao'];

    $i++;
  ?>
  
  <tbody>
    <tr>
      <th scope="row"><?php echo $idParceiro; ?></th>
      <td><?php echo $nomeParceiro; ?></td>
      <td><?php echo $dataNascimento; ?></td>
      <td><?php echo $sexo; ?></td>
      <td><?php echo $cep; ?></td>
       <td><?php echo $bairro; ?></td>
       <td><?php echo $andress; ?></td>
       <td><?php echo $complemento; ?></td>
       <td><?php echo $numero; ?></td>
       <td><?php echo $cidade; ?></td>
       <td><?php echo $estado; ?></td>
       <td><?php echo $situacao; ?></td>             
        <td>

        <form class="form-inline my-10 my-lg-100">   
          <?php
          if($situacao == 'Excluido'){ 
            echo NULL;
          }else{
            ?><a class="btn btn-primary"href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $idParceiro;?>"data-whatevernome="<?php echo $nomeParceiro; ?>" data-whatevernasc="<?php echo $dataNascimento; ?>" data-whateversexo="<?php echo $sexo; ?>" data-whatevercep="<?php echo $cep; ?>" data-whateverbairro="<?php echo $bairro; ?>" data-whateverendereco="<?php echo $andress; ?>" data-whatevercomplemento="<?php echo $complemento; ?>" data-whatevernumero="<?php echo $numero; ?>" data-whatevercidade="<?php echo $cidade; ?>" data-whateverestado="<?php echo $estado; ?>">Editar item</a>

              <script type="text/javascript">
                function Nova(){
                location.href="cadastroparceiro.php";
              }
              </script>
          -<button type="button" class="btn btn-success" onClick="Nova()">Adicionar</button>
          -<a class="btn btn-outline-danger my-2 my-sm-0 btn-group"href="#" onclick="perguntar(<?php echo $idParceiro;?>)">Excluir</a><?php
          }
          ?>
        </form>
        </td>   
<?php }?>
    </tr> 
  </tbody>
<?php
  //procedimento para exclusão dos produtos
  $excluido = 'Excluido'; 
  
  if(isset($_GET['del'])){
    $idParceiro = $_GET['del'];
    $c->conectar("hudson","localhost","root","");
    global $pdo;
    $update = $pdo->prepare("UPDATE cad_parceiro SET situacao = '$excluido' WHERE idParceiro = '$idParceiro'");
    $update->execute();
  }

?>

<!-- *********************modal para edição do parceiro********************** -->
<div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header-left">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="EDITAR PARCEIRO" id="exampleModalLabel">EDITAR PARCEIRO</h3>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nome do Parceiro:</label>
            <input name="nome" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Data de Nascimento:</label>
            <input name="nasc" type="text" class="form-control" id="recipient-nascimento">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Sexo:</label>
            <input name="sexo" type="text" class="form-control" id="recipient-sexo">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">CEP:</label>
            <input name="cep" type="text" class="form-control" id="recipient-cep" value="value="<?php echo $endereco->cep ?? '' ?>>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Bairro:</label>
            <input name="bairro" type="text" class="form-control" id="recipient-bairro">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Endereço:</label>
            <input name="endereco" type="text" class="form-control" id="recipient-endereco">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Complemento:</label>
            <input name="complemento" type="text" class="form-control" id="recipient-complemento">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Numero:</label>
            <input name="numero" type="text" class="form-control" id="recipient-numero">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Cidade:</label>
            <input name="cidade" type="text" class="form-control" id="recipient-cidade">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Estado:</label>
            <input name = "estado" type="text" class="form-control" id="recipient-estado">
          </div>
          <input name="id" type="hidden" id="idParceiro">;
           <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Alterar</button>
          </div>
        </form>
        <?php
          if(isset($_POST['cep'])){
          $id                   = addslashes($_POST['id']);
          $nomeParceiro         = addslashes($_POST['nome']);
          $nascParceiro         = addslashes($_POST['nasc']);
          $sexoParceiro         = addslashes($_POST['sexo']);
          $cepParceiro          = addslashes($_POST['cep']);
          $enderecoParceiro     = addslashes($_POST['endereco']);
          $numeroParceiro       = addslashes($_POST['numero']);
          $complementoParceiro  = addslashes($_POST['complemento']);
          $cidadeParceiro       = addslashes($_POST['cidade']);
          $bairroParceiro       = addslashes($_POST['bairro']);
          $estadoParceiro       = addslashes($_POST['estado']);

          $c->conectar("hudson","localhost","root","");
          global $pdo;
          $updateParceiro = $pdo->prepare("UPDATE cad_parceiro SET nomeParceiro='$nomeParceiro',dataNascimento = STR_TO_DATE('$nascParceiro','%d/%m/%Y'),sexo='$sexoParceiro',cep='$cepParceiro',endereco='$enderecoParceiro',numero='$numeroParceiro',complemento='$complementoParceiro',cidade='$cidadeParceiro',bairro='$bairroParceiro',estado='$estadoParceiro' WHERE idParceiro='$id'");
          $updateParceiro->execute();
          }
        ?>
      </div>
    </div>
  </div>
</div>

<!-- codigo JAVASCRIPT para validar exclusão do produto -->
<script type="text/JavaScript">
  function perguntar(idParceiro)
  {
    if(confirm('Deseja realmente excluir esse Parceiro?'))
    { 
    window.location.href = "baixaritem.php?del="+idParceiro;
    }
  }
</script>

</div>
   <div class="content">
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/personalizado.js"></script>

    <!-- java script modal -->
    <script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
    var button                = $(event.relatedTarget); 
    var recipient             = button.data('whatever');
    var recipientnomeParceiro = button.data('whatevernome');
    var recipientNasc         = button.data('whatevernasc');
    var recipientSexo         = button.data('whateversexo');
    var recipientCep          = button.data('whatevercep');
    var recipientBairro       = button.data('whateverbairro');
    var recipientEndereco     = button.data('whateverendereco');
    var recipientComplemento  = button.data('whatevercomplemento');
    var recipientNumero       = button.data('whatevernumero');
    var recipientcidade       = button.data('whatevercidade');
    var recipientestado       = button.data('whateverestado'); 
    
    var modal = $(this);
    modal.find('.modal-title').text('New message to ' + recipient);
    modal.find('.modal-body input').val(recipient);
    modal.find('#idParceiro').val(recipient);
    modal.find('#recipient-name').val(recipientnomeParceiro);
    modal.find('#recipient-nascimento').val(recipientNasc);
    modal.find('#recipient-sexo').val(recipientSexo);
    modal.find('#recipient-cep').val(recipientCep);
    modal.find('#recipient-bairro').val(recipientBairro);
    modal.find('#recipient-endereco').val(recipientEndereco);
    modal.find('#recipient-complemento').val(recipientComplemento);
    modal.find('#recipient-numero').val(recipientNumero);
    modal.find('#recipient-cidade').val(recipientcidade);
    modal.find('#recipient-estado').val(recipientestado);
    });
</script>
  </body>
</html>
<?php
session_start();
$titulopagina="novo contato";

include_once 'layouts/header.php';
include_once 'classes/BancoDados.php';
include_once 'classes/Contato.php';

if ($_POST) { 

    $bancodados = new BancoDados();
    $conexao = $bancodados->getconexao();
    $contato = new Contato($conexao);

    $contato->nome = $_POST['nome'];
    $contato->telefone = $_POST['telefone'];

    if ($contato->criar()) { 
        $_SESSION['mensagem'] = "contato criado com sucesso";
        echo "<div class='alert alert-success' role='alert'>contato criado com sucesso</div>";
        header("location: novocontato.php");
        exit(0);
    } 
    else {
        echo "<div class='alert alert-danger' role='alert'>ocorreu um erro ao criar o contato</div>";
    }
}
echo "<h1> formulario de contatos </h1>";
if (isset($_SESSION['mensagem'])) {
    echo "<div class='alert alert-success' role='alert'>".$_SESSION['mensagem']."</div>";
    unset($_SESSION['mensagem']);
}
?>

<form method="POST">

  <div class="form-group">
    <label for="exampleInputEmail1">Nome </label>
    <input type="text" class="form-control" name="nome">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Telefone</label>
    <input type="text" class="form-control" name="telefone"> 
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
  <a class="btn btn-warning" href ="index.php">inicio</a>

</form>
<?php
include_once 'layouts/footer.php';
?>
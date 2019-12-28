<?php

$titulopagina="contatos salvos";


include_once 'layouts/header.php';
include_once 'classes/BancoDados.php';
include_once 'classes/Contato.php';

$bancodados = new BancoDados();
$conexao = $bancodados->getconexao();
$contato = new Contato($conexao);

$stmt = $contato->lertodos();

echo "<h1> tela contatos</h1>";
echo "<a class='btn btn-success' href='novocontato.php'>cadastrar novo</a><hr>";
echo "<table class='table'>
<thead class='thead-dark'>
  <tr>
    <th scope='col'>ID</th>
    <th scope='col'>NOME</th>
    <th scope='col'>TELEFONE</th>
    <th scope='col'>AÇÕES</th>
  </tr>
</thead>
<tbody>";

while($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
    //print_r($linha->nome);
    //echo "<br>";
    echo "<tr>";
    echo  "<th>" . $linha->id ."</th>";
    echo "<td>" . $linha->nome ."</td>";
    echo  "<td>" .$linha->telefone ."</td>";
    echo  "<td>";
    echo    "<a class= 'btn btn-primary' href='editarcontato.php?id= . $linha->id .'>Editar</a> ";
    echo "<a class= 'btn btn-danger' href='excluircontato.php?id= . $linha->id .'>Excluir</a>";
    echo  "</td>";
    echo "</tr>";


}
echo " </tbody>
</table>
";
include_once 'layouts/footer.php';
?>
<!--
<table class='table'>
  <thead class='thead-dark'>
    <tr>
      <th scope='col'>ID</th>
      <th scope='col'>NOME</th>
      <th scope='col'>TELEFONE</th>
      <th scope='col'>AÇÕES</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>1</th>
      <td>Ailson</td>
      <td>2232134234</td>
      <td>
        <a class= 'btn btn-primary' href='editarcontato.php'>Editar</a>
        <a class= 'btn btn-danger' href='excluircontato.php'>Excluir</a>
      </td>
    </tr>
  </tbody>
</table>

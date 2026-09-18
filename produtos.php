<?php
session_start();
include("conexao.php");

// Proteção de acesso
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Consulta todos os produtos no banco
$sql = "SELECT * FROM produtos";

// Executa a consulta
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produtos</title>

    <link rel="stylesheet" href="ccs/styles.css">
</head>

<body>

<div class="container">

<h2>Lista de Produtos</h2>

<!-- Botão para novo produto -->
<a href="produto_novo.php" class="btn">Novo Produto</a>

<table>

<tr>
<th>ID</th>
<th>Nome</th>
<th>Preço</th>
<th>Estoque</th>
<th>Ações</th>
</tr>

<?php
// Loop de exibir todos os produtos
while($row = $result->fetch_assoc()) {
?>

<tr>

<td><?= $row['id'] ?></td>

<td><?= $row['nome'] ?></td>

<td>R$ <?= $row['preco'] ?></td>

<td><?= $row['estoque'] ?></td>

<td>

<!-- Link envia ID via URL -->
<a href="produto_editar.php?id=<?= $row['id'] ?>">Editar</a>

<!-- Confirmação antes de excluir -->
<a href="produto_excluir.php?id=<?= $row['id'] ?>"
onclick="return confirm('Deseja excluir?')">Excluir</a>

</td>

</tr>

<?php } ?>

</table>

<br>

<a href="index.php" class="btn">Voltar</a>

</div>

</body>
</html>
<?php
session_start();
include("conexao.php");

// Proteção de acesso
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Verifica se o formulário foi enviado
if ($_POST) {

    // SQL de inserção
    $sql = "INSERT INTO produtos (nome, descricao, preco, estoque)
            VALUES (?, ?, ?, ?)";

    // Prepara a query
    $stmt = $conn->prepare($sql);

    // Associa os valores recebidos do formulário
    $stmt->bind_param(
        "ssdi",
        $_POST['nome'],
        $_POST['descricao'],
        $_POST['preco'],
        $_POST['estoque']
    );

    // Executa o INSERT
    $stmt->execute();

    // Mensagem de sucesso
    $sucesso = "Produto cadastrado!";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Novo Produto</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<h2>Novo Produto</h2>

<!-- Formulário de cadastro -->
<form method="POST">

<input name="nome" placeholder="Nome" required>

<textarea name="descricao" placeholder="Descrição"></textarea>

<input type="number" step="0.01" name="preco" placeholder="Preço" required>

<input type="number" name="estoque" placeholder="Estoque" required>

<button type="submit">Salvar</button>

</form>

<!-- Mensagem de sucesso -->
<?php if(isset($sucesso)) echo "<p class='sucesso'>$sucesso</p>"; ?>

<br>

<a href="produtos.php">Voltar</a>

</div>

</body>
</html>
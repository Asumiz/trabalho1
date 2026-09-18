<?php
session_start();
include("conexao.php");

// Proteção
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Captura ID enviado pela URL
$id = $_GET['id'];

// Busca dados do produto
$result = $conn->query("SELECT * FROM produtos WHERE id=$id");

// Converte resultado em array
$produto = $result->fetch_assoc();

// Se formulário foi enviado
if ($_POST) {

    // SQL de atualização
    $sql = "UPDATE produtos 
            SET nome=?, descricao=?, preco=?, estoque=? 
            WHERE id=?";

    // Prepara a query
    $stmt = $conn->prepare($sql);

    // Associa parâmetros
    $stmt->bind_param(
        "ssdii",
        $_POST['nome'],
        $_POST['descricao'],
        $_POST['preco'],
        $_POST['estoque'],
        $id
    );

    // Executa UPDATE
    $stmt->execute();

    $sucesso = "Produto atualizado!";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar Produto</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<h2>Editar Produto</h2>

<!-- Formulário preenchido com dados atuais -->
<form method="POST">

<input name="nome" value="<?= $produto['nome'] ?>">

<textarea name="descricao"><?= $produto['descricao'] ?></textarea>

<input name="preco" value="<?= $produto['preco'] ?>">

<input name="estoque" value="<?= $produto['estoque'] ?>">

<button type="submit">Atualizar</button>

</form>

<?php if(isset($sucesso)) echo "<p>$sucesso</p>"; ?>

<br>

<a href="produtos.php">Voltar</a>

</div>

</body>
</html>
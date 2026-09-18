<?php
// Inicia sessão
session_start();

// Proteção: se não estiver logado, volta para login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<!-- Exibe usuário logado -->
<h1>Bem-vindo, <?= $_SESSION['usuario']; ?>!</h1>

<!-- Link para módulo de produtos -->
<a href="produtos.php" class="btn">Gerenciar Produtos</a>

<br><br>

<!-- Logout -->
<a href="logout.php" class="btn sair">Sair</a>

</div>

</body>
</html>
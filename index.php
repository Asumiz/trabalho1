
<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./ccs/styles.css">
</head>

<body>

    <div class="container">

        <h1>Bem-vindo, <?= $usuario ?>!</h1>

        <p>Você está logado no sistema.</p>

        <a href="produtos.php" class="btn">
            Produtos
        </a>

        <a href="logout.php" class="btn">
            Sair
        </a>

    </div>

</body>

</html>


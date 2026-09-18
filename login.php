
<?php

session_start();

include("conexao.php");

$erro = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Consulta no banco
    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {

        $stmt->bind_param("ss", $usuario, $senha);

        $stmt->execute();

        $result = $stmt->get_result();

        // Se encontrou usuário
        if ($result->num_rows > 0) {

            $_SESSION['usuario'] = $usuario;

            header("Location: index.php");
            exit;

        } else {

            $erro = "Usuário ou senha inválidos!";
        }

        $stmt->close();

    } else {

        $erro = "Erro ao consultar o banco de dados.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <!-- CSS do projeto -->
    <link rel="stylesheet" href="./ccs/styles.css">

</head>

<body>

    <div class="login-container">

        <h2>Login</h2>

        <?php if (!empty($erro)): ?>

            <p class="erro">
                <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?>
            </p>

        <?php endif; ?>

        <form action="login.php" method="POST">

            <div class="input-group">

                <label for="usuario">
                    Usuário
                </label>

                <input
                    type="text"
                    name="usuario"
                    id="usuario"
                    required
                >

            </div>

            <div class="input-group">

                <label for="senha">
                    Senha
                </label>

                <input
                    type="password"
                    name="senha"
                    id="senha"
                    required
                >

            </div>

            <button type="submit" class="btn">
                Entrar
            </button>

        </form>

    </div>

</body>

</html>


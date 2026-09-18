<?php
session_start();
include("conexao.php");

// Verifica se o formulário foi enviado 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Captura os dados digitados
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha']; 

    // Consulta no banco
    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";

    // Prepara a query
    $stmt = $conn->prepare($sql);

    // Associa parâmetros
    $stmt->bind_param("ss", $usuario, $senha);

    // Executa
    $stmt->execute();

    // Resultado
    $result = $stmt->get_result();

    // Se encontrou usuário
    if ($result->num_rows > 0) {

        // Cria sessão
        $_SESSION['usuario'] = $usuario;

        // Redireciona
        header("Location: index.php");
        exit;

    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>


?>
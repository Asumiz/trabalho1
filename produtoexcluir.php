<?php
session_start();
include("conexao.php");

// Proteção
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Captura ID da URL
$id = $_GET['id'];

// Executa DELETE no banco
$conn->query("DELETE FROM produtos WHERE id=$id");

// Redireciona para listagem
header("Location: produtos.php");
exit;
?>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "desenvolvimento_software";
//Dados de conexão com banco

//Cria conexão com o banco
$conn = new mysqli($host, $user, $pass, $db);

//Verifica conexão
if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}
?>
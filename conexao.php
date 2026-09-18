<?php
$server = "localhost:3306";
$username = "root";
$password = "root";
$database = "desenvolvimento_software";
//Dados de conexão com banco

//Cria conexão com o banco
$conn = new mysqli($server, $username, $password, $database);

//Verifica conexão
if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}
?>
<?php
// Configurações do banco de dados
$servername = "localhost"; // Nome do servidor, geralmente 'localhost'
$username = "grupor27_rootxdb"; // Usuário do banco de dados
$password = "rootxdb215!@"; // Senha do banco de dados
$dbname = "grupor27_agendamento_exames"; // Nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>

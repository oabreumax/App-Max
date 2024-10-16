<?php
include 'db.php';

$cpf = $_POST['cpf'];
$password = $_POST['password'];

// Busca o usuário pelo CPF
$sql = "SELECT * FROM users WHERE cpf = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cpf);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verifica a senha
    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user'] = $user;
        header("Location: painel.php");
    } else {
        echo "CPF ou senha incorretos!";
    }
} else {
    echo "Usuário não encontrado!";
}
?>

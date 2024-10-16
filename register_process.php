<?php
include 'db.php';

$cpf = $_POST['cpf'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha para maior segurança

// Verifica se o CPF já existe
$sql = "SELECT * FROM users WHERE cpf = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cpf);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "CPF já cadastrado!";
} else {
    // Insere o novo usuário
    $sql = "INSERT INTO users (cpf, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $cpf, $password);

    if ($stmt->execute()) {
        header("Location: login.php");
    } else {
        echo "Erro ao cadastrar!";
    }
}
?>

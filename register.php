<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Cadastrar-se</h2>
        <form action="register_process.php" method="POST">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>

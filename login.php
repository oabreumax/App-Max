<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login_process.php" method="POST">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Entrar</button>
        </form>
        <a href="register.php">Cadastrar-se</a> | 
        <a href="forgot_password.php">Esqueceu a senha?</a>
    </div>
</body>
</html>

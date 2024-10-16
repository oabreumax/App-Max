<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Painel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="panel-container">
        <h2>Meu Painel</h2>
        <a href="exames.php"><button>Exames</button></a>
        <a href="cartao_fidelidade.php"><button>Cartão Fidelidade</button></a>
        <a href="secretaria_parceira.php"><button>Secretária Parceira</button></a>
    </div>
</body>
</html>

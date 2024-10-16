<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';

$user_id = $_SESSION['user']['id'];

$sql = "SELECT agendamentos.*, exames.nome AS exame_nome, cidades.nome AS cidade_nome, unidades.nome AS unidade_nome
        FROM agendamentos
        JOIN exames ON agendamentos.exame_id = exames.id
        JOIN cidades ON agendamentos.cidade_id = cidades.id
        JOIN unidades ON agendamentos.unidade_id = unidades.id
        WHERE agendamentos.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex

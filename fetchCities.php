<?php
include 'db.php';

$exame_id = $_POST['exame_id'];

$sql = "SELECT DISTINCT cidades.id, cidades.nome FROM unidades
        JOIN cidades ON unidades.cidade_id = cidades.id
        WHERE unidades.exame_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $exame_id);
$stmt->execute();
$result = $stmt->get_result();

$cidades = [];
while ($row = $result->fetch_assoc()) {
    $cidades[] = $row;
}

echo json_encode($cidades);
?>

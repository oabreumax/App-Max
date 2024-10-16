<?php
include 'db.php';

$cidade_id = $_POST['cidade_id'];

$sql = "SELECT id, nome FROM unidades WHERE cidade_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $cidade_id);
$stmt->execute();
$result = $stmt->get_result();

$unidades = [];
while ($row = $result->fetch_assoc()) {
    $unidades[] = $row;
}

echo json_encode($unidades);
?>

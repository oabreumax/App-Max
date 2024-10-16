<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';

// Carregar exames (supondo que você tenha uma tabela de exames)
$sql = "SELECT * FROM exames";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Exame</title>
    <script>
        function fetchCities(exame_id) {
            if (exame_id !== "") {
                fetch('fetchCities.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'exame_id=' + exame_id,
                })
                .then(response => response.json())
                .then(cidades => {
                    const citySelect = document.getElementById('city');
                    citySelect.disabled = false;
                    citySelect.innerHTML = "<option value=''>Selecione a cidade</option>";
                    cidades.forEach(cidade => {
                        citySelect.innerHTML += `<option value="${cidade.id}">${cidade.nome}</option>`;
                    });
                });
            }
        }

        function fetchUnits(cidade_id) {
            if (cidade_id !== "") {
                fetch('fetchUnits.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'cidade_id=' + cidade_id,
                })
                .then(response => response.json())
                .then(unidades => {
                    const unitSelect = document.getElementById('unit');
                    unitSelect.disabled = false;
                    unitSelect.innerHTML = "<option value=''>Selecione a unidade</option>";
                    unidades.forEach(unidade => {
                        unitSelect.innerHTML += `<option value="${unidade.id}">${unidade.nome}</option>`;
                    });
                });
            }
        }
    </script>
</head>
<body>
    <h1>Agendar Exame</h1>
    <form action="agendar_exame_process.php" method="POST">
        <label for="exam">Selecione o Exame:</label>
        <select name="exam" id="exam" onchange="fetchCities(this.value)">
            <option value="">Selecione o exame</option>
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?= $row['id']; ?>"><?= $row['nome']; ?></option>
            <?php endwhile; ?>
        </select>
        
        <label for="city">Cidade:</label>
        <select name="city" id="city" disabled onchange="fetchUnits(this.value)">
            <option value="">Selecione a cidade</option>
        </select>
        
        <label for="unit">Unidade:</label>
        <select name="unit" id="unit" disabled>
            <option value="">Selecione a unidade</option>
        </select>

        <label for="date">Data:</label>
        <input type="date" name="date" required>

        <label for="time">Hora:</label>
        <input type="time" name="time" required>

        <input type="submit" value="Agendar Exame">
    </form>
</body>
</html>

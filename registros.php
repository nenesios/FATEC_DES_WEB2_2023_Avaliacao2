<?php
session_start();

if (!isset($_SESSION['online']) || $_SESSION['online'] !== true) {
    header('Location: index.php');
    exit();
}

// Conectar ao banco de dados
include 'conexao.php';

// Consulta para obter todas as placas
$query = "SELECT placa FROM veiculos";
$result = $pdo->query($query);
$placas = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verificar Veículos</title>
</head>
<body>
    <h2>Verificar Veículos</h2>
    <form method="POST" action="registros_encontrados.php">
        <label for="placa">Selecionar Placa:</label>
        <select name="placa" id="placa" required>
            <?php
            foreach ($placas as $placa) {
                echo "<option value='" . $placa['placa'] . "'>" . $placa['placa'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Acessar">
    </form><br><br>
    <a href="principal.php">Voltar</a>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION['online']) || $_SESSION['online'] !== true) {
    header('Location: index.php');
    exit();
}

// Conectar ao banco de dados
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $placa = $_POST['placa'];

    
    $query = "INSERT INTO veiculos (nome_completo, placa) VALUES (:nome, :placa)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':placa', $placa);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Novas Placas</title>
</head>
<body>
    <h2>Cadastrar Novas Placas</h2>
    <form method="POST">
        <label for="nome">Nome Completo:</label>
        <input type="text" name="nome" id="nome" required><br>
        <label for="placa">Placa do Veículo:</label>
        <input type="text" name="placa" id="placa" required><br>
        <input type="submit" value="Cadastrar">
    </form><br><br>
    <a href="principal.php">Voltar</a>
</body>
</html>

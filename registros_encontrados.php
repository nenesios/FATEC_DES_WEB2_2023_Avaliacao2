<?php
session_start();

if (!isset($_SESSION['online']) || $_SESSION['online'] !== true) {
    header('Location: index.php');
    exit();
}

// Conectar ao banco de dados
include 'conexao.php';

if (isset($_POST['placa'])) {
    $placa = $_POST['placa'];
    $query = "SELECT nome_completo FROM veiculos WHERE placa = :placa"; 
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':placa', $placa);
    $stmt->execute();
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    header('Location: registros.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registros Encontrados</title>
</head>
<body>
    <h2>Registros Encontrados para a Placa: <?= $placa ?></h2>
    <ul>
        <?php
        foreach ($registros as $registro) {
            echo "<li>Nome: " . $registro['nome_completo'] . "</li>"; 
            
        }
        ?>
    </ul><br><br>
    <a href="registros.php">Nova Busca</a><br><br>
    <a href="principal.php">Voltar</a>
</body>
</html>

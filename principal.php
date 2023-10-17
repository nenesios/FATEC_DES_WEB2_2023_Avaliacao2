<?php
session_start();

if (!isset($_SESSION['online']) || $_SESSION['online'] !== true) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página Principal</title>
</head>
<body>
    <h2>Bem-vindo, <?= $_SESSION['username'] ?></h2>
    <a href="registros.php">Verificar Veículos</a><br><br>
    <a href="cadastro.php">Cadastrar Novas Placas</a><br><br>
    <a href="logout.php">Logout</a>
</body>
</html>

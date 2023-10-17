<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['nome'] == 'fatec' && $_POST['senha'] == 'portaria') {
        $_SESSION['online'] = true;
        $_SESSION['username'] = "Portaria Fatec";
        header('Location: principal.php');
        exit();
    } else {
        echo "Login ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Área de Login</title>
</head>
<body>
    <h2>Área de Login</h2>
    <form method="POST">
        <label for="nome">Login:</label>
        <input type="text" name="nome" id="nome" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>

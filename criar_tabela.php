<?php
try {
    // Configurações do banco de dados
    $host = "localhost"; 
    $dbname = "portaria"; 
    $username = "root"; 
    $password = ""; 

    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criar a tabela 'veiculos' 
    $queryVeiculos = "CREATE TABLE veiculos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome_completo VARCHAR(255) NOT NULL,
        placa VARCHAR(10) NOT NULL
    )";

    $pdo->exec($queryVeiculos);

    // Criar a tabela 'registro'
    $queryRegistro = "CREATE TABLE registro (
        id INT AUTO_INCREMENT PRIMARY KEY,
        placa VARCHAR(10) NOT NULL,
        data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $pdo->exec($queryRegistro);

    echo "Tabelas criadas com sucesso.";
} catch (PDOException $e) {
    die("Erro ao criar as tabelas: " . $e->getMessage());
}
?>

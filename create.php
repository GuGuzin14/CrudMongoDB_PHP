<?php
// create.php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar dados do formulário
    $atividade = $_POST['atividade'];
    $data = $_POST['data'];

    // Preparar o documento para inserção
    $bulk = new MongoDB\Driver\BulkWrite;
    $document = ['atividade' => $atividade, 'data' => $data];
    $bulk->insert($document);

    // Inserir no MongoDB
    $manager->executeBulkWrite('trabalho.atividades', $bulk);

    echo "Site cadastrado com sucesso!";
    header('Location: read.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Atividade</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container input[type="text"],
        .form-container input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="create.php" method="post">
            <label for="atividade">Nome da atividade:</label>
            <input type="text" id="atividade" name="atividade" required><br>
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required><br>
            <input type="submit" value="Adicionar Atividade">
        </form>
    </div>
</body>
</html>
<?php
// read.php
require 'connection.php';

// Criar uma consulta vazia para buscar todos os documentos
$query = new MongoDB\Driver\Query([]);

// Executar a consulta
$cursor = $manager->executeQuery('trabalho.atividades', $query);

// Exibir os resultados
echo "<h2 style='text-align: center;'>Lista de Atividades</h2>";
echo "<div style='display: flex; justify-content: center;'>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nome</th><th>Endereço</th></tr>";
foreach ($cursor as $document) {
    echo "<tr>";
    echo "<td>" . $document->_id . "</td>";
    echo "<td>" . $document->atividade . "</td>";
    echo "<td>" . $document->data . "</td>";
    echo "<td>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
echo "<div style='text-align: center; margin-top: 20px;'>";
echo "<a href='create.php' style='padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;'>Voltar para Criar Atividade</a>";
echo "</div>";
?>

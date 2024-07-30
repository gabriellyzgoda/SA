<?php
include_once('config.php');

if (isset($_GET['q'])) {
    $query = $_GET['q'];

    // Evita caracteres especiais (SQL Injection)
    $query = $conexao->real_escape_string($query);

    // Consulta ao banco de dados para encontrar produtos que correspondam ao texto digitado
    $sql = "SELECT DISTINCT produto
            FROM pedidos 
            WHERE produto LIKE '%$query%' 
            LIMIT 10";
    
    $result = $conexao->query($sql);

    $suggestions = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $suggestions[] = $row;
        }
    }
    
            $sql = "SELECT produto, GROUP_CONCAT(posicao SEPARATOR ',') as positions 
            FROM pedidos 
            WHERE produto LIKE '%$query%' 
            GROUP BY produto 
            LIMIT 10";

            $result = $conexao->query($sql);

            $suggestions = [];
            if ($result) {
            while ($row = $result->fetch_assoc()) {
                $row['positions'] = explode(',', $row['positions']);
                $suggestions[] = $row;
            }
            }
    header('Content-Type: application/json');
    echo json_encode($suggestions);
}
?>

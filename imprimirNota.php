<!DOCTYPE html>
<html>
<?php
session_start();
include_once('config.php');
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Imprimir Nota Fiscal</title>
  <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
  <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="estiloVerDanfe.css" media="screen"/>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
  </style>
</head>
<body>
    <?php
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT 
                    danfe.*, 
                    pedidos.totalcompra AS totalcompra_pedidos,
                    solicitacoes.totalcompra AS totalcompra_solicitacoes
                FROM 
                    danfe
                LEFT JOIN 
                    pedidos ON danfe.id = pedidos.id_danfe
                LEFT JOIN 
                    solicitacoes ON danfe.id = solicitacoes.id_danfe
                WHERE 
                    danfe.id = '$id';";

        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Código de Barras</th>';
            echo '<th>Número</th>';
            echo '<th>Série</th>';
            echo '<th>Operação</th>';
            echo '<th>Data de Emissão</th>';
            echo '<th>Hora de Emissão</th>';
            echo '<th>Total Compra</th>'; 
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            if ($row = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["codbarra"] . '</td>';
                echo '<td>' . $row["n"] . '</td>';
                echo '<td>' . $row["serie"] . '</td>';
                if ($row["operacao"] == 1) {
                echo '<td>' . "Entrada" . '</td>';
                } elseif ($row["operacao"] == 0) {
                echo '<td>' . "Saída" . '</td>';
                }                
                echo '<td>' . $row["data_emissao"] . '</td>';
                echo '<td>' . $row["hora_emissao"] . '</td>';

                if (!empty($row["totalcompra_pedidos"])) {
                    echo '<td>' . $row["totalcompra_pedidos"] . '</td>'; // Total da tabela pedidos
                } elseif (!empty($row["totalcompra_solicitacoes"])) {
                    echo '<td>' . $row["totalcompra_solicitacoes"] . '</td>'; // Total da tabela solicitações
                } else {
                    echo '<td>Nenhum total disponível!</td>';
                }

                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo "<p>Nenhum registro encontrado.</p>";
        }
    }

    $conexao->close();
    ?>
</body>
<script>
    window.onload = function() {
        setTimeout(function() {
            window.print();
        }, 1000);
    };
</script>
</html>

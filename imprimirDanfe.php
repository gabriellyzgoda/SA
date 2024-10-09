<!DOCTYPE html>
<html>
<?php
session_start();
include_once('config.php');
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Imprmir Nota Fiscal</title>
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
            while ($row = $resultado->fetch_assoc()) {
                $id = $row["id"];
                $codbarra = $row["codbarra"];
                $n = $row["n"];
                $serie = $row["serie"];
                $operacao = $row["operacao"];
                $data_emissao = $row["data_emissao"];
                $hora_emissao = $row["hora_emissao"];
                $totalcompra = $row["totalcompra"];
                echo '<tr>';
                        echo '<td>' . $id . '</td>';
                        echo '<td>' . $codbarra . '</td>';
                        echo '<td>' . $n . '</td>';
                        echo '<td>' . $serie . '</td>';
                        echo '<td>' . $operacao . '</td>';
                        echo '<td>' . $data_emissao . '</td>';
                        echo '<td>' . $hora_emissao . '</td>';
                        echo '<td>' . $totalcompra . '</td>';
                        echo '</tr>';
            }
        }
    }

    // Fecha a conexão
    $conexao->close();
    ?>
    </div>

</body>
<script>
    setTimeout(function imp(){
        window.print();

},1000);
</script>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || $_SESSION['professor'] != 0) {
  header("Location: unauthorized.php");
  exit;
}

if (isset($_SESSION['id_turma'])) {
  $id_turma = $_SESSION['id_turma']; 

  $sql = "SELECT nome FROM turma WHERE id = '$id_turma'";
  $resultado = $conexao->query($sql);

  if ($resultado->num_rows > 0) {
      $row = $resultado->fetch_assoc();
      $nome_turma = $row['nome'];
  } else {
      $nome_turma = "Turma não encontrada";
  }
} else {
  $nome_turma = "Nenhuma turma selecionada"; 
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalhes Pedido</title>
  <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
  <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="estiloDetalhesPedido.css" media="screen" />

  <link rel="stylesheet" type="text/css" href="estiloPedido.css" media="screen" />
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
  </style>
</head>

<body>
  <header class="header-topo">
    <div class="logSenai">
      <a href="home.php"><img src="imagens/logo-logsenai.png" alt="Minha Figura" width="75" height="auto"></a>
    </div>
    <div class="logo">
      <a href="home.php"><img src="imagens/senai-branco.png" alt="Minha Figura" width="250" height="auto"></a>
    </div>
    <div class="menu-header">
      <div class="dropdown-perfil">
        <a href="#">
          <div class="circulo">
            <i class="fa-solid fa-user"></i>
          </div>
        </a>
        <div class="dropdown-content">
              <div class="dropdown-section">
                <h4>Nome:</h4>
                <p><?php echo $_SESSION['nome'];?></p>
              </div>
              <div class="dropdown-section">
                <h4>Email:</h4>
                <p><?php echo $_SESSION['email'];?></p>
              </div>
              <div class="dropdown-section">
                <h4>Cargo:</h4>
                <p><?php echo $_SESSION['cargo'];?></p>
              </div>
              <div class="dropdown-section">
                <h4>Turma:</h4>
                <p><?php echo $nome_turma; ?></p>
              </div>
            </div>
      </div>
      <a href="sair.php"><i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
  </header>
  <div class="sidebar close">

    <div class="logo-details">

      <i class="bx bx-menu"></i>
      <span class="logo_name">Menu</span>

    </div>

    <ul class="nav-links">

      <li>

        <div class="iocn-link">

          <a href="#">
            <i class="fa-solid  fa-truck-front"></i>
            <span class="link_name">Recebimento</span>
          </a>

          <i class='bx bxs-chevron-down arrow'></i>

        </div>

        <ul class="sub-menu">

          <li><a class="link_name" href="#">Recebimento</a></li>
          <li><a href="container.php">Container</a></li>
          <li><a href="carga.php">Carga</a></li>
          <li><a href="pedidodoca.php">Docas</a></li>

        </ul>

      </li>

      <li>

        <div class="iocn-link">

          <a href="movimentacao.php">
            <i class="fa-solid fa-truck-ramp-box"></i>
            <span class="link_name">Movimentação</span>
          </a>

        </div>

        <ul class="sub-menu">

          <li><a class="link_name" href="movimentacao.php">Movimentação</a></li>

        </ul>

      </li>

      <li>

        <a href="estoque.php">
          <i class="fa-solid fa-warehouse"></i>
          <span class="link_name">Estoque</span>
        </a>

        <ul class="sub-menu blank">
          <li><a class="link_name" href="estoque.php">Estoque</a></li>
        </ul>

      </li>

      <li>

        <a href="picking.php">
          <i class="fa-solid fa-box"></i>
          <span class="link_name">Picking</span>
        </a>

        <ul class="sub-menu blank">
          <li><a class="link_name" href="picking.php">Picking</a></li>
        </ul>

      </li>

      <li>

        <div class="iocn-link">

          <a href="#">
            <i class="fa-solid fa-truck-fast"></i>
            <span class="link_name">Expedição</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>

        </div>

        <ul class="sub-menu">
          <li><a href="expedicao.php">Expedição</a></li>
          <li><a href="vistoriaConferencia.php">Vistoria e Conferência</a></li>
          <li><a href="criarNota.php">Criação de Nota Fiscal</a></li>
          <li><a href="minhanota.php">Minhas Danfe's</a></li>
        </ul>

      </li>

      <li>

        <div class="iocn-link">

          <a href="controleSolicitacoes.php">
            <i class="fa-solid fa-pen-to-square"></i>
            <span class="link_name">Controle</span>
          </a>

          <i class='bx bxs-chevron-down arrow'></i>

        </div>

        <ul class="sub-menu">

          <li><a href="controleSolicitacoes.php">Solicitações</a></li>

        </ul>

      </li>
      <li>
        <a href="relatorios.php">
          <i class="fa-solid fa-file"></i>
          <span class="link_name">Relatório</span>
        </a>

        <ul class="sub-menu blank">
          <li><a class="link_name" href="relatorios.php">Relatório</a></li>
        </ul>
      </li>

    </ul>
  </div>
  <div class="conteudo">
    <div class="titulo-conteudo">
      <?php
      if (isset($_GET['pedido'])) {
        $pedido = $_GET['pedido'];

        $sql = "SELECT * FROM pedidos WHERE pedido = '$pedido'";

        $resultado = $conexao->query($sql);
      } else {
        echo "<p>Número de pedido não especificado.</p>";
      }
      if (isset($pedido)) {
        echo "<h1>Pedido nº $pedido</h1>";
      }
      ?>
    </div>
    <div class="linhaD">
      <div class="quadroD">
        <div class="borda-quadro">
          <div class="borda">
            <div class="quadro-pedidos">
              <div class="titulo-quadro-pedidos">
                <p>Produtos</p>
              </div>
              <div class="produtos">
                <?php
                if ($resultado && $resultado->num_rows > 0) {
                  $contador = 1; // Inicia o contador para a numeração fictícia de 1 a 4
                  while ($row = $resultado->fetch_array()) {
                ?>
                    <div class="produto">
                      <div class="linha1">
                        <div class="quadrado-numero">
                          <p><?php echo $contador; ?></p>
                        </div>
                        <input type="text" name="produto" value="<?php echo $row['produto']; ?>" disabled>
                      </div>
                      <div class="linha2">
                        <div class="bloco">
                          <label>UN</label>
                          <input type="text" name="unidades" value="<?php echo $row['unidades']; ?>" disabled>
                        </div>
                        <div class="bloco">
                          <label>QTD</label>
                          <input type="text" name="quantidades" value="<?php echo $row['quantidades']; ?>" disabled>
                        </div>
                        <div class="bloco">
                          <label>R$/Un</label>
                          <input type="text" name="valor" value="R$ <?php echo $row['valor']; ?>" disabled>
                        </div>
                        <div class="bloco">
                          <label>R$ Total</label>
                          <input type="text" name="total" value="R$ <?php echo $row['total']; ?>" disabled>
                        </div>
                      </div>
                    </div>
                <?php
                    $contador++; // Incrementa o contador para a próxima numeração fictícia
                  }
                } else {
                  echo "<p>Erro na consulta: " . $conexao->error . "</p>";
                }
                ?>
              </div>
              <div class="linhaFinal">
                <a href="pedidodoca.php"><button>Voltar</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include_once('footer.php');
  ?>
  <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement; 
        arrowParent.classList.toggle("showMenu");
      });
    }

    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    });
  </script>
</body>

</html>
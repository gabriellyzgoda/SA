<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
  header("Location: login.php?erro=false");
  exit;
}

$produtosFiltrados = [];

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
  } else {
    // Protege a entrada do usuário contra SQL Injection
    $produtoPesquisa = $conexao->real_escape_string($_POST['produto']);

    // Consulta produtos com base na pesquisa
    $sql = "SELECT posicao, produto, quantidades 
                FROM pedidos 
                WHERE produto 
                LIKE '%$produtoPesquisa%'";

    $resultado = $conexao->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
      while ($row = $resultado->fetch_assoc()) {
        $posicao = $row['posicao'];
        if (!isset($produtosFiltrados[$posicao])) {
          $produtosFiltrados[$posicao] = [];
        }
        $produtosFiltrados[$posicao][] = [
          'produto' => $row['produto'],
          'quantidades' => $row['quantidades']
        ];
      }
    }
  }
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estoque</title>
  <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
  <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="estiloEstoque.css" media="screen" />
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    /* estiloEstoque.css */
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
            <p><?php echo $_SESSION['nome']; ?></p>
          </div>
          <div class="dropdown-section">
            <h4>Email:</h4>
            <p><?php echo $_SESSION['email']; ?></p>
          </div>
          <div class="dropdown-section">
            <h4>Cargo:</h4>
            <p><?php echo $_SESSION['cargo']; ?></p>
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
          <i class='bx bxs-chevron-down arrow' ></i>
          
        </div>
        
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Expedição</a></li>
          <li><a href="vistoriaConferencia.php">Vistoria e Conferência</a></li>
          <li><a href="expedicao.php">Expedição</a></li>
        </ul>

      </li>

      <li>

        <div class="iocn-link">

          <a href="#">
            <i class="fa-solid fa-pen-to-square"></i>
            <span class="link_name">Controle</span>
          </a>

          <i class='bx bxs-chevron-down arrow'></i>

        </div>

        <ul class="sub-menu">

          <li><a class="link_name" href="#">Controle</a></li>

          <li><a href="controleSolicitacoes.php">Solicitações</a></li>
          <li><a href="designarprodutos.php">Designar Produtos</a></li>

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
    </ul><!--Fecha ul-->
  </div>
  <div class="conteudo">
    <div class="titulo-conteudo">
      <h1>Estoque</h1>
    </div>
    <div class="linhaE">
      <div class="blocoE1">
        <div class="linhasBloco01">
          <form id="formPlaca" class="form" method="POST" action="estoque.php">
            <div class="linhaPesquisa">
              <input type="text" name="produto" id="produto" placeholder="Pesquise um produto">
              <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
          </form>
        </div>
        <div class="resultado">
          <?php
          if (!empty($produtosFiltrados)) : ?>
            <?php foreach ($produtosFiltrados as $posicao => $produtos) : ?>
              <div class="linhaResultado">
                <?php foreach ($produtos as $produtoData) : ?>
                  <p>Produto: <?php echo htmlspecialchars($produtoData['produto']); ?></p>
                  <p>Quantidades: <?php echo htmlspecialchars($produtoData['quantidades']); ?></p>
                  <h4>Posição: <?php echo htmlspecialchars($posicao); ?></h4>
                <?php endforeach; ?>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="blocoE2">
        <div class="tituloE2">
          <p>Posições</p>
        </div>
        <div class="button-container">
          <!-- Linha  1 - Posições A -->
          <div id="button-row1" class="button-row">
            <button id="A1">A1</button>
            <button id="A2">A2</button>
            <button id="A3">A3</button>
            <button id="A4">A4</button>
          </div>
          <!-- Linha 2 - Posições B -->
          <div id="button-row2" class="button-row">
            <button id="B1">B1</button>
            <button id="B2">B2</button>
            <button id="B3">B3</button>
            <button id="B4">B4</button>
          </div>
          <!-- Linha 3 - Posições C -->
          <div id="button-row3" class="button-row">
            <button id="C1">C1</button>
            <button id="C2">C2</button>
            <button id="C3">C3</button>
            <button id="C4">C4</button>
          </div>
          <!-- Linha 4 - Posições D -->
          <div id="button-row4" class="button-row">
            <button id="D1">D1</button>
            <button id="D2">D2</button>
            <button id="D3">D3</button>
            <button id="D4">D4</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include_once('footer.php');
  ?>
  <script>
    // Dados das posições e produtos filtrados
    const produtosPorPosicao = <?php echo json_encode($produtosFiltrados); ?>;

    function destacarBotoes() {
      // Destaca automaticamente os botões com base nas posições dos produtos filtrados
      document.querySelectorAll('.button-container button').forEach(button => {
        if (produtosPorPosicao[button.id]) {
          button.classList.add('destaque');
          button.classList.remove('desmarcado');
        } else {
          button.classList.remove('destaque');
          button.classList.add('desmarcado');
        }
      });
    }

    // Chama a função para destacar os botões após a página carregar
    destacarBotoes();
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement; // Seleciona o pai principal da seta
        arrowParent.classList.toggle("showMenu");
      });
    }

    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    sidebarBtn.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    });
  </script>
</body>

</html>
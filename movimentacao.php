<!DOCTYPE html>
<html lang="en">
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
  <title>Movimentação</title>
  <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
  <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="estiloMovimentacao.css" media="screen" />
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
          <i class='bx bxs-chevron-down arrow' ></i>
          
        </div>
        
        <ul class="sub-menu">
        <li><a href="expedicao.php">Expedição</a></li>
        <li><a href="vistoriaConferencia.php">Vistoria e Conferência</a></li>
        </ul>

      </li>

      <li>
          
          <div class="iocn-link">
            
            <a href="#">
            <i class="fa-solid fa-receipt"></i>
              <span class="link_name">Nota fiscal</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
          
            <li><a href="criarNota.php">Criar Danfe</a></li>
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
      <h1>Movimentação</h1>
    </div>
  </div>
  <div class="linha-movimentacao">
    <div class="quadro-movimentacao">
      <div class="quadro-tabela">
        <table>
          <thead>
            <tr>
              <th>Operações em Aberto</th>
              <th>UN</th>
              <th>QTD</th>
              <th>Posição</th>
              <th></th>
            </tr>
          </thead>
          <?php $sql = "SELECT * FROM pedidos
            WHERE 1";
          // puxa conexão
          $resultado = $conexao->query($sql);
          // Verifica se há pedidos
          if ($resultado->num_rows > 0) {
          ?>
          <tbody>
            <form class="form" method="post" action="operacaoMovimentacao.php" id="formlogin" name="formlogin">
              <?php
              $sql = "SELECT * FROM pedidos WHERE 1";
              $resultado = $conexao->query($sql);
              $index = 0; // Índice para distinguir cada linha
              while ($user_data = mysqli_fetch_assoc($resultado)) {
                echo '<tr>
                            <td><input type="text" name="operacao_' . $index . '" readonly value="' . $user_data['produto'] . '"></td>
                            <td><input type="text" name="un_' . $index . '" readonly value="' . $user_data['unidades'] . '"></td>
                            <td><input type="text" name="qtd_' . $index . '" readonly value="' . $user_data['quantidades'] . '"></td>
                            <td>
                                <select name="posicao_' . $index . '">
                                    <option value="">Selecione</option>
                                    <option value="A1" ' . ($user_data['posicao'] == 'A1' ? 'selected' : '') . '>A1</option>
                                    <option value="A2" ' . ($user_data['posicao'] == 'A2' ? 'selected' : '') . '>A2</option>
                                    <option value="A3" ' . ($user_data['posicao'] == 'A3' ? 'selected' : '') . '>A3</option>
                                    <option value="A4" ' . ($user_data['posicao'] == 'A4' ? 'selected' : '') . '>A4</option>
                                    <option value="B1" ' . ($user_data['posicao'] == 'B1' ? 'selected' : '') . '>B1</option>
                                    <option value="B2" ' . ($user_data['posicao'] == 'B2' ? 'selected' : '') . '>B2</option>
                                    <option value="B3" ' . ($user_data['posicao'] == 'B3' ? 'selected' : '') . '>B3</option>
                                    <option value="B4" ' . ($user_data['posicao'] == 'B4' ? 'selected' : '') . '>B4</option>
                                    <option value="C1" ' . ($user_data['posicao'] == 'C1' ? 'selected' : '') . '>C1</option>
                                    <option value="C2" ' . ($user_data['posicao'] == 'C2' ? 'selected' : '') . '>C2</option>
                                    <option value="C3" ' . ($user_data['posicao'] == 'C3' ? 'selected' : '') . '>C3</option>
                                    <option value="C4" ' . ($user_data['posicao'] == 'C4' ? 'selected' : '') . '>C4</option>
                                    <option value="D1" ' . ($user_data['posicao'] == 'D1' ? 'selected' : '') . '>D1</option>
                                    <option value="D2" ' . ($user_data['posicao'] == 'D2' ? 'selected' : '') . '>D2</option>
                                    <option value="D3" ' . ($user_data['posicao'] == 'D3' ? 'selected' : '') . '>D3</option>
                                    <option value="D4" ' . ($user_data['posicao'] == 'D4' ? 'selected' : '') . '>D4</option>
                                </select>
                            </td>
                            <td><input id="selecionar" type="checkbox" name="select_' . $index . '" value="' . $user_data['id'] . '"></td>
                        </tr>';
                $index++;
              }
              ?>
          </tbody>
          <?php
          } else {
            echo '<tbody><tr><td colspan="5" style="text-align: center;"><p id="operacao">Nenhuma operação em aberto</p></td></tr></tbody>';
          }
          ?>
        </table>
      </div>
      <?php if ($resultado->num_rows > 0) { ?>
      <div class="linhaBM">
        <input class="" type="submit" value="Operação de Movimentação >>>" />
      </div>
      <?php } ?>
      </form>
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
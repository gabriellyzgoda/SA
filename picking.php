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
  <title>Picking</title>
  <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
  <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="estiloPicking.css" media="screen" />
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
        </ul>

      </li>

      <li>

        <div class="iocn-link">

          <a href="#">
            <i class="fa-solid fa-receipt"></i>
            <span class="link_name">Nota fiscal</span>
          </a>

          <i class='bx bxs-chevron-down arrow'></i>

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
      <h1>Picking</h1>
    </div>
    <div class="faixa">
      <div class="bloco-picking">
        <div class="linha1">
          <form class="form" method="POST" action="picking.php">
            <div class="filter1">
              <p>Digite uma data:</p>
              <input type="date" id="data" name="data">
              <button type="button" id="buscarSolicitacao"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="filter2">
              <label>Solicitação nº:</label>
              <select id="solicitacao" name="solicitacao">
                <option value="">Selecione...</option>
              </select>
              <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        </form>
        <div class="linha2">
          <table>
            <?php
            if (isset($_POST['solicitacao'])) {
              if ($conexao->connect_errno) {
                echo "Failed to connect to MySQL: " . $conexao->connect_error;
                exit();
              } else {
                // Evita caracteres especiais (SQL Inject)
                $solicitacao = $conexao->real_escape_string($_POST['solicitacao']);
                $sql = "SELECT * FROM `solicitacoes` WHERE `solicitacao`='" . $solicitacao . "';";
                $resultado = $conexao->query($sql);

                if ($resultado && $resultado->num_rows > 0) {
                  echo '<thead>
                                <tr>
                                    <th>Produtos do Picking</th>
                                    <th>UN</th>
                                    <th>QTD</th>
                                    <th>Posição</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>';
                  $index = 0;
                  while ($row = $resultado->fetch_array()) {
                    echo '
                                 <form class="form" method="POST" action="atualizarSolicitacao.php">
                                <tr>
                                    <td><input type="text" name="produto_' . $index . '" value="' . $row['produto'] . '" readonly></td>
                                    <td><input type="text" name="unidades_' . $index . '" value="' . $row['unidades'] . '" readonly></td>
                                    <td><input type="text" name="quantidades_' . $index . '" value="' . $row['quantidades'] . '" readonly></td>
                                    <td>
                                        <select name="posicao_' . $index . '">
                                            <option value="">Selecione</option>
                                            <option value="A1" ' . ($row['posicao'] == 'A1' ? 'selected' : '') . '>A1</option>
                                            <option value="A2" ' . ($row['posicao'] == 'A2' ? 'selected' : '') . '>A2</option>
                                            <option value="A3" ' . ($row['posicao'] == 'A3' ? 'selected' : '') . '>A3</option>
                                            <option value="A4" ' . ($row['posicao'] == 'A4' ? 'selected' : '') . '>A4</option>
                                            <option value="B1" ' . ($row['posicao'] == 'B1' ? 'selected' : '') . '>B1</option>
                                            <option value="B2" ' . ($row['posicao'] == 'B2' ? 'selected' : '') . '>B2</option>
                                            <option value="B3" ' . ($row['posicao'] == 'B3' ? 'selected' : '') . '>B3</option>
                                            <option value="B4" ' . ($row['posicao'] == 'B4' ? 'selected' : '') . '>B4</option>
                                            <option value="C1" ' . ($row['posicao'] == 'C1' ? 'selected' : '') . '>C1</option>
                                            <option value="C2" ' . ($row['posicao'] == 'C2' ? 'selected' : '') . '>C2</option>
                                            <option value="C3" ' . ($row['posicao'] == 'C3' ? 'selected' : '') . '>C3</option>
                                            <option value="C4" ' . ($row['posicao'] == 'C4' ? 'selected' : '') . '>C4</option>
                                            <option value="D1" ' . ($row['posicao'] == 'D1' ? 'selected' : '') . '>D1</option>
                                            <option value="D2" ' . ($row['posicao'] == 'D2' ? 'selected' : '') . '>D2</option>
                                            <option value="D3" ' . ($row['posicao'] == 'D3' ? 'selected' : '') . '>D3</option>
                                            <option value="D4" ' . ($row['posicao'] == 'D4' ? 'selected' : '') . '>D4</option>
                                        </select>
                                    </td>
                                    <td><input id="selecionar" type="checkbox" name="select_' . $index . '" value="' . $row['id'] . '"></td>
                                </tr>';
                    $index++;
                  }
                  echo '</tbody>
                            </table>
                            <div class="linha3">
                                <button type="submit">Finalizar Picking</button>
                            </div>';
                } else {
                  echo '<tbody>
                                <tr>
                                    <td colspan="5"><p>Nenhuma solicitação encontrada.</p></td>
                                </tr>
                            </tbody>';
                }
              }
            }
            ?>
          </table>
          </form>
        </div>
      </div>
    </div>
    <?php
    include_once('footer.php');
    ?>
    <script>
      document.getElementById('buscarSolicitacao').addEventListener('click', function() {
        const data = document.getElementById('data').value;
        if (!data) {
          alert('Por favor, selecione uma data.');
          return;
        }

        fetch('buscar_picking.php?data=' + encodeURIComponent(data))
          .then(response => response.json())
          .then(data => {
            const solicitacaoSelect = document.getElementById('solicitacao');
            solicitacaoSelect.innerHTML = '<option value="">Selecione...</option>'; // Limpar opções existentes
            data.forEach(solicitacao => {
              const option = document.createElement('option');
              option.value = solicitacao;
              option.textContent = solicitacao;
              solicitacaoSelect.appendChild(option);
            });
          })
          .catch(error => console.error('Erro ao buscar solicitações:', error));
      });
      document.getElementById('id').addEventListener('blur', function() {
        var id = this.value;
        var erroMsg = document.getElementById('idErro');

        // Verificar se o ID não está vazio
        if (id.trim() === '') {
          erroMsg.style.display = 'none';
          return;
        }
      });

      document.addEventListener('DOMContentLoaded', function() {
        const pegarBtns = document.querySelectorAll('.pegar-btn');

        pegarBtns.forEach(btn => {
          btn.addEventListener('click', function(e) {
            e.preventDefault(); // Impede o envio do formulário padrão

            const form = this.closest('form');
            const formData = new FormData(form);

            fetch('atualizarSolicitacao.php', {
                method: 'POST',
                body: formData
              })
              .then(response => response.text())
              .then(data => {
                alert(data);
                location.reload(); // Atualiza a página após o sucesso
              })
              .catch(error => {
                console.error('Erro:', error);
              });
          });
        });

        document.querySelector('.linha3 button').addEventListener('click', function() {
          window.location.href = 'expedicao.php';
        });
      });
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
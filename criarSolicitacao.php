<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || $_SESSION['professor'] != 1) {
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
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criação de Solicitação de Produto</title>
  <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
  <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="estiloCriarSolicitacao.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen" />
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
  </style>
</head>

<body>
  <header class="header-topo">
    <div class="logSenai">
      <a href="homeP.php"><img src="imagens/logo-logsenai.png" alt="Minha Figura" width="75" height="auto"></a>
    </div>
    <div class="logo">
      <a href="homeP.php"><img src="imagens/senai-branco.png" alt="Minha Figura" width="250" height="auto"></a>
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
            <i class="fa-solid fa-box"></i>
            <span class="link_name">Pedidos</span>
          </a>

          <i class='bx bxs-chevron-down arrow'></i>

        </div>

        <ul class="sub-menu">
            
            <li><a href="criarpedido.php">Criar pedido</a></li>
            <li><a href="meuspedidos.php">Meus pedidos</a></li>
          
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

          <li><a href="criardanfe.php">Criar Danfe</a></li>
          <li><a href="minhadanfe.php">Minhas Danfe's</a></li>

        </ul>

      </li>

      <li>
        <div class="iocn-link">

          <a href="containerP.php">
            <i class="fa-solid fa-warehouse"></i>
            <span class="link_name">Controle</span>
          </a>

          <i class='bx bxs-chevron-down arrow'></i>

        </div>

        <ul class="sub-menu ">
          <li><a href="containerP.php">Container</a></li>

        </ul>

      </li>

      <li>
      <div class="iocn-link">

        <a href="#">
          <i class="fa-solid fa-users"></i>
          <span class="link_name">Alunos</span>
        </a>

        <i class='bx bxs-chevron-down arrow'></i>

        </div>

        <ul class="sub-menu">
          <li><a  href="alunos.php">Alunos</a></li>
          <li><a  href="criarTurma.php">Turmas</a></li>
        </ul>

      </li>


      <li>

        <div class="iocn-link">

          <a href="#">
            <i class="fa-solid fa-clipboard-list fa-lg"></i>
            <span class="link_name">Solicitações</span>
          </a>

          <i class='bx bxs-chevron-down arrow'></i>

        </div>

        <ul class="sub-menu">

          <li><a href="criarSolicitacao.php">Criar Solicitação</a></li>
          <li><a href="solicitacoes.php">Minhas Solicitações</a></li>

        </ul>

      </li>
      <li>
        <a href="relatoriosP.php">
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
      <h1>Criação de Solicitação de Produto</h1>
    </div>
    <div class="criacao-solicitacao">
      <div class="bloco-criacao-solicitacao">
        <form class="form" method="post" action="cadastroSolicitacao.php" id="formPedido">
          <?php if (isset($_SESSION['erro'])): ?>
            <p class="error"><?php echo $_SESSION['erro'];
            unset($_SESSION['erro']); ?></p>
          <?php endif; ?>
          <div class="form-numero">
            <label>Solicitação nº:</label>
            <input type="number" name="solicitacao" id="solicitacao">
            <p id="idErro" class="error" style="display: none;">Este número já está em uso.</p>
          </div>
          <table>
            <thead>
              <tr>
                <th>
                  <p></p>
                </th>
                <th>
                  <p>Produtos:</p>
                </th>
                <th>
                  <p>UN</p>
                </th>
                <th>
                  <p>QTD</p>
                </th>
                <th>
                  <p>R$/Un</p>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="quadrado-numero-produto">1</div>
                </td>
                <td><input type="text" name="produto"></td>
                <td><input type="text" name="unidades"></td>
                <td><input type="number" name="quantidades"></td>
                <td><input type="text" name="valor"></td>
              </tr>
              <tr>
                <td>
                  <div class="quadrado-numero-produto">2</div>
                </td>
                <td><input type="text" name="produto2"></td>
                <td><input type="text" name="unidades2"></td>
                <td><input type="number" name="quantidades2"></td>
                <td><input type="text" name="valor2"></td>
              </tr>
              <tr>
                <td>
                  <div class="quadrado-numero-produto">3</div>
                </td>
                <td><input type="text" name="produto3"></td>
                <td><input type="text" name="unidades3"></td>
                <td><input type="number" name="quantidades3"></td>
                <td><input type="text" name="valor3"></td>
              </tr>
              <tr>
                <td>
                  <div class="quadrado-numero-produto">4</div>
                </td>
                <td><input type="text" name="produto4"></td>
                <td><input type="text" name="unidades4"></td>
                <td><input type="number" name="quantidades4"></td>
                <td><input type="text" name="valor4"></td>
              </tr>
            </tbody>
          </table>
          <div class="tituloObservacoes">
            <p>Observações:</p>
          </div>
          <div class="blocoObservacoes">
            <textarea id="observacoes" name="observacoes" rows="5" cols="65" placeholder="Digite..."></textarea>
          </div>
          <div class="blocoFinal">
            <input type="submit" value="Enviar">
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  include_once('footer.php');
  ?>
  <script>
    document.getElementById('solicitacao').addEventListener('blur', function () {
      var id = this.value;
      var erroMsg = document.getElementById('idErro');

      // Verificar se o ID não está vazio
      if (id.trim() === '') {
        erroMsg.style.display = 'none';
        return;
      }

      // Fazer a solicitação AJAX para verificar o ID
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'verificarSolicitacao.php?solicitacao=' + encodeURIComponent(id), true);
      xhr.onload = function () {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.exists) {
            erroMsg.style.display = 'block';
          } else {
            erroMsg.style.display = 'none';
          }
        }
      };
      xhr.send();
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
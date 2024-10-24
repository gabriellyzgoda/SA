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
  <title>Criação de Turmas</title>
  <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
  <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="estiloCriarTurma.css" media="screen" />
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
          <li><a href="alunos.php">Alunos</a></li>
          <li><a href="criarTurma.php">Turmas</a></li>
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
          <li><a class="link_name" href="relatoriosP.php">Relatório</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <div class="conteudo">
    <div class="titulo-conteudo">
      <h1>Criação de Turmas</h1>
    </div>
    <div class="linhaCriarTurma">
      <div class="quadroCriarTurma">
        <div class="criarTurma">
          <form class="form" method="post" action="cadastroTurmas.php" name="cadastroTurmas">
            <?php if (isset($_SESSION['erro'])): ?>
              <p class="error"><?php echo $_SESSION['erro'];
                                unset($_SESSION['erro']); ?></p>
            <?php endif; ?>
            <input type="hidden" name="nome" value="<?php echo $row['nome'] ?>">
            <label>Digite o nome da turma:</label>
            <input type="text" id="nome" name="nome" required>
            <div class="bloco2">
              <p id="nomeErro" class="error" style="display: none;">O nome da turma já está sendo usado.</p>
            </div>
            <div class="botaoCriar">
              <input class="" type="submit" value="Criar" />
            </div>
          </form>
        </div>

        <div class="turmas">
          <h2>Lista de Turmas</h2>
          <table>
            <thead>
              <tr>
                <th>Nome da Turma</th>
                <th>Professor da Turma</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <div class="bodyTabela">
                <?php
                $sql = "SELECT turma.id, turma.nome, cadastro.nome AS nome_professor 
            FROM turma 
            JOIN cadastro ON turma.id_professor = cadastro.id";
                $resultado = $conexao->query($sql);
                if ($resultado->num_rows > 0) {
                  while ($turma = $resultado->fetch_assoc()) {
                    echo "<tr>
                          <td><div><p>{$turma['nome']}</p></div></td>
                          <td><div><p>{$turma['nome_professor']}</p></div></td>
                        ";
                ?>
                    <td>
                      <div class='botaoDeletar' onclick='confirmarExclusao(<?php echo $turma["id"]; ?>)'>
                        <i class='fa-solid fa-trash'></i>
                      </div>
                    </td>
                <?php
                  }
                } else {
                  echo "<tr><td colspan='3'>Nenhuma turma cadastrada.</td></tr>";
                }
                $conexao->close();
                ?>
              </div>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>

  <?php
  include_once('footer.php');
  ?>
  <script>
    document.getElementById('nome').addEventListener('blur', function() {
      var nome = this.value;
      var erroMsg = document.getElementById('nomeErro');

      if (nome.trim() === '') {
        erroMsg.style.display = 'none';
        return;
      }

      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'verificarTurma.php?nome=' + encodeURIComponent(nome), true);
      xhr.onload = function() {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.exists) {
            erroMsg.style.display = 'block'; // Exibe a mensagem de erro
          } else {
            erroMsg.style.display = 'none'; // Esconde a mensagem de erro
          }
        }
      };
      xhr.send();
    });

    function confirmarExclusao(id) {
      if (confirm("Tem certeza que deseja excluir esta turma?")) {
        window.location.href = "deleteTurma.php?id=" + id;
      }
    }

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
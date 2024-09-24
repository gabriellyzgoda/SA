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
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criação de Turmas</title>
  <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
  <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="estiloAlunos.css" media="screen" />
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

        <a href="alunos.php">
          <i class="fa-solid fa-users"></i>
          <span class="link_name">Alunos</span>
        </a>

        <ul class="sub-menu blank">
          <li><a class="link_name" href="alunos.php">Alunos</a></li>
          <li><a class="link_name" href="criarTurma.php">Turmas</a></li>
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
    </ul><!--Fecha ul-->
  </div>
  <center>
  <div class="conteudo">
    <div class="titulo-conteudo">
      <h1>Crie Turmas</h1>
    </div>
    <form class="form" method="post" action="cadastroTurmas.php" name="cadastroTurmas">
      <label>Digite o nome da turma que você quer criar:</label>
      <input type="text" name="nome" required>
      <div class="quadroBotao">
        <input class="" type="submit" value="Criar"/>
      </div>
    </form>

    <div class="turmas">
      <h2>Lista de Turmas</h2>
      <table>
        <thead>
          <tr>
            <th>Número da Turma</th>
            <th>Nome da Turma</th>
            <th>Professor da Turma</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT turma.id, turma.nome, cadastro.nome AS nome_professor 
            FROM turma 
            JOIN cadastro ON turma.id_professor = cadastro.id";
            $resultado = $conexao->query($sql);
          if ($resultado->num_rows > 0) {
              while ($turma = $resultado->fetch_assoc()) {
                  echo "<tr>
                          <td>{$turma['id']}</td>
                          <td>{$turma['nome']}</td>
                          <td>{$turma['nome_professor']}</td>
                        ";
              ?>
              <td>
                <div class='botaoDeletar' onclick='confirmarExclusao(<?php echo $turma["id"]; ?>)'>
              <i class='fa-solid fa-trash'></i>
                </div></td>
            <?php
            }
            } else {
              echo "<tr><td colspan='3'>Nenhuma turma cadastrada.</td></tr>";
          }
          $conexao->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>
  </center>
  <?php
  include_once('footer.php');
  ?>
  <script>
    function confirmarExclusao(id) {
      if (confirm("Tem certeza que deseja excluir esta turma?")) {
        window.location.href = "deleteTurma.php?id=" + id;
      }
    }
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
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
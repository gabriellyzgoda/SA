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
  <title>Lista de Alunos</title>
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
      <h1>Lista de alunos da turma: <?php echo $nome_turma?></h1>
    </div>
    <div class="quadro-alunos">
      <table>
        <thead>
          <tr>
            <th>Alunos</th>
            <th>Senha</th>
            <th>Cargo</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
            if(empty($id_turma)){
              echo "Nenhuma turma selecionada";
            }
            $id_professor = $_SESSION['id']; 

            $sqlProfessor = "SELECT cadastro.id AS id, cadastro.nome AS nome_aluno, turma.nome AS nome_turma, cadastro.senha AS senha, cadastro.cargo AS cargo
                              FROM cadastro 
                              JOIN turma ON cadastro.id_turma = turma.id 
                              WHERE turma.id_professor = $id_professor AND cadastro.professor = 0 AND cadastro.id_turma = $id_turma;
                              ";

            $resultado = $conexao->query($sqlProfessor);

            while ($user_data = $resultado->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $user_data['nome_aluno'] . "</td>";
              echo "<td>" . $user_data['senha'] . "</td>";
              echo "<td>" . $user_data['cargo'] . "</td>";
              ?>
              <td>
                  <div class="botaoEditar" onclick="editarAluno(<?php echo $user_data['id']; ?>, '<?php echo $user_data['nome_aluno']; ?>', '<?php echo $user_data['senha']; ?>', '<?php echo $user_data['cargo']; ?>')">
                      <i class="fa-solid fa-pen-to-square"></i>
                  </div>
                  <div class="botaoDeletar" onclick="confirmarExclusao(<?php echo $user_data['id']; ?>)">
                      <i class="fa-solid fa-trash"></i>
                  </div>
              </td>
              <?php
              echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <div id="formPopup" class="form-popup">
      <form id="editForm" class="form-container" method="POST" action="salvar.php">
        <div class="config-form">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="novonome" required>
          <label for="senha">Senha:</label>
          <div class="newPassword">
            <input type="text" id="senha" name="novosenha" required>
            <button type="button" id="generatePassword" class="btn"><i class="fa-solid fa-arrows-rotate"></i></button>
          </div>
          <div id="passwordPopup" class="popup-content"></div>
          <label for="cargo">Cargo:</label>
          <input type="text" id="cargo" name="novocargo" required>
          <input type="hidden" id="userId" name="userId">
          <div class="botoes-form">
            <button type="submit" class="btn" value="Salvar">Salvar</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Fechar</button>
          </div>
        </div>
      </form>
    </div>
    <div class="overlay" id="overlay" style="display: none;"></div>
  </div>
  <?php
  include_once('footer.php');
  ?>
  <script>
    document.getElementById('generatePassword').addEventListener('click', function() {
      const password = generateRandomPassword();
      const passwordInput = document.getElementById('senha');
      const passwordPopup = document.getElementById('passwordPopup');

      passwordInput.value = password;
      passwordPopup.style.display = 'block';

      setTimeout(() => {
        passwordPopup.style.display = 'none';
      }, 3000);
    });

    function generateRandomPassword(length = 4) {
      const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      let password = "";
      for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        password += charset[randomIndex];
      }
      return password;
    }

    function confirmarExclusao(id) {
      if (confirm("Tem certeza que deseja excluir este aluno?")) {
        window.location.href = "delete.php?id=" + id;
      }
    }

    function editarAluno(id, nome, senha, cargo) {
      document.getElementById("userId").value = id;
      document.getElementById("nome").value = nome;
      document.getElementById("senha").value = senha;
      document.getElementById("cargo").value = cargo;
      document.getElementById("formPopup").style.display = "block";
      document.getElementById("editForm").style.display = "block";
      document.getElementById("overlay").style.display = "block";
    }

    function closeForm() {
      document.getElementById("formPopup").style.display = "none";
      document.getElementById("editForm").style.display = "none";
      document.getElementById("overlay").style.display = "none";
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
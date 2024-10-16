<!DOCTYPE html>
<html lang="pt-BR">
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Pedido</title>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="estiloAbrirSolicitacao.css" media="screen"/>
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
            <a href="#" >
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
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
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
        <?php
            if (isset($_GET['solicitacao'])) {
                $solicitacao = $_GET['solicitacao'];
            
                $sql = "SELECT * FROM solicitacoes WHERE solicitacao = '$solicitacao'";
                
                $resultado = $conexao->query($sql);
                
            } 
                    if (isset($solicitacao)) {
                        echo "<h1>Solicitação nº $solicitacao</h1>";
                    }
        ?>
    </div>
    <div class="borda-quadro">
        <div class="borda">
            <div class="quadro-pedidos">
                <div class="titulo-quadro-pedidos"><p>Solicitações</p></div>
                <div class="produtos">
                  <?php
                  if ($resultado && $resultado->num_rows > 0) {
                      $contador = 1; // Inicia o contador para a numeração fictícia de 1 a 4
                      while ($row = $resultado -> fetch_array()) {
                  ?>
                  <div class="produto">
                      <div class="linha1">
                          <div class="quadrado-numero"><p><?php echo $contador; ?></p></div>
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
                    <a href="solicitacoes.php"><button>Voltar</button></a>
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
        arrow[i].addEventListener("click", (e)=>{
            let arrowParent = e.target.parentElement.parentElement; // selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    sidebarBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
    });
</script>
</body>
</html>

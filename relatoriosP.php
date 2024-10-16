<!DOCTYPE html>
<html lang="pt">
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
    <title>Relatórios</title>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="estiloRelatoriosP.css" media="screen"/>
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
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
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
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
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
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
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
         <h1>Relatório da turma: <?php echo $nome_turma?></h1>
        </div>
        <div class="linhaR">
          <div class="quadroR">
            <div class="linha01">
              <form method="POST" action="">
                <label for="tabela">Selecione uma tabela:</label>
                <select name="tabela" id="tabela">
                    <?php
                    $sql = "SHOW TABLES";
                    $resultado = $conexao->query($sql);

                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_array()) {
                            $tabela_selecionada = isset($_POST['tabela']) ? $_POST['tabela'] : '';
                            $selected = ($row[0] == $tabela_selecionada) ? 'selected' : '';
                            echo "<option value='" . $row[0] . "' $selected>" . $row[0] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Nenhuma tabela encontrada</option>";
                    }
                    ?>
                </select>
                <button type="submit">OK</button>
              </form>
            </div>
            <?php
        if (isset($_POST['tabela'])) {
            $tabela = $_POST['tabela'];
            $tabelas_permitidas = ['container', 'pedidos', 'danfe', 'dadoscliente', 'solicitacoes', 'turma'];

            if (in_array($tabela, $tabelas_permitidas)) {
                if ($tabela == 'turma') {
                    $sql = "SELECT * FROM turma"; // Consulta todos os registros da tabela turma
                } else {
                    $sql = "SELECT * FROM $tabela WHERE id_turma = ?";
                    $stmt = $conexao->prepare($sql);
                    $stmt->bind_param("i", $id_turma);
                    $stmt->execute();
                    $resultado = $stmt->get_result();
                }
                
                if ($tabela == 'turma') {
                    $resultado = $conexao->query($sql);
                }

                if ($resultado->num_rows > 0) {
                    echo "<div class='linha02'><div class='quadroTabela'><table border='1'>";
                    echo "<tr>";
                    $fields = $resultado->fetch_fields();
                    foreach ($fields as $field) {
                        echo "<th>" . $field->name . "</th>";
                    }
                    echo "</tr>";

                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($row as $value) {
                            echo "<td>" . $value . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table></div></div>";
                } else {
                    echo "<div class='semDados'><p>Nenhum dado encontrado na tabela $tabela.</p></div>";
                }
            }
        }
        ?>
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
     let arrowParent = e.target.parentElement.parentElement;
     arrowParent.classList.toggle("showMenu");
      });
    }
    
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("close");
    });

</script>
</body>
</html>
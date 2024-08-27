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
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criação de Nota Fiscalr</title>
  <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
  <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="estiloCriarDanfe.css" media="screen" />
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
            <p><?php echo $_SESSION["nome"]; ?></p>
          </div>
          <div class="dropdown-section">
            <h4>Email:</h4>
            <p><?php echo $_SESSION["email"]; ?></p>
          </div>
          <div class="dropdown-section">
            <h4>Cargo:</h4>
            <p><?php echo $_SESSION["cargo"]; ?></p>
          </div>
        </div>
      </div>
      <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i></a>
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
            
            <li><a class="link_name" href="#">Pedidos</a></li>
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

          <li><a class="link_name" href="#">Nota fiscal</a></li>
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

        <a href="alunos.php">
          <i class="fa-solid fa-users"></i>
          <span class="link_name">Alunos</span>
        </a>

        <ul class="sub-menu blank">
          <li><a class="link_name" href="alunos.php">Alunos</a></li>
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

          <li><a class="link_name" href="#">Solicitações</a></li>
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
  <div class="conteudo">
    <div class="titulo-conteudo">
      <h1>Criação de Nota Fiscal de Entrada</h1>
    </div>
    <div class="quadro-conteudo">
      <div class="bloco-conteudo">
          <div class="chave">
            <form class="form" method="POST" action="criardanfe.php">
                <p>Digite o Nº do Pedido</p>
                <input class="" type="text" name="pedido" id="pedido" size="20">
                <button type="submit">OK</button>
            </form>
            <?php
            if(isset($_POST['pedido'])) {
              if ($conexao -> connect_errno) {
                echo "Failed to connect to MySQL: " . $conexao -> connect_error;
                exit();
              } else {
                // Evita caracteres epsciais (SQL Inject)
                $pedido = $conexao -> real_escape_string($_POST['pedido']);
              
                $sql="SELECT *
                        FROM `pedidos`
                        WHERE `pedido`='".$pedido."';";
              
                $resultado = $conexao->query($sql);
                
                if($resultado->num_rows != 0)
                {
                  $row = $resultado -> fetch_array();
                  ?>
            <form class="form" method="POST" action="cadastroDanfe.php">
            <?php if (isset($_SESSION['erro'])): ?>
              <p class="error"><?php echo $_SESSION['erro']; unset($_SESSION['erro']); ?></p>
            <?php endif; ?>
            <div>
              <input type="hidden" name="pedido" value="<?php echo $row['pedido'] ?>">
              <p>Chave de Acesso:</p>
              <input class="" type="text" name="id" id="id" size="20" required>
              <p id="idErro" class="error" style="display: none;">O número da Nota Fiscal já está em uso.</p>
            </div>
          </div>
          <div class="informacoes">
            <div class="informacoesBloco1">
              <img src="imagens/codigo-barras.png" alt="Minha Figura" width="200" height="auto">
              <input type="number" name="codbarra" id="codbarra" value=gerarNumeroUnico()>
            </div>
            <div class="informacoesBloco2">
              <p>Nome/Razão Social: SERVICO NACIONAL DE APRENDIZAGEM INDUSTRIAL SENAI</p>
              <p>CNPJ: 33564543 0001 90</p>
              <p>CEP: Rua Henrique Vigarani, 163 - Barra do Rio, Itajaí, SC</p>
              <p>Inscrição Estadual: 03.851.105/0001-42</p>
              <p>Tel: (47) 98437-1137</p>
            </div>
          </div>
          <div class="dados">
            <div class="dadosBloco1">
              <div class="Bloco1-1">
                <div class="bloco1-linha1">
                  <label>Nº:</label>
                  <input type="number" name="n" value="n">
                </div>
                <div class="bloco1-linha2">
                  <label>Série:</label>
                  <input type="number" name="serie">
                </div>
              </div>
              <div class="Bloco1-2">
                <div class="bloco12-linha1"><label>Operação:</label></div>
                <div class="bloco12-linha2">
                  <input type="checkbox" id="entrada" name="entrada" />
                  <label>Entrada</label>
                </div>
              </div>
            </div>
            <div class="dadosBloco2">
              <label>Data de Emissão:</label>
              <input type="date" id="data_emissao" name="data_emissao">
            </div>
            <div class="dadosBloco3">
              <label>Hora da Emissão:</label>
              <input type="time" id="hora_emissao" name="hora_emissao">
            </div>
          </div>
          <div class="titulo-destinatario">
            <h2>REMETENTE</h2>
          </div>
          <div class="nome-destinatario">
            <label>Nome/Razão social:</label>
            <input type="text" name="razao_nome" value="SERVICO NACIONAL DE APRENDIZAGEM INDUSTRIAL SENAI" readonly>
          </div>
          <div class="informacoes-destinatario">
            <div class="destinatarioBloco1">
              <label>CNPJ:</label>
              <input type="text" name="cnpjd" value="33564543 0001 90" readonly>
            </div>
            <div class="destinatarioBloco2">
              <label>Inscrição Estadual:</label>
              <input type="text" name="ie" value="03.851.105/0001-42" readonly>
            </div>
            <div class="destinatarioBloco3">
              <label>Valor total da nota:</label>
              <input type="text" name="total" readonly value="<?php echo $row['totalcompra'] ?>">
            </div>
            
      <div class="destinatarioBloco4">
              <input type="submit" value="Criar" name="criar">
            </div>
      </form>
      <?php
                }}}
      ?>
      </div>
    </div>
  </div>
  </div>
<?php
include_once('footer.php');
?>
  <script>
    document.getElementById('id').addEventListener('blur', function() {
      var id = this.value;
      var erroMsg = document.getElementById('idErro');

      // Verificar se o ID não está vazio
      if (id.trim() === '') {
        erroMsg.style.display = 'none';
        return;
      }

      // Fazer a solicitação AJAX para verificar o ID
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'verificarDanfe.php?id=' + encodeURIComponent(id), true);
      xhr.onload = function() {
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
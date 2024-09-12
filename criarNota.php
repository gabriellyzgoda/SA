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
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Aluno</title>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="estiloCriarDanfe.css" media="screen" />
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
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
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
              
      </ul><!--Fecha ul-->
    </div>        
    <center>
    <div class="conteudo">
    <div class="titulo-conteudo">
      <h1>Criação de Nota Fiscal da Expedição</h1>
    </div>
    <div class="quadro-conteudo">
      <div class="bloco-conteudo">
          <div class="chave">
            <form class="form" method="POST" action="criarNota.php">
                <p>Digite o Nº da Solicitação</p>
                <input class="" type="text" name="solicitacao" id="solicitacao" size="20">
                <button type="submit">OK</button>
            </form>
            <?php
            if(isset($_POST['solicitacao'])) {
              if ($conexao -> connect_errno) {
                echo "Failed to connect to MySQL: " . $conexao -> connect_error;
                exit();
              } else {
                // Evita caracteres epsciais (SQL Inject)
                $solicitacao = $conexao -> real_escape_string($_POST['solicitacao']);
              
                $sql = "SELECT *
                      FROM solicitacoes
                      WHERE solicitacao = '$solicitacao';";
                $resultado = $conexao->query($sql);
                
                if($resultado->num_rows != 0)
                {
                  $row = $resultado -> fetch_array();
                  ?>
            <form class="form" method="POST" action="cadastroNota.php">
            <?php if (isset($_SESSION['erro'])): ?>
            <p class="error"><?php echo $_SESSION['erro']; unset($_SESSION['erro']); ?></p>
            <?php endif; ?>
            <div>
              <input type="hidden" name="solicitacao" value="<?php echo $row['solicitacao'] ?>">
              <p>Chave de Acesso:</p>
              <input class="" type="text" name="id" id="id" size="20" required>
              <p id="idErro" class="error" style="display: none;">O número da Nota Fiscal já está em uso.</p>
            </div>
          </div>
          <div class="informacoes">
            <div class="informacoesBloco1">
              <img src="imagens/codigo-barras.png" alt="Minha Figura" width="200" height="auto">
              <input type="number" name="codbarra" id="codbarra" >
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
                  <label>Nº</label>
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
                  <input type="checkbox" id="saida" name="saida" />
                  <label>Saída</label>
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
            <h2>DESTINATÁRIO</h2>
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
                <input type="text" name="total" readonly value="<?php echo $row['totalcompra']; ?>">
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
  </center>
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
      xhr.open('GET', 'verificarNota.php?id=' + encodeURIComponent(id), true);
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
      arrow[i].addEventListener("click", (e)=>{
     let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
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

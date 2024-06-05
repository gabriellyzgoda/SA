<!DOCTYPE html>
<html lang="pt">
<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if(!isset($_SESSION['email'])) {
    header("Location: login.php?erro=false");
    exit;
}
$sql = "SELECT * FROM cadastro
WHERE professor != 0";
// puxa conexão
$resultado = $conexao->query($sql);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Professor</title>
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="estiloCriarDanfe.css" media="screen"/>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
</head>
<body>
    <header class="header-topo">
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
                <p><?php echo $_SESSION["nome"];?></p>
              </div>
              <div class="dropdown-section">
                <h4>Email:</h4>
                <p><?php echo $_SESSION["email"];?></p>
              </div>
              <div class="dropdown-section">
                <h4>Cargo:</h4>
                <p><?php echo $_SESSION["cargo"];?></p>
              </div>
            </div>
          </div>
          <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i></a>      
        </div>
    </header>
    <div class="sidebar ">
      
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
            
            <li><a class="link_name" href="#">Pedidos</a></li>
            <li><a href="meuspedidos.php">Meus pedidos</a></li>
            <li><a href="criarpedido.php">Criar pedido</a></li>
          
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
          
            <li><a class="link_name" href="#">Nota fiscal</a></li>
            <li><a href="criardanfe.php">Criar Danfe</a></li>
            <li><a href="minhadanfe.php">Minhas Danfe's</a></li>
          
          </ul>

        </li>

        <li>
          
          <a href="controleP.php">
            <i class="fa-solid fa-warehouse"></i>
            <span class="link_name">Controle</span>
          </a>

          <ul class="sub-menu blank">
            <li><a class="link_name" href="controleP.php">Controle</a></li>
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
          
            <a href="relatoriosP.php">
            <i class="fa-solid fa-file-lines"></i>
              <span class="link_name">Relatórios</span>
            </a>
            
          </div>
          
          <ul class="sub-menu">
            <li><a class="link_name" href="relatoriosP.php">Relatórios</a></li>
          </ul>
        </li>  
        <li>
          
          <div class="iocn-link">
            
            <a href="#">
            <i class="fa-solid fa-receipt"></i>
              <span class="link_name">Solicitações</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
          
            <li><a class="link_name" href="#">Solicitações</a></li>
            <li><a href="criarSolicitacao.php">Criar Solicitação</a></li>
            <li><a href="solicitacoes.php">Minhas Solicitações</a></li>
          
          </ul>

        </li>   
      </ul><!--Fecha ul-->
    </div>   
    <div class="conteudo"> 
        <div class="titulo-conteudo">    
         <h1>Criação de Nota Fiscal</h1>
        </div>
        <div class="quadro-conteudo">
          <div class="bloco-conteudo">
            <form>
            <div class="chave">
                <p>Chave de Acesso:</p>
                <input class="" type="text" name="acesso" id="acesso" size="20">
            </div>
            <div class="informacoes">
              <div class="informacoesBloco1">
                <img src="imagens/codigo-barras.png" alt="Minha Figura" width="200" height="auto">
                <input type="number" name="acesso" id="acesso" value="1234567899032" >
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
                    <input type="checkbox" id="saida" name="operacao" />
                    <label>Saída</label>
                    <input type="checkbox" id="entrada" name="operacao" />
                    <label>Entrada</label>
                  </div>
                </div>
              </div>
              <div class="dadosBloco2">
                <label>Data de Emissão:</label>
                <input type="date" name="data_emissao">
              </div>
              <div class="dadosBloco3">
                <label>Hora da Emissão:</label>
                <input type="time" name="hora_emissao">
              </div>
            </div>
            <div class="titulo-destinatario"><h2>DESTINATÁRIO</h2></div>
            <div class="nome-destinatario">
              <label>Nome/Razão social:</label>
              <input type="text" name="razao_nome">
            </div>
            <div class="informacoes-destinatario">
              <div class="destinatarioBloco1">
                <label>CNPJ:</label>
                <input type="text" name="cnpjd">
              </div>
              <div class="destinatarioBloco2">
                <label>Inscrição Estadual:</label>
                <input type="text" name="ie">
              </div>
              <div class="destinatarioBloco3">
                <label>Valor total da nota:</label>
                <input type="text" value="R$" name="total">
              </div>
              <div class="destinatarioBloco4">
                <input type="submit" value="Criar" name="criar">
              </div>
</form>
            </div>
          </div>
        </div>
    </div>     
    <footer>
        <div class="linha-footer"><div>
        <center>
            <p>Gabrielly, Letícia, Julia e Amanda</br>
            3º ano da Turma de desenvolvimento de sistemas do Sesi</p>
        </center>
    </footer>

    <script>
  
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
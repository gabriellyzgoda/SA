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
    <title>Criação de Pedidos</title>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloCriarPedido.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
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
            <li><a class="link_name" href="relatorios.php">Relatório</a></li>
          </ul>
        </li>  
      </ul>
    </div>     
    <div class="conteudo"> 
        <div class="titulo-conteudo">    
         <h1>Criação de Pedidos</h1>
        </div>
        <div class="criacao-pedido">
          <div class="bloco-criacao-pedido">
              <form class="form" method="post" action="cadastroPedido.php" id="formPedido">
              <?php if (isset($_SESSION['erro'])): ?>
                        <p class="error"><?php echo $_SESSION['erro']; unset($_SESSION['erro']); ?></p>
                    <?php endif; ?>
                    <div class="form-numero">
                        <label>Pedido nº:</label>
                        <input type="number" name="pedido" id="pedido" required>
                        <p id="pedidoErro" class="error" style="display: none;">O número do pedido já está em uso.</p>
                    </div>
                <table>
                  <thead>
                    <tr>
                        <th><p></p></th>
                        <th><p>Produtos:</p></th>
                        <th><p>UN</p></th>
                        <th><p>QTD</p></th>
                        <th><p>R$/Un</p></th>
                        <th><p>NCM</p></th>
                        <th><p>CST</p></th>
                        <th><p>CFOP</p></th>
                        <th><p>Total</p></th>
                        
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td><div class="quadrado-numero-produto">1</div></td>
                          <td><input type="text" name="produto" required></td>
                          <td><input type="text" name="unidades" required></td>
                          <td><input type="number" name="quantidade1" id="quantidade1" onchange="calcularTotal()" required></td>
                          <td><input type="number" name="valor1" id="valor1" onchange="calcularTotal()" required></td>
                          <td><input type="number" name="ncm" required></td>
                          <td><input type="number" name="cst" required></td>
                          <td><input type="number" name="cfop" required></td>
                          <td><input type="text" name="total1" id="total1" readonly></input></td>                         
                      </tr> 
                      <tr>
                          <td><div class="quadrado-numero-produto">2</div></td>
                          <td><input type="text" name="produto2" required></td>
                          <td><input type="text" name="unidades2" required></td>
                          <td><input type="number" name="quantidade2" id="quantidade2" onchange="calcularTotal()" required></td>
                          <td><input type="number" name="valor2" id="valor2" onchange="calcularTotal()" required></td>
                          <td><input type="number" name="ncm2" required></td>
                          <td><input type="number" name="cst2" required></td>
                          <td><input type="number" name="cfop2" required></td>
                          <td><input type="text" name="total2" id="total2" readonly></input></td>                          
                      </tr>
                      <tr>
                          <td><div class="quadrado-numero-produto" >3</div></td>
                          <td><input type="text" name="produto3" required></td>
                          <td><input type="text" name="unidades3" required></td>
                          <td><input type="number" name="quantidade3" id="quantidade3" onchange="calcularTotal()" required></td>
                          <td><input type="number" name="valor3" id="valor3" onchange="calcularTotal()" required></td>
                          <td><input type="number" name="ncm3" required></td>
                          <td><input type="number" name="cst3" required></td>
                          <td><input type="number" name="cfop3" required></td>
                          <td><input type="text" name="total3" id="total3" readonly></input></td>                          
                      </tr>
                      <tr>
                          <td><div class="quadrado-numero-produto" >4</div></td>
                          <td><input type="text" name="produto4" required></td>
                          <td><input type="text" name="unidades4" required></td>
                          <td><input type="number" name="quantidade4" id="quantidade4" onchange="calcularTotal()" required></td>
                          <td><input type="number" name="valor4" id="valor4" onchange="calcularTotal()" required></td>
                          <td><input type="number" name="ncm4" required></td>
                          <td><input type="number" name="cst4" required></td>
                          <td><input type="number" name="cfop4" required></td>
                          <td><input type="text" name="total4" id="total4" readonly></input></td>                          
                      </tr>
                    </tbody>
                  </table>
                  <div class="adicionarProduto">
                    <p>Dados do cliente:</p>
                  </div>
                  <div class="dadosClienteBloco">
                    <div class="clienteBloco1">
                      <div  class="clienteBlocoLinha">
                        <label>Nome:</label>
                        <input  type="text" name="nome" required>
                      </div>
                      <div class="clienteBlocoLinha">
                        <label>Endereço:</label>
                        <input  type="text" name="endereco"required>
                      </div>
                      <div  class="clienteBlocoLinha">
                        <label>Data:</label>
                        <input id="data" type="date" name="data" required>
                      </div>
                    </div>
                    <div class="clienteBloco2">
                      <div class="clienteBlocoLinha">
                        <label>Telefone:</label>
                        <input  type="number" name="telefone" required>
                      </div>
                      <div  class="clienteBlocoLinha">
                        <label>Email:</label>
                        <input  type="text" name="email" required>
                      </div>
                      <div class="clienteBlocoLinha">
                        <label>CNPJ:</label>
                        <input  type="text" name="cnpj" required>
                      </div>
                    </div>
                  </div>
                  <div class="blocoFinal">
                    <div class="blocoBotaoCriarPedido">
                      <input type="submit" value="Enviar">
                    </div> 
                  <div class="totalCompra">
                  <label>Total da Compra:</label>
                    <input type="text" name="totalcompra" id="totalcompra" readonly></input>
                  </div>
              </form>
          </div>
        </div>
    </div>
<?php
include_once('footer.php');
?>
    <script>
    function calcularTotal() {
        const valorUnitario1 = parseFloat(document.getElementById('valor1').value) || 0;
        const quantidade1 = parseInt(document.getElementById('quantidade1').value) || 0;
        const valorUnitario2 = parseFloat(document.getElementById('valor2').value) || 0;
        const quantidade2 = parseInt(document.getElementById('quantidade2').value) || 0;
        const valorUnitario3 = parseFloat(document.getElementById('valor3').value) || 0;
        const quantidade3 = parseInt(document.getElementById('quantidade3').value) || 0;
        const valorUnitario4 = parseFloat(document.getElementById('valor4').value) || 0;
        const quantidade4 = parseInt(document.getElementById('quantidade4').value) || 0;

        const totalProduto1 = valorUnitario1 * quantidade1;
        const totalProduto2 = valorUnitario2 * quantidade2;
        const totalProduto3 = valorUnitario3 * quantidade3;
        const totalProduto4 = valorUnitario4 * quantidade4;

        document.getElementById('total1').value = totalProduto1.toFixed(2);
        document.getElementById('total2').value = totalProduto2.toFixed(2);
        document.getElementById('total3').value = totalProduto3.toFixed(2);
        document.getElementById('total4').value = totalProduto4.toFixed(2);

        const totalGeral = totalProduto1 + totalProduto2 + totalProduto3 + totalProduto4;

        document.getElementById('totalcompra').value = totalGeral.toFixed(2); // Corrigido aqui
        }
        document.getElementById('pedido').addEventListener('blur', function() {
            var pedido = this.value;
            var erroMsg = document.getElementById('pedidoErro');

            // Verificar se o número do pedido não está vazio
            if (pedido.trim() === '') {
                erroMsg.style.display = 'none';
                return;
            }

            // Fazer a solicitação AJAX para verificar o número do pedido
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'verificarPedido.php?pedido=' + encodeURIComponent(pedido), true);
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
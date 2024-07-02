<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if(!isset($_SESSION['email'])) {
    header("Location: login.php?erro=false");
    exit;
}
$sql = "SELECT * FROM pedidos";
// puxa conexão
$resultado = $conexao->query($sql);

// puxa conexão
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Professor</title>
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
         <h1>Criação de Pedidos</h1>
        </div>
        <div class="criacao-pedido">
          <div class="bloco-criacao-pedido">
              <form class="form" method="post" action="cadastroPedido.php" id="formPedido">
                    <div class="form-numero">
                      <label>Pedido nº:</label>
                      <input type="number" name="pedido">
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
                          <td><input type="text" name="produto"></td>
                          <td><input type="text" name="unidades"></td>
                          <td><input type="number" name="quantidade1" id="quantidade1" onchange="calcularTotal()"></td>
                          <td><input type="text" name="valor1" id="valor1" onchange="calcularTotal()"></td>
                          <td><input type="number" name="ncm"></td>
                          <td><input type="number" name="cst"></td>
                          <td><input type="number" name="cfop"></td>
                          <td><div name="total1" id="total1"></div></td>                          
                      </tr> 
                      <tr>
                          <td><div class="quadrado-numero-produto">2</div></td>
                          <td><input type="text" name="produto2"></td>
                          <td><input type="text" name="unidades2"></td>
                          <td><input type="number" name="quantidade2" id="quantidade2" onchange="calcularTotal()"></td>
                          <td><input type="text" name="valor2" id="valor2" onchange="calcularTotal2)"></td>
                          <td><input type="number" name="ncm2"></td>
                          <td><input type="number" name="cst2"></td>
                          <td><input type="number" name="cfop2"></td>
                          <td><div name="total2" id="total2"></div></td>                          
                      </tr>
                      <tr>
                          <td><div class="quadrado-numero-produto" >3</div></td>
                          <td><input type="text" name="produto3"></td>
                          <td><input type="text" name="unidades3"></td>
                          <td><input type="number" name="quantidade3" id="quantidade3" onchange="calcularTotal()"></td>
                          <td><input type="text" name="valor3" id="valor3" onchange="calcularTotal()"></td>
                          <td><input type="number" name="ncm3"></td>
                          <td><input type="number" name="cst3"></td>
                          <td><input type="number" name="cfop3"></td>
                          <td><div name="total3" id="total3"></div></td>                          
                      </tr>
                      <tr>
                          <td><div class="quadrado-numero-produto" >4</div></td>
                          <td><input type="text" name="produto4"></td>
                          <td><input type="text" name="unidades4"></td>
                          <td><input type="number" name="quantidade4" id="quantidade4" onchange="calcularTotal()"></td>
                          <td><input type="text" name="valor4" id="valor4" onchange="calcularTotal()"></td>
                          <td><input type="number" name="ncm4"></td>
                          <td><input type="number" name="cst4"></td>
                          <td><input type="number" name="cfop4"></td>
                          <td><div name="total4" id="total4"></div></td>                          
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
                        <input  type="text" name="nome">
                      </div>
                      <div class="clienteBlocoLinha">
                        <label>Endereço:</label>
                        <input  type="text" name="endereco">
                      </div>
                      <div  class="clienteBlocoLinha">
                        <label>Data:</label>
                        <input id="data" type="date" name="data">
                      </div>
                    </div>
                    <div class="clienteBloco2">
                      <div class="clienteBlocoLinha">
                        <label>Telefone:</label>
                        <input  type="number"    name="telefone">
                      </div>
                      <div  class="clienteBlocoLinha">
                        <label>Email:</label>
                        <input  type="text" name="email">
                      </div>
                      <div class="clienteBlocoLinha">
                        <label>CNPJ:</label>
                        <input  type="text" name="cnpj">
                      </div>
                    </div>
                  </div>
                  <div class="blocoFinal">
                    <div class="blocoBotaoCriarPedido">
                      <input type="submit" value="Enviar">
                    </div>
                    <label>Total da Compra:</label>
                    <div class="totalCompra" id="totalcompra" type="text" name="totalcompra"></div>
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

      document.getElementById('total1').innerHTML=totalProduto1.toFixed(2);
      document.getElementById('total2').innerHTML=totalProduto2.toFixed(2);
      document.getElementById('total3').innerHTML=totalProduto3.toFixed(2);
      document.getElementById('total4').innerHTML=totalProduto4.toFixed(2);

      const totalGeral = totalProduto1 + totalProduto2 + totalProduto3 + totalProduto4;

      document.getElementById('totalcompra').innerHTML=totalGeral.toFixed(2);
    }
  
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


     /* document.addEventListener("DOMContentLoaded", function() {
        // Função para preencher automaticamente os números nas divs quadrado-numero-produto
        function preencherNumeros() {
            let linhas = document.querySelectorAll("tbody tr");
            linhas.forEach(function(linha, index) {
                let quadradoNumeroProduto = linha.querySelector(".quadrado-numero-produto");
                quadradoNumeroProduto.textContent = index + 1;
            });
        }
      }

        // Chamando a função para preencher os números assim que a página carregar
        //preencherNumeros();

        // Excluir Produto
       /* document.querySelectorAll(".excluirProduto").forEach(function(button) {
            button.addEventListener("click", function() {
                excluirProduto(this);
                // Atualizar os números após excluir um produto
                preencherNumeros();
            });
        });

        // Adicionar Produto
        document.getElementById("adicionarProduto").addEventListener("click", function(e) {
            e.preventDefault();
            adicionarProduto();
            // Atualizar os números após adicionar um produto
            preencherNumeros();
        });

        function adicionarProduto() {
            let tabela = document.querySelector("table tbody");
            let novaLinha = document.createElement("tr");
            novaLinha.innerHTML = `
                <td><div class="quadrado-numero-produto"></div></td>
                <td><input type="text" name="produto"></td>
                <td><input type="number" name="unidades"></td>
                <td><input type="number" name="quantidades"></td>
                <td><input type="text" name="valor"></td>
                <td><input type="text" name="ncm"></td>
                <td><input type="text" name="cst"></td>
                <td><input type="text" name="cfop"></td>
                <td><input type="text" name="total"></td>
                <td><button class="excluirProduto"><i class="fa-solid fa-trash"></i></button></td>
            `;
            tabela.appendChild(novaLinha);

            // Adicionar evento de exclusão ao novo botão de excluir produto
            novaLinha.querySelector(".excluirProduto").addEventListener("click", function() {
                excluirProduto(this);
                // Atualizar os números após excluir um produto
                preencherNumeros();
            });
        }

        function excluirProduto(button) {
            let row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

    });*/
  
    

</script>
</body>
</html>
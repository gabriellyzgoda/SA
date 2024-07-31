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
// Consultar produtos e suas posições
$posicoes = [];
$sql = "SELECT posicao, produto FROM pedidos";
$resultado = $conexao->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $posicao = $row['posicao'];
        if (!isset($posicoes[$posicao])) {
            $posicoes[$posicao] = [];
        }
        $posicoes[$posicao][] = $row['produto'];
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Aluno</title>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloHome.css" media="screen"/>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
        /* estiloEstoque.css */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.conteudo {
    padding: 20px;
}

.titulo-conteudo {
    text-align: center;
}

button {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

.button-container {
    display: flex;
    flex-direction: column;
    gap: 10px; /* Espaço entre as linhas */
}

.button-row {
    display: flex;
    justify-content: center; /* Centraliza os botões horizontalmente */
    gap: 10px; /* Espaço entre os botões */
}

button.destaque {
    background-color: #004080; /* Cor mais escura para a posição */
}

button.desmarcado {
    background-color: #007bff; /* Cor padrão para os botões não destacados */
}

#resultado {
    margin-top: 20px;
}
.suggestions {
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
            position: absolute;
            background-color: white;
            z-index: 1000;
            width: 300px;
        }
        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background-color: #f0f0f0;
        }
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
          
            <a href="expedicao.php">
            <i class="fa-solid fa-truck-fast"></i>
              <span class="link_name">Expedição</span>
            </a>
            
            
          </div>
          
          <ul class="sub-menu">
            <li><a class="link_name" href="expedicao.php">Expedição</a></li>
          </ul>

        </li>
        
        <li>
          
          <div class="iocn-link">
            
            <a href="#">
                <i class="fa-solid fa-pen-to-square"></i>
              <span class="link_name">Controle</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
          </div>
          
          <ul class="sub-menu">
            
            <li><a class="link_name" href="#">Controle</a></li>
            
            <li><a href="controleSolicitacoes.php">Solicitações</a></li>
          <li><a href="designarprodutos.php">Designar Produtos</a></li>
          
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
    <div class="conteudo"> 
        <div class="titulo-conteudo">    
         <h1>Estoque</h1>
         </div>
         <main>
            <center>
                <div id="" class="linhasBloco01">
                    <label>Pesquise um produto:</label>
                    <form id="formPlaca" class="form" method="POST" action="estoque.php">
                    <input type="text" name="produto" id="produto" autocomplete="off">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <div id="suggestions" class="suggestions"></div>
                    <br><br>
                    </form>
                </div>
                <?php
                  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                      if ($conexao->connect_errno) {
                          echo "Failed to connect to MySQL: " . $conexao->connect_error;
                          exit();
                      } else {
                          $produto = $conexao->real_escape_string($_POST['produto']);
                          $sql = "SELECT * FROM pedidos WHERE produto LIKE '%$produto%';";
                          $resultado = $conexao->query($sql);
                          if ($resultado && $resultado->num_rows > 0) {
                              while ($row = $resultado->fetch_assoc()) {
                                  echo "Produto: " . htmlspecialchars($row['produto']) . "<br>
                                        Quantidades: " . htmlspecialchars($row['quantidades']) . "<br>";
                              }
                          } else {
                              echo "Nenhum produto encontrado.";
                          }
                      }
                  }
                  ?>
                        <div class="button-container">
                            <!-- Linha 1 - Posições A -->
                            <div class="button-row">
                                <button id="A1" class="<?php echo isset($posicoes['A1']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('A1')">A1</button>
                                <button id="A2" class="<?php echo isset($posicoes['A2']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('A2')">A2</button>
                                <button id="A3" class="<?php echo isset($posicoes['A3']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('A3')">A3</button>
                                <button id="A4" class="<?php echo isset($posicoes['A4']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('A4')">A4</button>
                            </div>
                            <!-- Linha 2 - Posições B -->
                            <div class="button-row">
                                <button id="B1" class="<?php echo isset($posicoes['B1']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('B1')">B1</button>
                                <button id="B2" class="<?php echo isset($posicoes['B2']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('B2')">B2</button>
                                <button id="B3" class="<?php echo isset($posicoes['B3']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('B3')">B3</button>
                                <button id="B4" class="<?php echo isset($posicoes['B4']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('B4')">B4</button>
                            </div>
                            <!-- Linha 3 - Posições C -->
                            <div class="button-row">
                                <button id="C1" class="<?php echo isset($posicoes['C1']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('C1')">C1</button>
                                <button id="C2" class="<?php echo isset($posicoes['C2']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('C2')">C2</button>
                                <button id="C3" class="<?php echo isset($posicoes['C3']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('C3')">C3</button>
                                <button id="C4" class="<?php echo isset($posicoes['C4']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('C4')">C4</button>
                            </div>
                            <!-- Linha 4 - Posições D -->
                            <div class="button-row">
                                <button id="D1" class="<?php echo isset($posicoes['D1']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('D1')">D1</button>
                                <button id="D2" class="<?php echo isset($posicoes['D2']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('D2')">D2</button>
                                <button id="D3" class="<?php echo isset($posicoes['D3']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('D3')">D3</button>
                                <button id="D4" class="<?php echo isset($posicoes['D4']) ? 'destaque' : 'desmarcado'; ?>" onclick="mostrarProdutos('D4')">D4</button>
                            </div>
                        </div>
                        <div id="resultado"></div>
                        <script>
                    const produtosPorPosicao = <?php echo json_encode($posicoes); ?>;

                    function mostrarProdutos(posicao) {
                        const produtos = produtosPorPosicao[posicao] || ['Nenhum produto encontrado.'];
                        document.getElementById('resultado').innerHTML = `<h3>Produtos na posição ${posicao}:</h3><ul>${produtos.map(produto => `<li>${produto}</li>`).join('')}</ul>`;

                        // Atualiza a cor dos botões com base na posição selecionada
                        document.querySelectorAll('.button-container button').forEach(button =>
                            if (button.id === posicao) {
                                button.classList.add('destaque');
                                button.classList.remove('desmarcado');
                        });
                    }
                </script>
        </center>
    </main>
</div>
<?php include_once('footer.php'); ?>
<script>
      document.getElementById('produto').addEventListener('input', function() {
                const query = this.value;
                if (query.length > 0) { // Começa a buscar após 3 caracteres
                    fetchSuggestions(query);
                } else {
                    document.getElementById('suggestions').innerHTML = '';
                }
            });

            function fetchSuggestions(query) {
                fetch('pesquisarSugestao.php?q=' + encodeURIComponent(query))
                    .then(response => response.json())
                    .then(data => {
                        const suggestionsContainer = document.getElementById('suggestions');
                        suggestionsContainer.innerHTML = '';
                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.className = 'suggestion-item';
                            div.textContent = item.produto;
                            div.onclick = () => {
                                document.getElementById('produto').value = item.produto;
                                suggestionsContainer.innerHTML = '';
                            };
                            suggestionsContainer.appendChild(div);
                        });
                    });
            }
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; // Seleciona o pai principal da seta
            arrowParent.classList.toggle("showMenu");
        });
    }

    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>
</body>
</html>
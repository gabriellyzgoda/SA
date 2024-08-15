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
    <title>Lista de Alunos</title>
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloAlunos.css" media="screen"/>
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
            
            <i class='bx bxs-chevron-down arrow' ></i>
          
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
         <h1>Sua lista de alunos :)</h1>
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
                
$sqlProfessor = "SELECT * FROM cadastro
WHERE professor = 0";
$resultado = $conexao->query($sqlProfessor);

                    while($user_data = mysqli_fetch_assoc($resultado))
                    {
                        echo "<tr>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['senha']."</td>";
                        echo "<td >".$user_data['cargo']."</td>";
                        
                  ?>
                          <td>
                          <div class="botaoEditar" onclick="editarAluno(<?php echo $user_data['id']; ?>, '<?php echo $user_data['nome']; ?>', '<?php echo $user_data['senha']; ?>', '<?php echo $user_data['cargo']; ?>')">
                              <i class="fa-solid fa-pen-to-square"></i> 
                          </div>
                            <div class="botaoDeletar" onclick="confirmarExclusao(<?php echo $user_data['id']; ?>)">
                                  <i class="fa-solid fa-trash"></i>
                            </div>
                          </td>
                      <?php
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
                  <input type="password" id="senha" name="novosenha" required>
                  <label for="cargo">Cargo:</label>
                  <input type="text" id="cargo" name="novocargo" required>
                  <input type="hidden" id="userId" name="userId">
                  <div class="botoes-form">
                    <button type="submit" class="btn" value="Salvar">Salvar</button>
                    </form>  
                    <button type="button" class="btn cancel" onclick="closeForm()">Fechar</button>
                    </div>
                    </div>
        </div>
        <div class="overlay" id="overlay" style="display: none;"></div>
    </div>
<?php
include_once('footer.php');
?>
    <script>

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
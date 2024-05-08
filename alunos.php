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
$sql = "SELECT * FROM cadastro
        WHERE professor = 0";
// puxa conexão
$resultado = $conexao->query($sql);

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Professor</title>
    <script src="https://kit.fontawesome.com/1317d874ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estiloAlunos.css" media="screen"/>
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
            <a href="perfil.php">
                <div class="circulo">
                        <i class="fa-solid fa-user"></i>
                </div>
            </a>
            <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i></a>      
        </div>
    </header>
    <div class="sidebar">
      
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
            <li><a href="#">Meus pedidos</a></li>
            <li><a href="#">Criar pedido</a></li>
          
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
            <li><a href="#">Criar Danfe</a></li>
            <li><a href="#">Minhas Danfe's</a></li>
          
          </ul>

        </li>

        <li>
          
          <a href="#">
            <i class="fa-solid fa-warehouse"></i>
            <span class="link_name">Controle</span>
          </a>

          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Controle</a></li>
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
            <i class="fa-solid fa-file-lines"></i>
              <span class="link_name">Relatórios</span>
            </a>
            
          </div>
          
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Relatórios</a></li>
          </ul>
        </li>   
      </ul><!--Fecha ul-->
    </div>      
    <div class="conteudo"> 
      <div class="titulo-conteudo">    
         <h1>Sua lista de alunos :)</h1>
        </div>
      <div class="quadro-alunos">
    <div>
        <table>
            <thead> 
            <tr>
                <th>Alunos</th>
                <th>Senha</th>
                <th>Cargo</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($resultado))
                    {
                        echo "<tr>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['senha']."</td>";
                        echo "<td>".$user_data['cargo']."</td>";
                        echo "<td> 
                        <a class='' href='resetar.php?id=$user_data[id]'> </a>
                        </td>";
                        ?>
                        <td>
                        <div class="popup" onclick="myFunction()">
                          <i class="fa-solid fa-pen-to-square"></i>
                            <span class="popuptext" id="myPopup" onclick="stopPropagation(event)">
                              <h2>Editar</h2>
                              <p>Aluno:</p>
                              <input type="text" placeholder="aluno" id="aluno" onclick="stopPropagation(event)">
                              <p>Senha:</p>
                              <input type="password" placeholder="senha" id="senha" onclick="stopPropagation(event)">
                              <p>cargo:</p>
                              <input type="text" placeholder="cargo" id="cargo" onclick="stopPropagation(event)">
                              <button onclick="">Salvar</button>
                              <button onclick="fecharPopUp()" id="cancelar">Cancelar</button>
                            </span>
                        </div>
                        <div class="popup" onclick="deletar()">
                          <i class="fa-solid fa-trash"></i>
                          <span class="popuptext" id="deletarPop" onclick="stopPropagation(event)">
                            <?php
                                echo " <a class='' href='delete.php?id=$user_data[id]'>";
                              ?>
                              <button>Confirmar</button>
                            </a>
                            <button onclick="fecharPopUpDeletar()" id="cancelar">Cancelar</button>
                            
                          </span>
                        </div>  
                          
                        </button>
                        </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <footer>
        <div class="linha-footer"><div>
        <center>
            <p>Gabrielly, Chris, Julia e Amanda asasa</br>
            3º ano da Turma de desenvolvimento de sistemas do Sesi</p>
        </center>
    </footer>

    <script>

    function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
    }
    function deletar() {
    var popup = document.getElementById("deletarPop");
    popup.classList.toggle("show");
    }

    function fecharPopUp() {
    var popup = document.getElementById("myPopup");
    popup.classList.remove("show");
    }

    function fecharPopUpDeletar() {
    var popup = document.getElementById("deletarPop");
    popup.classList.remove("show");
    }

    function stopPropagation(event) {
      event.stopPropagation();
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
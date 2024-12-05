<script src="js/style.js" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <?php 

    session_start();

    if(!isset($_SESSION['idUsuarioLogado'])){
      echo '<a href="login.php">
              <img  style="margin-top: 35px;width: 55px; z-index: 1000;" class="img" src="img/user.png">
            </a>';

    } elseif(isset($_SESSION['idUsuarioLogado'])){
      echo '<a href="informa.php">
              <img  style="margin-top: 35px;width: 55px; z-index: 1000;" class="img" src="img/userLog.png">
            </a>';
    }
    
  ?>
  <div class="cont">
    <input type="checkbox" id="checkbox-menu">
    <a href="tela1.php">
      <img class="img1" style="float: right; margin-right: 900px; margin-top: 0px;" src="img/logos.png" alt="">
    </a>
    <label for="checkbox-menu" class="nav">
      <span></span>
      <span></span>
      <span></span>
    </label>
    <nav id="menu" style="width: 720px;">
  <ul>
    <li><a href="aluguel.php">Alugueis</a></li>
    <?php
      if(isset($_SESSION['NivelUsuarioLogado'])){
        if ($_SESSION['NivelUsuarioLogado'] == 'Administrador') {
          echo '<li><a href="tabelaimoveis.php">Lista de Imoveis</a></li>'; 
        }
      }
          
      ?>
    <?php
      if(isset($_SESSION['NivelUsuarioLogado'])){
        if ($_SESSION['NivelUsuarioLogado'] == 'Proprietario') {
          echo '<li><a href="tabelaimoveis.php">Lista de Imoveis</a></li>'; 
        }
      }
          
      ?>
    <?php
      if(isset($_SESSION['NivelUsuarioLogado'])){
        if ($_SESSION['NivelUsuarioLogado'] == 'Proprietario') {
          echo '<li><a href="cadastroimovel.php">Cadastro de Imoveis</a></li>'; 
        }
      }
          
      ?>
    
    <li style="margin-left: 4px;margin-right: 0px;">
    <?php
    if(!isset($_SESSION['NivelUsuarioLogado'])){
      echo '<a href="FaleConosco.php">Fale conosco</a>'; 
    } else {
      if ( $_SESSION['NivelUsuarioLogado'] == 'Administrador') {
          echo '<a href="respostas.php">Respostas</a>'; 
      } else {
          echo '<a href="FaleConosco.php">Fale conosco</a>'; 
      }
    }
    ?>
</li>
    <li>
      <?php 
      // Botão "Sair" ou "Login"
      if (isset($_SESSION['idUsuarioLogado'])) {
          echo '<a href="includes/logout.php">Sair</a>';
      }
      ?>
    </li>
  </ul>
</nav>



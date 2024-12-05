<?php 
include_once("includes/conexao.php");

if (isset($_GET['idUsuarios'])) {
  $sql = "SELECT * FROM usuarios WHERE idUsuarios = '{$_GET['idUsuarios']}'";
  $resultados = mysqli_query($conn, $sql);
  $dados = mysqli_fetch_assoc($resultados);

  $idUsuarios = $dados['idUsuarios'];
  $nome = $dados['nome'];
  $cpf = $dados['cpf'];
  $dataNascimento = $dados['dataNascimento'];
  $senha = $dados['senha'];
} else {
  $idUsuarios = 0;
  $nome = "";
  $cpf = "";
  $dataNascimento = "";
  $senha = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/estilo.js" defer></script>
  <link rel="stylesheet" href="css/style2Lucas.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <title>Login</title>
</head>

<body style="background-color: #f8f1e8;">
  <div class="comeco">
    <form action="includes/salvar.usuarios.php" method="POST">
      <div class="container">
        <br><br>
        <div class="row content d-flex justify-content-center align-items-center">
          <div class="col-md-5">
            <br><br><br>
            <div class="box shadow bg-blur p-4" style="backdrop-filter: blur(0px); border-radius: 20px; background-color: white;">
              <h3 class="mb-4 text-center fs-1" style="color: black;">Crie Sua Conta</h3>
              
              <div class="row">
                <div class="col-md-12">
                  <!-- Correção: Remoção do espaço extra no 'name' -->
                  <input type="hidden" name="idUsuarios" value="<?php echo $idUsuarios; ?>">
                  <input name="nome" value="<?php echo $nome; ?>" type="text" class="form-control" required placeholder="Digite Seu Nome">
                </div>
              </div>

              <!-- Alerta de Mensagem -->
              <?php 
              if (isset($_GET['mensagem'])) {
                $alertType = ($_GET['tipo'] == 'sucesso') ? 'alert-success' : 'alert-danger';
                echo '<div class="alert ' . $alertType . '" role="alert">' . $_GET['mensagem'] . '</div>'; 
              }
              ?>

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <select name="TipoUsuarios" class="form-select" aria-label="Default select example">
                    <option selected>Selecione sua opção</option>
                    <option value="Proprietario" <?php if (isset($dados['TipoUsuarios']) && $dados['TipoUsuarios'] == "Proprietario") echo 'selected'; ?>>Proprietario</option>
                    <option value="Inquilino" <?php if (isset($dados['TipoUsuarios']) && $dados['TipoUsuarios'] == "Inquilino") echo 'selected'; ?>>Inquilino</option>
                    <option value="Administrador" <?php if (isset($dados['TipoUsuarios']) && $dados['TipoUsuarios'] == "Administrador") echo 'selected'; ?>>Administrador</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <input name="cpf" type="text" value="<?php echo $cpf; ?>" class="form-control" placeholder="Digite seu Cpf">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <input name="dataNascimento" type="date" class="form-control" value="<?php echo !empty($dataNascimento) ? date('Y-m-d', strtotime($dataNascimento)) : '2006-01-01'; ?>" placeholder="Digite Sua Data de Nascimento">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <br>
                  <input type="password" name="senha" class="form-control" value="<?php echo $senha; ?>" placeholder="Digite Sua Senha" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12" style="text-align: center;">
                  <br>
                  <button style="width: 200px;" class="btn btn-outline-dark">Cadastrar</button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</body>
</html>

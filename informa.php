<?php

include_once("includes/conexao.php");

session_start();

$sql = "SELECT * FROM usuarios WHERE idUsuarios = '{$_SESSION['idUsuarioLogado']}'";
$resultados = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($resultados);

$idUsuarios = $dados['idUsuarios'];
$nome = $dados['nome'];
$senha = $dados['senha'];
$cpf = $dados['cpf'];
$dataNascimento = $dados['dataNascimento'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>informa</title>
</head>

<body style="background-color: #f8f1e8;">
  <div class="p-5"></div>

  <form >

  
  <div class="container w-75">
    <div class="row">
      <p style="font-size: 35px; color: #89745a;">INFORMAÇÕES PESSOAIS
        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="40" fill="currentColor"
          class="bi bi-person-fill mb-2" viewBox="0 0 16 16" style="margin-bottom: 5%;">
          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
        </svg>
      </p>
      <hr>
    </div>
    <div class="row g-3">
      <div class="col-md-6">
        <label for="inputEmail4" style="color: #89745a;" class="form-label">Nome</label>
        <input type="text" name="nome" value="<?php echo $nome  ?>" class="form-control" id="inputEmail4">
      </div>
      <div class="col-md-4">
        <label for="inputAddress" style="color: #89745a;" class="form-label">Senha</label>
        <input type="text" name="senha" value="<?php echo $senha  ?>" class="form-control" id="inputAddress">
      </div>
      <div class="col-md-4">
        <label for="inputAddress2" style="color: #89745a;" class="form-label">CPF</label>
        <input type="text" name="cpf" value="<?php echo $cpf  ?>" class="form-control" id="inputAddress2">
      </div>
      <div class="col-md-4">
        <label for="inputCity" style="color: #89745a;" class="form-label">Data de nascimento</label>
        <input style="color: #89745a;" value="<?php echo $dataNascimento  ?>" name="data_Nascimento" type="date" class="form-control" id="inputCity">
      </div>
      <div class="col-md-4">
        <label for="inputState" style="color: #89745a;" class="form-label">Tipo de usuario</label>
        <select id="inputState" name="tipo_Usuario" class="form-select">
          <?php
          $sql = "SELECT * FROM usuarios WHERE idUsuarios = '{$_SESSION['idUsuarioLogado']}' ORDER BY TipoUsuarios ASC";
          $resultados = mysqli_query($conn, $sql);
          while ($dados = mysqli_fetch_assoc($resultados)) {
            echo "<option " . $sel . " value=" . $dados['TipoUsuarios'] . ">" . $dados['TipoUsuarios'] . "</option>";
          }

          ?>
        </select>
      </div>
      <br><br><br><br>
      <hr>
      <div class="col-md-12">
        <div class="row">
            <div class="col-md-1">
            <a href="tela1.php">
              <button class="btn btn-outline-success">Enviar</button>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
  </form>

</body>

</html>
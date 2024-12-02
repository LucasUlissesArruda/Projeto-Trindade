<?php 
  include_once("includes/conexao.php");

  if(isset($_GET['idUsuarios'])){
    $sql = "SELECT * FROM usuarios WHERE idUsuarios = '{$_GET['idUsuarios']}'";
    $resultados = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_assoc($resultados);


    $idUsuarios  = $dados['idUsuarios'];
    $nome = $dados['nome'];
    $cpf = $dados['cpf'];
    $dataNascimento = $dados['dataNascimento'];
    $senha = $dados['senha'];

  } else{
    $idUsuarios =0;
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
  <link rel="stylesheet" href="css/style2.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Login</title>
</head>

<body style="background-color: #f8f1e8;">
  <div class="comeco">
    <?php
    include_once("includes/menu.php");
    ?>
    
      <form action="includes/salvar.usuarios.php" method="POST">
      <div class="container">
        <br>
        <br>
        <div class="row content d-flex justify-content-center align-items-center">
          <div class="col-md-5">
            <br>
            <br>
            <br>
            <div class="box shadow bg-blur p-4" style="backdrop-filter: blur(0px); border-radius: 20px; background-color: white; ">
              <h3 class="mb-4 text-center fs-1" style="color: black;">Crie Sua Conta</h3>
              <div class="row">

                <div class="row">
                  <div class="col-md-12">
                  <input type="text" name="idUsuarios " hidden value="<?php  echo $idUsuarios   ?>">
                  <input name="nome" value="<?php  echo $nome  ?>" type="text" class="form-control" required placeholder="Digite Seu Nome" >
                  </div>
                </div>
                <?php 
                            if(isset($_GET['mensagem'])){

                                if( $_GET['tipo'] =='sucesso'){
                                echo '<div class = "alert alert-success" role="alert">
                                '.$_GET[ 'mensagem'].'
                                </div>'; 
                                }else{
                                echo '<div class = "alert alert-danger" role="alert">
                                '.$_GET[ 'mensagem'].'
                                </div>';
                                }
                            }
                            ?>
                <div class="row">
                  <div class="col-md-12">
                    <br>
                    <input name="cpf" type="text" value="<?php  echo $cpf  ?>" class="form-control" placeholder="Digite seu Cpf">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <br>
                    <input name="dadaNascimento" type="date" class="form-control" value="<?php  echo $dataNascimento  ?>" placeholder="Digite Sua Data de Nascimento">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <br>
                    <input type="password" class="form-control" value="<?php  echo $senha  ?>" placeholder="Digite Sua Senha" required>
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

    </div>
  </div>
  </form>

</body>

</html>
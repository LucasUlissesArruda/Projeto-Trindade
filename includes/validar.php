<?php 
    include_once("conexao.php");

    session_start();

    // Captura os dados do formulário corretamente
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);


    // Consulta SQL para verificar o email e senha
    $query = "SELECT * FROM usuarios WHERE cpf = '$cpf' AND senha = '$senha'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Captura os dados do usuário
        $dados = mysqli_fetch_assoc($result);

        // Salvando informações do usuário na sessão
        $_SESSION['idUsuarioLogado'] = $dados['idUsuarios'];
        $_SESSION['nomeUsuarioLogado'] = $dados['nome'];

        $_SESSION['NivelUsuarioLogado'] = $dados['TipoUsuarios'];

        // Redireciona para a página principal (home)
        header("Location: ../tela1.php");
    } else {
        // Redireciona de volta para a página de login com uma mensagem de erro
        header("Location: ../login.php?tipo=erro&msg=Login e/ou senha inválidos!");
    }
?>

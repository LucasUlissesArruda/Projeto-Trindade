<?php 

include_once("conexao.php");

$idUsuarios  = isset($_POST['idUsuarios']) ? $_POST['idUsuarios'] : 0; 
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$dataNascimento = $_POST['dataNascimento'];
$senha = $_POST['senha'];
$TipoUsuarios = $_POST['TipoUsuarios'];

if ($idUsuarios == 0) { 
    $sql2 = "SELECT * FROM usuarios WHERE cpf = '$cpf'";
    $resultados = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($resultados) > 0) {
        header("Location: ../CriarConta.php?tipo=erro&mensagem=Este cliente (CPF) já existe.");
    } else {
        $sql = "INSERT INTO usuarios (nome, cpf, dataNascimento, senha, TipoUsuarios)
                VALUES ('$nome', '$cpf', '$dataNascimento', '$senha', '$TipoUsuarios')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../tela1.php?tipo=sucesso&mensagem=Contato Salvo com Sucesso!");
        } else {
            header("Location: ../CriarConta.php?tipo=erro&mensagem=Contato Não foi Salvo!");
        }
    }
} else { 
    $sql = "UPDATE usuarios SET 
            nome = '$nome', 
            cpf = '$cpf', 
            dataNascimento = '$dataNascimento', 
            senha = '$senha', 
            TipoUsuarios = '$TipoUsuarios' 
            WHERE idUsuarios = '$idUsuarios'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../tela1.php?tipo=sucesso&mensagem=Contato Atualizado com Sucesso!");
    } else {
        header("Location: ../lista.Usuarios.php?tipo=erro&mensagem=Contato Não foi Atualizado!");
    }
}

mysqli_close($conn);

?>

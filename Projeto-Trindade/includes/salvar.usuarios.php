<?php 

    include_once("conexao.php");

    $idUsuarios  = $_POST['idUsuarios'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];
    $senha = $_POST['senha'];


    if ($idUsuarios == 0){
        
        $sql2 = "SELECT * FROM usuarios WHERE cpf = '$cpf'";
        $resultados = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($resultados)>0){
            header("Location: ../CriarConta.php?tipo=erro&mensagem=Este cliente (CPF) já exixte.");
        } else {
        
            $sql = "INSERT INTO usuarios (nome, cpf, dataNascimento, senha)
                VALUES ('$nome', '$cpf', '$dataNascimento', '$senha')";

            if(mysqli_query($conn, $sql)){
                header("Location: ../lista.Usuarios.php?tipo=sucesso&mensagem= Contato Salvo com Sucesso!");
            }else{
                header("Location: ../lista.Usuarios.php?tipo=erro&mensagem=  Contato Não foi Salvo!");
            }
        }
        
    } else {

        $sql = "UPDATE usuarios SET nome = '$nome', cpf = '$cpf', SataNascimento = '$dataNascimento',senha = '$senha'
                WHERE idUsuarios = '$idUsuarios'";
                
                if(mysqli_query($conn, $sql)){
                    header("Location: ../lista.Usuarios.php?tipo=sucesso&mensagem= Contato Atualizado com Sucesso!");
                }else{
                    header("Location: ../lista.Usuarios.php?tipo=erro&mensagem=  Contato Não foi Atualizado!");
                }
    }

    mysqli_close($conn);

?>
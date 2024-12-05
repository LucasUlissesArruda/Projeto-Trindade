<?php 

include_once("conexao.php");

$idImoveis = isset($_POST['idImoveis']) ? $_POST['idImoveis '] : 0; 
$bairro = $_POST['bairro'];
$preco = $_POST['preco'];
$quartos = $_POST['quartos'];
$banheiros = $_POST['banheiros'];
$vagas = $_POST['vagas'];
$tipo = $_POST['tipo'];
$descricao = $_POST['descricao'];

if ($idImoveis == 0) { 
    $sql2 = "SELECT * FROM imoveis WHERE idImoveis  = '$idImoveis'";
    $resultados = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($resultados) > 0) {
        header("Location: ../cadastroimovel.php?tipo=erro&mensagem=Este Imovel já existe.");
    } else {
        $sql = "INSERT INTO imoveis (bairro, preco, quartos, banheiros, vagas, tipo, descricao  )
                VALUES ('$bairro', '$preco', '$quartos', '$banheiros', '$vagas', '$tipo', '$descricao')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../tela1.php?tipo=sucesso&mensagem=Imovel Salvo com Sucesso!");
        } else {
            header("Location: ../cadastroimovel.php?tipo=erro&mensagem=Imovel Não foi Salvo!");
        }
    }
} else { 
    $sql = "UPDATE imoveis SET 
            bairro = '$bairro', 
            preco = '$preco', 
            quartos = '$quartos', 
            banheiros = '$banheiros', 
            tipo = '$tipo' 
            descricao = '$descricao' 
            WHERE idImoveis = '$idImoveis'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../tela1.php?tipo=sucesso&mensagem=Imovel Atualizado com Sucesso!");
    } else {
        header("Location: ../lista.Usuarios.php?tipo=erro&mensagem=Imovel Não foi Atualizado!");
    }
}

mysqli_close($conn);

?>
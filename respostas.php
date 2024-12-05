<?php
include_once("includes/conexao.php");

if (isset($_POST['resposta']) && isset($_POST['idMensagens'])) {
    $resposta = mysqli_real_escape_string($conn, $_POST['resposta']);
    $idMensagens = $_POST['idMensagens'];

    // Atualiza a mensagem com a resposta
    $sql = "UPDATE mensagens SET resposta = '$resposta' WHERE idMensagens = '$idMensagens'";
    if (mysqli_query($conn, $sql)) {
        header("Location: respostas.php?tipo=sucesso&mensagem=Resposta enviada com sucesso!");
    } else {
        header("Location: respostas.php?tipo=erro&mensagem=Erro ao enviar a resposta: " . mysqli_error($conn));
    }
    exit();
}

// Exibe todas as mensagens com a resposta
$sql = "SELECT * FROM mensagens";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mensagens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h2 class="mt-4">Mensagens Recebidas</h2>

    <!-- Exibe mensagens de sucesso/erro -->
    <?php 
    if(isset($_GET['mensagem'])){
        if($_GET['tipo'] == 'sucesso'){
            echo '<div class="alert alert-success" role="alert">' . $_GET['mensagem'] . '</div>'; 
        } else {
            echo '<div class="alert alert-danger" role="alert">' . $_GET['mensagem'] . '</div>';
        }
    }
    ?>

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Mensagem</th>
                <th>Resposta</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['idMensagens']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['mensagem']; ?></td>
                    <td><?php echo $row['resposta'] ? $row['resposta'] : 'Não respondida'; ?></td>
                    <td>
                        <form action="respostas.php" method="POST" style="display:inline;">
                            <input type="hidden" name="idMensagens" value="<?php echo $row['idMensagens']; ?>">
                            <input type="text" name="resposta" class="form-control" placeholder="Escreva a resposta">
                            <button type="submit" class="btn btn-primary btn-sm mt-1">Responder</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

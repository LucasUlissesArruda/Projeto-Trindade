<?php
$conn = new mysqli("localhost", "root", "", "trindadeimoveis");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
    $bairro = $_POST['bairro'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $quartos = $_POST['quartos'] ?? 0;
    $banheiros = $_POST['banheiros'] ?? 0;
    $vagas = $_POST['vagas'] ?? 0;
    $tipo = $_POST['tipo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    if (!empty($bairro) && !empty($preco) && !empty($tipo)) {
        $stmt = $conn->prepare("INSERT INTO imoveis (bairro, preco, quartos, banheiros, vagas, tipo, descricao) VALUES (?, ?, ?, ?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("ssiiis", $bairro, $preco, $quartos, $banheiros, $vagas, $tipo, $descricao);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $conn->error;
        }
    } 
}

if (isset($_GET['delete'])) {
    $idImovel = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM imoveis WHERE idImoveis = ?");
    if ($stmt) {
        $stmt->bind_param("i", $idImovel);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta de exclusão: " . $conn->error;
    }
}

$dadosTabela = $conn->query("SELECT idImoveis, bairro, preco, quartos, banheiros, vagas, descricao, tipo FROM imoveis");
if (!$dadosTabela) {
    die("Erro na consulta da tabela de imóveis: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="pt-BR" style="
    background: #f8f1e8;
">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Imóveis</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/styleLucas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background: #f8f1e8;">
<?php 
    include_once("includes/menu.php");
  ?>
  <br><br><br><br><br>
    <form action="" method="POST" style="
    margin: 25px;
    margin-bottom: 80px;">
    <h1>Gerenciamento de Imóveis</h1>
    <hr>
    <input type="text" name="bairro" placeholder="Bairro" required>
    <input type="text" name="preco" placeholder="Preço" required>
    <input type="number" name="quartos" placeholder="Quartos" required>
    <input type="number" name="banheiros" placeholder="Banheiros" required>
    <input type="number" name="vagas" placeholder="Vagas" required>
    
    <button type="submit" name="adicionar">Adicionar</button>
</form>

<table>
    <thead>
        <tr>
            <th>ID Imóvel</th>
            <th>Bairro</th>
            <th>Preço</th>
            <th>Quartos</th>
            <th>Banheiros</th>
            <th>Vagas</th>
            <th>tipo</th>
            <th>descricao</th>
            <th>acoes</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $dadosTabela->fetch_assoc()): ?>
            <tr>
                <td><?= $row['idImoveis'] ?></td>
                <td><?= $row['bairro'] ?></td>
                <td><?= $row['preco'] ?></td>
                <td><?= $row['quartos'] ?></td>
                <td><?= $row['banheiros'] ?></td>
                <td><?= $row['vagas'] ?></td>
                <td><?= $row['tipo'] ?></td>
                <td><?= $row['descricao'] ?></td>
                
                <td>
                    <a href="cadastroimovel.php?idImoveis=<?= $row['idImoveis'] ?>"><button type="button" class="btn btn-warning">Editar</button></a>
                    <a href="?delete=<?= $row['idImoveis'] ?>" onclick="return confirm('Tem certeza que deseja excluir este item?')"><button type="button" class="btn btn-danger">Excluir</button></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>

<?php $conn->close(); ?>

<?php

    session_start();

    include_once("includes/conexao.php");

    if(isset($_GET["idImoveis"])){
        $sql = "SELECT * FROM imoveis WHERE idImoveis = '{$_GET['idImoveis']}'";
        $resultados = mysqli_query($conn, $sql);
        $dados = mysqli_fetch_assoc($resultados);

        $idImoveis  = $dados['idImoveis'];
        $bairro = $dados['bairro'];
        $preco = $dados['preco'];
        $quartos = $dados['quartos'];
        $banheiros = $dados['banheiros'];
        $vagas = $dados['vagas'];
        $tipo = $dados['tipo'];
        $descricao = $dados['descricao'];
    } else {
        $idImoveis  = '';
        $bairro = '';
        $preco = '';
        $quartos = '';
        $banheiros = '';
        $vagas = '';
        $tipo = '';
        $descricao = '';
    }



?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <title>Cadastro de Imóveis</title>
    <style>
        body {
            background-color: #f8f1e8;
        }
        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        #preview {
            display: flex;
            flex-wrap: wrap;
            margin-top: 15px;
        }
        .preview-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2><i class="fas fa-home"></i> Cadastro de Imóveis</h2>
        <form action="includes/salvar.imoveis.php" method="POST">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" value="<?php echo $descricao  ?>" class="form-control" id="descricao" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="valor">Valor do Aluguel</label>
                <input name="preco" value="<?php echo $preco  ?>" type="number" class="form-control" id="valor" required>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input name="bairro" value="<?php echo $bairro  ?>" type="text" class="form-control" id="endereco" required>
            </div> 

            <div class="form-group">
                <label for="quartos">Quartos</label>
                <input name="quartos" value="<?php echo $quartos  ?>" type="number" class="form-control" id="quartos" required>
            </div>

            <div class="form-group">
                <label for="banheiros">Banheiros</label>
                <input name="banheiros" value="<?php echo $banheiros  ?>" type="number" class="form-control" id="banheiros" required>
            </div>

            <div class="form-group">
                <label for="vagas">Vagas na Garagem</label>
                <input name="vagas" value="<?php echo $vagas  ?>" type="number" class="form-control" id="vagas" required>
            </div>



            <div class="form-group">
                <label for="tipo">Tipo de Imóvel</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option>Apartamento</option>
                    <option>Apartamento Duplex</option>
                    <option>Casa</option>
                    <option>Chácara</option>
                    <option>Kitnet</option>
                    <option>Sobrado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fotos">Enviar Fotos do Imóvel</label>
                <input type="file" class="form-control-file" id="fotos" multiple accept="image/*" onchange="previewImages()">
            </div>

            <div id="preview"></div>

            <button  class="btn btn-primary">Cadastrar Imóvel</button>
        </form>
    </div>

    <script>
        function previewImages() {
            const fileInput = document.getElementById('fotos');
            const previewContainer = document.getElementById('preview');
            previewContainer.innerHTML = ''; // Limpa a área de visualização

            const files = fileInput.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(event) {
                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.classList.add('preview-image');
                    previewContainer.appendChild(img);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Trindade</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/estilo.js" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body >
  <section class="secp1">
    <?php include_once("includes/menu.php"); ?>

    <div class="col-md-12">
      <h1 class="encontro" style="margin-top: 330px; color: #89745a;">Encontro do <span>Luxo</span> com o <span>Design</span></h1>
      <div class="Trindade" style="margin-top: 280px;">
        <h1 style="font-weight: bold;">Trindade Imoveis</h1>
      </div>
    </div>
  </section>

  <section class="secp2">
    <div class="container">
      <br>
      <br>
      <h1 class="imoveis">Imóveis Mais Buscados</h1>
      <div id="carouselExampleCaptions1" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <a href="casa1.php">
              <img src="img/mansao.jpg" class="d-block w-100" alt="...">
            </a>
            <div class="carousel-caption d-none d-md-block">
              <h5>Imovel na Zona 2</h5>
              <p>9 Quartos, 6 Banheiros, Picina, Sala de Jogos</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/house.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Imovel na Zona 1</h5>
              <p>6 Quartos, 4 Banheiros, Piscina, Terraço, Sauna</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/luxuosajpg.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Condominio Everest</h5>
              <p>10 Quartos, 7 Banheiros, Piscina, Sala de Jogos, Cinema</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <br>
      <h1 class="imoveis">Apartamentos Mais Buscados</h1>
      <br>
      <div id="carouselExampleCaptions2" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/apertamento.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Apartamento Zona 1</h5>
              <p>7 Quartos, 4 Banheiros, Sacada com Churrasqueira, Adega.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/apartamentoLuxo.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Apartamento Zona 2</h5>
              <p>5 Quartos, 3 Banheiros, Sacada com Churrasqueira, Clouset</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/ilu.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Apartamento Zona 7</h5>
              <p>5 Quartos, 4 Banheiros, Clouset, Adega.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

</body>

</html>
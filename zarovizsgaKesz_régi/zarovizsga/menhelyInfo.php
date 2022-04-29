<!doctype html>
<?php
include_once 'include/connect.php';
?>
<html lang="hu">
  <head>
    
    <<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/menhelyInfo.css">

    <title>Hello, world!</title>
  </head>
  <body>
   

    <!-- Navbar -->

    <div class="box"></div>
  <nav class="navbar navbar-expand-sm navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="menu.html">wEB</a>
  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" aria-current="page" href="menu.html">Menü</a>
            <a class="nav-link" href="kereso.php">Kereső</a>
            <a class="nav-link" href="menhelyInfo.php">Menhely információ</a>
          </div>
          
          <a class="ms-auto nav-register" href="./regisztracio.php">         
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          </svg>
        </a>
        </div>
      </div>
    </nav>
    

 <!-- Slideshow -->

 <section>
  <div id="carouselExampleIndicators" class="carousel slide d-none d-lg-block" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active">   
        <div class="container">
          <h1>Írás</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, ullam tenetur ut deserunt hic maxime.</p>
          <a href="#" class="btn sliderGomb">Katt ide</a>
        </div>
          <img src="./img/RobiKesu.jpg" class="d-block w-100 sliderImg" alt="...">
      </div>

      <div class="carousel-item">
        <div class="container">
          <h1>Írás</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, ullam tenetur ut deserunt hic maxime.</p>
          <a href="#" class="btn sliderGomb">Katt ide</a>
        </div>
        <img src="./img/proba.jpg" class="d-block w-100 sliderImg" alt="...">
      </div>

      <div class="carousel-item">
        <div class="container">
          <h1>Írás</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, ullam tenetur ut deserunt hic maxime.</p>
          <a href="#" class="btn sliderGomb">Katt ide</a>
        </div>
        <img src="./img/proba.jpg" class="d-block w-100 sliderImg" alt="...">
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

    <!-- menhely infok-->

    <div class="col-md-4 bg-torzs menhelyInfok">
        <h3>Menhely információk</h3>
        <table class="table table-striped table-bordered">
          <thead class="tablaHead">
            <th class="col-4">Menhely neve</th>
            <th class="col-4">Menhely weboldala</th>
            <th class="col-4">Menhely székhelye </th>
          </thead>
          <tbody>

            <?php
            $lekerdezes =  mysqli_query($conn, "SELECT DISTINCT NAME, MEGYE, WEBLINK  FROM regisztracio WHERE MEGYE LIKE '%megye' ORDER BY MEGYE");
              while ($sortomb = mysqli_fetch_assoc($lekerdezes)) {
              $nev = $sortomb['NAME'];
              $web = $sortomb['WEBLINK'];
              $megye = $sortomb['MEGYE'];
              echo "
                    <tr>
                      <td>$nev</td>
                      <td>$web</td>
                      <td>$megye</td>
                    </tr>
                  ";
            }
            ?>

          </tbody>
        </table>

    <!-- Popper & Bootstrap JS-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>
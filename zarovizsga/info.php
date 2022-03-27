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
    <link rel="stylesheet" href="./css/menu.css">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/menhelyInfo.css">

    <title>Hello, world!</title>
  </head>
  <body>
   

    <!-- Navbar -->

    <div class="box"></div>
  <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="menu.html">wEB</a>
  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" aria-current="page" href="menu.html">Menü</a>
            <a class="nav-link" href="kereso.html">Kereső</a>
            <a class="nav-link" href="menhelyInfo.html">Menhely információ</a>
          </div>
          
          <a class="ms-auto nav-register" href="./regisztracio.html">         
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
          </a>
  
        <a class="nav-info" href="./info.html">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
          </svg>
        </a>
        </div>
      </div>
    </nav>
    

    <!-- Slideshow -->

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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
            <a href="#" class="btn btn-lg btn-primary">Katt ide</a>
          </div>
          <img src="./img/proba.jpg" class="d-block w-100 sliderImg" alt="...">
        </div>
  
        <div class="carousel-item">
          <div class="container">
            <h1>Írás</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, ullam tenetur ut deserunt hic maxime.</p>
            <a href="#" class="btn btn-lg btn-primary">Katt ide</a>
          </div>
          <img src="./img/proba.jpg" class="d-block w-100 sliderImg" alt="...">
        </div>
  
        <div class="carousel-item">
          <div class="container">
            <h1>Írás</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, ullam tenetur ut deserunt hic maxime.</p>
            <a href="#" class="btn btn-lg btn-primary">Katt ide</a>
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
    <div class="col-md-4 bg-torzs">
        <h3>Menhely információk</h3>
        <table class="table table-striped">
          <thead>
            <th>Menhely neve</th>
            <th>Menhely weboldala</th>
            <th>Menhely székhelye </th>
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
                      <td >$web</td>
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
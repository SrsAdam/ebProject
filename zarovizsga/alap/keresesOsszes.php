<!doctype html>
<?php
include_once '../include/connect.php';
?>
<html lang="hu">
  <head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/kereso.css">

    <title>Kereso</title>
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
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
            </a>
        </div>
      </nav>
    </header>
    
    
      <!-- Slideshow -->
    
    <section>
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
   

    <!-- Kereső motor -->

<div class="kereso">
  <div>
    <h1>Találatok</h1>
    <div class="input-group mb-3">
    <table class="table table-striped mx-auto w-50">
                    <thead>
                        <th>Kutya neve</th>
                        <th>Kutya kora</th>
                        <th>Kutya neme</th>
                        <th>Kutya mérete</th>
                        <th>Szőrhossz</th>
                        <th>Kép</th>
                        <th>Jellemzés</th>
                        <th>Születési dátum</th>
                        <th>Menhelyre kerülés dátuma</th>
                        <th>Megye</th>
                        <th>Menhely neve</th>
                        <th>Menhely weboldalának címe</th>

                    </thead>
                    <tbody>
      
      <?php
      $kora=mysqli_real_escape_string($conn,$_GET['kora']);
      $neme=mysqli_real_escape_string($conn,$_GET['neme']);
      $merete=mysqli_real_escape_string($conn,$_GET['merete']);
      $szore=mysqli_real_escape_string($conn,$_GET['szore']);
      $megye=mysqli_real_escape_string($conn,$_GET['megye']);
      $lekerdezes="SELECT NEV,KOR, NEME,MERET,SZORHOSSZ,MEGYE,KEP,JELLEMZES,SZUL_DATUM,BEKER_DATUM,NAME,WEBLINK FROM kutya WHERE STATUSZ='gazdikereső' && KOR =? && NEME=? && MERET=? &&SZORHOSSZ=? && MEGYE=?";
      $stmt = mysqli_prepare($conn, $lekerdezes);
      mysqli_stmt_bind_param($stmt, "sssss", $kora, $neme,$merete,$szore,$megye) and mysqli_stmt_execute($stmt);
      $eredmeny = mysqli_stmt_get_result($stmt);
      while ($sortomb= mysqli_fetch_assoc($eredmeny)){
          
          $neve=$sortomb['NEV'];
          $kora=$sortomb['KOR'];
          $neme=$sortomb['NEME'];
          $merete=$sortomb['MERET'];
          $szore=$sortomb['SZORHOSSZ'];
          $kepek=$sortomb['KEP'];
          $jellemzes=$sortomb['JELLEMZES'];
          $szulet=$sortomb['SZUL_DATUM'];
          $beker=$sortomb['BEKER_DATUM'];
          $megye=$sortomb['MEGYE'];
          $menhely=$sortomb['NAME'];
          $web=$sortomb['WEBLINK'];
          echo "
          <tr>
                <td>$neve</td>
                <td>$kora</td>
                <td>$neme</td>
                <td>$merete</td>
                <td>$szore</td>
                <td> 
                <img src=\"$kepek\">
                </td>
                <td>$jellemzes</td>
                <td>$szulet</td>
                <td>$beker</td>
                <td>$megye</td>
                <td>$menhely</td>
                <td>                         
                <link href=\"$web\">                
                </td>
          </tr>
          ";
      }

      ?>
                    </tbody>
      </table>
  </div>
    
    <!--
    
    <div class="input-group mb-3">
      <label class="input-group-text" for="inputGroupSelect01">Méret</label>
      <select class="form-select" id="inputGroupSelect01">
        <option selected>Mindegy</option>
        <option value="1">Kistestű</option>
        <option value="2">Közepes</option>
        <option value="3">Nagytestű</option>
      </select>
    </div>
    
    <div class="input-group mb-3">
      <label class="input-group-text" for="inputGroupSelect01">Megye</label>
      <select class="form-select" id="inputGroupSelect01">
        <option selected>Mindegy</option>
        <option value="1">Budapest</option>
        <option value="2">Pest</option>
        <option value="3">Bács-Kiskun</option>
        <option value="4">Baranya</option>
        <option value="5">Békés</option>
        <option value="6">Borsod-Abaúj-Zemplén</option>
        <option value="7">Csongrád</option>
        <option value="8">Fejér</option>
        <option value="9">Győr-Moson-Sopron</option>
        <option value="10">Hajdú-Bihar</option>
        <option value="11">Heves</option>
        <option value="12">Jász-Nagykun-Szolnok</option>
        <option value="13">Komárom-Esztergom</option>
        <option value="14">Nógrád</option>
        <option value="15">Somogy</option>
        <option value="16">Szabolcs-Szatmár-Bereg</option>
        <option value="17">Tolna</option>
        <option value="18">Vas</option>
        <option value="19">Veszprém</option>
        <option value="20">Zala</option>
      </select>
    </div>

    <div class="input-group mb-3">
      <label class="input-group-text" for="inputGroupSelect01">Szőrzet</label>
      <select class="form-select" id="inputGroupSelect01">
        <option selected>Mindegy</option>
        <option value="1">Rövid</option>
        <option value="2">Közepes</option>
        <option value="3">Hosszú</option>
      </select>
    </div>

-->
   


  <!-- Rekordok -->
<!--
  <div class="card mb-3 rekord">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="./img/proba.jpg" class="img-fluid rounded-start rekord-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Rekord</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <a href="#" class="card-text"><small class="text-muted">Tovább a valamire >></small></a>
        </div>
      </div>
    </div>
  </div>
-->

    <!-- Popper & Bootstrap JS-->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
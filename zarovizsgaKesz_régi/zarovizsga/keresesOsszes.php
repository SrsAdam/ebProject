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
    <link rel="stylesheet" href="../css/keresesOsszes.css">

    <title>Kereso</title>
  </head>
  <body>


    <!-- Navbar -->

    <div class="box"></div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="../menu.html">wEB</a>
    
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" aria-current="page" href="../menu.html">Menü</a>
              <a class="nav-link" href="../kereso.php">Kereső</a>
              <a class="nav-link" href="../menhelyInfo.php">Menhely információ</a>
            </div>
            
            <a class="ms-auto nav-register" href="./regisztracio.html">         
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
            </a>
        </div>
      </nav>
    </header>
  
    <!-- Kereső motor -->

<div class="kereso">
  <div>
    <h1>Találatok</h1>
    <div class="input-group mb-3">
    <table class="table table-striped mx-auto w-50">
                    <thead>                       
                        <th>Kora</th>
                        <th>Neme</th>
                        <th>Mérete</th>
                        <th>Szőrhossza</th>
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


          
          ";



      }

      ?>

<div class="card mx-3 talalat float-left">
  <div class="row g-0 ">
    <div class="col-md-4">
      
        
    <?php
    
    echo"<img src=\"$kepek\">"
    
    ?>
</div>   
<div class="col-md-8">
    <div class="card-body">
      <h5 class="card-title">

<?php

echo"$neve"

?>

</h5>

      <div class="card-text">
        <p>
          <?php
          echo"          
          <td>$kora</td>
          <td>$neme</td>
          <td>$merete</td>
          <td>$szore</td>
          <td>$jellemzes</td>
          <td>$szulet</td>
          <td>$beker</td>
          <td>$megye</td>
          <td>$menhely</td>
          <td>                         
          <link href=\"$web\">                
          </td>
          "
          ?>
          
        </p>
        </div>
      </div>
    </div>
  </div>
</div>
 

    <!-- Popper & Bootstrap JS-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
  </body>
</html>
<!doctype html>
<?php
include_once 'include/connect.php';
?>
<html lang="hu">
  <head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/keresoNemRegi.css">

    <title>Kereso</title>
  </head>
  <body>


    <!-- Navbar -->

    <div class="box"></div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="menuNemRegi.html">wEB</a>
    
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" aria-current="page" href="menuNemRegi.html">Menü</a>
              <a class="nav-link" href="keresoNemRegi.php">Kereső</a>
              <a class="nav-link" href="menhelyInfoNemRegi.php">Menhely információ</a>
            </div>
            
            <a class="ms-auto nav-register" href="./regisztracio.php">         
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
            </a>
        </div>
      </nav>
    </header>
    
    
    <!-- Kereső motor -->

<div class="container-fluid kereso col-8">  
      <div class="bg-torzs">
        <h2>Örökbefogadható kutyák</h2>
        <table class="table table-striped col-6">
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
            $lekerdezes =  mysqli_query($conn, "SELECT NEV, KOR,NEME, MERET, SZORHOSSZ, KEP,JELLEMZES,SZUL_DATUM,BEKER_DATUM,MEGYE,NAME,WEBLINK  FROM kutya WHERE STATUSZ ='gazdikereső' ORDER BY MEGYE");
                    
            
            while ($sortomb = mysqli_fetch_assoc($lekerdezes)) {
              $nev = $sortomb['NEV'];
              $kor = $sortomb['KOR'];
              $neme = $sortomb['NEME'];
              $meret = $sortomb['MERET'];
              $szor = $sortomb['SZORHOSSZ'];
              $kep = $sortomb['KEP'];
              $jell = $sortomb['JELLEMZES'];
              $szul = $sortomb['SZUL_DATUM'];
              $beker = $sortomb['BEKER_DATUM'];
              $megye = $sortomb['MEGYE'];
              $name = $sortomb['NAME'];
              $web = $sortomb['WEBLINK'];
              echo "
                    <tr>
                      <td>$nev</td>
                      <td >$kor</td>
                      <td>$neme</td>
                      <td>$meret</td>
                      <td >$szor</td>
                      <td> " ?>
                      <?php echo"<img src=\"$kep\">" ?>
                      <?php echo " </td>
                      <td>$jell</td>
                      <td >$szul</td>
                      <td>$beker</td>
                      <td>$megye</td>
                      <td >$name</td>
                      <td>" ?>
                      <?php
                         echo "<a href=\"$web\">\"$web\"</a>";
                      ?>               
                         <?php  echo "</td>
                    </tr>
                  ";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Popper & Bootstrap JS-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>
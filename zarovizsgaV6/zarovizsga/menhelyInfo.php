<!doctype html>
<?php
include_once 'include/connect.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:regisztracio.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>
<html lang="hu">
  <head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/menhelyInfo.css">

    <title>Menhely imformációk</title>
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
              <a class="nav-link" href="kereso.php">Kereső</a>
              <a class="nav-link" href="menhelyInfo.php">Menhely információ</a>
            </div>
            

         <div class="btn-group ms-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-circle ms-auto nav-register" viewBox="0 0 16 16" data-bs-toggle="dropdown" aria-expanded="false">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>

            <ul class="dropdown-menu dropdown-menu-end">
            <li><a href="menteseim.php" class="dropdown-item">Kedvenc kutyáim</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="menuNemRegi.html?logout=<?php echo $user_id; ?>" class="dropdown-item">Kilépés</a></li>
            </ul>
         </div>

        </div>
        
      </nav>
    </header>
    

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
          <h1>Regisztráció és bejelentkezés</h1>
          <p>Oldalunkon rengeteg kutyus várja, hogy végre családra találhasson. Velük már most megismerkedhetsz, de ha vannak konkrét elképzeléseid, érdemes személyre szabni a kereséseidet.
            
            Ehhez kérjük, regisztrálj!</p>
        </div>
          <img src="./img/kutyakRepulo.jpg" class="d-block w-100 sliderImg" alt="...">
      </div>

      <div class="carousel-item">
        <div class="container">
          <h1>Találj rá az igazira!</h1>
          <p>Ha már rendelkezel nálunk profillal, személyre szabottan keresgélhetsz, 
            ráadásul elmentheted a kedvenceket, hogy könnyebben egymásra találhassatok négylábú barátoddal.</p>
        </div>
        <img src="./img/pankaSelfie.jpg" class="d-block w-100 sliderImg" alt="...">
      </div>

      <div class="carousel-item">
        <div class="container">
          <h1>Bemutatkoznak a boldog kutyusok!</h1>
          <p>Ismerd meg azokat a szerencséseket, akik már családra találtak nálunk, 
            vagy tudj meg többet a menhelyekről, ahonnan érkeztek!</p>
        </div>
        <img src="./img/BogiNapSiluette.jpg" class="d-block w-100 sliderImg" alt="...">
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

    <div class="col-8 menhelyInfok">
        <h3>Menhely információk</h3>
        <table class="table table-striped">
          <thead class="tablaHead">
            <th>Menhely neve</th>
            <th>Menhely weboldala</th>
            <th>Menhely székhelye </th>
          </thead>
          <tbody>
            <?php
            $lekerdezes =  mysqli_query($conn, "SELECT DISTINCT NAME, MEGYE, WEBLINK  FROM regisztracio WHERE  `MEGYE`='Budapest' OR `MEGYE`LIKE '%megye'  ORDER BY MEGYE");
              while ($sortomb = mysqli_fetch_assoc($lekerdezes)) {
              $nev = $sortomb['NAME'];
              $web = $sortomb['WEBLINK'];
              $megye = $sortomb['MEGYE'];
              echo "
                    <tr>
                      <td>$nev</td>
                      <td >
                      " ?>
                  <?php
                     echo "<a href=\"$web\" target=\"_blank\">\"$web\"</a>";
                  ?>               
                     <?php  echo " 
                      </td>
                      <td>$megye</td>
                    </tr>
                  ";
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-12 menhelyInfok" class="container-fluid kereso"">
        <h3>Boldog, gazdis kutyák</h3>
        <table class="table table-striped">
          <thead class="tablaHead">
            <th>Kutya neve</th>
            <th>Kutya foto</th>
            <th>Jellemzés </th>
          </thead>
          <tbody>
            <?php
            $lekerdezes =  mysqli_query($conn, "SELECT NEV, KEP, JELLEMZES  FROM kutya WHERE STATUSZ ='gazdis'");
              while ($sortomb = mysqli_fetch_assoc($lekerdezes)) {
              $nev = $sortomb['NEV'];
              $kep = $sortomb['KEP'];
              $jell = $sortomb['JELLEMZES'];
              echo "
                    <tr>
                      <td>$nev</td>
                      <td >
                      " ?>
                      <?php echo"<img src=\"$kep\">" ?>
                      <?php echo " 
                      </td>
                      <td>$jell</td>
                    </tr>
                  ";
              }
            ?>
          </tbody>
        </table>
      </div> 
      

    <!-- Popper & Bootstrap JS-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>
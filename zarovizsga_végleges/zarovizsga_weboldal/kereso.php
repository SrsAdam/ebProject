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
   

    <!-- Kereső motor -->

    <div class="udv">
    <?php
         $select = mysqli_query($conn, "SELECT * FROM `regisztracio` WHERE SORSZAM = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $result = mysqli_fetch_assoc($select);
            //echo ($result['NAME']);
         }        
      ?>

    <h2>Üdvözöljük a wEBoldalon, <?php echo ($result['NAME']); ?>!</h2>
    </div>

<div class="kereso">
  <div>
    <h1>Keresés</h1>
    <div class="input-group mb-3 keresomotor">
      
      
      <form class="col-10 container-fluid" action="include/inc_keresesOsszes.php" method="POST">
      <label class="kereseoKerdes col-12" for="k_kor">Milyen korú kutya érdekli?</label>
      <select name="k_kor"  class="form-select" id="inputGroupSelect01" >

        <?php
        $lekerdezes = mysqli_query($conn,"SELECT DISTINCT KOR FROM kutya");
        while ($sortomb=mysqli_fetch_assoc($lekerdezes))
        {
          $kutyakora=$sortomb['KOR'];
          echo " <option value='$kutyakora'>$kutyakora</option> ";             
        }
        ?>
      </select>
      <label class="kereseoKerdes col-12" for="k_nem">Milyen nemű kutya érdekli?</label>
      <select name="k_nem" class="form-select" id="inputGroupSelect01" >
        <?php
        $lekerdezes2 = mysqli_query($conn,"SELECT DISTINCT NEME FROM kutya");
        while ($sortomb = mysqli_fetch_assoc($lekerdezes2))
        {
          $kutyaneme=$sortomb['NEME'];
          echo "<option value='$kutyaneme'>$kutyaneme</option>";
        }

        ?>
      </select>
      
      <label class="kereseoKerdes col-12" for="k_meret">Milyen méretű kutya érdekli?</label>
      <select name="k_meret" class="form-select" id="inputGroupSelect01" >
        <?php
        $lekerdezes3 = mysqli_query($conn,"SELECT DISTINCT MERET FROM kutya");
        while ($sortomb = mysqli_fetch_assoc($lekerdezes3))
        {
          $kutyamerete=$sortomb['MERET'];
          echo "<option value='$kutyamerete'>$kutyamerete</option>";
        }

        ?>
      </select>
      
      <label class="kereseoKerdes col-12" for="k_szor">Milyen szőrhosszúságú kutya érdekli?</label>
      <select name="k_szor" class="form-select" id="inputGroupSelect01" >
        <?php
        $lekerdezes4 = mysqli_query($conn,"SELECT DISTINCT SZORHOSSZ FROM kutya");
        while ($sortomb = mysqli_fetch_assoc($lekerdezes4))
        {
          $kutyaszore=$sortomb['SZORHOSSZ'];
          echo "<option value='$kutyaszore'>$kutyaszore</option>";
        }

        ?>
      </select>
      
      <label class="kereseoKerdes col-12" for="k_megye">Melyik megyében található menhely érdekli?</label>
      
      <select name="k_megye" class="form-select" id="inputGroupSelect01" >
        <?php
        $lekerdezes5 = mysqli_query($conn,"SELECT DISTINCT MEGYE FROM kutya");
        while ($sortomb = mysqli_fetch_assoc($lekerdezes5))
        {
          $megye=$sortomb['MEGYE'];
          echo "<option value='$megye'>$megye</option>";
        }

        ?>
      </select>

    </div>
    
    <!-- Keresés gomb -->

    <div>
           <button type="submit" name="k_submit" class="btn keresogomb">
          <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
          Keresés
        </button>
    
      </div>
    </div>
    </form>
  </div>

    <!-- Popper & Bootstrap JS-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>
<?php

include 'include/connect.php';
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

<!DOCTYPE html>
<html lang="hu">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!-- CSS -->
    <link rel="stylesheet" href="./css/profil.css">

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

<div class="container">
   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `regisztracio` WHERE SORSZAM = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $result = mysqli_fetch_assoc($select);
            echo ($result['NAME']);
         }

         /*
         if($result['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$result['image'].'">';
         }  */
      ?>

      <h2>Üdvözöljük a wEBoldalon, <?php echo ($result['NAME']); ?>!</h2>
      <!-- <a href="update_profile.php" class="btn">Profil szerkesztése</a> -->
   </div>
            
</div>

    <!-- Popper & Bootstrap JS-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
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
  <!-- <link rel="stylesheet" href="css/style1.css">
   <title>home</title>
   <link rel="icon" type="img/home.png" href="img/home.png">  -->

</head>
<body>
   
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

      <h3><?php echo ($result['NAME']); ?></h3>
      <!-- <a href="update_profile.php" class="btn">Profil szerkesztése</a> -->
      
      <a href="kereso.php" class="btn">Keresés</a>  
      <a href="menteseim.php" class="btn">Kedvenc kutyáim</a>
      <a href="profil.php?logout=<?php echo $user_id; ?>" class="delete-btn">Kilépés</a>

   </div>

</div>

</body>
</html>
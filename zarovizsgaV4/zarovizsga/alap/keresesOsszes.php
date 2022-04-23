<!doctype html>
<?php
session_start();
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

    <header>
  <div class="box"></div>
<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="menu.html">wEB</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" aria-current="page" href="../menu.html">Menü</a>
          <a class="nav-link" href="../kereso.php">Kereső</a>
          <a class="nav-link" href="../menhelyInfo.php">Menhely információ</a>
        </div>
        
        <a class="ms-auto nav-register" href="../profil.php">         
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-circle ms-auto nav-register" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
          </svg>
        </a>
    </div>
  </nav>
</header>

    
    <!-- Kereső motor -->

<div class="kereso">
  <div>
    <h1>Találatok</h1>
    <div>
      <form action=""method="POST" accept-charset="utf-8">
      <label for="chk" aria-hidden="true">Írja be a menteni kívánt kutya sorszámát</label>
      <input type="number" name="KUTYA_SORSZ" placeholder="Kutya sorszáma" >
      <button type="submit" name="m_submit" class="btn btn-success">Kedvencekhez mentem</button>
                 
        <?php
              if(isset ($_POST['m_submit'])){
                
                $user_id = $_SESSION['user_id'];                

         $select = mysqli_query($conn, "SELECT * FROM `regisztracio` WHERE SORSZAM = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $result = mysqli_fetch_assoc($select);
            //echo ($_SESSION['user_id'] .  $nev=$result['USERNAME']);
         }
                $nev=$result['USERNAME'];
                $v_SOR = $_POST['KUTYA_SORSZ'];
                $query="SELECT KUTYA_SORSZ FROM mentett WHERE KUTYA_SORSZ='$v_SOR' ";
                $result= mysqli_query($conn, $query);
                $num=mysqli_num_rows($result);
                if ($num == 0){

                mysqli_query($conn,"INSERT INTO mentett( KUTYA_SORSZ, USERNAME ) VALUES ('$v_SOR', '$nev')");
              }
            else echo ('  Már mentetted');
          }            
          ?>
       <div class="row">
      </form>
      </div>
    </div>

    <div class="input-group mb-3">
         
                  <?php
                  $kora=mysqli_real_escape_string($conn,$_GET['kora']);
                  $neme=mysqli_real_escape_string($conn,$_GET['neme']);
                  $merete=mysqli_real_escape_string($conn,$_GET['merete']);
                  $szore=mysqli_real_escape_string($conn,$_GET['szore']);
                  $megye=mysqli_real_escape_string($conn,$_GET['megye']);
                  $lekerdezes="SELECT SORSZAM,NEV,KOR, NEME,MERET,SZORHOSSZ,MEGYE,KEP,JELLEMZES,SZUL_DATUM,BEKER_DATUM,NAME,WEBLINK FROM kutya WHERE STATUSZ='gazdikereső' && KOR =? && NEME=? && MERET=? && SZORHOSSZ=? && MEGYE=?";
                  $stmt = mysqli_prepare($conn, $lekerdezes);
      
                  mysqli_stmt_bind_param($stmt, "sssss", $kora, $neme,$merete,$szore,$megye) and mysqli_stmt_execute($stmt);
                  $eredmeny = mysqli_stmt_get_result($stmt);
                  if(mysqli_num_rows($eredmeny)>0) {         
                  foreach ( $eredmeny as $sortomb  ){
          
                  $sor=$sortomb['SORSZAM'];
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

                  
    
                  ?>
                  

<div class="col-12">
  <div class="inner col-2"> 
        
      <h5> 
        <?php echo"$neve"?> 
        <?php echo"<img src=\"$kepek\">"?> 
      </h5>
  </div>    

  <div class="inner2nd col-10">
<table class="table table-striped mx-3 col-8 ">
                </div>
                    <thead>                        
                        <th>Sorszám</th>
                        <th>Kora</th>
                        <th>Neme</th>
                        <th>Mérete</th>
                        <th>Szőrhossz</th>
                        <th>Születési dátum</th>
                        <th>Menhelyre kerülés dátuma</th>
                        <th>Megye</th>
                        <th>Menhely neve</th>
                        <th>Menhely weboldalának címe</th>
                        <th>Jellemzés</th>

                    </thead>
                    <tbody>
                  <tr> 
                  <?php  echo " 

                  <td>$sor</td>
                  <td>$kora</td>
                  <td>$neme</td>
                  <td>$merete</td>
                  <td>$szore</td>
                  <td>$szulet</td>
                  <td>$beker</td>
                  <td>$megye</td>
                  <td>$menhely</td>
                  <td> " ?>
                  <?php
                     echo "<a href=\"$web\"  target=\"_blank\">\"$web\"</a>";
                  ?>               
                     <?php  echo "             
                  </td>
                  <td>$jellemzes</td>"
                  ?>
                  </tr>
                  </tbody>
            </table>
  </div>
            

     <?php  }   }
     else echo"Nincs kutya ilyen adatokkal"; ?>
  </div>
</div>

  </div>
    
    <!-- Popper & Bootstrap JS-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>


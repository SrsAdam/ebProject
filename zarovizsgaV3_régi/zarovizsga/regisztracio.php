<?php
session_start(); 
?>  



<!doctype html>
<html lang="hu">
  <head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/regisztracio.css">

    <title>Hello, world!</title>
  </head>
  <body>

    <body>                            

        <div class="main">      

            <input type="checkbox" id="chk" aria-hidden="true">

     

        <div class="signup">
            <form method="POST" action="regiFelvitel.php" accept-charset="utf-8">
                <label for="chk" aria-hidden="true">Regisztráció</label>
                    <input type="text" name="NAME" placeholder="Név" required="">
                    <input type="text" name="USERNAME" placeholder="Felhasználónév" required="">
                    <input type="email" name="EMAIL" placeholder="Email" required="">
                    <input type="password" name="PASSWD" placeholder="Jelszó" required="">
                    <input type="password" name="PASSWD2" placeholder="Jelszó újra" required="">

                <p class="menh" >Amennyiben Ön menhelyként regisztrál, <br> kérjük töltse ki az alábbiakat is:</p>

                    <!-- <input type="number" name="ADOSZAM" placeholder= "Adószám"/>               
                    <input type="tel" name="SZLASZAM" placeholder= "Számlaszám"/> -->          
                    <input type="text" name="WEBLINK" placeholder= "Weboldal" />              
                    <input type="text" name="MEGYE" placeholder= "Megye" />



                <button type="submit">Regisztrálok</button>
            </form>
        </div>

        <div class="login">
            <form method="POST" action="login.php" accept-charset="utf-8">
                <label for="chk" aria-hidden="true">Bejelentkezés</label>
                <input type="text" name="USERNAME" placeholder="Felhasználónév" required="">
                <input type="password" name="PASSWD" placeholder="Jelszó" required="">
                
                <button type='submit' name="l_submit" >Belépés</button>
            </form>
        </div>
    </div>


    <!-- Popper & Bootstrap JS-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>
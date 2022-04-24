<?php

$conn = mysqli_connect("localhost", "root", "","elso") or die("Csatlakozási hiba");

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_NAME = $_POST['NAME'];
$v_USERNAME = $_POST['USERNAME'];
$v_EMAIL = $_POST['EMAIL'];
$v_PASSWD = $_POST['PASSWD'];
$v_PASSWD2 = $_POST['PASSWD2'];
$v_WEBLINK = $_POST['WEBLINK'];
$v_MEGYE = $_POST['MEGYE'];

$lekerdezes="SELECT USERNAME FROM regisztracio WHERE USERNAME='$v_USERNAME'";
$query = mysqli_query($conn, $lekerdezes);
$row_cnt= mysqli_num_rows($query);
// ellenőrzéshez: print ($row_cnt);
if ($row_cnt > 0) {
    die("Ez a felhasználónév már létezik!");
}

// két jelszó egyezőség ellenőrzése
if ($v_PASSWD !=$v_PASSWD2 ){
        die("A két jelszó nem egyezik!");
    }
else
{
if ( isset($v_NAME) && isset($v_USERNAME) && isset($v_EMAIL) && isset($v_PASSWD)  && isset($v_WEBLINK) && isset($v_MEGYE))
 
// ellenőrzéshez: print ($v_PASSWD);
// jelszó titkosítás
$v_PASSWD = md5($v_PASSWD);

 $stmt = mysqli_prepare($conn,"INSERT INTO regisztracio(NAME, USERNAME, EMAIL, PASSWD,   WEBLINK,MEGYE) VALUES ( ?, ?, ?,?,?,?)");
 mysqli_stmt_bind_param($stmt,"ssssss",$v_NAME, $v_USERNAME, $v_EMAIL, $v_PASSWD,$v_WEBLINK,$v_MEGYE);
 
 $sikeres = mysqli_stmt_execute($stmt);}

 $menhely = $v_MEGYE;
switch($menhely){
    case "":
        echo "Ez a felhasználónév nem menhely!";
        header('location: regisztracio.php');
        break;
        default:
        echo "Ez a felhasználónév  menhely."?> 
        <a href="telepitoOldal.php" class="btn">Asztali alkalmazás telepítő oldal</a>
        <?php
        break;}

 /*if ( !isset($v_WEBLINK) ){

    /*$lekerdezes="SELECT USERNAME, MEGYE FROM regisztracio WHERE USERNAME='$v_USERNAME'";
    $query = mysqli_query($conn, $lekerdezes);
    $row_cnt= mysqli_num_rows($query);

    if ($row_cnt > 0) {
        echo ($v_USERNAME );}

    echo("Ez a felhasználónév nem menhely!");}

     //header('location: regisztracio.php');
 
 
 else
 {

echo ("Sikeres regisztráció! kérjük telepítse az asztali alkalmazást ");
     ?> 
     <a href="telepitoOldal.php" class="btn">Asztali alkalmazás telepítő oldal</a>
     <?php	
//header('location: regisztracio.php');*/

 
?>

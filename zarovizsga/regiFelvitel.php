<?php

$conn = mysqli_connect("localhost", "root", "","elso") or die("Csatlakozási hiba");

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_NAME = $_POST['NAME'];
$v_USERNAME = $_POST['USERNAME'];
$v_EMAIL = $_POST['EMAIL'];
$v_PASSWD = $_POST['PASSWD'];
$v_PASSWD2 = $_POST['PASSWD2'];
$v_ADOSZAM =$_POST['ADOSZAM'];
$v_SZLASZAM=$_POST['SZLASZAM'];
$v_WEBLINK = $_POST['WEBLINK'];
$v_MEGYE = $_POST['MEGYE'];

if ($v_PASSWD !=$v_PASSWD2 )
{
    
    die("A két jelszó nem egyezik!");
    
}
else
{
if ( isset($v_NAME) && isset($v_USERNAME) && isset($v_EMAIL) && isset($v_PASSWD) && isset($v_ADOSZAM) && isset($v_SZLASZAM) && isset($v_WEBLINK) && isset($v_MEGYE))
 
// ellenőrzéshez: print ($v_PASSWD);

$v_PASSWD = md5($v_PASSWD);

 $stmt = mysqli_prepare($conn,"INSERT INTO regisztracio(NAME, USERNAME, EMAIL, PASSWD, ADOSZAM, SZLASZAM, WEBLINK,MEGYE) VALUES ( ?, ?, ?, ?, ?,?,?,?)");
 mysqli_stmt_bind_param($stmt,"ssssiiss",$v_NAME, $v_USERNAME, $v_EMAIL, $v_PASSWD,$v_ADOSZAM, $v_SZLASZAM,$v_WEBLINK,$v_MEGYE);
 
 $sikeres = mysqli_stmt_execute($stmt);
// ellenőrzéshez: print ($v_PASSWD);
print("Sikeres regisztráció!");	
}

?>

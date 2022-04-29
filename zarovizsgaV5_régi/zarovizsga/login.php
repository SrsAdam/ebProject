<?php

$conn=mysqli_connect("localhost","root","","elso")or die("Csatlakozási hiba!");
echo ("csatlakozás rendben");
session_start();

if(!isset($_POST['l_submit'])){
  echo("  hiba");}
  else {

$v_PASSWD = $_POST['PASSWD'];
$v_USERNAME=$_POST['USERNAME'];

//print ($v_PASSWD);
$v_PASSWD = md5($v_PASSWD);

$query ="SELECT SORSZAM, USERNAME, PASSWD  FROM regisztracio WHERE  PASSWD='$v_PASSWD' AND USERNAME='$v_USERNAME'";
$result=mysqli_query($conn,$query);
$num=mysqli_num_rows($result);

if (mysqli_num_rows($result) > 0)
{ $row = mysqli_fetch_assoc($result);
  $_SESSION['user_id']=$row['SORSZAM'];
echo ($row['SORSZAM']);
 header('location: kereso.php');
}
else
{
    echo ("  hibás bejelentkezés!");
    exit();
}
}
echo ("   adatok rendben");
 
?>

/*
bejelentkezés másik verzió username+email páros

$v_EMAIL = $_POST['EMAIL'];
$v_USERNAME=$_POST['USERNAME'];

//print ($v_PASSWD);
//$v_PASSWD = md5($v_PASSWD);

$query ="SELECT EMAIL, USERNAME  FROM regisztracio WHERE  EMAIL='$v_EMAIL' AND USERNAME='$v_USERNAME'";
$result=mysqli_query($conn,$query);
$num=mysqli_num_rows($result);

if ($num > 0)
{
echo ("Sikeres bejelentkezés!");
}
else
{
    echo ("hibás bejelentkezés!");
}*/

?>
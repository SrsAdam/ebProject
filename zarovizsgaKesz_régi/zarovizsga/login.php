<?php

$conn=mysqli_connect("localhost","root","","elso")or die("Ssatlakozási hiba!");

$v_PASSWD = $_POST['PASSWD'];
$v_USERNAME=$_POST['USERNAME'];

//print ($v_PASSWD);
$v_PASSWD = md5($v_PASSWD);

$query ="SELECT USERNAME, PASSWD  FROM regisztracio WHERE  PASSWD='$v_PASSWD' AND USERNAME='$v_USERNAME'";
$result=mysqli_query($conn,$query);
$num=mysqli_num_rows($result);

if ($num > 0)
{
echo ("Sikeres bejelentkezés!");
?>
<a href="https://codeberryschool.com/blog/hu/a-php-programozas-alapjai/" _target="">ugrás a profil oldalra</a>
<?php
}
else
{
    echo ("hibás bejelentkezés!");
}


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
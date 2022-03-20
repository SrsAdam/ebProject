<?php
if(isset ($_POST['k_submit']) AND $_POST['k_nem'] AND $_POST['k_meret'] AND $_POST['k_szor'] AND $_POST['k_megye']) {
    $kutyakora=$_POST['k_kor'];
    $kutyaneme=$_POST['k_nem'];
    $kutyamerete=$_POST['k_meret'];
    $kutyaszore=$_POST['k_szor'];
    $megye=$_POST['k_megye'];
    header("location: ../alap/keresesOsszes.php?kora=$kutyakora&&neme=$kutyaneme&&merete=$kutyamerete&&szore=$kutyaszore&&megye=$megye");
} 



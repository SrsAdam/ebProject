<?php
if(isset ($_POST['k_submit']) AND $_POST['k_nem']) {
    $kutyakora=$_POST['k_kor'];
    $kutyaneme=$_POST['k_nem'];
    header("location: ../alap/keresesOsszes.php?kora=$kutyakora&&neme=$kutyaneme");
} 



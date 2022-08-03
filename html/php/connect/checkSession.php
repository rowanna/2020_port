<?php
    if( !isset($_SESSION['memberID'])){
    Header("Location:http://rowanna.dothome.co.kr/php/sign/logIn.php");
        exit;
    }
?>
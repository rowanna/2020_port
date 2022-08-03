<?php 
    if(!isset($_SESSION['memberID'])){
        Header("Location:http://rowanna.dothome.co.kr/port/sign/logIn.php");
		exit;
	}
?>
<?php
    include '../connect/connect.php';

    $sql = "CREATE TABLE member2 (";
    $sql .= "memberID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "youEmail varchar(40) UNIQUE NOT NULL,";
    $sql .= "youName varchar(10) NOT NULL,";
    $sql .= "youNickName varchar(10) NOT NULL,";
    $sql .= "youPw varchar(20) DEFAULT NULL,";
    $sql .= "birthday varchar(10) NOT NULL,";
    $sql .= "regTime int(11) NOT NULL,";
    $sql .= "PRIMARY KEY (memberID)";
    $sql .= ") CHARSET=utf8";

    $res = $dbConnect->query($sql);

    if($res){
        echo "Create Table Complete";
    } else {
        echo "Create Table False";
    }
?>
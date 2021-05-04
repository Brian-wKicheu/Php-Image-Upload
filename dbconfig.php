<?php
//db configuration
$dbHost = "localhost";
$dbUserName = "root";
$dbPassWord = "";
$dbName ="imagedb";

// create db connection
$db = new mysqli($dbHost, $dbUserName, $dbPassWord, $dbName);

// check connection
 
 if($db ->connect_error){
     die("connection failed: " .$db ->connect_error);
 }
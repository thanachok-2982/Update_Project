<?php 
 
 $dbHost =  "vmproject.cxxy8xmjuqze.ap-southeast-2.rds.amazonaws.com";
 $dbUsername = "root";
 $dbPassword = "Monedrs!!9!";
 $dbName = "vmproject";

 $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

 if ($db->connect_error){
    die("Connection failed: ". $db->connect_error);

 }
?>

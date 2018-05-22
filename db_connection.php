<?php


$host = "localhost";
$dbname = "su5196"; //change this to your otterID
$username = "su5196"; //change this to your otter ID
$password = "xxxxxx"; //change this to your database account password

//establishes database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//shows errors when connecting to database
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>
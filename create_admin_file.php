<?php

require "../db_connection.php";


$sql = "CREATE TABLE game_admin (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
firstname varchar (50),
lastname varchar (50),
username varchar (50) NOT NULL,
password varchar (50) NOT NULL)";

$stmt = $dbConn -> prepare($sql);
$stmt -> execute();

$sql = "INSERT INTO game_admin
(firstname, lastname, username, password)
VALUES
(:firstname, :lastname, :username, :password)";
$stmt = $dbConn -> prepare($sql);
$stmt -> execute ( array (":firstname" => "Joseph", ":lastname" => "Cortez", ":username" => "cort1669", ":password" => hash('sha1', 'secret'))); //You need to change the values to your own firstname, lastname, username (your otter id), and a password that you would like to set for your admin table instead of what I set as "secret".


echo "Your admin table is created!";

?>
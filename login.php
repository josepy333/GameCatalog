<?php

session_start();

if (isset($_POST['username'])){
require '../db_connection.php';

$sql = "SELECT *
FROM game_admin
WHERE username = :username
AND password = :password";

$stmt = $dbConn -> prepare($sql);
$stmt -> execute(array(":username" => $_POST['username'], ":password" => hash("sha1", $_POST['password'])));

$record = $stmt -> fetch();

if (empty($record)){
echo "Wrong username/password!";
} else {
$_SESSION['username'] = $record['username'];
$_SESSION['name'] = $record['firstname'] . " " . $record['lastname'];
$_SESSION['id'] = $record['id'];
header("Location: game_catalog.php");


// Insert Timestamp into log
$sql = "INSERT INTO log
             (stampId, timeStamp , userId)
             VALUES
             (null, CURRENT_TIMESTAMP, :id)";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute ( array (":id" =>$_SESSION['id'])); 
}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
Remove this if you use the .htaccess -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Game Catalog - Joseph Cortez</title>
<meta name="description" content="">
<meta name="author" content="cort1669">

<meta name="viewport" content="width=device-width; initial-scale=1.0">

<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<style>
form {
display: inline;
}

</style>

</head>

<body>
<div>
<h1>Login</h1>
<form method="post">
Username: <input type="text" name="username" /><br />
<p></p>
Password: <input type="password" name="password" /><br />
<p></p>
<input type="submit" value="Login" />
<p></p>
</form>
<p>
Username: cort1669<br />
Password: secret
</p>
</div>
</body>
</html>
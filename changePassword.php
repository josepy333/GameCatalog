<?
session_start();

if(!isset($_SESSION['username'])){
header("Location: login.php");
}
require '../db_connection.php';//change this to your own database authentication file

//function getAdmin($adminId){

/**$sql = "SELECT * 
FROM game_admin
WHERE id = :adminId";
$stmt = $dbConn -> prepare($sql);
$stmt -> execute(array(":adminId"=>$adminId, ":password"=>hash("sha1", ['password'])));
return $stmt->fetch(); 
}**/

if (isset($_POST['save'])) { //checks whether we're coming from "save data" form

$sql = "UPDATE game_admin
SET password = :password
WHERE id = :adminId";
$stmt = $dbConn -> prepare($sql);
$stmt -> execute(array(":adminId"=>$_SESSION['id'], ":password" => hash("sha1", $_POST['password']))); 

echo "RECORD UPDATED!! <br> <br>"; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
Remove this if you use the .htaccess -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>updatePassword</title>
<meta name="description" content="">
<meta name="author" content="cort1669">

<meta name="viewport" content="width=device-width; initial-scale=1.0">

<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
<div>


<form method="post">
Password: <input type="text" name="password"><br />
<input type="hidden" name="userId" value="<?=$_SESSION['adminId']?>">
<input type="submit" name="save" value="Save"> 
</form>

<br /><br />
<a href="game_catalog.php"> Go back to main page </a>

</div>
</body>
</html>
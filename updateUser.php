<?
require '../db_connection.php';//change this to your own database authentication file

function getUser($userId){
global $dbConn;
$sql = "SELECT * 
FROM users
WHERE userId = :userId";
$stmt = $dbConn -> prepare($sql);
$stmt -> execute(array(":userId"=>$userId));
return $stmt->fetch(); 
}

if (isset($_POST['save'])) { //checks whether we're coming from "save data" form

$sql = "UPDATE users
SET firstName = :firstName,
lastName = :lastName
address = :address,
email = :email
phone = :phone
password = :password
WHERE userId = :userId";
$stmt = $dbConn -> prepare($sql);
$stmt -> execute(array(":firstName"=>$_POST['firstName'],
":lastName"=>$_POST['lastName'],
":address"=>$_POST['address'],
":email"=>$_POST['email'],
":phone"=>$_POST['phone'],
":password"=>$_POST['password'],
":userId"=>$_POST['userId']
)); 

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

<title>updateUser</title>
<meta name="description" content="">
<meta name="author" content="cort1669">

<meta name="viewport" content="width=device-width; initial-scale=1.0">

<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
<div>

<?

if (isset($_POST['userId'])) {
$userInfo = getUser($_POST['userId']); ?>

<form method="post">
First Name: <input type="text" name="firstName" value="<?=$userInfo['firstName']?>" /><br />
Last Name: <input type="text" name="lastName" value="<?=$userInfo['lastName']?>" /><br />
Address: <input type="text" name="address" value="<?=$userInfo['address']?>" /><br />
Email: <input type="text" name="email" value="<?=$userInfo['email']?>" /><br />
Phone: <input type="text" name="phone" value="<?=$userInfo['phone']?>" /><br />
Password: <input type="text" name="password" value="<?=$userInfo['password']?>" /><br />
<input type="hidden" name="userId" value="<?=$userInfo['userId']?>">
<input type="submit" name="save" value="Save"> 
</form>

<? }

?>
<br /><br />
<a href="game_catalog.php"> Go back to main page </a>

</div>
</body>
</html>
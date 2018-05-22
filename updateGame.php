<?
require '../db_connection.php';//change this to your own database authentication file

function getGame($gameId){
global $dbConn;

$sql = "SELECT * 
FROM games
WHERE gameId = :Id";
$stmt = $dbConn -> prepare($sql);
$stmt -> execute(array(":Id"=>$gameId));
return $stmt->fetch(); 
}

if (isset($_POST['save'])) { //checks whether we're coming from "save data" form

$sql = "UPDATE games
SET gameName = :game_name,
publisher = :publisher
genre = :genre,
price = :price
WHERE gameId = :gameId";
$stmt = $dbConn -> prepare($sql);
$stmt -> execute(array(":game_name"=>$_POST['gameName'],
":publisher"=>$_POST['publisher'],
":genre"=>$_POST['genre'],
":price"=>$_POST['price'],
":gameId"=>$_POST['gameId']
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

<title>updateGame</title>
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

if (isset($_POST['gameId'])) {
$gameInfo = getGame($_POST['gameId']); ?>

<form method="post">
Game Name: <input type="text" name="game_name" value="<?=$gameInfo['gameName']?>" /><br />
Publisher: <input type="text" name="publisher" value="<?=$gameInfo['publisher']?>" /><br />
Genre: <input type="text" name="genre" value="<?=$gameInfo['genre']?>" /><br />
Price: <input type="text" name="price" value="<?=$gameInfo['price']?>" /><br />
<input type="hidden" name="gameId" value="<?=$gameInfo['gameId']?>">
<input type="submit" name="save" value="Save"> 
</form>

<? }

?>
<br /><br />
<a href="game_catalog.php"> Go back to main page </a>

</div>
</body>
</html>
<?php
session_start();

if(!isset($_SESSION['username'])){
header("Location: login.php");
}

echo "Welcome " . $_SESSION['name'];
?>

<form method="post" action="logout.php" onsubmit="confirmLogout()">
<input type="submit" value="Logout" />
</form>

<form action="changePassword.php" method="post">
<input type="hidden" name="id" value="<?=$id['id']?>">
<input type="submit" name="update" value="Update Password">

<?php

//connection with the database

require '../db_connection.php'; 

// Select User Form
$sql = "SELECT lastName, firstName, userId 
        FROM users
        ORDER BY lastName ASC";

$stmt = $dbConn -> prepare($sql); //prepares a statement for execution and returns a statement object
$stmt -> execute();
$userNames = $stmt-> fetchAll(); 

/**** Getting userInfo based on user Id ****/
if (isset ($_GET['userId'])) {
   $userId = $_GET['userId'];
   $sql = "SELECT * 
           FROM users 
           WHERE userId = :userId ";
        
   $stmt = $dbConn -> prepare($sql);
   $stmt -> execute( array (':userId' => $userId));
   $userInfo = $stmt->fetch();
}

// Select Game Form
$sql = "SELECT gameName, gameId 
        FROM games
        ORDER BY gameName ASC";

$stmt = $dbConn -> prepare($sql); //prepares a statement for execution and returns a statement object
$stmt -> execute();
$gameNames = $stmt-> fetchAll(); 

/**** Getting userInfo based on user Id ****/
if (isset ($_GET['gameId'])) {
   $gameId = $_GET['gameId'];
   $sql = "SELECT * 
           FROM games 
           WHERE gameId = :gameId ";
        
   $stmt = $dbConn -> prepare($sql);
   $stmt -> execute( array (':gameId' => $gameId));
   $gameInfo = $stmt->fetch();
}
// Most Expensive Game function
function mostExpensiveGame()
{
	global $dbConn;
	$sql = "SELECT gameName, MAX(price) maxPrice
			FROM games
			ORDER BY maxPrice
			LIMIT 1";
	$stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();
}

// Total cost of all games
function totalGameCost()
{
	global $dbConn;
	$sql = "SELECT SUM(price) sumPrice
			FROM games";
	$stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();			
}

//Average Game Cost - use function using AVG
function average_game_cost() 
{
    global $dbConn;  //it uses the variables declared previously 
    $sql = "SELECT AVG(price) averagePrice
            FROM games";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();
}

/**** Filter for publishers****/
$sql = "SELECT DISTINCT publisher
        FROM games
        ORDER BY publisher ASC";

$stmt = $dbConn -> prepare($sql); //prepares a statement for execution and returns a statement object
$stmt -> execute(); //execute the prepared statement
$publishers = $stmt->fetchAll(); //store the obtained data into an array variable

//****Getting all games from certain publisher****//
if(isset ($_GET['publisherName'])) {
   $publisherName = $_GET['publisherName'];
   $sql = "SELECT gameName, publisher
           FROM games 
           WHERE publisher=:pub ";
        
   //$stmt = $dbConn -> prepare($sql);
   //$stmt -> execute(array(':publisherName' => $publisherName));
   //$publisherGames = $stmt->fetchAll();


$namedParameters = array();

if(!empty($publisherName))
{
	//$sql.="AND publisher=:pub";
	$namedParameters[':pub']=$publisherName;
}

$stmt=$dbConn->prepare($sql);
$stmt->execute($namedParameters);
$publisherGames=$stmt->fetchAll();
}

/**** Filter for genres****/
$sql = "SELECT DISTINCT genre
        FROM games
        ORDER BY genre ASC";

$stmt = $dbConn -> prepare($sql); //prepares a statement for execution and returns a statement object
$stmt -> execute(); //execute the prepared statement
$genres = $stmt->fetchAll(); //store the obtained data into an array variable

//****Getting all games from certain publisher****//
if(isset ($_GET['genreName'])) {
   $genreName = $_GET['genreName'];
   $sql = "SELECT gameName, genre
           FROM games 
           WHERE genre=:gen ";
        
   //$stmt = $dbConn -> prepare($sql);
   //$stmt -> execute(array(':publisherName' => $publisherName));
   //$publisherGames = $stmt->fetchAll();


$namedParameters = array();

if(!empty($genreName))
{
	//$sql.="AND publisher=:pub";
	$namedParameters[':gen']=$genreName;
}

$stmt=$dbConn->prepare($sql);
$stmt->execute($namedParameters);
$genreGames=$stmt->fetchAll();
}

//****Getting all users with last name that begins with?****//
if(isset ($_GET['lastName'])) {
   $lastName = $_GET['lastName'];
   $sql = "SELECT firstName, lastName
           FROM users 
           WHERE lastName LIKE :last";
        
   //$stmt = $dbConn -> prepare($sql);
   //$stmt -> execute(array(':publisherName' => $publisherName));
   //$publisherGames = $stmt->fetchAll();


$namedParameters = array();

if(!empty($lastName))
{
	//$sql.="AND publisher=:pub";
	$namedParameters[':last']=$lastName.'%';
}

$stmt=$dbConn->prepare($sql);
$stmt->execute($namedParameters);
$lastNames=$stmt->fetchAll();
}

function getGames(){
    global $dbConn;
    
    $sql = "SELECT gameId, gameName
            FROM games
            ORDER BY gameName";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();
}

 if (isset($_POST['delete'])) { //checks whether the delete button was clicked

   $sql = "DELETE FROM games
              WHERE gameId = :gameId2";
   $stmt = $dbConn -> prepare($sql);
   $stmt -> execute( array(":gameId2"=> $_POST['gameId']));
   echo "User Deleted! <br /><br />";      
 }

function getUsers(){
    global $dbConn;
    
    $sql = "SELECT userId, firstName, lastName
            FROM users
            ORDER BY lastName";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();
}

 if (isset($_POST['delete'])) { //checks whether the delete button was clicked

   $sql = "DELETE FROM users
              WHERE userId = :userId2";
   $stmt = $dbConn -> prepare($sql);
   $stmt -> execute( array(":userId2"=> $_POST['userId']));
   echo "User Deleted! <br /><br />";      
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<style>
	body{
    background-color: #649ffc; 
    font-family: "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif;
    font-size: 16px;
    font-style: normal;
    font-variant: normal;
    margin: auto;
    width: 50%;
    border: 3px solid green;
    padding: 10px;
    img {border:10px solid gray;
			border-radius:20px;
			margin-left:20px;
			float:right;}
        
    }
    
    h2 {
        font-family: "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif;
        font-size: 24px;
    } 
		
	</style>
  <meta charset="utf-8">
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Game Catalog</title>
  <meta name="description" content="">
  <meta name="author" content="josep">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ifco & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <script>
    
    function confirmDelete(userName) {

      var remove = confirm("Are you sure you want to delete " + userName + "?");

      if (!remove){   // remove == false
          event.preventDefault();
      }        
    }
      
  </script>
</head>

<body>
  <div id="wrapper">
  	
  	<h1 align="center">PC Game Catalog</h1>
  	<img src="topgames.jpg" alt="Top Games"/>
  	
  	<h2> Games</h2>

     <form>
         <select name="gameId">
           <option value="-1"> - Select Game -</option>
           <?php
                foreach ($gameNames as $game) {
                    echo "<option  value=" . $game['gameId'] . ">" . $game['gameName']. "</option>";
                
                }         
             
           ?>   
         </select>
        <input type="submit" value="Get Game Info!"/>	
	</form><br/>
	
	<?php
    
        if (isset($gameInfo) && !empty($gameInfo)) {
            echo $gameInfo['gameName']."<br />";
            echo $gameInfo['publisher'] . "<br />";
            echo $gameInfo['genre'] . "<br />";
			echo $gameInfo['price'] . "<br />"."<br />";
        }
    
    ?>
  	
  	<h2> Users</h2>

     <form>
         <select name="userId">
           <option value="-1"> - Select User -</option>
           <?php
                foreach ($userNames as $user) {
                    echo "<option  value=" . $user['userId'] . ">" . $user['firstName']. ' '. $user['lastName'] . "</option>";
                
                }         
             
           ?>   
         </select>
        <input type="submit" value="Get User Info!"/>	
	</form><br/>
	
	<?php
    
        if (isset($userInfo) && !empty($userInfo)) {
            echo $userInfo['firstName'] . $userInfo['lastName']."<br />";
            echo $userInfo['address'] . "<br />";
            echo $userInfo['email'] . "<br />";
			echo $userInfo['phone'] . "<br />"."<br />";
        }
    
    ?>
  	
  	 <!-- Most expensive game-->
    <strong>Most Expensive Game</strong>
    <br />

    
	<?php
		$games = mostExpensiveGame();
		foreach ($games as $game)
		{
			echo $game['gameName']." - $" . $game['maxPrice'] ."<br/>";
		}
	?>
	


	 <!-- Total cost of all games-->
	<br />
    <strong>Total Cost of All Games</strong>
    <br />
    
    <?php
		$prices = totalGameCost();
		foreach ($prices as $totalPrice)
		{
			echo "$".$totalPrice['sumPrice']."<br/>";
		}
	?>
	
	<!-- Average game cost-->
	<br />
    <strong>Average cost of All Games</strong>
    <br />
    
    <?php
		$avgCost = average_game_cost();
		foreach ( $avgCost as $avg)
		{
			echo "$".round($avg['averagePrice'], 2)."<br/>";
		}
	?>
	
	
	<br />
    <strong>Filter games by publisher</strong>
    <br />
	 
	<form>
         <select name="publisherName">
           <option> - Select Publisher -</option>
           <?php
                foreach ($publishers as $publisher) {
                    echo "<option value ='" . $publisher['publisher'] . "'>" . $publisher['publisher'] . "</option>";
                
                }         
           ?>   
         </select>
         <input type="submit" value="Get games by publishers!" />
     </form>
	<?php
		if (isset($publisherGames)) {
			foreach ($publisherGames as $publisherGame)
			{
			echo $publisherGame['gameName'] . " - " . $publisherGame['publisher'] . "<br/>";
			}       
        }
     ?>
     
     <br />
    <strong>Filter games by genre</strong>
    <br />
	 
	<form>
         <select name="genreName">
           <option> - Select Genre -</option>
           <?php
                foreach ($genres as $genre) {
                    echo "<option value ='" . $genre['genre'] . "'>" . $genre['genre'] . "</option>";
                
                }         
           ?>   
         </select>
         <input type="submit" value="Get games by genres!" />
     </form>
	<?php
		if (isset($genreGames)) {
			foreach ($genreGames as $genreGame)
			{
			echo $genreGame['gameName'] . " - " . $genreGame['genre'] . "<br/>";
			}       
        }
     ?>
     
     <br />
    <strong>Filter User's last name by Letter</strong>
    <br />
	 
	<form>
         <select name="lastName">
           <option> - Select First Letter of Last Name -</option>
           		echo "<option value ='A'>A</option>";
           		echo "<option value ='B'>B</option>";
           		echo "<option value ='C'>C</option>";
           		echo "<option value ='D'>D</option>";
           		echo "<option value ='E'>E</option>";
           		echo "<option value ='F'>F</option>";
           		echo "<option value ='G'>G</option>";
           		echo "<option value ='H'>H</option>";
           		echo "<option value ='I'>I</option>";
           		echo "<option value ='J'>J</option>";
           		echo "<option value ='K'>K</option>";
           		echo "<option value ='L'>L</option>";
           		echo "<option value ='M'>M</option>";
           		echo "<option value ='N'>N</option>";
           		echo "<option value ='O'>O</option>";
           		echo "<option value ='P'>P</option>";
           		echo "<option value ='Q'>Q</option>";
           		echo "<option value ='R'>R</option>";
           		echo "<option value ='S'>S</option>";
           		echo "<option value ='T'>T</option>";
           		echo "<option value ='U'>U</option>";
           		echo "<option value ='V'>V</option>";
           		echo "<option value ='W'>W</option>";
           		echo "<option value ='X'>X</option>";
           		echo "<option value ='Y'>Y</option>";
           		echo "<option value ='Z'>Z</option>";  
         </select>
         <input type="submit" value="Get users" />
     </form>
	<?php
		if (isset($lastNames)) {
			foreach ($lastNames as $last)
			{
			echo $last['firstName'] . " " . $last['lastName'] . "<br/>";
			}       
        }
     ?>
     
     <!--Update and Delete Games-->
    <h3> Update or Delete Games </h3>
    
    <?php
    
    $gameList = getGames();
    
    foreach ($gameList as $game) { ?>
        
        <?=$game['gameName']?>
        <form action="updateGame.php" method="post">
            <input type="hidden" name="gameId" value="<?=$game['gameId']?>">
            <input type="submit" name="update" value="Update">
        </form>
        <form method="post" onsubmit="confirmDelete('<?=$game['gameName']?>')" >
            <input type="hidden" name="gameId" value="<?=$game['gameId']?>">            
            <input type="submit" name="delete" value="Delete">
        </form>
        <br />
                
        
   <?        
    } //end foreach
    ?> 
     
    <!--Update and Delete Users-->
    <h3> Update or Delete Users </h3>
    
    <?php
    
    $userList = getUsers();
    
    foreach ($userList as $user) { ?>
        
        <?=$user['firstName']. ' '. $user['lastName']?>
        <form action="updateUser.php" method="post">
            <input type="hidden" name="userId" value="<?=$user['userId']?>">
            <input type="submit" name="update" value="Update">
        </form>
        <form method="post" onsubmit="confirmDelete('<?=$user['firstName']. ' '. $user['lastName']?>')" >
            <input type="hidden" name="userId" value="<?=$user['userId']?>">            
            <input type="submit" name="delete" value="Delete">
        </form>
        <br />
                
        
   <?        
    } //end foreach
    ?> 
     
     
	<?php
    
    $dbConn = null; //closes the database connection.
    
    ?>
  </div>
</body>
</html>
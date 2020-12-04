<!DOCTYPE html>
<html>

<head>
	<title>Index.php</title>
</head>


<body>

	<form action="index.php" method="GET">

		<label>ID number:</label>
		<input type="number" name="ID">
		<br>
		<label>Emailaddress:</label>
		<input type="email" name="Email">
		<br>
		<label>Password:</label>
		<input type="password" name="pwd">
		<br><br>
		<button type="submit">Send</button>

	</form>

	<?php  

		include "database.php";

		echo "Your ID number is: " . $_GET["ID"];
		echo "<br>";
		echo "Your emailaddress is: " . $_GET["Email"];
		echo "<br>";
		echo "Your password is: " . $_GET["pwd"];
		echo "<br>";


		$id = $_GET["ID"];
		$email = $_GET["Email"];
		$password = $_GET["pwd"];
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		var_dump($hashed_password);


		$myConn = new DB;

	
		$query = "SELECT * FROM user WHERE ID = '$id' AND Email = '$email' AND password = '$password'";

		$result = $myConn->executeSQL($query);


		if (!empty($result)) { 
    		echo "<br> Login as employee $id<br>";
    		
		} else {
    		echo "<br> Invalid login! <br>";
		}


	?>

</body>

</html>
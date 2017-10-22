<?php
$username = "mp473";
$hostname = "sql.njit.edu";
$password = "LXPjXPMZ";

echo "<h2> Question 1: Test connection </h2>";
try {
	
	$connect = new PDO("mysql:host=$hostname;dbname=mp473",$username,$password);
	echo "Connected successfully";
	echo "<br>";	
} 
catch (PDOExeption $e) {
	echo "Connection failed " . $e->getMessage();
	echo "<br>";
}




	echo "<h2>Question2&3:</h2>";
	try {
		
		$conn = new PDO("mysql:host=$hostname;dbname=mp473",$username,$password);
		
		$sql = "SELECT * 
				FROM accounts
				WHERE id<6";
		$q = $conn->prepare($sql);
		$q->execute();
		$query = $q->fetchAll();
																			
		if($q->rowCount()) {
			echo "<table border=\"2\" 
				   style=width:10%><tr>    
					 <th>Id</th>
					 <th>email</th>								
					 <th>fname</th>
					 <th>lname</th>
					 <th>Phone</th>
					 <th>Birthday</th></tr>";
			$results = 0;															
			foreach($query as $row) {
				echo "<tr><td>".$row["id"]."</td>
						  <td>".$row["email"]."</td>
						  <td>".$row["fname"]."</td>
						  <td>".$row["lname"]."</td>
						  <td>".$row["phone"]."</td>
						  <td>".$row["birthday"]."</td></tr>";
				$results ++; 
			}
			echo "</table>";
		} 
		
		echo "<br>";
		if ($results>0) {
			echo "Number of registers : " . $results . "<br>";			
		}
		else {
			echo "0 results";
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
$connect = null;
?>
<html>
	<head>
		<style>
		table, th, td 
		{
			border: 1px solid black;
		}
		</style>
	</head>
	<body>
		<?php
			$servername = "172.30.59.35:3306";
			$username = "root";
			$password = "PRpEcJBlcDwt6Amy";
			$dbname = "paybyqr";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) 
			{
				die("Connection failed: " . $conn->connect_error);
			} 
		
			$sql = "select * from transaction";
			$result = $conn->query($sql);
			
			echo "it is done";

			if ($result->num_rows > 0) 
			{
				echo "<table><tr><th>transaction_id</th><th>invoice_id</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					echo "<tr><td>".$row["transaction_id"]."</td><td>".$row["invoice_id"]."</td></tr>";
				}
				echo "</table>";
			} 
			//transaction_id	invoice_id	issuer_id	user_id	merchant_id	invoice_key
			else 
			{
				echo "0 results";
			}
			$conn->close();
		?> 
	</body>
</html>
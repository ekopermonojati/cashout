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
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "db_nanu";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) 
			{
				die("Connection failed: " . $conn->connect_error);
			} 
		
			$sql = "select * from tbl_siswa";
			$result = $conn->query($sql);
			
			echo "it is done";

			if ($result->num_rows > 0) 
			{
				echo "<table><tr><th>transaction_id</th><th>invoice_id</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					echo "<tr><td>".$row["nim"]."</td><td>".$row["nama"]."</td></tr>";
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

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
		
			$sql = "select merchant_name,merchant_outlet_name,merchant_contact_phone,net_balance from merchant";
			$result = $conn->query($sql);
			
			echo "it is done";

			if ($result->num_rows > 0) 
			{
				echo "<table><tr><th>merchant_name</th><th>merchant_outlet_name</th><th>merchant_contact_phone</th><th>net_balance</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					echo "<tr><td>".$row["merchant_name"]."</td><td>".$row["merchant_outlet_name"]."</td><td>".$row["merchant_contact_phone"]."</td><td>".$row["net_balance"]."</td></tr>";
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
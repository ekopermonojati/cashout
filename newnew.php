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
		<form action="" method=post>
			Password: <input name="password" type="password">
			<input type="submit" name="SubmitButton">
		</form>
	</body>
</html>
		<?php
			if(isset($_POST['SubmitButton']))
			{ 
				$password = $_POST["password"];
				if($password!="lol")
				{
					echo "password salah";
				}
				else
				{
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
					$sql = "select * from merchant";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) 
					{
						echo "<table><tr><th>merchant_name</th><th>merchant_outlet_name</th><th>merchant_pic_name</th><th>merchant_contact_phone</th><th>net_balance</th><th>director_name</th><th>director_identity_id</th><th></th></tr>";	
						while($row = $result->fetch_assoc()) 
						{
							echo "<tr><td>".$row["merchant_name"]."</td><td>".$row["merchant_outlet_name"]."</td><td>".$row["merchant_pic_name"]."</td><td>".$row["merchant_contact_phone"]."</td><td>".$row["net_balance"]."</td><td>".$row["director_name"]."</td><td>".$row["director_identity_id"]."</td></tr>"."<td><button type='button'>Cash out</button></td>";
						}
						echo "</table>";
					} 
					else 
					{
						echo "0 results";
					}
					$conn->close();
				}
			}
		?> 

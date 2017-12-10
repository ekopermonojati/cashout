<?php
	session_start();
?>
<html>
	<head>
		<style>
			table 
			{
				border-collapse: collapse;
				font-family: Calibri;
			}
			body
			{
				color: rgb(80,80,80);
				background-color: rgb(16,32,43);
			}
			th, td 
			{
				text-align: left;
				padding: 8px;
			}
			
			tr:nth-child(even)
			{
				background-color: rgb(255,255,255);
			}
			tr
			{
				background-color: rgb(220,220,220);
			}				
			th 
			{
				background-color: rgb(32,64,86);
				color: white;
				font-family: Arial;
				position: relative;
				text-align: center;
			}
		</style>
	</head>
</html>

<?php		
	$uname=$_SESSION['favcolor'];
	
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
		echo "<table align='center'>
		<tr>
		<th>merchant_id</th>
		<th>merchant_name</th>
		<th>merchant_outlet_name</th>
		<th>director_name</th>
		<th>company_name</th>
		<th>director_identity_type_id</th>
		<th>director_identity_id</th>
		<th>merchant_pic_name</th>
		<th>net_balance</th>
		<th>merchant_id</th>
		<th>gross_balance</th>
		</tr>";
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr>
			<td>".$row["merchant_id"]."</td>
			<td>".$row["merchant_name"]."</td>
			<td>".$row["merchant_outlet_name"]."</td>
			<td>".$row["director_name"]."</td>
			<td>".$row["company_name"]."</td>
			<td>".$row["director_identity_type_id"]."</td>
			<td>".$row["director_identity_id"]."</td>
			<td>".$row["merchant_pic_name"]."</td>
			<td>".$row["net_balance"]."</td>
			<td>".$row["gross_balance"]."</td>
			<td>
				<form action=cashout2.php?data=".$row['merchant_id'].">
					<input type='submit' name='cashout' value=".$row['merchant_id'].">
				</form>
			</td></tr>";	
		}
		echo "</table>";
	} 
	else 
	{
		echo "0 results";
	}
	$conn->close();			    	
?> 

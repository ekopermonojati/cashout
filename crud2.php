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
		echo "<table align='center'><tr><th>merchant_id</th>
		<th>merchant_api_key</th><th>credential_id</th><th>category_id</th>
		<th>identity_type_id</th><th>merchant_img</th><th>kyc_img_id</th>
		<th>merchant_name</th><th>merchant_outlet_name</th><th>merchant_outlet_city_id</th><th>
		merchant_outlet_address</th><th>director_name</th><th>company_name</th><th>director_identity_type_id</th>
		<th>director_identity_id</th><th>merchant_pic_name</th><th>merchant_pic_email</th>
		<th>merchant_pic_phone</th><th>merchant_contact_name</th><th>merchant_contact_email</th><th>merchant_contact_phone</th>
		<th>merchant_email</th><th>referral_code</th><th>merchant_address</th><th>province_id</th>
		<th>city_id</th><th>zip_code</th><th>net_balance</th>
		<th>gross_balance</th>
		<th>phone</th><th>bussiness_type</th><th>bussiness_age</th>
		<th>sales_estimation</th>
		<th>ave_transaction_per_month</th><th>identity_id</th><th>identity_img</th>
		<th>bank_id</th>
		<th>bank_account_name</th><th>bank_account_number</th><th>bank_img</th>
		<th>opening_time</th>
		<th>closing_time</th><th>registered_date</th><th>cahsout</th></tr>";
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr>
			<td>".$row["merchant_id"]."</td>
			<td>".$row["merchant_api_key"]."</td>					
			<td>".$row["credential_id"]."</td>
			<td>".$row["category_id"]."</td>
			<td>".$row["identity_type_id"]."</td>
			<td>".$row["merchant_img"]."</td>
			<td>".$row["kyc_img_id"]."</td>
			<td>".$row["merchant_name"]."</td>
			<td>".$row["merchant_outlet_name"]."</td>
			<td>".$row["merchant_outlet_city_id"]."</td>
			<td>".$row["merchant_outlet_address"]."</td>
			<td>".$row["director_name"]."</td>
			<td>".$row["company_name"]."</td>
			<td>".$row["director_identity_type_id"]."</td>
			<td>".$row["director_identity_id"]."</td>
			<td>".$row["merchant_pic_name"]."</td>
			<td>".$row["merchant_pic_email"]."</td>
			<td>".$row["merchant_pic_phone"]."</td>
			<td>".$row["merchant_contact_name"]."</td>
			<td>".$row["merchant_contact_email"]."</td>
			<td>".$row["merchant_contact_phone"]."</td>
			<td>".$row["merchant_email"]."</td>
			<td>".$row["referral_code"]."</td>
			<td>".$row["merchant_address"]."</td>
			<td>".$row["province_id"]."</td>
			<td>".$row["city_id"]."</td>
			<td>".$row["zip_code"]."</td>
			<td>".$row["net_balance"]."</td>
			<td>".$row["gross_balance"]."</td>
			<td>".$row["phone"]."</td>
			<td>".$row["bussiness_type"]."</td>
			<td>".$row["bussiness_age"]."</td>
			<td>".$row["sales_estimation"]."</td>
			<td>".$row["ave_transaction_per_month"]."</td>
			<td>".$row["identity_id"]."</td>
			<td>".$row["identity_img"]."</td>
			<td>".$row["bank_id"]."</td>
			<td>".$row["bank_account_name"]."</td>
			<td>".$row["bank_account_number"]."</td>
			<td>".$row["bank_img"]."</td>
			<td>".$row["opening_time"]."</td>
			<td>".$row["closing_time"]."</td>
			<td>".$row["registered_date"]."</td>
			<td>
				<form action=cashout.php?data=".$row['merchant_id'].">
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
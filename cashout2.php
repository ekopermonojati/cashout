<?php
	session_start();
?>
<html>
<head>
		<style>
			table, th, td 
			{
				border: 1px solid black;
			}
			body
			{
				font-family: 'Calibri';
				color: rgb(255,255,255);
				background-color: rgb(32,64,86);
			}
			.button
			{
				background-color: #4CAF50;
				border: none;
				color: white;
				padding: 15px 32px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				position:relative;
				top:20px;
				border-radius: 12px;
			}
			.center 
			{
				position: absolute;
				left: 0;
				top: 30%;
				width: 100%;
				text-align: center;
				font-size: 18px;
			}
			
			input[type="text"],input[type="password"]
			{
				background: rgba(255, 255, 255, 0.9);
				border: none;
				font-size: 16px;
				height: auto;
				margin: 0;
				outline: 0;
				padding: 15px;
				
				background-color: #e8eeef;
				color: #8a97a0;
				box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
				margin-bottom: 30px;
			}
			
			input[type="text"]
			{
				top:10px;
			}
			
			
			
			.bottom 
			{
				position: absolute;
				left: 0;
				top: 63%;
				width: 100%;
				text-align: center;
				font-size: 18px;
			}
			
			a:link 
			{
				text-decoration: none;
				color:white;
				width:100%;
			}
		</style>
	</head>
<body>
	
	<form class="center" action='' method=post>
		Jumlah Subtraksi<br>
		<input name='subtract' type='number'><br>
		<input class="button" type="submit" value="Submit" name="SubmitButton">
	</form>
</body>
</html>
<?php
	if(isset($_POST['SubmitButton']))
	{
		$agen=$_SESSION['favcolor'];
		
		$servername = "172.30.59.35:3306";
		$username = "root";
		$password = "PRpEcJBlcDwt6Amy";
		$dbname = "paybyqr";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		} 			
		
		$subtract=$_POST['subtract'];
		$id=$_GET["cashout"];
		
		$sql=mysqli_query($conn,"select net_balance,gross_balance from merchant where merchant_id='$id'");
		$result=mysqli_fetch_array($sql);
		
		$net_balance=$result['net_balance'];
		$gross_balance=$result['gross_balance'];
		$subtracted=$net_balance-$subtract;
		$subtracted_gross=$gross_balance-$subtract;
		
		$sql2 = "update merchant set net_balance='$subtracted', gross_balance='$subtracted_gross' where merchant_id='$id'";
		echo "$sql2";
		$result2 = $conn->query($sql2);
		
		$sql3 = "insert into cashout (merchant_id,jml_cashout,agen) values('$id','$subtract','$agen')";
		$result3 = $conn->query($sql3);
		echo "<meta http-equiv='refresh' content='0; url=crud2.php'/>";
	
	}
?>

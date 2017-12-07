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
				background-color: rgb(32,64,86)
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
				top: 40%;
				width: 100%;
				text-align: center;
				font-size: 18px;
			}
		</style>
	</head>
	
	<body>
		<form  class="center" action="" method=post>
			<b>PASSWORD:</b> <input  name="password" type="password"><br>
			<b><input class="button"  type="submit" value="SUBMIT" name="SubmitButton"></b>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['SubmitButton']))
	{ 
		$password = $_POST["password"];
		if($password!="lol")
		{
			echo "<script>alert('Password salah')</script>";
		}
		else
		{
			echo "<meta http-equiv='refresh' content='0; url=crud.php'/>";
		}
	}
?>
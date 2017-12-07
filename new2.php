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
			
	$sql = "delete from tbl_jumlah";
	$result = $conn->query($sql);
	$sql2 = "insert into tbl_jumlah select kelas,count(*) from tbl_siswa group by kelas";
	$result2 = $conn->query($sql2);
	echo "it is done";
				
			
	$conn->close();
?> 

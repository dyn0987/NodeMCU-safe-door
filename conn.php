<?php
//new mysqli('localhost','user',password,dbname);
	$conn = new mysqli('localhost', 'root', '', 'pwd');
	if ($conn -> connect_error){
		die("Connection failed : " . $connect_error);
	}else
	{
	//echo "connection Successfuly";
	//echo "<br>";
	}
	
	
	
	//select data from database, variable buat connection=conn, 
	$select=mysqli_query($conn,'SELECT passwd FROM password;');
	//kira no.of rows..num rows
	if (mysqli_num_rows($select)>0) {
		while ($row=mysqli_fetch_array($select)) {
			//bezakan html ke ape letak titik kat tengah
			//echo "IC Num: " . $row['icNum'];
			//pastikan data 1 row je
			//echo "<br>";
			//echo "<br>";
		}
		}else {
			//echo "0 result";
		}
	
?>

<?php
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
 //include('sqliconn.php');
 $conn = new mysqli('localhost', 'id8969207_user', 'nedfire@11', 'id8969207_password');
    if ($conn -> connect_error){
        die("Connection failed : " . $connect_error);
    }else
    {
    //echo "connection Successfuly";
   
    }
   
	
	$query = "TRUNCATE TABLE user2";
	$result=mysqli_query($conn,$query);

?>
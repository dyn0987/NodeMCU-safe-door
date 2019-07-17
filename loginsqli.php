<?php
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
 //include('sqliconn.php');
 $conn = new mysqli('localhost', 'root', '', 'pwd');
	if ($conn -> connect_error){
		die("Connection failed : " . $connect_error);
	}else
	{
	//echo "connection Successfuly";
	
	}
	
//Creating Array for JSON response
$response = array();
	
$passwd=$_POST['passwd'];
//echo $passwd;
$result=mysqli_query($conn, "SELECT * FROM user WHERE
	password= '$passwd' ");
	//$id =$_POST['id'];
if (isset($_POST["passwd"])) {
   // $passwd = $_POST['passwd'];
   
	  if (!empty($result)) {
 
	

	if(mysqli_num_rows($result)>0) {
		session_start();
		$_SESSION["passwd"] = $passwd;
	session_write_close();
	$result = mysqli_fetch_array($result);
	
	        $password = array();
           // $password["id"] = $result["id"];
           // $password["username"] = $result["username"];
			//$password["password"] = $result["password"];
          
            $response["success"] = 1;

            $response["password"] = array();
			
			// Push all the items 
            array_push($response["password"], $passwd);

            // Show JSON response
            echo json_encode($response);
        } else {
            // If no data is found
            $response["success"] = 0;
            $response["message"] = "No data on this password found in count";
 
            // Show JSON response
            echo json_encode($response);
        }
    }
	else {
        // If no data is found
        $response["success"] = 0;
        $response["message"] = "No data on password found ,reult empty ";
 
        // Show JSON response
        echo json_encode($response);
    }
}else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // echoing JSON response
    echo json_encode($response);
}
	
	
		
	mysqli_close($conn);
	//create connection to php=$
?>
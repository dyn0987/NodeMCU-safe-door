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
   
//Creating Array for JSON response
$response = array();
   
$passwd=$_POST['passwd'];
echo $passwd;
$result=mysqli_query($conn, "SELECT * FROM user WHERE
    password= '$passwd' ");
  //$insert=mysqli_query($conn,"INSERT INTO user2 VALUES ('1')");
    //$id =$_POST['id'];
if (isset($_POST["passwd"])) {
   // $passwd = $_POST['passwd'];
   
      if (!empty($result)) {
 
   
 
    if(mysqli_num_rows($result)>0) {
        session_start();
        $_SESSION["passwd"] = $passwd;
    session_write_close();
    $result = mysqli_fetch_array($result);
   $insert=mysqli_query($conn,"INSERT INTO user2 (status) VALUES ('1')");
            $password = array();
           // $password["id"] = $result["id"];
           // $password["username"] = $result["username"];
            //$password["password"] = $result["password"];
         
            $response["success"] = 1;
 
            $response["password"] = array();
           $status=1;
            // Push all the items
            array_push($response["password"], $passwd);
 
            // Show JSON response
          // echo json_encode($response);
        } else {
            // If no data is found
            $insert=mysqli_query($conn,"INSERT INTO user2 (status) VALUES ('0')");
            $response["success"] = 0;
            $response["message"] = "No data on this password found in count";
 $status=0;
            // Show JSON response
//echo json_encode($response);
        }
    }
    else {
        // If no data is found
        $response["success"] = 0;
        $response["message"] = "No data on password found ,result empty ";
 
        // Show JSON response
       // echo json_encode($response);
    }
}else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // echoing JSON response
//echo json_encode($response);
}
   
   // $last_status = mysqli_insert_status($conn);
   // echo "New record created successfully. Last inserted status is: " . $last_status;
   //$status = $mysqli->insert;
//  $result2 = $mysqli->query("SELECT * FROM user2 WHERE status = {$status}");
 // $user2 = $result2->fetch_object();
//  echo $user2->status;
   
       
    mysqli_close($conn);
    //create connection to php=$
?>
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//$connect=mysqli_connect("localhost","root',"","pwd");

 $conn = new mysqli('localhost', 'id8969207_user', 'nedfire@11', 'id8969207_password');
    if ($conn -> connect_error){
        die("Connection failed : " . $connect_error);
    }else
    {
    //echo "connection Successfuly";
    
//$sql="SELECT * FROM user";
$sql="SELECT status FROM user2 ORDER BY id DESC LIMIT 1";
$result=mysqli_query($conn,$sql);
//$json_array=array();
while($row=mysqli_fetch_assoc($result))
{
	
	//$json_array[]=$row;
	$json=$row;
	//$password["password"] = $result["password"];
}

echo json_encode($json);
/*echo '<pre>';
print_r($json_array);
echo '</pre>';*/

?>

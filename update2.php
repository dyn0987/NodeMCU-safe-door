<?php
$conn = new mysqli('localhost', 'root', '', 'pwd');
	if ($conn -> connect_error){
		die("Connection failed : " . $connect_error);
	}else
	{
	//echo "connection Successfuly";
	
	}
$passwd=$_POST['passwd'];
//echo $passwd;
// $result=mysqli_query($conn, "SELECT * FROM user WHERE
	// password= '$passwd' ");
	if(isset($_POST['passwd'])) {
		
		$passwd = $_POST['passwd'];
		
		
		$update=mysqli_query($conn,"UPDATE user SET password='$passwd';");
		
		if($update) {
			echo '<script language="javascript">';
			echo 'alert("Update Success");';
			echo 'window.location.href="home.php";';
			
			echo'</script>';
		} else{
				echo '<script language="javascript">';
				echo 'alert("Update failed");';
				echo 'window.location.href="update.php";';
				echo '</script>';
				
			}
			mysqli_close($conn);
		
	}
		?>
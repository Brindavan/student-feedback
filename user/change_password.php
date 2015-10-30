<?php
session_start();
include('../admin/db.php');
$old =  md5($_POST['oldPassword']);
$new =  md5($_POST['newPassword']);
$newRe =  md5($_POST['newRePassword']);


$sql = 'select password from user where username = "'.$_SESSION['name'].'";';
 $result = $conn->query($sql);
 if($result->num_rows > 0)
	while($row = $result->fetch_assoc()){
			if(strcmp($row['password'],$old)==0){
				echo 'old password match<br>';
				if(strcmp($new, $newRe)==0){
					$sql = "UPDATE user SET password='".$new."' WHERE username='".$_SESSION['name']."';";
					if (mysqli_query($conn, $sql)) {
	                    echo "Record updated successfully";
	                    header('Location: ../admin/login.html');
                	} 
					echo 'Both new password match';
				}
				else{

					echo 'Both new password not match';
				}
			}
			else{
				echo 'old password not match';
			}
	}

?>
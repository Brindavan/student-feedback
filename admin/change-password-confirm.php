<?php 
    session_start();
    $server_name = "localhost";
    $database_name = "student-feedback";
    $user_name = "student";
    $password = "student";

    $conn = new mysqli($server_name,$user_name, $password,$database_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    else{
        //echo $_SESSION['name'];
        $key = 0;
        $sql = "select password from user where username = '".$_SESSION['name']."';";
        $form_old_password = md5($_POST['old_password']);
        $result = $conn->query($sql);
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                if(strcmp($form_old_password,$row["password"])==0){
                    $key = 1;
                    break;
                }
            }
        }
        if($key==1){
            $form_new_password = md5($_POST['new_password']);
            $form_new_password_confirm = md5($_POST['new_password_confirm']);
            if(strcmp($form_new_password,$form_new_password_confirm)==0){
                $sql = "UPDATE user SET password='".$form_new_password."' WHERE username='".$_SESSION['name']."';";
                //echo $sql;
                if (mysqli_query($conn, $sql)) {
                    echo "Record updated successfully";
                    header('Location: login.html');
                } 
                else {
                    echo "Error updating record: " . mysqli_error($conn);
                    header('Location: change-password.html');
                }
            }
            else{
                echo "new password didn't match";
            }

        }
        else{
            echo "old password didn't match";
        }
    }
?>
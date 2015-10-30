<?php 
    
    session_start();
    include ('db.php');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    else{
        $form_username = $_POST['username'];
        $form_password = md5($_POST["password"]);
        //echo $form_username;
        //echo $form_username.'<br>';
        //echo $form_password.'<br>';

        $_SESSION['name']=$form_username;

        
        $key =0;
        $sql = "Select username, password, category from user where username = '$form_username'";
        //echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                if((strcmp($form_username,$row["username"])==0) &&(strcmp($form_password,$row["password"])==0)){
                    echo $row['password'].'<br>';
                    if((strcmp("admin",$row["category"])==0)){
                        $key = 1;
                        break;
                    }
                    else if ((strcmp("user",$row["category"])==0)){ 
                        $key = 2;
                        $sql = 'select * from students where username = '.$form_username;
                        echo $sql;
                    }
                }
                else{
                    $key = 0;
                }
            }
        }
        if($key==1){
            //echo 'Admin';
            header('Location: index.php');
        }
        else if ($key==2){
            //echo 'User';
           header('Location: ../user/index.php');
        }
        else{
            //echo 'No Username Exist';
            header('Location:login.html');
        }
        //
    }
?>
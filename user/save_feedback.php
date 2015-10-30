<?php
	include('../admin/db.php');
	session_start();
	$sql = 'Select question_id,count(question) as total from question';
	//echo 'asdkfjkldsajfj dskalfj adsjfkl dsjafklj adslkfj dsafj        '.$sql;
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$total = $row['total'];
		}
	}

	$sub =  $_POST['hidden'];
	$last_hidden = substr($sub, -1);

        $sql = 'select subject_code,subject_name from subject where department = '.$_SESSION['department'] .' and sem = '.$_SESSION['sem'];
        $result = $conn->query($sql);
        $i=1;
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
              	$form =substr($row['subject_code'], -1);
              	if($last_hidden == $form)
              		$sub_code = $row['subject_code'];
          	}
		}


		//getting student id from student table
		$sql = 'select student_id from student where stu_name = "'.$_SESSION['name'].'";';
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc())
			$student_id = $row['student_id'];

		//getting subject id from subject table
		$sql = 'select subject_id from subject where subject_code = "'.$sub_code.'";';
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc())
			$subject_id = $row['subject_id'];
		

		//getting faculty id from faculty_subject
		$sql ='select faculty_id from faculty_subject where subject_id = '.$subject_id;
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc())
			$faculty_id = $row['faculty_id'];
	$val = 0;
	for($i=1;$i<=$total;$i++){
		if(empty($_POST["answer$i"]))
			$val += 0;
		else
			$val+= $_POST["answer$i"];
		
		//echo $val[$i].'<br>';	
	}
	//echo implode(":",$val);
	/*
	echo $student_id.'<br>';
	echo $subject_id.'<br>';
	echo $faculty_id.'<br>';
	echo $val;
*/
	$sql = 'insert into feedback values(NULL, "'.$student_id.'",'.$subject_id.',"'.$faculty_id.'",'.$val.');';
	//echo $sql;
	$conn->query($sql);
	header('location: http://localhost/feedback/user/submit.php');
	//echo 'Inserted';
?>
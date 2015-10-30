<?php
	include('db.php');
	$faculty = $_POST['faculty'];
	$subject = $_POST['subject'];
	//echo $faculty.'<br>';
	//echo $subject.'<br>';
	$sql = 'select faculty_id from faculty where faculty_name = "'.$faculty.'";';
	//echo $sql.'<br>';	
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc())
		$fac_id = $row['faculty_id'];

	$sql = 'select subject_id from subject where subject_name = "'.$subject.'";';
	//echo $sql.'<br>';
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc())
		$sub_id = $row['subject_id'];


	$sql = 'INSERT INTO faculty_subject (`id`, `faculty_id`, `subject_id`) VALUES (NULL, "'.$fac_id.'", '.$sub_id.');';
	//echo $sql;
	$conn->query($sql);
	header('location: faculty_subject.php');

	
?>
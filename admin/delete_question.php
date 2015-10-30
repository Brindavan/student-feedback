<?php
//echo 'delete';
	include('db.php');
	$id =  $_GET['question_id'];
    $sql = 'DELETE from question WHERE question_id ='.$id;
    $result = $conn->query($sql);

    //echo $sql;
    $result = $conn->query($sql);
    header('location: question.php');

?>

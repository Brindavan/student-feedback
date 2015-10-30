<?php

    include('db.php');
    $question = $_POST['update-question'];
    $id = $_POST['question_id'];
    $sql = 'UPDATE question SET question="'.$question.'" WHERE question_id='.$id;
    //echo $sql;
    $test = $conn->query($sql);
    header('Location: question.php');

?>  
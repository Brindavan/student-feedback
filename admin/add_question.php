<?php 

    include('db.php');
    $question = $_POST['question'];
    $sql = 'INSERT INTO question VALUES (NULL,"'. $question.'");';
    //echo $sql;
    $test = $conn->query($sql);
    header('Location: question.php');

?>  
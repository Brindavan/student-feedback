<?php 
    session_start();
    include('db.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.html'); ?>
</head>

<body>
    <!-- topbar starts -->
    <?php include('header.html'); ?>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <?php include('sidebar.html'); ?>
       

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Dashboard</a>
            </li>
        </ul>
    </div>
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
         <div data-toggle="tooltip" class="well top-block" >
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Total Students</div>
            <div>
                <?php 
                    $sql = "select count(student_id) AS number from student";
                    $result = $conn->query($sql);
                    if($result->num_rows >0){
                        while($row = $result->fetch_assoc()){
                            echo $row['number'];
                        }
                    } 
                ?>
            </div>
            
        </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="faculty.php">
            <i class="glyphicon glyphicon-user green"></i>

            <div>Total Faculty</div>
            <div>
                 <?php 
                    $sql = "select count(faculty_id) AS number from faculty";
                    $result = $conn->query($sql);
                    if($result->num_rows >0){
                        while($row = $result->fetch_assoc()){
                            echo $row['number'];
                        }
                    } 
                ?>
            </div>
            
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="question.php">
            <i class="glyphicon glyphicon-list-alt yellow"></i>

            <div>Total Question</div>
            <div>
                 <?php 
                    $sql = "select count(question_id) AS number from question";
                    $result = $conn->query($sql);
                    if($result->num_rows >0){
                        while($row = $result->fetch_assoc()){
                            echo $row['number'];
                        }
                    } 
                ?>
            </div>
            
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="subject.php">
            <i class="glyphicon glyphicon-book red"></i>

            <div>Total Subjects</div>
            <div>
                 <?php 
                    $sql = "select count(subject_id) AS number from subject";
                    $result = $conn->query($sql);
                    if($result->num_rows >0){
                        while($row = $result->fetch_assoc()){
                            echo $row['number'];
                        }
                    } 
                ?>
            </div>
            
        </a>
    </div>
</div>


<?php 
$search = $_GET['query'];
    $actual_link = $_SERVER['HTTP_REFERER'];
    //echo $actual_link.'<br>';
    $one = explode("//", $actual_link);
    
    $cat = explode("/", $one[1]);
    foreach ($cat as $key) {
        $cat1 = $key;
    }
    $cat2 = explode(".", $cat1);
    $search_area = $cat2[0];
?>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="glyphicon glyphicon-info-sign">
                    </i>Search Item: <?php echo $search; echo ' ON '; echo $search_area; ?></h2>
                </div>
                <div class="box-content row">
                    <div class="col-lg-7 col-md-12">
                        <?php
                            switch ($search_area) {
                                case 'subject':
                                    $sql = 'CREATE OR REPLACE VIEW search_view AS 
                                    SELECT *
                                    FROM subject
                                    WHERE subject_id LIKE "%'.$search.'%" OR
                                    subject_name LIKE "%'.$search.'%" OR
                                    subject_code LIKE "%'.$search.'%" OR
                                    department LIKE "%'.$search.'%"';
                                    //echo $sql;
                                    $conn->query($sql);
                                    $sql_view = 'select * from search_view';
                                    $result = $conn->query($sql_view);
                                    if($result->num_rows>0){
                                                        echo '<table border="2">';
                                                        echo '<col width="20px" />';
                                                        echo '<tr>';
                                                        echo '<th>Subject Id</th>';
                                                        echo '<th>Subject Code</th>';
                                                        echo '<th>Subject Name</th>';
                                                        echo '</tr>';
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<tr>';
                                                            echo '<td>'.strtoupper($row['subject_id']).'</td>';
                                                            echo '<td>'.strtoupper($row['subject_code']).'</td>';
                                                            echo '<td>'.strtoupper($row['subject_name']).'</td>';
                                                            echo '</tr>';

                                                        }
                                                    echo '</table>';
                                                    }
                                                    else{
                                                        echo "No data";
                                                    }             

                                break;
                                case 'question':
                                    $sql = 'CREATE OR REPLACE VIEW search_view AS 
                                    SELECT *
                                    FROM question
                                    WHERE question_id LIKE "%'.$search.'%" OR
                                    question LIKE "%'.$search.'%"';
                                    //echo $sql;
                                    $conn->query($sql);
                                    $sql_view = 'select * from search_view';
                                    $result = $conn->query($sql_view);
                                    if($result->num_rows>0){
                                                        echo '<table border="2">';
                                                        echo '<col width="20px" />';
                                                        echo '<tr>';
                                                        echo '<th>Question Id</th>';
                                                        echo '<th>Question</th>';
                                                        echo '</tr>';
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<tr>';
                                                            echo '<td>'.strtoupper($row['question_id']).'</td>';
                                                            echo '<td>'.strtoupper($row['question']).'</td>';
                                                            echo '</tr>';

                                                        }
                                                    echo '</table>';
                                                    }
                                                    else{
                                                        echo "No data";
                                                    }      
                                    break;
                                case 'faculty':
                                    $sql = 'CREATE OR REPLACE VIEW search_view AS 
                                    SELECT *
                                    FROM faculty
                                    WHERE faculty_id LIKE "%'.$search.'%" OR
                                    faculty_name LIKE "%'.$search.'%" OR
                                    department_id LIKE "%'.$search.'%"';
                                    //echo $sql;
                                    $conn->query($sql);
                                    $sql_view = 'select * from search_view';
                                    $result = $conn->query($sql_view);
                                    if($result->num_rows>0){
                                                        echo '<table border="2">';
                                                        echo '<col width="20px" />';
                                                        echo '<tr>';
                                                        echo '<th>Faculty Id</th>';
                                                        echo '<th>Faculty Name</th>';
                                                        echo '</tr>';
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<tr>';
                                                            echo '<td>'.strtoupper($row['faculty_id']).'</td>';
                                                            echo '<td>'.strtoupper($row['faculty_name']).'</td>';
                                                            echo '</tr>';

                                                        }
                                                    echo '</table>';
                                                    }
                                                    else{
                                                        echo "No data";
                                                    }   
                                    break;
                                case 'student':
                                    $sql = 'CREATE OR REPLACE VIEW search_view AS 
                                    SELECT *
                                    FROM student
                                    WHERE student_id LIKE "%'.$search.'%" OR
                                    stu_name LIKE "%'.$search.'%" OR
                                    department_id LIKE "%'.$search.'%" OR
                                    semester LIKE "%'.$search.'%"';
                                    //echo $sql;
                                   $conn->query($sql);
                                    $sql_view = 'select * from search_view';
                                    $result = $conn->query($sql_view);
                                    if($result->num_rows>0){
                                                        echo '<table border="2">';
                                                        echo '<col width="20px" />';
                                                        echo '<tr>';
                                                        echo '<th>Student Id</th>';
                                                        echo '<th>Student Name</th>';
                                                        echo '<th>Semester</th>';
                                                        echo '</tr>';
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<tr>';
                                                            echo '<td>'.strtoupper($row['student_id']).'</td>';
                                                            echo '<td>'.strtoupper($row['stu_name']).'</td>';
                                                            echo '<td>'.strtoupper($row['semester']).'</td>';
                                                            echo '</tr>';

                                                        }
                                                    echo '</table>';
                                                    }
                                                    else{
                                                        echo "No data";
                                                    }   
                                    break;
                                default:
                                    # code...
                                    echo 'No result Found';
                                break;
                        }
                        ?>

                        <?php

                        ?>
                        <!--Table-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Footer starts here -->
   <?php include('footer.html');?>
   <!-- Footer ends here -->

</div>
</body>
</html>

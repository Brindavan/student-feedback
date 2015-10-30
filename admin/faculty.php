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
        <a data-toggle="tooltip" class="well top-block" href="student.php">
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
            
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <div data-toggle="tooltip" class="well top-block" href="faculty.php">
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
            
        </div>
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
                    $query_department = "select department_id,department from department";
                    //echo $query_department;
                    $result_department = $conn->query($query_department);
                    //echo $result_department->num_rows;

                    if($result_department->num_rows > 0 ){
                        while($row_departmenet = $result_department->fetch_assoc()){
                            
                            echo '<div class="row">';
                                echo '<div class="box col-md-12">';
                                    echo '<div class="box-inner">';
                                        echo '<div class="box-header well">';

                                            echo '<h2><i class="glyphicon glyphicon-info-sign">';
                                            echo '</i>Student Details:'.strtoupper($row_departmenet['department']).'</h2>';
                                        echo '</div>';
                                        echo '<div class="box-content row">';
                                            echo '<div class="col-lg-7 col-md-12">';
                                                   $i=1;
                                                    $sql = 'select faculty_id, faculty_name from faculty where department_id ='. $row_departmenet['department_id'];
                                                    
                                                    $result = $conn->query($sql);
                                                    if($result->num_rows>0){
                                                        echo '<table border="2">';
                                                        echo '<col width="20px" />';
                                                        echo '<tr>';
                                                        echo '<th>S.N</th>';
                                                        echo '<th>Faculty ID</th>';
                                                        echo '<th>Faculty Name</th>';
                                                        echo '</tr>';
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<tr>';
                                                            echo '<td>'.$i++.'</td>';
                                                            echo '<td>'.strtoupper($row['faculty_id']).'</td>';
                                                            echo '<td>'.strtoupper($row['faculty_name']).'</td>';
                                                            echo '</tr>';

                                                        }
                                                    echo '</table>';
                                                    }
                                                    else{
                                                        echo "No data";
                                                    }              
                                            echo '</div>';
                                   


                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';

                               
                        }
                    }

                ?>






    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Footer starts here -->
   <?php include('footer.html');?>
   <!-- Footer ends here -->

</div>
</body>
</html>

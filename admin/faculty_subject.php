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


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign">
                </i>Subject Details:</h2>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                <?php
                    $query = 'SELECT faculty.faculty_name, subject.subject_name
                                                FROM faculty_subject
                                                INNER JOIN faculty, subject
                                                WHERE
                                                faculty_subject.faculty_id = faculty.faculty_id && faculty_subject.subject_id = subject.subject_id';
                    $result = $conn->query($query);

                    if($result->num_rows > 0){
                        $i=1;   
                        echo '<table border="2">';
                        echo '<col width="20px" />';
                        echo '<tr>';
                        echo '<th>S.N</th>';
                        echo '<th>Faculty Name</th>';
                        echo '<th>Subject Name</th>';
                        echo '</tr>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>'.$i++.'</td>';
                            echo '<td>'.strtoupper($row['faculty_name']).'</td>';
                            echo '<td>'.strtoupper($row['subject_name']).'</td>';
                            echo '</tr>';
                        }
                    }?>
                </table>
                </div>

            </div>
            <!--Form -->
            <form action="assign_faculty.php" method="post">
               <div class="controls">
                <div id = "lables">
                    <label>Faculty List</label>
                    <label>Subject List</label>
                </div>
                <div id="select">
                <select name = "faculty">
                    <option>Select Faculty Name</option>
                    <?php 
                        $sql = "select faculty_name from faculty";
                        $result = $conn->query($sql);
                        echo $sql;
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo '<option>'.$row['faculty_name'].'</option>';
                            }
                        }
                    ?>
                    
                </select>
                <select name = "subject">
                    <option>Select Subject Name</option>
                    <?php 
                        $sql = "select subject_name from subject";
                        $result = $conn->query($sql);
                        echo $sql;
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo '<option>'.$row['subject_name'].'</option>';
                            }
                        }
                    ?>
                </select>        
                </div>   
               </div>
               <button id = "fac-sub" type="submit" class="btn btn-default">ADD</button>
            </form>
        </div>
    </div>
</div>
</div>
    <!-- Footer starts here -->
   <?php include('footer.html');?>
   <!-- Footer ends here -->

</div>
</body>
</html>

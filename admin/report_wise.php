<?php 
    
    session_start();
    include('db.php');

?>



<?php

switch ($_POST['report']) {
	case 'department':
		$name = "Department Wise";
	break;

	case 'faculty':
		$name = "Faculty Wise";
	break;

	case 'class':
		$name = "Class Wise";
	break;
	
	default:
		# code...
		break;
}
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
                <h2><i class="glyphicon glyphicon-info-sign"></i> <?php echo $name;?></h2>

                
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                	<form action="generate_report.php" method = "post">
					<?php

					switch ($_POST['report']) {
						/*case 'department':
							$sql = 'select department from department';
							$result = $conn->query($sql);
							if($result->num_rows >0){
								echo '<select name = "report">';
								echo '<option value = "select_departmenet">Select Department</option>';
								while($row = $result->fetch_assoc()){
									echo '<option value ="'.$row['department'].'">'.strtoupper($row['department']).'</option>';

								}
								echo '</select>';
								echo '<input type = "hidden" name = "hidden" value = "department" />';
							}
							break;
							*/
						case 'faculty':
							$sql = 'select faculty_name from faculty';
							$result = $conn->query($sql);
							if($result->num_rows >0){
								echo '<select name = "report">';
								echo '<option value = "select_faculty">Select Faculty</option>';
								while($row = $result->fetch_assoc()){
									echo '<option value ="'.$row['faculty_name'].'">'.strtoupper($row['faculty_name']).'</option>';

								}
								echo '</select>';
								echo '<input type = "hidden" name = "hidden" value = "faculty" />';
							}
						break;
						
						case 'class':
							$class = array("MBA First","MBA Second","MBA Third","MBA Fourth","MCA First","MCA Second","MCA Third","MCA Fourth","MCA Fifth","MCA Sixth",
								"M.Com First","M.Com Second","M.Com Third","M.Com Fourth",);
								echo '<select name = "report">';
								echo '<option value = "select_class">Select class</option>';
								foreach ($class as $key) {
									echo '<option value ="'.$key.'">'.strtoupper($key).'</option>';
								}
								echo '</select>';
								echo '<input type = "hidden" name = "hidden" value = "class" />';
							
						break;
						
						default:
							# code...
							break;
					}
					?>
					<input type = "submit" value = "Submit" />
                    </form>
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


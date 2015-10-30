<?php 
    
    session_start();
    include('db.php');
    $title = array();
			$value = array();
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
<?php 
$type = $_POST['hidden'];

switch ($type) {
	case 'faculty':
		$name = $_POST['report'];
		$sql = 'SELECT feedback.answer,subject.subject_name
				FROM faculty
				INNER JOIN feedback,subject
				WHERE
				faculty.faculty_id = feedback.faculty_id
				AND subject.subject_id = feedback.subject_id
				AND faculty.faculty_name = "'.$_POST['report'].'"

				';
		$result = $conn->query($sql);
		if($result->num_rows >0 ){
			
			while($row = $result->fetch_assoc()){
				array_push($title, $row['subject_name']);
				array_push($value, $row['answer']);
			}
			$count = count($title);
			//echo count($value);
		}
	break;
	
	case 'class':
		$pieces = explode(" ", $_POST['report']);
		switch($pieces[0]){
			case 'MCA':
				$department = 1;
			break;
			case 'MBA':
				$department = 2;
			break;
			case 'M.Com':
				$department = 3;
			break;
		}
		
		switch ($pieces[1]) {
			case 'First':
				$sem = 1;
			break;
			case 'Second':
				$sem = 2;
			break;
			case 'Third':
				$sem = 3;
			break;
			case 'Fourth':
				$sem = 4;
			break;
			case 'Fifth':
				$sem = 5;
			break;
			case 'Sixth':
				$sem = 6;
			break;
			default:
				# code...
				break;
		}
		$sql = 'SELECT subject.subject_name, feedback.answer 
				FROM `subject`
				INNER JOIN feedback
				WHERE 
				subject.department = '.$department.' AND subject.sem = '.$sem.' AND
				subject.subject_id = feedback.subject_id';
			//echo $sql;
		$result = $conn->query($sql);
		if($result->num_rows >0){
			//echo 'good';
			
			while($row = $result->fetch_assoc()){
				array_push($title, $row['subject_name']);
				array_push($value, $row['answer']);
			}
			$count = count($title);
		}
	break;
	/*
	case 'department':
		echo $_POST['report'];
	break;
	*/
	default:
		echo $_POST['report'];
	break;
}	

?>
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
		
        var data = google.visualization.arrayToDataTable([
          ['label Title', 'Label value'],
		  <?php
			for($i=0;$i<$count;$i++){?>
			['<?php echo $title[$i] ?>',<?php echo $value[$i] ?>],
			<?php } ?>
        ]);

        var options = {
          title: '<?php echo $_POST['report'];?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Introduction</h2>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
             		   <div id="piechart" style="width: 900px; height: 500px;"></div>
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


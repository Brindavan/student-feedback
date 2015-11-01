<?php
session_start();
include('../admin/db.php');
  $sql = 'select * from student where stu_name = "'.$_SESSION['name'].'";';

   $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $_SESSION['id'] = $row['student_id'];
                $_SESSION['department'] = $row['department_id'];
                $_SESSION['sem']    =$row['semester'];
                }
            }
        
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="assets/css/style.css" rel="stylesheet" />
      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     
</head>
<body>
    <div id="wrapper">
       <?php include('sidebar.php');?>
       <header>
    <div class="top-nav">
      <?php 
        $sql = 'select subject.subject_code,subject.subject_name,faculty.faculty_name from subject 
                inner join faculty, faculty_subject
                where department = '.$_SESSION['department'] .' and sem = '.$_SESSION['sem'] .'
                and faculty.faculty_id = faculty_subject.faculty_id and faculty_subject.subject_id = subject.subject_id
                order by subject.subject_code';
             // echo $sql;
        $result = $conn->query($sql);
        $i=1;
        if($result->num_rows >0){
          echo '<ul>';
          while($row = $result->fetch_assoc()){
              echo '<li class = "home"><a href=subject'.$i++.'.php> '.$row['subject_code'].'</a>';
              echo '<p style="color: white;     margin-top: -33px; font-size: 9px;">'.$row['subject_name'].'</p>';
              echo '<p style="color: white;     margin-top: -46px; font-size: 11px;">'.$row['faculty_name'].'</p></li>';
          }
          echo '</ul>';
        }
      ?>
      
    </div>
  </header>
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                  <div class="panel panel-info">
                        <div class="panel-heading">
                           We are waiting for your feedback.
                        </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <footer >
        &copy; 2015 Student-Feedback
    </footer>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>

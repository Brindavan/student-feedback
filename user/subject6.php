<?php
session_start();
include('../admin/db.php');
  $sql = 'select * from student where stu_name = "'.$_SESSION['name'].'";';

   $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
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
      
        $sql = 'select subject.subject_id,subject.subject_code,subject.subject_name,faculty.faculty_name from subject 
                inner join faculty, faculty_subject
                where department = '.$_SESSION['department'] .' and sem = '.$_SESSION['sem'] .'
                and faculty.faculty_id = faculty_subject.faculty_id and faculty_subject.subject_id = subject.subject_id'
                ;
        $result = $conn->query($sql);
        $i=1;
        $j=0;
        if($result->num_rows >0){
          echo '<ul>';
          while($row = $result->fetch_assoc()){
              $subject[$j++] = $row['subject_id'];
              echo '<li class = "home"><a href=subject'.$i++.'.php> '.$row['subject_code'].'</a>';
              echo '<p style="color: white;     margin-top: -33px; font-size: 9px;">'.$row['subject_name'].'</p>';
              echo '<p style="color: white;     margin-top: -46px; font-size: 11px;">'.$row['faculty_name'].'</p></li>';
          }
          echo '</ul>';
        }
      ?>
      <?php 
  $sql = 'select student_id from student where stu_name = "'.$_SESSION['name'].'";';
  $result = $conn->query($sql);
  if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
      $student_id = $row['student_id'];
    }
  }
  $sql = 'select answer from feedback where subject_id = '.$subject[5].' and student_id = "'.$student_id.'";';
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){?>
      </div>
  </header>
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                  <div class="panel panel-info">
                        <div class="panel-heading">
                            Your total value is: <?php echo $row['answer'];?>
                        </div>
                  </div>
                </div>
               

    <?php }

  }
  else{
  
?>
    </div>
  </header>
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                  <div class="panel panel-info">
                        <div class="panel-heading">
                            Answer the following questions.
                        </div>
                  </div>
                </div>
                <div id="main">


<form action="save_feedback.php" method = "post">
                  
                <?php include('..//admin/db.php');?>
                <?php

                    $sql = "select * from  question;";
                    
                    $result = $conn->query($sql);
                    if($result->num_rows >0){
                        while($row = $result->fetch_assoc()){
                            ?>
                           <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-8">
                                        <div class="alert alert-warning">
                                          <?php echo $row['question_id'].'.'.$row['question']?>
                                          <?php //echo $sub_id[6];?>

                                        </div>
                                    </div>
                                    <div id="option" class="col-md-4">

                                        <div class="alert alert-warning">
                                            <input type="radio" name="answer<?php echo $row['question_id']; ?>" value = "5">5
                                            <input type="radio" name="answer<?php echo $row['question_id']; ?>" value = "4">4
                                            <input type="radio" name="answer<?php echo $row['question_id']; ?>" value = "3">3
                                            <input type="radio" name="answer<?php echo $row['question_id']; ?>" value = "2">2
                                            <input type="radio" name="answer<?php echo $row['question_id']; ?>" value = "1" checked>1
                                        </div>
                                    </div>
                                </div>
                            </div>
                       <?php }
                    }
                
                 ?>
                 <input type = "hidden" name = "hidden" value = "subject6"/>
                <button class="btn btn-primary btn-default" data-toggle="modal" data-target="#myModal">
                             SAVE
                            </button>
                                   
                        
                    <form>


</div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <?php } ?>
    <footer >
        &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
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

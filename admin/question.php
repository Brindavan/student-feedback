<?php 
    session_start();
    include('db.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.html'); ?>

<script type="text/JavaScript">
function edit(id) {  
    window.location.href = "edit_question.php?name=" + id;
}

function check(id){
    window.location.href = "delete_question.php?question_id="+id;
}

</script>

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
                <a href="INDEX.PP">Dashboard</a>
            </li>
        </ul>
    </div>
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
         <a data-toggle="tooltip" class="well top-block" href="student.php" >
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
        <a data-toggle="tooltip" class="well top-block">
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
                <h2><i class="glyphicon glyphicon-info-sign"></i>Question</h2>

               
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                    <div id ="addquestion">
                        <ul class="question">
                         
                             <?php 
                                $edit_id=1;
                                $i=1;
                                $delete_id = 1;
                                $j = 1;
                                $sql = "select question_id, question from question";
                                //echo $sql;
                                $result = $conn->query($sql);
                                if($result->num_rows>0){
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <li class="question"><?php echo $row['question'];?>
                                             <div id = "question-option">
                                                <div class="box-icon">
                                                  
                                                    <a id = "<?php echo $i++;?>" onclick="edit(<?php echo $row['question_id']; ?>);" class="btn btn-setting btn-round btn-default">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>

                                                     <a id = "<?php echo $j++;?>" onclick="check(<?php echo $row['question_id']; ?>);" class="btn btn-setting btn-round btn-default">
                                                        <i class="glyphicon glyphicon-remove"></i>
                                                    </a>

                                                    <!--<a id = "<?php echo $j++;?>"  class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
                                                </div>
                                            </div>
                                        </li>
                                
                                <?php
                                    }

                                    echo '</table>';
                                }
                                else{
                                    echo "No data";
                                }                            
                            ?>

                                

                         
                        </ul>
                        <form action="add_question.php" method = "post">
                      <textarea name = "question" rows="5" cols="80"></textarea>
                         <button type="submit" class="btn btn-primary">ADD</button>
                      </form>
                    </div>
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

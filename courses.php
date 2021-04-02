<?php 
 include 'util/nav.php';
 include 'college/action.php';

 $_SESSION['departmentID'] = base64_decode(urldecode($_GET['departmentID']));

 if($_SESSION['departmentID'] != ""){
 ?>
  
<section class="course-one course-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <center><h1 class="block-title__title" style="color:#18478c; font-size: 28px;">Our Courses at <span style="color: orange;"><?=$_GET['departmentName'];?> Campus</span></h1></center>
                         <br><br>
                    </div>

                    <?php

                    $sql;

                    if($_SESSION['departmentID'] != 32){

                        $sql = "SELECT * From courses  where courseDepartment = {$_SESSION['departmentID']} Group by courseCode order by time_stamp DESC";

                    }else{

                        $sql = "SELECT * From courses where courseDepartment = 32  Group by courseCode order by time_stamp DESC"; 
                    }
                    
                    $results = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($results)):?>
           
                    <div class="col-lg-4">
                        <div class="course-one__single">
                            <div class="course-one__image">
                                
                                <img src="assets/images/<?=$row['courseCode'];?>.jpg" style="max-height: 15rem; min-height: 15rem; " alt="">
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="course-one__content">
                                

                                <p class="course-one__title"><a href="details.php?token=<?=urlencode(base64_encode($row['coursesID']));?>"><?=$row['courseName'];?></a></p>
                                <div class="course-one__stars">

                                </div>
                                <div class="course-one__meta">
                                    <p><i class="far fa-clock"></i><?=$row['courseDuration']." ".$row['courseTimeline'];?></p>
                                   
                                </div>
                                <a href="details.php?token=<?=urlencode(base64_encode($row['coursesID']));?>" class="course-one__link">Preview</a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
                    
                </div>            
            </div>
        </section>
       

    
 

      
   
      <?php include 'util/footer.php';?>
</body>


</html>

<?php }else{  

  

   echo "<script>window.location = 'index.php';</script>";

} ?>

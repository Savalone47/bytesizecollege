
     <?php include 'util/nav.php';?>
        <?php include 'college/action.php';?>
       
   <style type="text/css">
       
       .course-one {
  padding-top: 0px;
  padding-bottom: 0px;
}
   </style>     
        <section class="about-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-two__content" >
                            <div class="block-title text-left">
                                <h2 class="block-title__title" style="color:#18478c;">Distance Learning Courses</h2><!-- /.block-title__title -->
                            </div><!-- /.block-title -->
                            <p class="about-two__text"> A fast growing 100% citizen Institution in Botswana.  Be part of the family, we are second to none.</p><!-- /.about-two__text -->
                      
                           <!-- <a href="#" class="btn btn-danger">Learn More</a> --><!-- /.thm-btn -->
                        </div><!-- /.about-two__content -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-xl-6 d-flex justify-content-xl-end justify-content-sm-center">
                        <div class="">
                            <span class="about-two__image-dots"></span><!-- /.about-two__image-dots -->
                       
                        </div><!-- /.about-two__image -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.about-two -->
       

 <section class="course-one course-one__teacher-details home-one">
            <div class="container">
                <div class="course-one__carousel owl-carousel owl-theme">
                
                    
                 
                    
                


                    <?php 

                    $sql = "SELECT * FROM courses";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($query)){

                    ?>
                    <!-- /.item -->
                
                    <div class="item">
                        <div class="course-one__single color-6">
                            <div class="course-one__image">
                                <img src="assets/images/course-1-6.jpg" alt="">
                                <i class="far fa-heart"></i><!-- /.far fa-heart -->
                            </div><!-- /.course-one__image -->
                            <div class="course-one__content">
                            
                             
     <h2 class="course-one__title"><a href="courseDetails.php?id=<?php echo $row['coursesID']?>" ><?php echo $row['courseName']; ?></a></h2>
                                <!-- /.course-one__title -->
                        
                            
                                <a href="courseDetails.php?id=<?php echo $row['coursesID']?>&type=fulltime" class="course-one__link">See Preview</a><!-- /.course-one__link -->
                            </div><!-- /.course-one__content -->
                        </div><!-- /.course-one__single -->
                    </div>
                    <!-- /.item -->
                


                <?php } ?>


                 
                </div><!-- /.course-one__carousel -->
            </div><!-- /.container -->
        </section><!-- /.course-one course-page -->    
 

      
   
      <?php include 'util/footer.php';?>
</body>


</html>
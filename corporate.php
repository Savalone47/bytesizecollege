<?php include 'util/nav.php';?>
<?php include 'adult/action.php';?>
         
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
                        <div class="about-two__content">
                            <div class="block-title text-left">
                                <h2 class="block-title__title" style="color:#18478c;">Corporate-Training Courses</h2><!-- /.block-title__title -->
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
      
      <section class="course-one course-page">
            <div class="container">
                <div class="row">
                    <?php 

                    $sql = "SELECT * FROM courses";
                    $query = mysqli_query($conn,$sql);
              
                    while($row = mysqli_fetch_array($query)){

                    ?>
                    <div class="col-lg-4">
                         <div class="course-one__single color-6">
                            <div class="course-one__image">
                                <img src="assets/images/course-1-6.jpg" alt="">
                                <i class="far fa-heart"></i><!-- /.far fa-heart -->
                            </div><!-- /.course-one__image -->
                            <div class="course-one__content">
                                <a href="#" class="course-one__category"></a><!-- /.course-one__category -->
                            
     <h2 class="course-one__title"><a href="courseDetails.php?id=<?php echo $row['coursesID']?>&type=corporate" ><?php echo $row['courseName']; ?></a></h2>
                           
                                <div class="course-one__meta">
                                    <a href="course-details.html"><i class="far fa-clock"></i> 10 Hours</a>
                                    <a href="course-details.html"><i class="far fa-folder-open"></i> 6 Lectures</a>
                                    <a href="course-details.html">$18</a>
                                </div><!-- /.course-one__meta -->
                                <a href="courseDetails.php?id=<?php echo $row['coursesID']?>&type=corporate" class="course-one__link">See Preview</a><!-- /.course-one__link -->
                            </div><!-- /.course-one__content -->
                        </div><!-- /.course-one__single -->

                    </div><!-- /.col-lg-4 -->
                <?php } ?>



                </div><!-- /.row -->
                <div class="post-pagination">
                    <a href="#"><i class="fa fa-angle-double-left"></i><!-- /.fa fa-angle-double-left --></a>
                    <a class="active" href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#"><i class="fa fa-angle-double-right"></i><!-- /.fa fa-angle-double-left --></a>
                </div><!-- /.post-pagination -->

            </div><!-- /.container -->
        </section><!-- /.course-one course-page -->
        
      <?php include 'util/footer.php';?>
</body>


</html>
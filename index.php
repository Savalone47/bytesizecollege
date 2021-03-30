<?php
     include 'util/nav.php';
     include 'college/action.php';
     ?>
 <style type="text/css">
 	.course-category-three {
    position: relative;
    padding: 35px 0;
}
 </style>
<section class="course-category-three">
            <div class="container">
                <div class="block-title">
                    <h3 class="block-title__title" style="color: rgb(24,71,140); font-size: 25px;">LEARNING PORTAL
                        </h3><br>
                        <p>Please select a Campus to register for a course.</p>
                </div>
                <div class="row">
                    <?php
                    $sql = "SELECT `departmentID`, `departmentName` FROM `department` WHERE departmentName not like '%2020' ";
                    $results = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($results)):?>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="course-category-three__single">
                            <img src="assets/images/<?=$row['departmentName']?>.jpg" style="width: 100%; min-height: 14rem" alt="">
                            <div class="course-category-three__content">
                                <h3 class="course-category-three__title"><a href="courses.php?departmentID=<?=urlencode(base64_encode($row['departmentID']));?>&departmentName=<?=$row['departmentName'];?>"><?=$row['departmentName'];?></a></h3>
                            </div>
                             <a href="courses.php?departmentID=<?=urlencode(base64_encode($row['departmentID']))?>&departmentName=<?=$row['departmentName'];?>" class="btn btn-info" style="position: absolute;bottom: 1rem;right: 40%">Select</a>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </section>
      <?php include 'util/footer.php';?>
</body>
</html>
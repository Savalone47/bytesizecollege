<?php
session_start();
include '../action.php';


$sql = "";

$sql = "SELECT * FROM assignedCourses where studentID= '".$_SESSION['adminID']."'";



                        $rest = mysqli_query($conn, $sql);


                        while($t = mysqli_fetch_array($rest)){
                        $sql1 = "SELECT * FROM extralessons inner join modules on modules.moduleCourseID = extralessons.grade

where grade ='".$t['courseID']."'  GROUP by lessonDate,lessonStart ";
                        //print_r($sql);exit;
                        $res = mysqli_query($conn, $sql1);
                        ?>
                        
                        <tr>
                            <td><?php echo substr($t['time'],0,5);?></td>
                        <?php
                        $week_days = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
                        $classes = array();
                        while($row = mysqli_fetch_assoc($res)) {
                            $classes[date('l',strtotime($row['lessonDate']))] = $row;
                        }
                        foreach ($week_days as $day) {
                        ?>
                            <?php if (array_key_exists($day, $classes)) { 
                                $row = $classes[$day]; ?>
                                <td>
                                	<p class="name"><?=$row['moduleName'];?></p>
                                	<p class="grade">Grade<?=$row['grade'];?></p>
                                	
                                    
   <?php echo $row1['moduleName']; ?>
   <form action="../live/api/create-token/index.php" method="POST">
      <!-- <form action="../../live3/api/createRoom/index.php" method="POST">-->
      <input type="hidden" name="nameText" value="<?php echo $_SESSION['adminName']?>">
      <input type="hidden" name="meetingID" value="<?php echo $row['roomID']?>">
      <input type="hidden" name="roomPin" value="<?php  echo $row['roomPin'];?>">
      <?php 
    
         
         
                 if($row['moduleName']){
                
         
                    ?>
      <button class="btn btn-success btn-xs">Join</button>
      <?php } 
        ?>
   </form>
 
   
</td>

                            <?php } else { ?>
                            <td></td>


                        <?php }   
                        }
                        ?>
                        </tr>
                        <?php    
                        }
                     mysqli_close($conn);

?>
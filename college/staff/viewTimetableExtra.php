<?php
session_start();
include '../action.php';


$sql = "";

$sql = "SELECT DISTINCT (lessonStart) as time from extralessons

inner join modules on   modules.moduleID = extralessons.subjectID

where modules.moduleCourseID =   '".$_GET['classID']."'   order by lessonStart ASC";


$rest = mysqli_query($conn, $sql);


while($t = mysqli_fetch_array($rest)){

  $sql1 = "select * from extralessons 
  inner join modules on modules.moduleID = extralessons.subjectID
  where   lessonStart = '".$t['time']."'";
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
         <p class="grade"></p>


         <?php echo $row1['moduleName']; ?>
         <form action="../live/api/create-token/index.php" method="POST">

          <input type="hidden" name="nameText" value="<?php echo $_SESSION['adminName']?>">
          <input type="hidden" name="meetingID" value="<?php echo $row['roomID']?>">
          <input type="hidden" name="roomPin" value="<?php  echo $row['adminPin'];?>">
          <?php 



          if($row['moduleName']){


            ?>
            <button class="btn btn-success btn-xs">Join</button>
          <?php } 
          if($row['moduleName']){

           ?>
         </form>
         <?php if($_SESSION['adminLevel'] == '4'){?>
           <a onclick="return confirm('Are you sure you want to delete this?')" class="pull-right" href="back/deleteTimetableExtra.php?id=<?php echo $row['lessonID'];?>">
             <button class=" btn-xs" style="border: none;"><i class="fa fa-trash " style="color:red;"></i></button></a>
           <?php }}?>
         </td>


         <!-- end -->
       </td>
     <?php } else { ?>
      <td></td>


    <?php }   
  }
  ?>
</tr>
<?php    
}

// default 

if ($_POST['action']=="fetchTimeTableExtra") {



  $sql = "SELECT DISTINCT (lessonStart) as time from extralessons

where extralessons.tutorID = '".$_SESSION['adminID']."'  order by lessonStart ASC";


$rest = mysqli_query($conn, $sql);


while($t = mysqli_fetch_array($rest)){

  $sql1 = "select * from extralessons 
  inner join modules on modules.moduleID = extralessons.subjectID
  where   lessonStart = '".$t['time']."'";
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
         <p class="grade"></p>


         <?php echo $row1['moduleName']; ?>
         <form action="../live/api/create-token/index.php" method="POST">

          <input type="hidden" name="nameText" value="<?php echo $_SESSION['adminName']?>">
          <input type="hidden" name="meetingID" value="<?php echo $row['roomID']?>">
          <input type="hidden" name="roomPin" value="<?php  echo $row['adminPin'];?>">
          <?php 



          if($row['moduleName']){


            ?>
            <button class="btn btn-success btn-xs">Join</button>
          <?php } 
          if($row['moduleName']){

           ?>
         </form>
         <?php if($_SESSION['adminLevel'] == '4'){?>
           <a onclick="return confirm('Are you sure you want to delete this?')" class="pull-right" href="back/deleteTimetableExtra.php?id=<?php echo $row['lessonID'];?>">
             <button class=" btn-xs" style="border: none;"><i class="fa fa-trash " style="color:red;"></i></button></a>
           <?php }}?>
         </td>


         <!-- end -->
       </td>
     <?php } else { ?>
      <td></td>


    <?php }   
  }
  ?>
</tr>
<?php    
}






}
// end default
mysqli_close($conn);
?>


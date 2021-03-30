<?php 
session_start();
include "../action.php";

$sql = "SELECT * FROM discussion where facilitatorID='".$_GET['id']."' and moduleID='".$_GET['moduleID']."' and studentID='".$_SESSION['adminID']."'";
$query = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($query)){
    $imageFileType = strtolower(pathinfo($row['discussion'],PATHINFO_EXTENSION));
    ?>



    <?php 

    if(!$row['facilitatorID2']){
        ?>
        <!-- Self Message Start -->
                      <?php 
                        $sqlite = "SELECT * FROM students where studentID='".$_SESSION['adminID']."'";
                        $querylite = mysqli_query($conn,$sqlite);
                        $rowlite = mysqli_fetch_array($querylite);
?>






<style type="text/css">
    
    .chat-img img{
        height: 2rem;
        width: 2rem;
    }

    .img img{
        height: 2rem;
    }
       .img .filleName{
      font-size: 10px ;
     
      height: 1.5rem;
   
      overflow: hidden;
      text-decoration: underline;
    }
</style>
                        <li class="admin clearfix">



                            
                            <div class="chat-body clearfix" style=" background-color: rgba(101, 93, 254, 0.8); color: white;">
                                <div class="header clearfix">
                                    <small class="left text-muted" style="color: #FFC195  !important"><span class="glyphicon glyphicon-time" ></span><?php echo date('j M  Y (G:i)',strtotime($row['time_stamp']))?></small>
                    <small class="right primary-font" style="color: #fff"><?php echo $_SESSION['adminName']?></small>
                                </div>
                                          <p>

          <?php 

          $text = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1"    style="text-decoration: underline !important; font-weight: 100 !important; font-size: 12px;"target="_blank" rel="nofollow">$1</a>', $row['discussion2'])
          ?>
      
         <span><?php echo $text; ?></span>
       </p>
                            </div>
                            <span class="chat-img right clearfix  mx-2">
                 <img src="avatar.png" alt="Admin" class="img-circle" />
                            </span>
                        </li>


   
  
                    <?php }else{?>

                            <?php 

                           $sql5 = "SELECT * FROM `management` where managementID ='".$row['facilitatorID']."'";
                           $query5 = mysqli_query($conn,$sql5);
                           $row5 = mysqli_fetch_array($query5);
                            ?>
                      



                         <!-- Received Message Start -->
                        <li class="agent clearfix">
                           
                            <div class="chat-body clearfix" style="background-color: rgb(234,238,243);">
                                <div class="header clearfix">
                                <small class="primary-font"><?php echo $row5['managementName']?></small> <small class="right text-muted">
                                        <span class="glyphicon glyphicon-time"></span><?php echo date('j M  Y (G:i)',strtotime($row['time_stamp']))?></small>
                                </div>
                                       <p>

          <?php 

          $text = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1"    style="text-decoration: underline !important; font-weight: 100 !important; font-size: 12px;"target="_blank" rel="nofollow">$1</a>', $row['discussion2'])
          ?>
      
         <span><?php echo nl2br($text);?></span>
       </p>
                                  <?php if($imageFileType == 'pdf'){?>
                               <a href="../chats/<?php echo $row['discussion']?>" target="_blank" preview> <span class="img"><p class="filleName"><?php echo $row['discussion']?></p><img src="pdf.svg"></span></a>
                               <?php }elseif($imageFileType == 'mp4'){?>
                                  <a href="../chats/<?php echo $row['discussion']?>" preview>
                                 <span class="img"><p class="filleName"><?php echo $row['discussion']?></p><img src="mp4.svg"></span></a>
                               <?php }elseif($imageFileType == 'docx' || $imageFileType == 'doc' ){?>
                                    <a href="../staff/previewCommunity.php?preview=<?php echo $row['discussion']?>" preview>
                                  <span class="img"><p class="filleName"><?php echo $row['discussion']?></p><img src="word.svg"></span></a>

                              <?php }elseif($imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'jpeg' || $imageFileType == 'svg'){?>
                                      <a href="../chats/<?php echo $row['discussion']?>" preview>
                                  <span class="img"><p class="filleName"><?php echo $row['discussion']?></p>
                                    <img src="../chats/<?php echo $row['discussion']?>" style="height: 3rem !important;">
                                  </span></a>


                                <?php }?>









                            </div>
                             <span class="chat-img left clearfix mx-2">
                                <img src="avatar.png" alt="Agent" class="img-circle" />
                            </span>
                        </li>





                 

             

           

<?php 

}}

?>

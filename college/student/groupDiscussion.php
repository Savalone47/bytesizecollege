<?php 
session_start();
include "../action.php";



$sql = "SELECT * FROM groupDiscuss where chapter='".$_GET['id']."' and moduleID='".$_GET['moduleID']."'";
$query = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($query)){
$imageFileType = strtolower(pathinfo($row['discussion'],PATHINFO_EXTENSION));
?>


									
								<?php 
								
                                if($row['studentID'] == $_SESSION['adminID']){

								?>



                                <style type="text/css">
                                    .img img{
                                        height: 3rem
                                    }
                                    .img img{
                                height: 2rem
                              }
                          .img .filleName{
                                      font-size: 10px ;
                                     
                                      height: 1.5rem;
                                   
                                      overflow: hidden;
                                      text-decoration: underline;
                                    }
                                </style>
                                 <!-- Self Message Start -->
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
                          
                                <!-- Self Message End -->
                            <?php }else{?>



                         <?php 

                                        $sql5 = "SELECT * FROM students where studentID='".$row['studentID']."'";
                                        $query5 = mysqli_query($conn,$sql5);
                                        $row5 = mysqli_fetch_array($query5);



                                        $sql6 = "SELECT * FROM management where managementID='".$row['facilitatorID']."'";
                                        $query6 = mysqli_query($conn,$sql6);
                                        $row6 = mysqli_fetch_array($query6);


                                        ?>


       <!-- Received Message Start -->
                     

                                <!-- Received Message Start -->


                                     <li class="agent clearfix">
                           
                            <div class="chat-body clearfix" style="background-color: rgb(234,238,243);">
                                <div class="header clearfix">
                                    <small class="primary-font"><?php echo $row6['managementName'];?></small> <small class="right text-muted">
                                        <span class="glyphicon glyphicon-time"></span><?php echo date('j M  Y (G:i)',strtotime($row['time_stamp']))?></small>
                                </div>
                                          <p>

          <?php 

          $text = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1"    style="text-decoration: underline !important; font-weight: 100 !important; font-size: 12px;"target="_blank" rel="nofollow">$1</a>', $row['discussion2'])
          ?>
      
         <span><?php echo nl2br($text); ?></span>
       </p>
                                   <?php if($imageFileType == 'pdf'){?>
                               <a href="../chats/<?php echo $row['discussion']?>" target="_blank" preview> <span class="img"><p class="filleName"><?php echo $row['discussion']?></p><img src="pdf.svg"></span></a>
                               <?php }elseif($imageFileType == 'mp4'){?>
                                  <a href="../chats/<?php echo $row['discussion']?>" target="_blank" preview>
                                 <span class="img"><p class="filleName"><?php echo $row['discussion']?></p><img src="mp4.svg"></span></a>
                               <?php }elseif($imageFileType == 'docx' || $imageFileType == 'doc' ){?>
                                    <a href="../staff/previewCommunity.php?preview=<?php echo $row['discussion']?>" target="_blank">
                                  <span class="img"><p class="filleName"><?php echo $row['discussion']?></p><img src="word.svg"></span></a>

                              <?php }elseif($imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'jpeg' || $imageFileType == 'svg'){?>
                                      <a href="../chats/<?php echo $row['discussion']?>" preview>
                                  <span class="img"><p class="filleName"><?php echo $row['discussion']?></p>
                                    <img src="../chats/<?php echo $row['discussion']?>">
                                  </span></a>


                                <?php }?>







                            </div>
                             <span class="chat-img left clearfix mx-2">
                                  <img src="avatar.png" alt="Admin" class="img-circle" />
                            </span>
                        </li>
                             
                            <?php 

                        }


                       


                        }
                        ?>
                        <div id="last"></div>

<script type="text/javascript">

   $(document).ready(function(){
     var elem = document.getElementById('load');
  elem.scrollTop = elem.scrollHeight;

});
</script>
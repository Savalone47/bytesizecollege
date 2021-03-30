<?php 
     include 'util/nav.php';
     include 'college/action.php';
      ?>
  
        <style type="text/css">
            .stretch-card>.card {
                width: 100%;
                min-width: 100%
            }

           

            .flex {
                -webkit-box-flex: 1;
                -ms-flex: 1 1 auto;
                flex: 1 1 auto
            }
            .mobile{
                display: none;
            }

            @media (max-width:991.98px) {
                .padding {
                    padding: 1.5rem
                }
                .mobile{
                display: block;
            }
            i.fa{
                display: none !important;
            }
            .blog-one__meta a:before {
  
    width:0%;
    height:0%;
    
}

element.style {
}
.blog-one__meta a {
 
    background-color: #fff !important;

}








            }

            @media (max-width:767.98px) {
                .padding {
                    padding: 1rem
                }
                 i.fa{
                display: none !important;
            }
            }

            .padding {
                padding: 15rem !important
            }


            .blog-one__link {
                background-color: #FF6603;
                border-color: #FF6603;
                color: #fff !important;
                display: inline-block;
                margin-bottom: 0;
                font-weight: 400;
                text-align: center;
                vertical-align: middle;
                cursor: pointer;
                background-image: none;
                border: 1px solid transparent;
                white-space: nowrap;
                padding: 6px 12px;
                font-size: 14px;
                line-height: 1.428571429;
                border-radius: 4px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                -o-user-select: none;
                user-select: none;
            }
            .blog-one__link:hover{
                background-color: #007aeb;
                border-color: #007aeb;
              
            }
            .blog-one__title{
                overflow: hidden;
               text-overflow: ellipsis;
               display: -webkit-box;
               -webkit-line-clamp: 2; 
               -webkit-box-orient: vertical;
               min-height: 4.5rem
            }

            .blog-one__text{
                overflow: hidden;
               text-overflow: ellipsis;
               display: -webkit-box;
               -webkit-line-clamp: 3; 
               -webkit-box-orient: vertical;
               min-height: 6.5rem
            }










        </style>

<section class="blog-one blog-page">
            <div class="container">
                <div class="row">

                    <?php
                            $result = mysqli_query($conn,"SELECT * FROM events order by eventDate DESC");

                            if(mysqli_num_rows($result)){

                            while($row = mysqli_fetch_array($result)):

                            ?>

                    <div class="col-lg-4">
                        <div class="blog-one__single">
                            <div class="blog-one__image">
                               
                            </div>
                            

                            <div class="blog-one__content text-center">

                                <h2 class="blog-one__title"><a ><?=$row['eventTitle'];?></a>
                                </h2>
                                <div class="course-one__meta">
                                    <a href="#"><i class="far fa-clock"></i><?=$row['eventDate'];?></a>
                                    <a href="#"><i class="far fa-calendar"></i><?=date("H:i",strtotime($row['eventstatTime']));?></a>
                                   
                                    <br>
                                    <br>
                                </div>
                                <p class="blog-one__text"><?=$row['eventLocation'];?></p>
                                <a  class="blog-one__link" data-toggle="modal" data-target="#Modal-overflow<?=$row['eventID'];?>">Read More</a>
                            </div>


                            <!-- start modal -->

                            <div class="modal fade modal-flex" id="Modal-overflow<?=$row['eventID'];?>" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body model-container"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>

                                            <br>
                                            <br>



                                            <div class="overflow-container">
                                                <h5><?=$row['eventTitle'];?></h5>
                                            </div> <img src="college/staff/events/<?=$row['eventImage'];?>" alt="" class="img img-fluid">
                                            <p class="p-t-15">
                                                <?=$row['eventDescription'];?>
                                            </p>
                                            <br>
                                            <div class="share-block">
                                                <div class="left-block">
                                                    <p><?=$row['eventLocation'];?></p>
                                                </div>

                                            </div>
                                            <div class="course-one__meta">
                                                <a href="#"><i class="far fa-calendar"></i> Event Date : <?=$row['eventDate'];?></a>
                                                <a href="#"><i class="far fa-clock"></i>Start Time <?=date("H:i",strtotime($row['eventstatTime']));?></a>
                                                <a href="#"><i class="far fa-clock"></i>End Time <?=date("H:i",strtotime($row['eventendTime']));?></a>

                                                <br>
                                                <br>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- end modal -->
                           

                        </div>
                    </div>
                <?php

                        endwhile;

                    }else{ ?>

                         <div class="col-lg-4">
                        <div class="blog-one__single">
                            <div class="blog-one__image">

                                No Events created
                               
                            </div>
                        </div>
                    </div>
                            

                            

                       

<?php
                    }

                ?>













 
                   
                    
                   
              
                </div>
               
            </div>
        </section>
  
       

    
 

      
   
      <?php include 'util/footer.php';?>
</body>


</html>
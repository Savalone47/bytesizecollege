<?php 
session_start();
include "../action.php";
?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>My Classes</title>
  <!-- google font -->
  <?php include 'headerLinks.php';?>

  <style type="text/css">
    

    .table thead th {
      vertical-align: bottom;
      border-bottom: none;

    }


    

    .accent-pink-gradient {

      background: linear-gradient(135deg, #8E44AD, #6777ef);
      -webkit-transition: .2s ease box-shadow, .2s ease transform;
      transition: .2s ease box-shadow, .2s ease transform;
      color: #fff;
    }
    /*.accent-pink-gradient:hover {
      box-shadow: 0 20px 30px 0 rgba(188, 238, 142, 0.3);
      -webkit-transform: scale(1.05);
      transform: scale(1.05);
      }*/
      #data{


      }


    </style>
  </head>
  <!-- END HEAD -->

  <body
  class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
  <div class="page-wrapper">
    <?php include 'nav.php';?>

    <!-- start page container -->
    <div class="page-container">
      <?php include 'sidebar.php';?>
      <!-- start page content -->
      <div class="page-content-wrapper">
        <div class="page-content">


          <br><br>


          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-10">
                  <a href="" class="backbtn" onclick="history.go(-1); return false;" style="margin-top: 0rem"><img src="data:image/png;base64,iVBORw0K
                    GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
                    egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
                    tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
                    ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>  </div>

                    
                        </div>



                      </div>

         
                      <div class="col-sm-12 col-md-12 col-xl-12">



                        <div class="card-box">

                          <div class="card-head">

                            <div class="pull-right">

                              <a href="extraLessons.php">
                                <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default pull-right "   style="text-transform: none;font-size: 14px; background-color: transparent !important; border: none;box-shadow: none;text-decoration: underline;color: #888888;">View extra Lessons<span class="mdl-button__ripple-container"></button>
                                </a>



                              </div>
                              <header>
                               </header><span style="text-align: center">Time Table</span>




                            </div>
        <!-- start time table -->
        <div class="tablecard">
                    <table class="table table-bordered red-border text-center">
                                <thead class="accent-pink-gradient">
                                    <tr>
                                        <th>Time</th>
                                        <th>Monday </th>
                                        <th>Tuesday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                        <th>Saturday</th>
                                        <th>Sunday</th>
                                    </tr>
                                </thead>

                                <tbody id="tablePrimary">
                                   
                                   
                                </tbody>
                            </table>
                          
                     </div>

        <!-- end time table -->

                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end page content -->


                  </div>
                </div>
                <!-- END PROFILE CONTENT -->
              </div>
            </div>
          </div>
        </div>
        <!-- end page content -->

      </div>
      <!-- end page container -->
      <!-- start footer -->
      <?php include 'footer.php';?>
      <!-- end footer -->
    </div>
  </div>
  <!-- start js include path -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/popper/popper.js"></script>
  <script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
  <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
  <!-- bootstrap -->
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- Common js-->
  <script src="assets/js/app.js"></script>
  <script src="assets/js/layout.js"></script>
  <script src="assets/js/theme-color.js"></script>
  <!-- Material -->
  <script src="assets/plugins/material/material.min.js"></script>
  <!--google map-->
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;AMP;sensor=false"></script>
  <!-- end js include path -->
   <script type="text/javascript">
      $(document).ready(function() {
     
          $(".timetable").addClass("active");
          });
  </script>
</body>
<script type="text/javascript">
    $.ajax({
        url: "viewTimetablePrimary.php",
        type: "POST",
        cache: false,
        
        success: function(data){
          //alert(data);
          $('#tablePrimary').html(data); 
        }
      });

                     
</script>




</html>
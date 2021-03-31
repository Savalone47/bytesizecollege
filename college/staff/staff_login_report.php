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
      <meta name="description" content="School Learning Management System" />
      <meta name="author" content="School Learning Management System" />
      <title>My Classes</title>
      <!-- google font -->
      <?php include 'headerLinks.php';?>
      <style type="text/css">
        .doctor-profile img{
          height: 5rem;
          width: 5rem
        }
        #panel-button{
          margin-top: 3rem;
          margin-bottom: 1rem;
        }
        .wrap { padding: 15px; }
h1 { font-size: 28px; }
h4,
modal-title { font-size: 18px; font-weight: bold;
 }

.no-borders { border: 0px; }
.body-message { font-size: 18px; }
.centered { text-align: center; }
.btn-primary { background-color: #2086c1; border-color: transparent; outline: none; border-radius: 8px; font-size: 15px; padding: 10px 25px; }
.btn-primary:hover { background-color: #2086c1; border-color: transparent; }
.btn-primary:focus { outline: none; }
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



<div class="page-content-wrapper">
  <div class="page-content">
    <div class="row">
      <div class="col-lg-12">
        <a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
      GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
      egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
      tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
      ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>
    
<?php if($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2'){ ?>
      <button id="panel-button"
      class="mdl-button mdl-js-button mdl-button--fab margin-right-10 btn-info pull-right"
      data-toggle="modal" data-target="#tab">
      <i class="material-icons">add</i>
    </button>

<?php   } ?>

      </div>
      
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div style="    background: #fff;
        min-height: 50px;
        box-shadow: none;
        position: relative;
        margin-bottom: 20px;
        transition: .5s;
        border: 1px solid #f2f2f2;
        border-radius: 0;">

        <div class="card-body ">
          <div class="mdl-tabs mdl-js-tabs">
            
            <div class="mdl-tabs__panel is-active p-t-20" id="tab4-panel">
              <div class="row">
                <div class="col-md-12 col-sm-12">
              <div class="card card-box">
                
                <div class="card-body " id="bar-parent">
                  <table id="exportTable" class="table  table-striped table-bordered table-hover table-checkable order-column dataTable no-footer " style="width:100%">
                    <thead>
                       <tr>
                                          <th>Full Name</th>
                                          <th>Function</th>
                                          <th>Email</th>
                                         <th>Login</th>
                                         <th>View</th> 
                                       </tr>
                    </thead>
                    <tbody id="contentBox">
                      
                      
                    </tfoot>
                  </table>
</div>
                </div></div>

    



 
<div class="modal fade bs-example-modal-new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <!-- Modal Content: begins -->
    <div class="modal-content">
      
      <!-- Modal Header -->
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel">Login Dates</h4>
      </div>



      <!-- Modal Body --> 

      <div class="modal-body">
      <div class="row">
            <div class="col-sm-12">
              <div class="card-box">
                <div class="card-head">
                  
                  <div class="form-group col-sm-12">
                        <label>Choose Times</label>
                        <select class="form-control times">
                          <option value="Eversince">Ever Since</option>
                          <option value="month">This Month</option>
                          <option value="week">This Week</option>
                          <option value="today">Today</option>
                          
                        </select>
                      </div>
                </div>
                <div class="card-body ">
                  <table
                    class="mdl-data-table ml-table-striped ml-table-bordered mdl-js-data-table is-upgraded">
                    <thead>
                      <tr>
                        <th class="mdl-data-table__cell--non-numeric">Name</th>
                        <th class="mdl-data-table__cell--non-numeric">Address</th>
                      
                       
                      </tr>
                    </thead>
                    <tbody id="logins">
                      
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
    
    
    </div>
    <!-- Modal Content: ends -->
    
  </div>
  
</div>

                

          
          








        </div>      

      </div>

    </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;AMP;sensor=false"></script>
  <script src="../assets/plugins/material/material.min.js"></script>
    <script src="../assets/plugins/sweet-alert/sweetalert2.all.min.js"></script>
    <script src="../assets/plugins/sweet-alert/sweetalert2.min.js"></script>
    <script src="../assets/js/pages/sweet-alert/sweet-alert-data.js"></script>




</body>


<script type="text/javascript">
   $(document).on('click', '.showLogin', function(){
          var userID = $(this).data("id");
          var action = "fetchModalData";          
          $.ajax({
                type:"POST",
                url:"back/staff_report.php",
                data:{action:action, userID:userID},
                success:function(data){
                  $('#logins').html(data);
                  
                }
              });
        });

  $(document).ready(function(){
              fetchAll();
               function fetchAll(){
               var action = "fetchAll";
               $.ajax({
                       type:"POST",
                       url:'back/staff_report.php',
                       data:{action:action},
                       success:function(data){
                         $('#contentBox').html(data);
                         //var pagination = [data];
                       }
                     });
             }
         });

 $(document).on('change', '.times', function(){
         
          if($(this).val() !=''){
            var val = $(this).val();
            var action="timeFilter";
            var id = $("#myInput"). val();
            
            $.ajax({
                      url:'back/staff_report.php',
                      method:"POST",
                      data:{ val:val, action: action,id:id},
                      success:function(data){
                        $("#logins").html(data);
                        var pagination = [data];
                        // alert(data);
                        
                      }
                     })
         
          }else{
         
            alert("Please select a valid course");
          }
          
         });
</script>

</html>



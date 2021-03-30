<?php
session_start();
include "../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName'])  && secure($_SESSION['adminEmail'])){

?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="School Management System" />
	<meta name="author" content="School Management System" />
	<title>My Classes</title>
	<!-- google font -->
	<?php include 'headerLinks.php';?>
	<style type="text/css">
			.section-50 {
    padding: 50px 0;
}

.m-b-50 {
    margin-bottom: 50px;
}

.dark-link {
    color: #333;
}

.heading-line {
    position: relative;
    padding-bottom: 5px;
}

.heading-line:after {
    content: "";
    height: 4px;
    width: 75px;
    background-color: #29B6F6;
    position: absolute;
    bottom: 0;
    left: 0;
}

.notification-ui_dd-content {
    margin-bottom: 30px;
}

.notification-list {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 20px;
    margin-bottom: 7px;
    background: #fff;
    -webkit-box-shadow: 0 2px 15px 0 rgba(0, 0, 0, 0.15);
   
    box-shadow: 0 2px 15px 0 rgba(0, 0, 0, 0.15);
}

.notification-list--unread {
    border-left: 2px solid #29B6F6;
}

.notification-list .notification-list_content {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}

.notification-list .notification-list_content .notification-list_img img {
    height: 48px;
    width: 48px;
    border-radius: 50px;
    margin-right: 20px;
}

.notification-list .notification-list_content .notification-list_detail p {
    margin-bottom: 5px;
    line-height: 1.2;
}

.notification-list .notification-list_feature-img img {
    height: 48px;
    width: 48px;
    border-radius: 5px;
    margin-left: 20px;
}
.page-content {
    margin-top: 0;
    padding: 0;
    background-color: #EFF1F3 !important;
}
.text-muted{
	line-height: 1.7 !important;
}
.bold-muted{
	color: #D2D5CE;
}
.underline{
	text-decoration: underline;
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
					<a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
			GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
			egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
			tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
			ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>
				

					



				
					<?php 

					$sql ="SELECT * FROM notification where id='".secure($_GET['id'])."'";
					$query = mysqli_query($conn,$sql);
					$row = mysqli_fetch_array($query);

					?>


		 <section class="section-50">
    <div class="container">
        <h3 class="m-b-50 heading-line">Notifications <i class="fa fa-bell text-muted"></i></h3>

        <div class="notification-ui_dd-content">
            <div class="notification-list notification-list--unread">
                <div class="notification-list_content">
                    <div class="notification-list_img">
                        <img src="https://i.imgur.com/zYxDCQT.jpg" alt="user">
                    </div>
                    <div class="notification-list_detail">
                        <p><small>John Doe</small> <b class="bold-muted underline"><?php echo $row['title']?></b></p>
                        <p class="text-muted">	<?php echo nl2br($row['notification'])?></p>
                        <p class="text-muted"><small><i class="fa  fa-calendar"></i>&nbsp;&nbsp;  <?php echo date('d-m-Y',strtotime($row['time_stamp']))?></small></p>
                    </div>
                </div>
                
            </div>
         
        
         
          
        </div>

     

    </div>
</section>
					
		
			
				</div>
			</div>
			<!-- end page content -->


					</div>
					</div>
					
			<?php include 'footer.php';?>
		
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<script src="../assets/plugins/popper/popper.js"></script>
	<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	<!-- bootstrap -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<!-- Common js-->
	<script src="../assets/js/app.js"></script>
	<script src="../assets/js/layout.js"></script>
	<script src="../assets/js/theme-color.js"></script>
	<!-- Material -->
	<script src="../assets/plugins/material/material.min.js"></script>
	<!--google map-->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;AMP;sensor=false"></script>
	<!-- end js include path -->
</body>

<?php 
}else{

	echo "<script> alert('Error! Please Log in');
		window.location='logout.php';
		</script>";
}
?>


</html>

 <div class="modal slide-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
          <div class="modal-dialog" role="document">
          	<i class="fa fa-times" data-dismiss="modal" style="float: right;color: red"></i>
            <div class="modal-content modal-info">

              
              <div class="modal-body">
               
					<div class="col-md-12 col-sm-12">
							<div style="background: #fff;
							    min-height: 50px;
							    box-shadow: none;
							    position: relative;
							    margin-bottom: 20px;
							    transition: .5s;
							    border: 1px solid #f2f2f2;
							    border-radius: 0;">
								
								
									<div class="row">
										<div class="col-md-6 col-sm-6 col-6">
											<h2><?php echo $row['title']?></h2>
										<p style="font-size:10px;">Posted on: <?php echo date('d-m-Y',strtotime($row['time_stamp']))?>
											<br/><?php echo $row['eventLocation']?>
										</p>
										<p style="font-size:10px;"> </p>

										<p><?php echo $row['notification']?></p>
											
										</div>
										
									</div>
									
								</div>
							
							
						</div>
              </div>
              <div class="modal-footer">
               
              </div>
            </div>
          </div>
        </div>
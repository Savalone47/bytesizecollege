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
	<meta name="description" content="Sagan Academy" />
	<meta name="author" content="Sagan Academy" />
	<title>Dashboard  | Home</title>
	<?php include 'headerLinks.php';?>

	<style type="text/css">
.notif-right {
  cursor: pointer;
  position: fixed;
  right: 0;
  z-index: 9999999;
  top: 60px;
  margin-bottom: 22px;
  margin-right: 15px;
  max-width: 300px;
  transition: all .3s ease-in-out;
}



.modal {
 
}

.modal-primary {
  margin-top: 100px;
  border: 2px solid #7266ba;
}
.modal-primary .modal-header {
  color: #fff;
  background-color: #7266ba;
  box-shadow: inset 0px -5px 10px #4d4292;
  border-bottom: none;
}
.modal-primary .modal-header button {
  color: #fff;
  text-shadow: none;
  transition: all .3s ease-in-out;
}
.modal-primary .modal-header button:hover {
  color: #4d4292;
  text-shadow: none;
}
.modal-primary .modal-body span {
  color: #7266ba;
}
.modal-primary .modal-footer {
  border-top: none;
}

.modal-info {
  margin-top: 100px;
  border: 2px solid #23b7e5;
}
.modal-info .modal-header {
  color: #fff;
  background-color: #23b7e5;
  box-shadow: inset 0px -5px 10px #1485a8;
  border-bottom: none;
}
.modal-info .modal-header button {
  color: #fff;
  text-shadow: none;
  transition: all .3s ease-in-out;
}
.modal-info .modal-header button:hover {
  color: #1485a8;
  text-shadow: none;
}
.modal-info .modal-body span {
  color: #23b7e5;
}
.modal-info .modal-footer {
  border-top: none;
}

.modal-success {
  margin-top: 100px;
  border: 2px solid #2baab1;
}
.modal-success .modal-header {
  color: #fff;
  background-color: #2baab1;
  box-shadow: inset 0px -5px 10px #1c6f73;
  border-bottom: none;
}
.modal-success .modal-header button {
  color: #fff;
  text-shadow: none;
  transition: all .3s ease-in-out;
}
.modal-success .modal-header button:hover {
  color: #1c6f73;
  text-shadow: none;
}
.modal-success .modal-body span {
  color: #2baab1;
}
.modal-success .modal-footer {
  border-top: none;
}

.modal-warning {
  margin-top: 100px;
  border: 2px solid #edbc6c;
}
.modal-warning .modal-header {
  color: #fff;
  background-color: #edbc6c;
  box-shadow: inset 0px -5px 10px #e59d28;
  border-bottom: none;
}
.modal-warning .modal-header button {
  color: #fff;
  text-shadow: none;
  transition: all .3s ease-in-out;
}
.modal-warning .modal-header button:hover {
  color: #e59d28;
  text-shadow: none;
}
.modal-warning .modal-body span {
  color: #edbc6c;
}
.modal-warning .modal-footer {
  border-top: none;
}

.modal-danger {
  margin-top: 100px;
  border: 2px solid #e36159;
}
.modal-danger .modal-header {
  color: #fff;
  background-color: #e36159;
  box-shadow: inset 0px -5px 10px #cd2c23;
  border-bottom: none;
}
.modal-danger .modal-header button {
  color: #fff;
  text-shadow: none;
  transition: all .3s ease-in-out;
}
.modal-danger .modal-header button:hover {
  color: #cd2c23;
  text-shadow: none;
}
.modal-danger .modal-body span {
  color: #e36159;
}
.modal-danger .modal-footer {
  border-top: none;
}




.modal {
  transition: all 0.5s ease-in-out !important;
  transition: transform 0.5s ease-out !important;
}

@keyframes bumpy {
  0% {
    transform-style: preserve-3d;
    transform: perspective(10%) rotateY(-65deg) rotateX(-45deg) translateZ(-200px) scale(0);
    opacity: 0;
  }
  50% {
    transform: rotateY(10deg) rotateX(90deg) translateZ(10px) scale(0.5);
    opacity: 0.8;
  }
  100% {
    transform: rotateY(0deg) rotateX(0deg) translateZ(0px) scale(1);
    opacity: 1;
  }
}
@keyframes slide-left {
  0% {
    transform: translateX(200%) scale(0);
    opacity: 0;
  }
  100% {
    transform: translateX(0) scale(1);
    opacity: 1;
  }
}
@keyframes slide-right {
  0% {
    transform: translateX(-200%);
    opacity: 0;
  }
  100% {
    transform: translateX(0);
    opacity: 1;
    transition: all 0.5s 0.1s;
  }
}
@keyframes wheel-left {
  0% {
    transform: translateX(-200%) scale(0) rotate(0deg);
    opacity: 0;
  }
  100% {
    transform: translateX(0) scale(1) rotate(360deg);
    opacity: 1;
    transition: all 1s 1s;
  }
}
@keyframes wheel-right {
  0% {
    transform: translateX(200%) scale(0) rotate(0deg);
    opacity: 0;
  }
  100% {
    transform: translateX(0) scale(1) rotate(360deg);
    opacity: 1;
    transition: all 1s 1s;
  }
}
.slide-left {
  overflow: hidden;
  animation: .75s slide-left both;
}





@keyframes pop {
  0% {
    opacity: 0;
    transform: scale(0);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}
@media only screen and (max-width: 600px) {
 	svg{
	
		display: none !important;
		
	}

}
.info-box-number{
	font-size: 12px;
}
.info-box-text{
	font-weight: 600;
}
.info-box-icon img{
				height: 3rem
			}









	</style>
</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">



	<div class="page-wrapper">
		<?php include 'nav.php'?>
	
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<?php include'sidebar.php';?>
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title"> My Class</div>
							</div>
							
						</div>
					</div>
					<?php
						$getSQL = "SELECT * FROM students where studentID='".$_SESSION['adminID']."'";
						$getQuery = mysqli_query($conn,$getSQL);
						$getROW = mysqli_fetch_array($getQuery);

					 if($getROW['activeStatus'] =='1'){?>
					<!-- start widget -->
					<div class="state-overview">
						<div class="row">



							<?php 
					     
					     	$colors = array("green","blue","yellow","pink");
                           

							$sql = "SELECT * FROM moduleAssign inner join modules on moduleAssign.moduleID = modules.moduleID 
							inner join courses on modules.moduleCourseID = courses.coursesID
							where studentID = '".$_SESSION['adminID']."'";
							$query = mysqli_query($conn,$sql);
							$card  = 0;
							while($row = mysqli_fetch_array($query)){
								if($card == 4){ $card = 1;}

								 
							?>
							<!---subject start--> 
							<div class="col-xl-4 col-md-6 col-12" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['moduleID']?>"    >
								<div class="info-box bg-b-<?php echo $colors[$card++]; ?>">
									<span class="info-box-icon "><img src="workspace.svg"></span>
									<div class="info-box-content">
										<span class="info-box-text"><?php echo $row['moduleName']?></span>
										<span class="info-box-number"><?php echo $row['courseName']?> </span>
										<div class="progress">
											<div class="progress-bar" style="width: 100%"></div>
										</div>
										<span class="progress-description">
											 <?php echo $row['courseCode']?>
										</span>
									</div>								
								</div>								
							</div>
							<!---subject end-->
							<!-- Modal -->

<div class="modal fade" id="exampleModalCenter<?php echo $row['moduleID']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content" style="padding: 1rem">

      <p style="color:black;"><?php echo $row['moduleName']?></p><span data-dismiss="modal" style="font-size: 20px; color: red;font-weight: 100;position: absolute;top: 2px;right: 1rem">&times;</span>
					<div class="state-overview">
						<div class="row">
								<!-- /.col -->
							<div class="col-xl-6 col-md-6 col-12">
								<a href="community.php?id=<?php echo $row['moduleID'] ?>">
								<div class="info-box purple">
									
									<span class=" "><i class="fa fa-users"></i></span>
									
										<span class="info-box-text" style="color: #fff;">Community</span>
										
										
								
									<!-- /.info-box-content -->
								</div>
							</a>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<!-- /.col -->
							<div class="col-xl-6 col-md-6 col-12">
								<a href="chapter.php?id=<?php echo $row['moduleID']?>">
								<div class="info-box bg-b-green">
									
									<span style="color: #fff"><i class="fa fa-book"></i></span>
									<?php

										$sqlite ="SELECT * FROM topics where moduleID='".$row['moduleID']."'";
										$querylite = mysqli_query($conn,$sqlite);
										
										?>
									
										<span class="info-box-text" style="color: #fff;">Chapters 	
											<span class="notification-icon circle deepPink-bgcolor">
												
															<?php echo $num = mysqli_num_rows($querylite);?>


														</span></span>

										
										
								
									<!-- /.info-box-content -->
								</div>
							</a>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-6 col-md-6 col-12">
								<a href="my_assignment.php?id=<?php echo $row['moduleID']?>">
								<div class="info-box bg-b-blue">
									<span style="color: #fff"><i class="fa fa-file-text"></i></span>
								
										<span class="info-box-text" style="color: #fff;">Assignments</span>	
								
									<!-- /.info-box-content -->
								</div></a>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->


							<?php 

							$sql3 = "SELECT * FROM lectureAssigns where moduleID='".$row['moduleID']."'";
							$query3 = mysqli_query($conn,$sql3);
							$row3 = mysqli_fetch_array($query3);
							?>
							<div class="col-xl-6 col-md-6 col-12">
								<a href="dialog.php?id=<?php echo $row3['lectureID']?>&moduleID=<?php echo $row['moduleID']?>">
								<div class="info-box bg-b-pink">
									<span style="color: #fff"><i class="material-icons">person</i></span>
									
										<span class="info-box-text" style="color: #fff;">Teacher Discussion</span>	
									<!-- /.info-box-content -->
							
								<!-- /.info-box -->
							</div></a>
						</div>



							<!-- /.col -->
							<div class="col-xl-6 col-md-6 col-12">
								<a href="resources.php?id=<?php echo $row['moduleID']?>">
								<div class="info-box bg-b-yellow">
									<span style="color: #fff">
										<i class="fa fa-folder-open-o"></i></span>
									
										<span class="info-box-text" style="color: #fff;">Resources</span>
									
									<!-- /.info-box-content -->
								</div></a>
								<!-- /.info-box -->
							</div>
							

							

						</div>
					</div>
			    </div>
			  </div>
			</div>
		

			<?php }?>



			</div>
		</div>
		<!-- end widget -->



		<!-- start widget -->
		<div class="row">
			<div class="col-lg-8 col-md-12 col-sm-12 col-12">
				<div class="row clearfix">
					<div class="col-md-6 col-sm-6 col-12">
						<a href="mywork.php">
						<div class="card">
							<div class="panel-body">
								<h3>My Work</h3>
								<div
									class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
									<div class="progress-bar progress-bar-success" role="progressbar"
										aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"
										style="width: 100%;"></div>
								</div>
								<span class="text-small margin-top-10 full-width">
								<br> </span>
							</div>
						</div></a>
					</div>
					<div class="col-md-6 col-sm-6 col-12">
						<a href="allnotification.php">
						<div class="card">
							<div class="panel-body">
								<h3>Notifications</h3>
								<div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
									<div class="progress-bar progress-bar-danger" role="progressbar"
										aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"
										style="width: 100%;"></div>
								</div>
								<span class="text-small margin-top-10 full-width">
									14
								</span>
							</div>
						</div>
						</a>
					</div>
				
				</div>
			</div>
			
		</div>
		<!-- end widget -->


	<?php }else{

				echo "<p style='color:red'>Your account has not been activated yet!</p>";

			}?>

<!-- /.col -->
</div>
</div>
<!-- end widget -->
</div>
<!-- Chart end -->
<!-- Activity feed start -->
</div>
</div>
</div>
<!-- end page content -->
			
						
		<!-- start footer -->
		<?php include 'footer.php';?>
		<!-- end footer -->
	</div>

	<script type="text/javascript">
		var move = "250px";

// Sidebar function
function openNav(){
  $('.sidebar').addClass('active').css({"box-shadow": "inset -5px -3px 10px #000"});
  $(this).addClass('active');
  $('.boomy').removeClass('hidden');
  $('.boom').addClass('hidden');
  $('.tipText-right').addClass('hidden');
  $(".sidebar").children().css({"opacity": 1, "transition": "all .3s ease-in-out"});  
  // setTimeout(function() {
    // $('.profile').delay(300)removeClass('hidden');
    $('.profile').fadeIn(400, function(){
      $(this).removeClass('hidden');
    });
  //   }, 300);
 
  
  if ($(window).width() < 512) {
    $("#main").animate({"margin-left": "60px"}, 10);
  // $(".boom").animate({"margin-left": move},500);
  }
  else{
    $("#main").animate({"margin-left": move}, 10);
  }

}

function closeNav() {
  $('.sidebar').removeClass('active').css({"box-shadow":  "none"});
  $(this).removeClass('active');
  $('.boom').removeClass('hidden');
  $('.boomy').addClass('hidden');
  $(this).attr( "onClick", "openNav();" );
  $('.tipText-right').removeClass('hidden');
  $(".sidebar").children().closest('span').css({"opacity": 0, "transition": "all .3s ease-in-out"});  
  $('.profile').fadeOut(300, function(){
    $(this).addClass('hidden');
  });
  //prevent increase of margin when clicked multiple times
  if ($(window).width() < 512) {
    if($("main").css("margin-left") === "60px")
      $("#main").animate({"margin-left": "-=" + move}, 10);
    else
      $("#main").animate({"margin-left": 0}, 10);
  }
  else{
    if($("main").css("margin-left") === 0)
      $("#main").animate({"margin-left": "-=" + move}, 10);
    else
      $("#main").animate({"margin-left": "60px"}, 10);
  }
  
// $(".boom").animate({"margin-left": "-=" + move}, 500);
}


function Notify(text, style, container) {

	var time = '5000';
	console.log(container);
	var $container = $('#' + container + '');
	console.log($container);
  var icon = '<i class="fa fa-info-circle "></i>';
  
  if( style == 'primary'){
	  icon = '<i class="fa fa-bookmark "></i>';
  }
  
  if( style == 'info'){
	  icon = '<i class="fa fa-info-circle "></i>';
  }
  
  if( style == 'success'){
	  icon = '<i class="fa fa-check-circle "></i>';
  }
  
  if( style == 'warning'){
	  icon = '<i class="fa fa-exclamation-circle "></i>';
  }
  
  if( style == 'danger'){
	  icon = '<i class="fa fa-exclamation-triangle "></i>';
  }
   
  if( style == 'default'){
	  icon = '<i class="fa fa-user "></i>';
  }
  
	if (style == 'undefined' ) {
	  style = 'warning';
	  
	}
  
	  var html = $('<div class="alert alert-' + style + '  hide">' + icon +  " " + text + '</div>');
  
  
  console.log(html);
  
	$('<a>',{
		text: '×',
		class: 'button close',
		style: 'padding-left: 10px;',
		href: 'javascript:void(0)',
		click: function(e){
			e.preventDefault();
		// 	close_callback && close_callback();
			remove_notice();
		}
	}).prependTo(html);

	$container.prepend(html);
	html.removeClass('hide').hide().fadeIn('slow');

	function remove_notice() {
		html.stop().fadeOut('fast');
	}
	
	var timer =  setInterval(remove_notice, time);
  
	$(html).hover(function(){
		clearInterval(timer);
	}, function(){
		timer = setInterval(remove_notice, time);
	});
	
	$(html).on('click', function () {
		clearInterval(timer);
		// callback && callback();
		remove_notice();
	});
  
  
}





$('.primary').on('click', function () {
  Notify("Welcome Back!",'primary','notifications');			   
});
$('.info').on('click', function () {
  Notify("You have new e-mail!",'info', 'notification2');			   
});
$('.success').on('click', function () {
  Notify("The data has been saved!",'success', 'notification3');
});
$('.warning').on('click', function () {
  Notify("Memory Almost Full! ",'warning', 'notification4');			   
});
$('.danger').on('click', function () {
  Notify("Oh no! There's a virus!",'danger', 'notification5');			   
});
$('.default').on('click', function () {
  Notify("I have no idea, too",'default', 'notification7');			   
});





	</script>
	<!-- start js include path -->
	<script src="assets/plugins/jquery/jquery.min.js"></script>
	<script src="assets/plugins/popper/popper.js"></script>
	<script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	<!-- bootstrap -->
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<script src="assets/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="assets/js/pages/sparkline/sparkline-data.js"></script>
	<!-- Common js-->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/layout.js"></script>
	<script src="assets/js/theme-color.js"></script>
	<!-- material -->
	<script src="assets/plugins/material/material.min.js"></script>
	<!--apex chart-->
	<script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="assets/js/pages/chart/chartjs/home-data.js"></script>
	<!-- summernote -->
	<script src="assets/plugins/summernote/summernote.js"></script>
	<script src="assets/js/pages/summernote/summernote-data.js"></script>
	<!-- end js include path -->
	
</body>


</html>
<?php }else{
	echo "<script> alert('Error! Please login');
	window.location='logout.php';

	</script>";
}

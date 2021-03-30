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
	<meta name="description" content="School Management System" />
	<meta name="author" content="School Management System" />
	<title>My Classes</title>
	<!-- google font -->
	<?php include 'headerLinks.php';?>
	<style type="text/css">
		.doctor-name img{
			height: 2rem;
		}
		.name-center{
			font-size: 12px;
		}
		.course-picture img{
			height: 2rem
		}

		.thumb-lg{
			height: 2rem;
			margin-left: 2rem
		}

		
		.name {
	  overflow: hidden;
  max-width: 400px;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
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

					<div class="row">
						<div class="col-lg-1"></div>
						<div class="col-md-10">

							<!-- BEGIN PROFILE CONTENT -->
							<div class="profile-content">
								<div class="row">
									
									<div class="card col-md-12" >
										<div class="card-head card-topline-aqua">
											<?php
											$sql = "SELECT * FROM assignment WHERE id= '".secure($_GET['id'])."' and deleteStatus=0";

											$result = mysqli_query($conn,$sql);


  											// output data of each row
											$row = mysqli_fetch_assoc($result);


											?>


							
											
												

											</center>

										</div>


										<div class="white-box">
											<!-- Nav tabs -->
											<!-- Tab panes -->
											<div class="tab-content">
												<div class="tab-pane active fontawesome-demo">
										
													<div id="biography">

														<center><h4><i><b><?php echo $row['assignmentNo'];?></b></i></h4>

															
														<p style="text-align: left"><?php echo nl2br($row['comment']);?></p>
														<br>
														<h5 style="text-align: left;">Chapter</h5>
														<p style="text-align: left"><?php echo nl2br($row['topicName']);?></p>

														<h5 style="text-align: left;">Resource</h5>
														<hr>

														<br>
														<div class="row">
										<?php 


						$sql3 = "SELECT * FROM teacherFiles where  assignmentID= '".$_GET['id']."' and  deleteStatus='0'";
									$query3 = mysqli_query($conn,$sql3);

									while($row = mysqli_fetch_array($query3)){

										?>
															    
																
										
	  									<div class="col-md-3 col-6">
											<div class="card card-box">
												<div class="card-body no-padding ">
													<div class="doctor-profile">
											

														
															<div class="profile-usertitle">
															<div class="doctor-name">
																<?php 
																$file = $row['file'];
																$imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
																if($imageFileType == 'pdf'){ ?>
																	<img src="pdf.svg"> 
												<a href="../staff/assignment/<?php echo $row['file']?>" preview target="_blank">
																<?php }elseif($imageFileType == 'mp4'){?>
																	<img src="mp4.svg"> 
												<a href="../staff/assignment/<?php echo $row['file']?>" preview target="_blank">
																<?php }elseif($imageFileType == 'doc' || $imageFileType == 'docx' ){?>

																	<img src="word.svg"> 
												<a href="../staff/previewAssignment.php?preview=<?php echo $row['file']?>" preview target="_blank">
																<?php }elseif($imageFileType == 'mp3'){?>

																	<img src="volume.svg"> 
												<a href="../staff/assignment/<?php echo $row['file']?>" preview target="_blank">
																<?php }elseif($imageFileType == 'jpeg' || $imageFileType == 'jpg' || $imageFileType == 'png'){?>

																	<img src="assignment/<?php echo $row['file']?>"> 
												<a href="../staff/assignment/<?php echo $row['file']?>" preview target="_blank">
																<?php }?>

															</div>
															<div class="name-center">
																<span class="name"><?php echo $row['file']?></span><br>
																<span style="font-size: 11px;">Date: 
																	<?php echo date('d-F',strtotime($row['time_stamp']));?> </span>	
																</div>
															</div></a>
															
														</div>
													</div>
												</div>
											</div>
																	
										<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PROFILE CONTENT -->
		</div>


	</div>
</div>
<!-- end page content -->





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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




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
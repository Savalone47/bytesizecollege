<?php
session_start();
include "../action.php";
if(secure($_SESSION['adminID']) && secure($_SESSION['adminName']) && secure($_SESSION['adminEmail'])){
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
		<title>Dashboard  | Home</title>
		<?php include 'headerLinks.php';?>

		<style type="text/css">

			table thead tr th {
				font-weight: 900 !important;
				color: #888;
			}

			tr.active th ,td{
				font-size: 12px;
				font-weight: 100;
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
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">

		<a href="" class="backbtn" onclick="history.go(-1); return false;"><img src="data:image/png;base64,iVBORw0K
      GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
      egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
      tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
      ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>



		
					<div class="page-title" style="margin-top: 0; text-align: center;">Assignment Replies</div>
			
		<div class="row">
			<div class="col-md-12 col-sm-12">

				<div class="card card-topline-aqua">
					<div class="card-head">

						<div class="tools">

							<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>

						</div>
					</div>
					<div class="card-body ">
						<div class="table-scrollable">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Student Name</th>
										<th>Assignment Name</th>
										
										<th>Date</th>
										<th>Status</th>
										<th>Reply</th>
									</tr>
								</thead>
								<tbody>
									<?php 


									$sql="SELECT * FROM assignmentreply inner join assignment on assignment.id = assignmentreply.assignmentID inner join assignmentFiles on assignment.id = assignmentFiles.assignmentID inner join students on students.studentID = assignmentreply.studentID WHERE assignmentFiles.assignmentID = '".secure($_GET['id'])."' GROUP BY students.studentID";
									$result = mysqli_query($conn,$sql);
									$getResult = mysqli_num_rows($result);


									if($getResult>0){


										while($row = mysqli_fetch_array($result)){

											$num=1;

											?>
											<tr class="active">
												<th scope="row"><?php echo $num++; ?></th>
												<th scope="row"><?php echo $row['studentName']?></th>
												<td><?php echo $row['assignmentNo']?></td>
												
												
												<td><?php echo $row['time_stamp']?></td>
												<td>
												<?php


							$getSqli = "SELECT * FROM assignmentFeedback where studentID='".$row['studentID']."' and assignmentID='".$_GET['id']."'";
							$getQuery = mysqli_query($conn, $getSqli);
							$getNum = mysqli_num_rows($getQuery);
							if($getNum > 0){

								echo "<button class='btn bg-success btn-xs'>Marked</button>";


							}else{

								echo "<button class='btn bg-danger btn-xs'>Not Marked</button>";


							}
												 



												 ?>

												</td>
												<td>
											<i class="fa fa-eye" data-toggle="modal" data-target="#myModal"  ></i>
												</td>
											</tr>


							<!--  This is the modal content --> 
							<div class="modal fade" id="myModal" role="dialog" style="margin-top: 5rem;">
								<div class="modal-dialog">
									<div class="modal-content" style="width: 60vw; height: 80vh">
										<p class="pull-right" data-dismiss="modal" style="color: red; position: absolute; right: 1rem;cursor: pointer;">&times;</p>
										<br/>
									
										<div class="card-body row" style="height:100%;">
											<div class="col-lg-12" style="text-align: center; color: #888">
												<p><?php echo $row['studentName']?> </p>
											</div>
									
									<div class="col-lg-12 p-t-20">
												<!-- <label class="mdl-textfield__label"> File Type</label> -->
												

								<!--<iframe src="https://docs.google.com/gview?url=https://sagan.columnaeducation.com/HS/management/img/
									<?php //echo $row['file']?>&embedded=true" style="height: 90%"></iframe>-->
									Assignment Files
									<hr/>
									<?php
									 $sqlite = "SELECT * FROM assignmentFiles where studentID='".$row['studentID']."' and assignmentID='".$_GET['id']."'";
									 $querylite = mysqli_query($conn,$sqlite);
									 while ($rowlite = mysqli_fetch_array($querylite)) {
									 	# code...
									 
									?>
									<?php
				 $imageFileType = strtolower(pathinfo($row['file'],PATHINFO_EXTENSION));
                  if ($imageFileType == 'docx' || $imageFileType == 'doc' ) {
									echo '<a href="previewReplies.php?preview='.$row['file'].'">'.$rowlite['file'].'</a>';
								}else{
								echo '<a href="../img/'.$row['file'].'">'.$rowlite['file'].'</a>';
							}
							?>
								<br/>
								<?php }?>
								<hr/>
								Reply
								<hr/>
								<form action="assignment_feedback.php" method="POST" enctype="multipart/form-data" >
									<input type="hidden" name="assignmentID" value="<?php echo $_GET['id']?>">
									<input type="hidden" name="studentID" value="<?php echo $row['studentID']?>">
									<input type="hidden" name="moduleID" value="<?php echo $_GET['moduleID']?>">
								
								<label>Marks Received</label>
								<input type="text" name="marks">
								<br/>
								<label>Comment</label>
								<textarea class="form-control" name="comment"  cols="10" placeholder="Type your comment"></textarea>
								<label>Upload Feedback File</label>
								<input type="file" class="mdl-textfield__input" name="img" accept=".pdf" >

												
											</div>
										</div>
										

										<div class="modal-footer">
										

										<button class="pull-right btn btn-info  btn-xs" >Upload</button>
										</div>
									 <!-- Footer End -->
									</div>
                              
								</div> <!-- Content end -->
							</div> <!-- Dialog end -->
							    </form>
											


										<?php }} ?> 



									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end page content -->

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
<!-- Data Table -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/export/buttons.flash.min.js"></script>
<script src="assets/plugins/datatables/export/jszip.min.js"></script>
<script src="assets/plugins/datatables/export/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/export/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/export/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/export/buttons.print.min.js"></script>
<script src="assets/js/pages/table/table_data.js"></script>

<?php }else{
	echo "<script> alert('Erreur! Please login');
	window.location='logout.php';

	</script>";
}?>
</body>

</html>

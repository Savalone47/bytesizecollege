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
		<meta name="description" content="School Learning Management System" />
		<meta name="author" content="School Learning Management System" />
		<title>Dashboard  | Home</title>
		<?php include 'headerLinks.php';?>

		<style type="text/css">
			.card-topline-aqua p,a,span,h3{
				color: #000;
			}

			.card-topline-aqua h3{
				font-weight: 500;
			}

			.txt{
				width: 100%;

  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
			}
		</style>
	</head>
	<!-- END HEAD -->

	<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">



	<div class="page-wrapper">
		<?php include 'nav.php'?>


		<?php 
		$sql ="SELECT * FROM modules where moduleID='".$_GET['id']."'";
		$query = mysqli_query($conn,$sql);
		$row1 = mysqli_fetch_array($query);

		?>

		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<?php include'sidebar.php';?>
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">


					<div class="page-bar">



						
						<a href="" class="backbtn" onclick="history.go(-1); return false;" style="margin-top: 0rem"><img src="data:image/png;base64,iVBORw0K
							GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
							egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
							tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
							ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a>	
							<button id="panel-button1"
							class="mdl-button mdl-js-button mdl-button--fab margin-right-10 btn-pink pull-right"
							data-toggle="modal" data-target="#tab">
							<i class="material-icons">add</i>
						</button>


						<div class="col-lg-12">
							<div class="row">
								<?php


								$sql1 = "SELECT * FROM modules WHERE moduleID='".secure($_GET['id'])."' ";
										$query1 = mysqli_query($conn,$sql1);
										$row1 = mysqli_fetch_array($query1);
								$sql2 = "SELECT * FROM courses where coursesID='".$row1['moduleCourseID']."'";
								$query2 =mysqli_query($conn,$sql2);
								$row2 = mysqli_fetch_array($query2);
						?><div class="col-lg-4">
								
							</div>
							<div class="col-lg-6"><?php echo $row2['courseName']?>&nbsp;&nbsp;&nbsp;<span><?php echo $row1['moduleName'];?></span></div>
							
							</div>
						</div>
					</div>
					<!-- start widget -->
					<div class="state-overview">
						<div class="row">

							<?php 
							$sql = "SELECT * FROM assignment where moduleID= '".$_GET['id']."' and deleteStatus != 1";

							
							$query = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($query)){
								?>
								<!---subject start--> 
								<!---subject end-->
								<!-- BEGIN PROFILE SIDEBAR -->

<!--new card-->

	<div class="col-lg-4 col-md-6 col-12 col-sm-6">
							<?php

							$sql1 = "";

							if($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2' || $_SESSION['adminLevel'] == '5'  ){

								$sql1 = "SELECT * FROM assignmentReply where assignmentID='".$row['id']."' ";


							}elseif($_SESSION['adminLevel'] == '4'){

								$sql1 = "SELECT * FROM assignmentReply where assignmentID='".$row['id']."' AND studentID='".$_SESSION['adminID']."'";

							}
										

						$sql1 = "SELECT * FROM assignmentReply where assignmentID='".$row['id']."' AND studentID='".$_SESSION['adminID']."'";
									$query1 = mysqli_query($conn,$sql1);
									$row2 = mysqli_fetch_array($query1);
									?>
							<div class=" card card-topline-aqua" style="padding: 10px">


											<div class="card-head">

												<header><span class=" "><a href="assignReply/<?php echo $row['assignment']?>" download style="font-size:11px; text-align: right;"></a></header>
												<button id="panel-button<?php echo $row['id'];?>"
													class="mdl-button mdl-js-button mdl-button--icon pull-right"
													data-upgraded=",MaterialButton">
													<i class="material-icons">more_vert</i>
												</button>
												<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
												data-mdl-for="panel-button<?php echo $row['id'];?>">






												<li class="mdl-menu__item" data-toggle="modal" data-target="#tab<?php echo $row['id'];?>"><i class="material-icons">edit</i>Edit
												</li>	
												

												<?php
												if($_SESSION['adminLevel'] == '1'|| $_SESSION['adminLevel']== '2'){

													$action = "back/deleteAssignAdmin.php?id=".$row['id'];

												}else{

													$action = "back/deleteAssignment.php?id=".$row['id']."&moduleID=".$row['moduleID'];

												}
												?>
												<li class="mdl-menu__item"><a href="<?php echo $action; ?>"><i class="material-icons">delete</i>Delete</a>
												</li>

											</ul>
										</div>
									
								
								<div class="white-box">
									
									<h3 class="txt" style="font-size: 16px !important; margin: 0px !important "><?php echo $row['assignmentNo']?></h3>
											<p>Chapter:  <span style="font-size: 12px; font-weight: 100; font-style: italic;float: right;">
									<?php if($row['topicName']!==''){ echo $row['topicName']; }else{ echo ""; }?></span> </p>

											<p>Marks:  <span style="font-size: 12px; font-weight: 100; font-style: italic;float: right;">
									<?php if($row['marks']!==''){ echo $row['marks']; }else{ echo "Ungraded"; }?></span> </p>
									<p><i class="fa fa-calendar"></i>Due Date:  <span style="font-size: 12px; font-weight: 100; font-style: italic;float: right;">
										<?php if($row['dueDate'] !== ''){echo $row['dueDate']; }else{ echo "No due date"; }?></span> </p>

								<a href="viewAssignment.php?id=<?php echo $row['id']?>">	<button class="btn btn-sm btn-success btn-rounded waves-effect waves-light btn-xs">view<i class="fa fa-eye"></i></button></a>
										<?php 

										 date('Y-m-d')?>
										

										<a href="replies.php?id=<?php echo $row['id'];?>&moduleID=<?php echo $_GET['id']?>" class="btn btn-sm btn-info btn-rounded waves-effect waves-light pull-right btn-xs"  ><i class="fa fa-comment"></i>Replies </a>
								</div>
							</div>
						</div>

<!--end-->

							<!-- Edit assignment -->

							<div class="modal slide-left" id="tab<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
								<div class="modal-dialog" role="document">
									<div class="modal-content modal-info">
										<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
										<div class="modal-body">
											<form action="back/edit_assignment.php" method="POST" enctype="multipart/form-data">

												<input type="hidden" id="txtFirstName" name="id" value="<?php echo $row['id'];?>">


												<div class="card-body row">
													<div class="col-lg-12" style="text-align: center; color: #888">
														<p>Edit an Assignment</p>
													</div>
													<div class="col-lg-12 p-t-20">
														<div
														class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
														<input class="mdl-textfield__input" type="text" id="txtFirstName" name="assignmentNo" value="<?php echo $row['assignmentNo'];?>">
														<label class="mdl-textfield__label">Assignment Name</label>
													</div>
												</div>
												<div class="col-lg-12 p-t-20">
													<div
													class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<input class="mdl-textfield__input" type="number" id="txtLasttName" name="marks"  value="<?php echo $row['marks'];?>">
													<label class="mdl-textfield__label">Marks</label>
												</div>
											</div>
												<div class="col-lg-12 p-t-20">
										<div

										class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label  style="color:black;">Chapter</label>
											<select class="form-control" name="chapterName" >
												<option value="<?php echo $row['topicName']?>"><?php echo $row['topicName']?></option>

											<?php 


											$chapterSQL = "SELECT * FROM topics where deleteStatus=0";
											$queryChapter = mysqli_query($conn,$chapterSQL);
											$chapterRow = mysqli_fetch_array($queryChapter);

											echo "<option value=".$chapterRow['topicName'].">".$chapterRow['topicName']."</option>";



											?>
											</select>

						<!--<input class="mdl-textfield__input" type="text" id="txtLasttName"   value="<?php// echo $row['topicName'];?>">-->
										

								

							
									</div>
							</div>
											<div class="col-lg-12 p-t-20">
										<div

										class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

										<label style="color:black">Comment</label>
										<br/>

										<div contenteditable="true" aria-multiline="true" name="comment" style="color:black;">
									<?php echo $row['comment'];?></div>

										
									</div>
										</div>
											<div class="col-lg-12 p-t-20">
												<div
												class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="date" id="txtemail" name="date" value="<?php echo $row['dueDate'];?>">
												<label class="mdl-textfield__label" style="text-align: center;">Due Date</label>

											</div>
										</div>


										
									</div>
								</div>
								<div class="modal-footer">
									<button 
									class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>





						<div class="modal slide-left" id="view<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
								<div class="modal-dialog" role="document">
									<div class="modal-content modal-info">
										<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
										<div class="modal-body">
											<form action="back/edit_assignment.php" method="POST" enctype="multipart/form-data">

												<input type="hidden" id="txtFirstName" name="id" value="<?php echo $row['id'];?>">



												<div class="card-body row">
													<div class="col-lg-12" style="text-align: center; color: #888">
														<p>Assignment</p>
													</div>

													<div class="col-lg-12 p-t-20">
											<label class="control-label " style="color: #444; text-align: center;">Assignment file
											</label>
											<br/>
											<a href="assignment/<?php echo $row['assignment']?>"><?php echo $row['assignment']?></a>
										</div>
													<div class="col-lg-12 p-t-20">
														<div
														class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="text" id="txtFirstName" name="assignmentNo" value="<?php echo $row['assignmentNo'];?>" readonly>
														<label class="mdl-textfield__label">Assignment Name</label>
													</div>
												</div>
												<div class="col-lg-12 p-t-20">
													<div
													class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

						<input class="mdl-textfield__input" type="number" id="txtLasttName" name="marks"  
						value="<?php  if($row['marks']!==''){ echo $row['marks']; }else{
							echo "Ungraded";
						}?>" readonly>
													<label class="mdl-textfield__label">Marks</label>
												</div>
											</div>
												<div class="col-lg-12 p-t-20">
										<div

										class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<input class="mdl-textfield__input" type="text" id="txtLasttName"   value="<?php echo $row['topicName'];?>" readonly>
										<label class="mdl-textfield__label">Chapter</label>

								

							
									</div>
							</div>
											<div class="col-lg-12 p-t-20">
										<div

										class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										
										<textarea  class="mdl-textfield__input" name="comment" readonly><?php echo $row['comment'];?></textarea>
										<label class="mdl-textfield__label">Comments</label>
									</div>
										</div>
											<div class="col-lg-12 p-t-20">
												<div
												class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
<input class="mdl-textfield__input" type="date" id="txtemail" name="date" value="<?php echo $row['dueDate'];?>" readonly>
												<label class="mdl-textfield__label" style="text-align: center;">Due Date</label>

											</div>
										</div>


									</div>
								</div>
								<div class="modal-footer">
								
								</div>
							</form>
						</div>
					</div>
				</div>






			<?php }?>

			<!-- create Assignment -->
			<div class="modal slide-left" id="tab" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<form action="back/assignment_add.php" method="POST" enctype="multipart/form-data">
							<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
							<div class="modal-body">

								<div class="card-body row">
									<div class="col-lg-12" style="text-align: center; color: #888">
										<p>Create an Assignment</p>
									</div>
									<div class="col-lg-12 p-t-20">
										<div

										class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input type="hidden" name="moduleID" value="<?php echo  secure($_GET['id'])?>">
										<input class="mdl-textfield__input" type="text" id="txtFirstName" name="assignmentNo" required>
										<label class="mdl-textfield__label">Assignment name</label>
									</div>
								</div>
								<div class="col-lg-12 p-t-20">
									<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="number" id="txtLasttName" name="marks" >
									<label class="mdl-textfield__label">Marks</label>
								</div>
							</div>
							<div class="col-lg-12 p-t-20">
										<div

										class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<select class="mdl-textfield__input" name="chapterName" required>
										<option value="">Select A Chapter</option>

								<?php 
								

								$sql = "select topicName
								from topics 
								
								where moduleID = '".$_GET['id']."' and deleteStatus=0";


							




								$query = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($query)){
									?>


									<option value="<?php echo $row['topicName'];?>"><?php echo $row['topicName'];?></option>

								<?php } ?>

							</select>
										
							
									</div>
							</div>
							<div class="col-lg-12 p-t-20">
										<div

										class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										
										<textarea  class="mdl-textfield__input" name="comment"></textarea>
										<label class="mdl-textfield__label">Comments</label>
									</div>
								</div>
							<div class="col-lg-12 p-t-20">
								<div
								class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" type="date" id="txtemail" name="date" >
								<label class="mdl-textfield__label" style="text-align: center;">Due Date</label>

							</div>
						</div>


						<div class="col-lg-12 p-t-20">
							<label class="control-label " style="color: #444; text-align: center;">Upload file
							</label>
							<div class="col-md-12">

								<div id="id_dropzone" class="dropzone">
									<input type="file" class="mdl-textfield__input" name="img[]" multiple accept=".pdf">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit"
					class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Save</button>
				</div>
			</form>

		</div>
	</div>
</div>

<!-- end of create assignment -->



</div>
</div>
<!-- end widget -->


















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


<?php }else{
	echo "<script> alert('Error! Please login');
	window.location='logout.php';

	</script>";
}?>
</body>

</html>

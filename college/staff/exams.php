<?php 
session_start();
include "../action.php";
include "color.php";
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
		<title>Vinco | Exam</title>
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

			.back{
				display: none !important
			}

			.close{
				color: red
			}
			.txt{
				height: 3.5em;
				overflow: hidden;
				margin-bottom: 1rem;
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
								<div class="page-title">Exams</div>
							</div>
							
					</div>
				</div>





				<?php 
 

				if($_POST['edit']){



					$dateTime = $_POST['date'].''.$_POST['time'];


//check if file has been posted
					if(!$_FILES['img']['name']){

	


//update exam without file
						$sql3 = "UPDATE exam SET paper='".$_POST['name']."', marks='".$_POST['marks']."', examTime='".$dateTime."', duration='".$_POST['duration']."' 
						where id='".$_POST['examID']."' ";

					}else{

	// delete previes file

    //get file path

						$sql = "SELECT * FROM exam WHERE id = '".secure($_POST['examID'])."'";

						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
  // output data of each row
							$row = mysqli_fetch_assoc($result);


							$Path = "exams/".$row['exam'];
							if (file_exists($Path)){
								unlink($Path);   
							} 

						}
//end delete


//Directory for file upload
						$target_dir ="exams/";
					 $target_file = $target_dir .basename($_FILES["img"]["name"]);

//get file type
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


//Check if file is uploaded

						if(move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)){

							$sql3 = "UPDATE exam SET paper='".$_POST['name']."', marks='".$_POST['marks']."', examTime='".$dateTime."', exam='".$_FILES['img']['name']."', duration='".$_POST['duration']."' 
							where id='".$_POST['examID']."' ";
						}

					}

					$query3 = mysqli_query($conn,$sql3);

				}
				?>






				<!-- start widget -->
				<div class="row">
			
		            
		            <div class="col-xl-4 col-md-6 col-12" data-toggle="modal" data-target="#slide-left<?php echo $row['moduleID']; ?>">
									<a href="calendar1.php" style="color:white;">
									<div class="info-box bg-b-green">
									<span class="info-box-icon "><i class="material-icons">group</i></span>
									<div class="info-box-content">

										<div class="progress">
											<div class="progress-bar" style="width: 100%"></div>
										</div>
										<span class="progress-description">
											Exam Calendar
										</span>
									</div>								
								</div>	</a>							
							</div>


				</div>
				<!-- end widget -->





				<!-- start widget -->
				<div class="row">

					<?php 
						//inner join courses on courses.coursesID = modules.moduleCourseID

				
					if($_SESSION['adminLevel']== '2' || $_SESSION['adminLevel']== '1' ){										

                        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                            $page_no = $_GET['page_no'];
                          } else {
                            $page_no = 1;
                          }






                          $total_records_per_page = 9;
                          $offset = ($page_no-1) * $total_records_per_page;
                          $previous_page = $page_no - 1;
                          $next_page = $page_no + 1;
                          $adjacents = "2";



  $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM modules inner join courses on courses.coursesID = modules.moduleCourseID ");
                          $total_records = mysqli_fetch_array($result_count);
                          $total_records = $total_records['total_records'];
                          $total_no_of_pages = ceil($total_records / $total_records_per_page);
                          $second_last = $total_no_of_pages - 1;
					$sql = "SELECT * 
					FROM  modules 
					inner join courses on courses.coursesID = modules.moduleCourseID LIMIT ".$offset.", ".$total_records_per_page."";

				  } else{

				 	

				 	$sql="SELECT * FROM lectureAssigns
					inner join modules on modules.moduleID = lectureAssigns.moduleID 
					WHERE lectureID = '".$_SESSION['adminID']."'";

				 }
					$result = mysqli_query($conn,$sql);
					$getResult = mysqli_num_rows($result);
															

					 
					 if($getResult > 0){

							$card = 1;
																	
					while($row = mysqli_fetch_array($result)){

			


						if($card == 5){

							$card = 1;
						}


						?>

							<!---subject start--> 
						
								<div class="col-xl-4 col-md-6 col-12" data-toggle="modal" data-target="#slide-left<?php echo $row['moduleID']; ?>">
									<a href="exam_data.php?id=<?php echo $row['moduleID']?>" style="color: #fff;"><div class="info-box <?php echo color($card);?>">
									<span class="info-box-icon "><i class="material-icons">group</i></span>
									<div class="info-box-content">
										<span class="info-box-text"><?php echo $row['moduleName']; ?></span>
										<span class="info-box-number"><?php echo $row['courseName']; ?></span>
										<div class="progress">
											<div class="progress-bar" style="width: 100%"></div>
										</div>
										<span class="progress-description">
											<?php echo $row['courseCode']; ?>
										</span>
									</div>								
								</div>	</a>							
							</div>
							<!---subject end-->
						<?php

						$card++; }

					}else{

						echo "<p style='color: #7788EE;'>No Modules have been allocated!</p>";
					}

					?>


			
</div>	
<ul class="pagination">
                        <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

                        <li <?php if($page_no <= 1){ echo "class='page-item disabled'"; } ?>>
                          <a  class="page-link" <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
                        </li>

                        <?php 
                        if ($total_no_of_pages <= 10){     
                          for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                            if ($counter == $page_no) {
                             echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                           }else{
                             echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                           }
                         }
                       }
                       elseif($total_no_of_pages > 10){

                        if($page_no <= 4) {     
                         for ($counter = 1; $counter < 8; $counter++){     
                          if ($counter == $page_no) {
                           echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                         }else{
                           echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                         }
                       }
                       echo "<li class='page-item'><a class='page-link'>...</a></li>";
                       echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                       echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                     }

                     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
                      echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                      echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                      echo "<li class='page-item'><a class='page-link'>...</a></li>";
                      for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
                       if ($counter == $page_no) {
                         echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                       }else{
                         echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                       }                  
                     }
                     echo "<li class='page-item'><a class='page-link'>...</a></li>";
                     echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
                     echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                   }

                   else {
                    echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
                    echo "<li class='page-item'><a class='page-link'>...</a></li>";

                    for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                      if ($counter == $page_no) {
                       echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";  
                     }else{
                       echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                     }                   
                   }
                 }
               }
               ?>

               <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-item disabled'"; } ?>>
                <a class='page-link'<?php


if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
              </li>
              <?php if($page_no < $total_no_of_pages){
                echo "<li class='page-item' ><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
              } ?>
            </ul>
</div>
</div>
<!-- end widget -->
</div>
<!-- Chart end -->
<!-- Activity feed start -->
</div>
</div>

</div>




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
	echo "<script> alert('Error! Please login!');
	window.location='logout.php';

	</script>";
}?>
</body>

<!-- create exam modal -->
<div class="modal slide-left" id="exam1" tabindex="-1" role="dialog" aria-labelledby="Warning Modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<form action="back/createExam.php" method="POST" enctype="multipart/form-data">
				<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
				<div class="modal-body">

					<div class="card-body row">
						<div class="col-lg-12" style="text-align: center; color: #888">
							<p>Create Exams</p>
						</div>
						<div class="col-lg-12 p-t-20">
							<input type="text" name="examName"  class="mdl-textfield__input" >
							<label class="mdl-textfield__label" style="margin-left: 1rem">Exam Name</label>
							<br>
							<br>
							<select class="mdl-textfield__input" name="moduleID">

								<?php 
								$sql = "";
								if($_SESSION['adminLevel']== '2' || $_SESSION['adminLevel']== '1' ){
								$sql = "select moduleName, modules.moduleID
								from  modules 
								";
							} else{

								$sql = "select moduleName, modules.moduleID
								from lectureAssigns 
								inner join modules on modules.moduleID = lectureAssigns.moduleID 
								where lectureAssigns.lectureID = '".$_SESSION['adminID']."' ";


							}




								$query = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($query)){
									?>


									<option value="<?php echo $row['moduleID'];?>"><?php echo $row['moduleName'];?></option>

								<?php } ?>

							</select>

							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<br><input class="mdl-textfield__input" type="number" id="txtFirstName" name="marks">
							<label class="mdl-textfield__label">Exam Marks</label>
						</div>

						<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<br><input class="mdl-textfield__input" type="date" id="txtFirstName" name="examDate">
						<label class="mdl-textfield__label">Exam Date</label>
					</div>
					<div
					class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					<br><input class="mdl-textfield__input" type="time" id="txtFirstName" name="examTime">
					<label class="mdl-textfield__label">Exam Start Time</label>
				</div>

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

					<label class="mdl-textfield__label" style="margin-left: 1rem">Duration</label>

					<select class="mdl-textfield__input" name="duration">
						<option >Select Duration...</option>
						<option value="45">45 minutes</option>
						<option value="60" >1 hour</option>
						<option value="75">1h 15 minutes</option>
						<option value="90" >1h 30 minutes</option>
						<option value="105">1h 45 minutes</option>
						<option value="120">2h 00 minutes</option>
						<option value="135">2h 15 minutes</option>
						<option value="150" >2h 30 minutes</option>
						<option value="165">2h 45 minutes</option>
						<option value="180" >3h 00 minutes</option>
					</select>

				</div>

				<div
				class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
				<br><input class="mdl-textfield__input" type="file" id="txtFirstName" name="file">
				<label class="mdl-textfield__label">Upload Document</label>
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

<!-- end exam create modal -->

</html>
<?php

function duration($length){

	switch ($length) {
		case '45':
		
		return "45 minutes";	
		break;

		case '60':
		
		return "1 Hour";	
		break;
		case '75':
		
		return "1 Hour 15 minutes";	
		break;
		case '90':
		
		return "1 Hour 30 minutes";	
		break;
		case '105':
		
		return "1 Hour 45 minutes";	
		break;
		case '120':
		
		return "2 hours ";	
		break;

		case '135':
		
		return "2 Hour 15 minutes";	
		break;
		case '150':
		
		return "2 Hour 30 minutes";	
		break;
		case '165':
		
		return "2 Hour 45 minutes";	
		break;
		case '180':
		
		return "3 hours ";	
		break;

		
		default:
		return "3 hours ";
		break;
	}



}
?>
<?php 
session_start();
include "../action.php";
include '../../college/util/connectDB.php';
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
		.table-checkable tr>td:first-child, .table-checkable tr>th:first-child {
			text-align: center;
			max-width: 100%;
			min-width: 100%;
			padding-left: 0;
			padding-right: 0;
		}


		.table thead th {
			vertical-align: bottom;
			border-bottom: none;
		}

		tr td{
			height: 8rem;
		}

		.accent-pink-gradient {

			background: linear-gradient(135deg, #8E44AD, #6777ef);
			-webkit-transition: .2s ease box-shadow, .2s ease transform;
			transition: .2s ease box-shadow, .2s ease transform;
			color: #fff;
		}
		.accent-pink-gradient:hover {
			box-shadow: 0 20px 30px 0 rgba(188, 238, 142, 0.3);
			-webkit-transform: scale(1.05);
			transform: scale(1.05);
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

				<?php if(isset($_GET['id'])):?>
					<input type="hidden" id="classID" value="<?=$_GET['id'];?>">
					<?php else:?>
						<input type="hidden" id="classID" value="0">
					<?php endif;?>


				<div class="row">
					<div class="col-lg-6">	<a href="" class="backbtn" onclick="history.go(-1); return false;" style="margin-top: 0rem"><img src="data:image/png;base64,iVBORw0K
						GgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAjklEQVR4Xu2PsQ2AIBBFL4FeNpENZBNJGMvCUWQBGv
						egcYHzjIUKBlBjYeJLfnO8vASAn8/Rh4e7CNpAw/DhDpJzPsIaexxUjLEJttijoIZj6MpijDEdxGLpYhCx
						tdaiEOIgp9h555DTOOcmKWVeXsk7FK2996NSKi+XBBcoWtEGrXVS3n29DHL78PbzPjPOWXx/
						ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a></div>

						
						<div class="col-lg-6">


							<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default pull-right "   data-toggle="modal" data-target="#myModal1" style="text-transform: none;font-size: 14px;">Add extra Lessons<i class="material-icons" style="color: #36C6D3">add</i><span class="mdl-button__ripple-container"></button>

							</div>


							<div class="col-lg-6">

							</div>


							<div class="col-sm-12 col-md-12 col-xl-12">



								<div class="card-box">

									<div class="card-head">


										
										<header><span>

											<?php
											$sqlR = "SELECT * FROM courses where coursesID='".isset($_GET['id'])."'";
											$queryR = mysqli_query($conn,$sqlR);
											$rowR = mysqli_fetch_array($queryR);
											print $rowR['courseName'] ?? null;

											?></span>&nbsp;&nbsp;Time Table</header>


						<select class="form-control col-lg-4" id="change" onchange="showModules(this.value)" style="float: right; 
											border-bottom: 1px dotted rgba(0, 0, 0, 0.2);margin: 1rem 0; ">
											<option>Filter By Class</option>
											<?php 
											$sql7 = "SELECT DISTINCT courses.coursesID,courses.courseName FROM `modules` 

												Inner join lectureAssigns on lectureAssigns.moduleID = modules.moduleID

												Inner join courses on courses.coursesID = modules.moduleCourseID

												WHERE lectureAssigns.lectureID = '".$_SESSION['adminID']."'";
											$query7 = mysqli_query($conn,$sql7);
											while($row7 = mysqli_fetch_array($query7)){
												?>
												<option value="<?php echo $row7['coursesID']?>"><?php echo $row7['courseName']?></option>


											<?php }?>
										</select>
									</div>
									<div class="card-body ">

										<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
										id="example4">
										<thead class="accent-pink-gradient">
											<tr >

												<th>Time</th>
												<th>Monday</th>
												<th>Tuesday  </th>
												<th>Wednesday </th>
												<th>Thursday </th>
												<th>Friday</th>
												<th>Saturday</th>
												<th>Sunday</th>
											</tr>
										</thead>


										<tbody id="tableExtra">
				                           
				                           
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
</body>


<div class="modal slide-left" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="Warning Modal" >
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div><i class="fa fa-times" style="color: red; float: right;" data-dismiss="modal" ></i></div>
            <!-- FORM STARTING -->

            <form action="../live/api/createRoom/index.php" method="POST">
			<div class="modal-body">

					<div class="card-body row">
						<div class="col-lg-12" style="text-align: center; color: #888">
							<p>Create extra Lesson</p>
						</div>
						<div class="col-lg-12 p-t-20">
							<input type="hidden" name="extra" value="true">
							<input type="hidden" name="id" value="<?php echo $_SESSION['adminID'] ?? null;?>">
							<select class="mdl-textfield__input" name="moduleID" required>

								<?php
								$sqlite = "SELECT * FROM lectureAssigns 
								inner join modules on lectureAssigns.moduleID = modules.moduleID
								INNER JOIN courses on courses.coursesID = modules.moduleCourseID
								where lectureID = '".$_SESSION['adminID']."'";
								$querylite = mysqli_query($conn,$sqlite);

								while($rowlite = mysqli_fetch_array($querylite)){
									?>
									<option value="<?php echo $rowlite['moduleID']; ?>"><?php echo $rowlite['moduleName'].' '.$rowlite['courseName']; ?></option>
								<?php }?>


							</select>

							<div
							class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<br>


							<input type="date" name="date" class="form-control">
							<label class="mdl-textfield__label"> Date</label>
						</div>

						<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<br><input class="mdl-textfield__input" type="time" name="time" id="txtFirstName">
						<label class="mdl-textfield__label">Start Time</label>
					</div>


					<div
					class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					<br>
					<input class="mdl-textfield__input" type="time" name="end" id="txtFirstName">
					<label class="mdl-textfield__label">End Time</label>
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








</html>


<script type="text/javascript">

fetchTimetableExtra();

function fetchTimetableExtra(){
var action= "fetchTimeTableExtra";
	 	 $.ajax({
				url: "viewTimetableExtra.php",
			 	type: "POST",
			 	cache: false,
			 	data: {
			 		action: action, classID: $('#classID').val()
			 	},
			 	success: function(data){
			 		//alert(data);
			 		$('#tableExtra').html(data); 
			 	}
			 });

}



function showModules(str){
  if (str === "") {
    document.getElementById("tableExtra").innerHTML = "Welcome to extraction of cours";
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        document.getElementById("tableExtra").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST","viewTimetableExtra.php?classID="+str,true);
    xmlhttp.send();
  }
}

// end file
</script>

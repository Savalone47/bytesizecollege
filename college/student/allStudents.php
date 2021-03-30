
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Online School Management System" />
	<meta name="author" content="Vinco College" />
	<title>Dashboard  | Home</title>
	<?php include 'headerLinks.php';?>

	<style type="text/css">




.customtab.nav-tabs .nav-link.active, .customtab.nav-tabs .nav-link.active:focus {
    border-bottom: 0px solid #36c6d3;
    background-color: rgb(102, 115, 252) !important;
    box-shadow: none;
    color: #fff;
    border-radius: 5px;
}

.customtab.nav-tabs .nav-link.active, .customtab.nav-tabs .nav-link.active:focus {
    border-bottom: 0px solid #36c6d3;
    background-color: #36c6d3 !important;
    box-shadow:none;
    color: #fff;
    border-radius: 5px;
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
      ZhxoYwAAAABJRU5ErkJggg==" width="20" height="20" class="gwt-Image CCCX1UC-m-e" aria-hidden="true">Back</a><br><br>



								<ul class="nav customtab nav-tabs" role="tablist">
									<li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">	New Applications</a></li>
									<li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">Enrolled Students</a></li>
								</ul>
								<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="inbox">
<div class="row">
	<div class="col-md-12">
		<div class="card card-topline-gray">
			<div class="card-body no-padding height-9">
				<div class="row">
					
					<div class="col-md-12">
						<div class="inbox-body">
							<div class="inbox-header" style="padding-top: 0px;">
								<a href="#" data-title="Compose"
								class="btn red compose-btn btn-block m-0" style="margin-top: 0px;">
								<i class="fa fa-edit"></i> Compose </a>
							</div>
							<div class="inbox-body no-pad">
								<div class="mail-list">
									<div class="compose-mail">
										<form method="post">
											<div class="form-group">
												<label for="to" class="">Title</label>
												<input type="text" tabindex="1" id="to"
													class="form-control">
												
											</div>
											
											
											<div class="form-group">
												<label for="subject" class="">Message:</label>
												
													<textarea type="text" class="form-control"></textarea>
											</div>
											<div class="compose-editor">
												<div id="summernote"></div>
												<input type="file" class="default" multiple>
											</div>
											<div class="btn-group margin-top-20 ">
										<button
											class="btn btn-primary btn-sm margin-right-10 pull-right"><i
														class="fa fa-check"></i> Send</button>
												
											</div>
											
										</form>
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
</div>

		<div class="tab-pane  fontawesome-demo" id="tab2">
<div class="table-scrollable">


<div class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
             <div class="modal-body">
                 		<div class="">
<div class="row">
	<div class="col-md-12">
		<div class=" card-topline-aqua">
			<div class="card-body no-padding height-9">
				<div class="row">
					
					<div class="col-md-12">
						<div class="inbox-body">
							
							<div class="inbox-body no-pad">
								<div class="mail-list">
									<div class="compose-mail">
										<form method="post">
											<div class="form-group">
												<label for="to" class="">Title</label>
												<input type="text" tabindex="1" id="to"
													class="form-control">
												
											</div>
											
											
											<div class="form-group">
												<label for="subject" class="">Message:</label>
												
													<textarea type="text" class="form-control"></textarea>
											</div>
											<div class="compose-editor">
												<div id="summernote"></div>
												<input type="file" class="default" multiple>
											</div>
											<div class="btn-group margin-top-20 ">
										<button
											class="btn btn-primary btn-sm margin-right-10 pull-right"><i
														class="fa fa-check"></i> Update</button>
												
											</div>
											
										</form>
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
             </div>
             <div class="modal-footer">
                 <a href="#" class="btn" data-dismiss="modal">Close</a>
             </div>
        </div>
    </div>
</div>
			<table
				class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
				>
				<thead>
					<tr>
						<th></th>
						
						<th> Name </th>
						<th> Message </th>
					
						<th>Date</th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
					<tr class="odd gradeX">
						<td class="patient-img">
							<img src="../assets/img/std/std1.jpg"
								alt="">
						</td>
					
						<td>Rajesh Bhatt</td>
						<td class="left">Mechanical</td>
						<td><a href="tel:4444565756">
								4444565756 </a></td>
						
						<td>
							<a href="#"
								class="btn btn-primary btn-xs" data-toggle="modal" data-target=".modal">
								<i class="fa fa-pencil"></i>
							</a>
							<button class="btn btn-danger btn-xs">
								<i class="fa fa-trash-o "></i>
							</button>
						</td>
					</tr>

					<tr class="odd gradeX">
						<td class="patient-img">
							<img src="../assets/img/std/std6.jpg"
								alt="">
						</td>
					
						<td>Megha Trivedi</td>
						<td class="left">Commerce</td>
						<td><a href="tel:444543564">
								444543564 </a></td>
						
						<td>
							<a href="#"
								class="btn btn-primary btn-xs" data-toggle="modal" data-target=".modal">
								<i class="fa fa-pencil"></i>
							</a>
							<button class="btn btn-danger btn-xs" >
								<i class="fa fa-trash-o "></i>
							</button>
						</td>
					</tr>
					
				
				</tbody>
			</table>
		</div>

			</div>
			</div>
					


	</div>
</div>
<!-- end page content -->
		
			
			
						
		<!-- start footer -->
		<?php include 'footer.php';?>
		<!-- end footer -->
	</div>
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
	
</body>


</html>
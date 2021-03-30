<style type="text/css">
	.sidemenu-container .sidemenu>li>a{
    
  	    padding: 7px 15px;
  	    margin-bottom: 2px;
    font-weight: 200 !important;
}
</style>
<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
							data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>


	              <?php if($_SESSION['adminLevel'] == '4' || $_SESSION['adminLevel'] == '3' ){?>
							
							<li class="nav-item">
								<a href="index.php" class="nav-link nav-toggle"> 
									<i class="fa fa-users"></i>
									<span class="title">My Class</span>
								</a>
							</li>
							
							
							<li class="nav-item">
								<a href="timetable.php?id=<?php echo $_SESSION['adminID']?>" class="nav-link nav-toggle"> 
									<i class="fa fa-table"></i>
									<span class="title">Time Table</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="exams.php" class="nav-link nav-toggle"> 
									<i class="material-icons">group</i>
									<span class="title">Exams</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="notification.php" class="nav-link nav-toggle"> 
									<i class="fa fa-bell"></i>
									<span class="title">Notifications</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="allEvents.php" class="nav-link nav-toggle"> 
									<span aria-hidden="true" class="icon-calendar "></span>
									<span class="title">All Events</span>
								</a>
							</li>
		
							<li class="nav-item">
								<a href="logout.php" class="nav-link nav-toggle"> 
								<i class="icon-logout" style="color: red"></i> 
										<span class="title"style="font-size: 11px;">Log Out </span>
								</a>
							</li>
						<?php }?>
							




	<?php if($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2' ||  $_SESSION['adminLevel'] == '5' ){?>
						





						<li class="nav-item">
								<a href="dashboard.php" class="nav-link nav-toggle"> 
									<i class="material-icons">dashboard</i>
									<span class="title">Dashboard</span>
								</a>
							</li>

							<li class="nav-item">
								<a href="index.php" class="nav-link nav-toggle"> 
									<i class="fa fa-users"></i>
									<span class="title">My Class</span>
								</a>
							</li>
							

							<?php 

							if(secure($_SESSION['adminLevel']) == "5"){ 

							?>

								<li class="nav-item">
								<a href="allDepartments.php" class="nav-link nav-toggle"> 
									<i class="material-icons">business</i>
									<span class="title"> Departments</span>
								</a>
							</li>

							<?php 
						} else { ?>

								<li class="nav-item">
								<a href="allDepartments.php" class="nav-link nav-toggle"> 
									<i class="material-icons">business</i>
									<span class="title"> Departments</span>
								</a>
							</li>

						 <?php }


						if($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2'){?>

						
							<li class="nav-item">
								<a href="reports2.php" class="nav-link nav-toggle"> 
									<i class="fa fa-file" aria-hidden="true"></i>
									<span class="title">Reports</span>
								</a>
							</li>

							<li class="nav-item">
								<a href="shelf.php" class="nav-link nav-toggle"> 
									<i class="material-icons">local_library</i>
									<span class="title">Module Shelf</span>
								</a>
							</li>

						<?php } ?>



							<li class="nav-item">
								<a href="allStudents.php" class="nav-link nav-toggle"> 
									<i class="fa fa-group"></i>
									<span class="title">All Students</span>
								</a>
							</li>

							<li class="nav-item">
								<a href="allStudents_listview.php" class="nav-link nav-toggle"> 
									<i class="fa fa-group"></i>
									<span class="title">Enrolled Students</span>
								</a>
							</li>

							<li class="nav-item">
								<a href="exams.php" class="nav-link nav-toggle"> 
									<i class="fa fa-file-text-o"></i>
									<span class="title">Exams</span>
								</a>
							</li>



							<li class="nav-item">
								<a href="timetable.php?id=<?php echo $_SESSION['adminID']?>" class="nav-link nav-toggle"> 
									<i class="fa fa-table"></i>
									<span class="title">Time Table</span>
								</a>
							</li>
							
							
							<?php if($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2'){?>
							<li class="nav-item">
								<a href="notification.php" class="nav-link nav-toggle"> 
									<i class="fa fa-bell"></i>
									<span class="title">Notifications</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="allEvents.php" class="nav-link nav-toggle"> 
									<span aria-hidden="true" class="icon-calendar "></span>
									<span class="title">All Events</span>
								</a>
							</li>

						
<?php }?>
							<br>
							<li class="nav-item">
								<a href="logout.php" class="nav-link nav-toggle"> 
								<i class="icon-logout" style="color: red"></i> 
										<span class="title"style="font-size: 11px;">Log Out </span>
								</a>
							</li>
							
							



							<?php }?>



						</ul>
					</div>
				</div>
			</div>
			<!-- end sidebar menu -->
<style type="text/css">
	.logo-default img{
		margin-top: -1.5rem;
		height: 7rem
	}
	svg{
		
		display: none;
	}




	@media only screen and (max-width: 550px) {
 	svg{
		height: 1.5rem;
		display: block;
		position: absolute;left: 5px;
		top: 18px;
	}
.logo-default{
	position: absolute;
	right: 30%;
	top: 1px;
	
	}
	.backbtn{
		display: none !important;
	}



	
}

.backbtn{
 cursor: pointer;
   font-size: 11px;
   text-align: center;
   margin-right: 16px;
   height: 27px;
   line-height: 27px;
   min-width: 54px;
   outline: 0;
   padding: 0 8px;
   margin-top: 3rem;
   -moz-border-radius: 2px;
   -webkit-border-radius: 2px;
   border-radius: 2px;
   display: inline-block;
   color: #666;
   border: 1px solid #dcdcdc;
   border: 1px solid rgba(0,0,0,0.1);
   background-color: #f5f5f5;
   background-image: -webkit-linear-gradient(top,#f5f5f5,#f1f1f1);
   background-image: -moz-linear-gradient(top,#f5f5f5,#f1f1f1);
   background-image: -ms-linear-gradient(top,#f5f5f5,#f1f1f1);
   background-image: -o-linear-gradient(top,#f5f5f5,#f1f1f1);
   background-image: linear-gradient(top,#f5f5f5,#f1f1f1);
}
</style>
<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="#" onclick="goBack()"><svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="#C1C3C5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg></a>
					<a href="index.php">
						
						<span class="logo-default"><img src="vinco.png"></span> </a>
				</div>
				<!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
				
				<!-- start mobile menu -->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span></span>
				</a>
				<!-- end mobile menu -->
				<!-- start header menu -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>

						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
								<i class="fa fa-bell-o"></i>
								<span class="badge headerBadgeColor1">	<?php 
							
							$sql ="SELECT * FROM notification";
										$query = mysqli_query($conn, $sql);
										echo $fetch = mysqli_num_rows($query);

										?> 
						</span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3><span class="bold">Notifications</span></h3>
								</li>
								<li>
									<ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
										<?php 
										$sql ="SELECT * FROM notification";
										$query = mysqli_query($conn, $sql);
										while($row = mysqli_fetch_array($query)){
										?>
										<li>
											<a href="view_notification.php?id=<?php echo $row['id']?>">
												<span class="time"><?php echo date('y-m-d', strtotime($row['time_stamp']))?></span>
												<span class="details">
													<span class="notification-icon circle deepPink-bgcolor"><i
															class="fa fa-comment-o"></i></span>
													<?php echo $row['title']?> </span>
											</a>
										</li>
										<?php }?>															
										
									</ul>
									<div class="dropdown-menu-footer">
										<a href="view_notification.php"> All notifications </a>
									</div>
								</li>
							</ul>
						</li>
						<!-- end notification dropdown -->

						<!-- start manage user dropdown -->
						<li class="dropdown dropdown-user">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
								<img alt="" class="img-circle " src="management/<?php echo isset($_SESSION['managementPhoto']) ? $_SESSION['managementPhoto'] : "" ?>" style="width: 25px;">
								<span class="username username-hide-on-mobile"> <?php echo isset($_SESSION['managementName']) ? $_SESSION['managementName'] : ""?> </span>
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="profile.php">
										<i class="icon-user"></i> Profile </a>
								</li>
								
								<li>
									<a href="logout.php">
										<i class="icon-logout"></i> Log Out </a>
								</li>
							</ul>
						</li>
						<!-- end manage user dropdown -->
					
					</ul>
					
				</div>
			</div>
		</div>
		<!-- end header -->

		<script>

function goBack() {

  window.history.back();

  }

</script> 
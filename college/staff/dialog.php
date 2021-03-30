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
	<title>My Classes</title>
	<!-- google font -->
	<?php include 'headerLinks.php';?>



	<style type="text/css">


		.avatar {
  height: 3rem;
  width: 3rem;
  min-width: 3rem;
  display: inline-block;
  position: relative;
  border-radius: 50%;
  box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.1); }
  .avatar img,
  .avatar span {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    display: flex;
    align-items: center;
    justify-content: center; }
  .avatar.avatar-sm {
    height: 2.25rem;
    width: 2.25rem;
    min-width: 2.25rem; }
  .avatar.avatar-md {
    height: 3.75rem;
    width: 3.75rem;
    min-width: 3.75rem; }
  .avatar.avatar-lg {
    height: 5rem;
    width: 5rem;
    min-width: 5rem; }
  .avatar.avatar-xl {
    height: 7.5rem;
    width: 7.5rem;
    min-width: 7.5rem; }
  .avatar.avatar-xxl {
    height: 9.375rem;
    width: 9.375rem;
    min-width: 9.375rem; }
  .avatar.avatar-primary {
    background: #665dfe;
    color: #fff; }
  .avatar.avatar-success {
    background: #44a675;
    color: #fff; }
  .avatar.avatar-secondary {
    background: #6c757d;
    color: #fff; }
  .avatar.avatar-danger {
    background: #FF337C;
    color: #fff; }
  .avatar.avatar-warning {
    background: #ffb74d;
    color: #fff; }
  .avatar.avatar-info {
    background: #3c91ec;
    color: #fff; }

.avatar.avatar-online:before, .avatar.avatar-offline:before, .avatar.avatar-busy:before, .avatar.avatar-away:before {
  content: "";
  position: absolute;
  display: block;
  width: .8rem;
  height: .8rem;
  border-radius: 50%;
  top: 0;
  right: 0;
  border: 3px solid #fff; }

.avatar.avatar-online:before {
  background: #44a675; }

.avatar.avatar-offline:before {
  background: #6c757d; }

.avatar.avatar-busy:before {
  background: #FF337C; }

.avatar.avatar-away:before {
  background: #ffb74d; }
		.chat-body {
  display: flex;
  flex-grow: 1;
  flex-flow: column;
  min-width: 0;
  width: 100%; }
  .chat-body .chat-header {
    padding: .75rem 1rem;
    border-bottom: 1px solid #e5e9f2;
    display: flex;
    align-items: center;
    justify-content: space-between; }
    @media (min-width: 768px) {
      .chat-body .chat-header {
        padding: .75rem 2.25rem; } }
  .chat-body .chat-content {
    flex: 2; }
    .chat-body .chat-content {
      -ms-overflow-style: none;
      scrollbar-width: none;
      overflow-y: auto;
      overflow-x: hidden; }
    .chat-body .chat-content::-webkit-scrollbar {
      display: none; }
  .chat-body .chat-footer {
    padding: .75rem 1rem;
    border-top: 1px solid #e5e9f2; }
    @media (min-width: 768px) {
      .chat-body .chat-footer {
        padding: .75rem 2.25rem; } }
    .chat-body .chat-footer textarea {
      font-size: 0.75rem; }
      @media (min-width: 576px) {
        .chat-body .chat-footer textarea {
          font-size: 0.875rem; } }

.chat-info {
  height: 100vh;
  height: 100%;
  background: #fff;
  position: fixed;
  top: 0px;
  bottom: 0px;
  left: 100%;
  z-index: 1025;
  width: 100%;
  visibility: hidden;
  transition: transform .3s ease, visibility .3s ease; }
  .chat-info {
    -ms-overflow-style: none;
    scrollbar-width: none;
    overflow-y: auto;
    overflow-x: hidden; }
  .chat-info::-webkit-scrollbar {
    display: none; }
  @media (min-width: 1200px) {
    .chat-info {
      position: static;
      border-left: 1px solid #e5e9f2;
      visibility: hidden;
      width: 0;
      height: 100vh; } }
  .chat-info.chat-info-visible {
    visibility: visible;
    transform: translateX(-100%);
    z-index: 1030; }
    @media (min-width: 1200px) {
      .chat-info.chat-info-visible {
        transform: translateX(0);
        visibility: visible;
        min-width: 21.875rem;
        width: 21.875rem; } }
    @media screen and (max-width: 1300px) and (min-width: 1200px) {
      .chat-info.chat-info-visible {
        position: fixed;
        top: 0px;
        bottom: 0px;
        right: 0px;
        transform: translateX(-100%);
        border-left: 1px solid #e5e9f2; } }
  .chat-info .chat-info-header {
    display: flex;
    flex-direction: column;
    justify-content: center;
    border-bottom: 1px solid #e5e9f2;
    min-height: 4.5625rem; }
  .chat-info .chat-info-group {
    border-top: 1px solid #e5e9f2;
    padding: .25rem 0; }
    .chat-info .chat-info-group .chat-info-group-header {
      padding: 1.25rem 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      color: inherit; }
      @media (min-width: 992px) {
        .chat-info .chat-info-group .chat-info-group-header {
          padding-right: 1.75rem;
          padding-left: 1.75rem; } }
    .chat-info .chat-info-group .chat-info-group-content {
      padding: 0 1.5rem 1.5rem; }
      @media (min-width: 992px) {
        .chat-info .chat-info-group .chat-info-group-content {
          padding-right: 1.75rem;
          padding-left: 1.75rem; } }
      .chat-info .chat-info-group .chat-info-group-content.list-item-has-padding {
        padding-left: 0;
        padding-right: 0; }
        .chat-info .chat-info-group .chat-info-group-content.list-item-has-padding .list-group-item {
          padding: 0 1.5rem 1.5rem;
          padding: .75rem 1.25rem; }
          @media (min-width: 992px) {
            .chat-info .chat-info-group .chat-info-group-content.list-item-has-padding .list-group-item {
              padding-right: 1.75rem;
              padding-left: 1.75rem; } }
          .chat-info .chat-info-group .chat-info-group-content.list-item-has-padding .list-group-item:first-child {
            padding-top: 0; }
          .chat-info .chat-info-group .chat-info-group-content.list-item-has-padding .list-group-item:last-child {
            padding-bottom: 0; }

.chat-closer {
  position: absolute;
  top: 0;
  left: 0.625rem;
  display: block; }

.emoji-picker__emojis {
  -ms-overflow-style: none;
  scrollbar-width: none;
  overflow-y: auto;
  overflow-x: hidden; }

.emoji-picker__emojis::-webkit-scrollbar {
  display: none; }


  /*------------------------------------------------------------------
CHAT STYLE STYLESHEET

Last change: [Initial Release]

Chanelog:
-------------------------------------------------------------------*/
.message {
  margin-bottom: 1.25rem;
  font-size: 0.875rem; }
  .message .message-content {
    padding: 1rem 2.25rem;
    background-color: #f5f6fa;
    color: #8094ae;
    margin-left: 1.25rem;
    border-radius: 1.25rem;
    text-align: left;
    display: inline-block;
    max-width: 25rem; }
    .message .message-content .message-attachment {
      display: flex;
      align-items: center; }
      .message .message-content .message-attachment .btn-icon {
        margin-right: 0.625rem; }
  .message .avatar {
    display: inline-block;
    vertical-align: bottom;
    margin-top: -1.25rem; }
    .message .avatar img {
      box-shadow: 0px 0px 0px 0.5rem #fff; }
  .message .message-options {
    display: inline-flex;
    align-items: center;
    font-size: 0.75rem;
    color: #adb5bd;
    margin-top: 0.3125rem; }
    .message .message-options > * {
      margin-left: 0.3125rem;
      margin-right: 0.3125rem; }
      .message .message-options > *:not(.avatar) {
        height: 1.125rem;
        line-height: 1.125rem;
        display: inline-block;
        vertical-align: middle; }
  .message.self {
    text-align: right; }
    .message.self .message-content {
      background-color: #665dfe;
      color: #fff;
      margin-right: 1.25rem;
      margin-left: 0px; }
    .message.self .message-options {
      flex-direction: row-reverse; }

.message-divider {
  width: 100%;
  max-width: 100%;
  display: block;
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index: 1020; }
  .message-divider:before {
    content: attr(data-label);
    display: block;
    position: absolute;
    top: -0.5rem;
    letter-spacing: 0.0313rem;
    font-size: 0.6875rem;
    padding: 0.125rem 0.5rem;
    border-radius: 0.1875rem;
    background-color: #f8f9fa;
    border: 1px solid #e5e9f2;
    left: 50%;
    font-weight: 500;
    transform: translateX(-50%); }
    .messageBody{
    	
    	

    }
.popup-media .img-fluid{
height: 3rem
}
input[type=file] {
    display: none;
}
.choose-btn {
    border-radius: 50px;
    margin: 10px;
    float: left;
    background: transparent;
    color: #444;
    padding: 2px 10px;
    text-align: center;
    cursor: pointer;
    font-family: arial;
    font-size: 12px !important;
    text-transform: none;
}
.choose-btn:hover {
  
}
.material-icons{
    transform: rotate(300deg);
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

					 <!-- Chat Content Start-->
                    <div class="chat-content p-2" id="messageBody">
                        <div class="container">

                           <!-- Message Day Start -->
                            <div class="message-day" style="height: 60vh; overflow: scroll;">

                                <div class="message-divider sticky-top pb-2" data-label="Today">&nbsp;</div>

                                 <!-- Self Message Start -->
                                <div class="message self">
                                    <div class="message-wrapper">
                                        <div class="message-content">



                                          <span>Good idea! By the way, do you have any facts to back you up? For example, change of climate, yearly disasters…</span>
                                          <div class="form-row">
                                                <div class="col">
                                                    <a class="popup-media" href="../assets/img/course/course1.jpg">
                                                        <img class="img-fluid " src="play.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                              <div class="form-row">
                                                <div class="col">
                                                    <a class="popup-media" href="../assets/img/course/course1.jpg">
                                                        <img class="img-fluid " src="pdficon.svg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <a class="popup-media" href="../assets/img/course/course1.jpg">
                                                        <img class="img-fluid " src="word.svg" alt="">
                                                    </a>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="message-options">
                                        <div class="avatar avatar-sm"><img alt="" src="../assets/img/dp.jpg"></div>

                                        <span class="message-date">9:12am</span>
                                        <span class="message-status">Edited</span><svg class="hw-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                                </svg>

                                       
                                    </div>
                                </div>
                                <!-- Self Message End -->





                                <!-- Received Message Start -->
                                <div class="message">
                                    <div class="message-wrapper">
                                        <div class="message-content">

                                          <span>Good idea! By the way, do you have any facts to back you up? For example, change of climate, yearly disasters… I have shared some photos, Please have a look.</span>
                                            
                                            <div class="form-row">
                                                <div class="col">
                                                    <a class="popup-media" href="../assets/img/course/course1.jpg">
                                                        <img class="img-fluid " src="pdficon.svg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                             <div class="form-row">
                                                <div class="col">
                                                    <a class="popup-media" href="../assets/img/course/course1.jpg">
                                                        <img class="img-fluid " src="play.png" alt="">
                                                    </a>
                                                </div>
                                            </div>

                                             <div class="form-row">
                                                <div class="col">
                                                    <a class="popup-media" href="../assets/img/course/course1.jpg">
                                                        <img class="img-fluid " src="word.svg" alt="">
                                                    </a>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="message-options">
                                        <div class="avatar avatar-sm"><img alt="" src="../assets/img/dp.jpg"></div>
                                       <svg class="hw-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                                </svg> <span class="message-date">9:12am</span>
                                    </div>
                                </div>
                                <!-- Received Message End -->



                            </div>
                            <!-- Message Day End -->

                            <div class="row">
                              <div class="col-lg-6">
                                <textarea placeholder="Enter Message" style="width: 100%"></textarea>
                              </div>
                              <div class="col-lg-2">
                                    <label for="hiddenBtn" class="choose-btn mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-default" id="chooseBtn">Upload File<div class="icon-holder">
                        <i class="material-icons f-left">attachment</i>
                      </div></label>
    <input type="file" id="hiddenBtn">
                              </div>
                            </div>





                        </div>

                        <!-- Scroll to finish -->
                        <div class="chat-finished" id="chat-finished"></div>
                    </div>
                    <!-- Chat Content End-->


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


  <script type="text/javascript">
    var hiddenBtn = document.getElementById('hiddenBtn');
var chooseBtn = document.getElementById('chooseBtn');

hiddenBtn.addEventListener('change', function() {
    if (hiddenBtn.files.length > 0) {
        chooseBtn.innerText = hiddenBtn.files[0].name;
    } else {
        chooseBtn.innerText = 'Choose';
    }
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
<?php 
}else{

  echo "<script> alert('Error! Please Log in');
    window.location='logout.php';</script>";
}
?>


</html>
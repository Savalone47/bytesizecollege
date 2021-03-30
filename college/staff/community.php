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

.chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 40px;
    padding-bottom: 5px;
    /* border-bottom: 1px dotted #B3A9A9; */
    margin-top: 10px;
    width: 80%;
}


.chat li .chat-body p
{
    margin: 0;
    /* color: #777777; */
}


.chat-care
{
    overflow-y: scroll;
     height: 70vh;

}
.chat-container{
  height: 80vh;
  width: 79%;
  position: fixed;
  bottom: 1rem
}








.chat-care .chat-img
{
    width: 50px;
    height: 50px;
}
.chat-care .img-circle
{
    border-radius: 50%;
}
.chat-care .chat-img
{
    display: inline-block;
}
.chat-care .chat-body
{
    display: inline-block;
    max-width: 80%;
    background-color: #FFC195;
    border-radius: 12.5px;
    padding: 15px;
}
.chat-care .chat-body strong
{
  color: #0169DA;
}

.chat-care .admin
{
    text-align: right ;
    float: right;
}
.chat-care .admin p
{
    text-align: left ;
}
.chat-care .agent
{
    text-align: left ;
    float: left;
}
.chat-care .left
{
    float: left;
}
.chat-care .right
{
    float: right;
}

.clearfix {
  clear: both;
}




::-webkit-scrollbar-track
{
    box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}
textarea{  
  display: block;
  box-sizing: padding-box;
  overflow: hidden;

  padding: 10px;

  font-size: 14px;
 margin-right: 1rem;
  border-radius: 6px;
  box-shadow: 2px 2px 8px rgba(black, .3);
  border: 0;
}
.input-group-btn{
  padding: 1rem 0;
}

.chat-img  img{
  height: 2rem
}
input[type=file] {
    display: none;
}
.choose-btn {
    border-radius: 2px;
    margin: 10px;
    float: left;
    color: #188ae2 ;
    padding: 5px 10px;
    height: 2rem;
    text-align: center;
    cursor: pointer;
    font-family: arial;
    font-size: 13px;
}
.choose-btn:hover {
    background: #24c7c7;
}

 .card-footer{ 
  display: flex;
  
} 
#myForm{
  width: 90%
}


@media only screen and (max-width: 600px) {
 .card-footer{ 
  display: flex;
  -webkit-flex-wrap: wrap;
  flex-wrap: wrap;
} 
#myForm{
  width: 90%
}
.input-group-btn{
  position: absolute;
  right: 5px;
  z-index: 10;
}
.upload{
  position: absolute;
  top: 1rem;
   z-index: 10;
   


}
.upload label span{
  display: none;

}
.send{
  display: none;
}
.btn-default{
  background-color: transparent !important;
}
.chat-container{
  height: 65vh;
  width: 95%;
  position: fixed;
  bottom: -1rem
}



}


textarea::placeholder {
  color: #D8DADC !important;
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
          <br><br>
          <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card chat-container">
               
                <div class="card-body chat-care" style="overflow: auto;
  display: flex;
  flex-direction: column-reverse;">
                    <ul class="chat" id="load">






                    </ul>
                </div>

         <div class="card-footer">
              
                   

              
                  <form action="sendCommunity.php" method="POST" enctype="multipart/form-data" name="myForm" id="myForm">
                    <div class="input-group" >
                      <div class="upload" id="upload">
                      <label for="hiddenBtn" class="choose-btn btn btn-default" id="chooseBtn"><span>upload</span><i class="fa fa-cloud-upload"></i></label>
                        <input type="file" id="hiddenBtn" name= "img">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                        </div>
                          
                        <textarea rows='3' data-min-rows='3'  id=myTextArea name="text" type="text" class="form-control input-sm txt" placeholder="Type your message here..." onfocus="myFunction(this)" onblur="myFunction1()"></textarea>
                    </div>
                        </form>
                       <span class="input-group-btn">
                             <button class="btn btn-primary" onclick='check()'><span class="send">send</span>
                              <i class="fa fa-paper-plane"></i></button>
                               
                        </span>
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


  <!--The script that checks if textarea is empty-->
<script type="text/javascript"> 
function check(){ 
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); }; 
var textAreaValue=document.getElementById('myTextArea').value; 
var inputValue=document.getElementById('hiddenBtn').value;
var trimmedTextAreaValue=textAreaValue.trim(); 
if(trimmedTextAreaValue!="") { 
document.forms["myForm"].submit(); 
} else if(inputValue!="") { 
document.forms["myForm"].submit(); 
} 
} 

// The script that activates and deactivate upload if textarea on focus
function myFunction(x) {
document.getElementById('upload').style.display = "none";
}
function myFunction1() {
  document.getElementById('upload').style.display = "block";
}



</script>
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
  // Applied globally on all textareas with the "autoExpand" class

$(document)
    .one('focus.autoExpand', 'textarea.autoExpand', function(){
        var savedValue = this.value;
        this.value = '';
        this.baseScrollHeight = this.scrollHeight;
        this.value = savedValue;
    })
    .on('input.autoExpand', 'textarea.autoExpand', function(){
        var minRows = this.getAttribute('data-min-rows')|0, rows;
        this.rows = minRows;
        rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
        this.rows = minRows + rows;
    });
</script>






<script type="text/javascript">
   
   var autoload = setInterval(


function(){

$('#load').load('communityDiscussion.php?id=<?php echo $_GET['id']?>&moduleID=<?php echo $_GET['moduleID']?>').fadeIn('slow');

},500);

      
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
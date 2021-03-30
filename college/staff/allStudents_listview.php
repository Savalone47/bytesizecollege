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
  <meta name="description" content="Mazisi Msebele" />
  <meta name="author" content="Bytesize College" />
  <title>Dashboard  | All Students</title>
  <?php include 'headerLinks.php';?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

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
    .fill {
      border: none;
      outline: none;
      border-bottom: 1px dashed #555555;
    }
    .doctor-name{
      font-size: 16px;
    }



  </style>
  <style type="text/css">



@media only screen and (max-width: 600px) {
   #register_btn{
      position: absolute;
      top: -4rem;
      right: 140%;
      display: flex;

    }
}

.card-footer{
  border-top: none;
  border-bottom: 1px dotted #e5e5e5;
  background-color: #fff
}


  </style>


</head>
<!-- END HEAD -->

<script type="text/javascript">

$(document).ready(function() {
    $('#enrolledstudents_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

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

        <div class="btn-group" style="position: absolute;right:20%; top: 5rem ">
                   
                    <?php 
                     $sqlite = "SELECT * FROM `courses` ";
                      $querylite = mysqli_query($conn,$sqlite);
            


                    ?>

                   <div id="register_btn"> <button type="button" class="d-none btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-plus"></i>Register Student
                    </button>
                    <button type="button" class="d-none btn btn-default btn-xs dropdown-toggle m-r-20" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu" >
                    <?php 

                    while ($rowlite = mysqli_fetch_array($querylite)){

                    ?>
                      <li><a href="#" data-toggle="modal" data-target="#register"><?php echo $rowlite['courseName'];?></a>
                      </li>

                    <?php 
                  }

                     $sqlite2 = "SELECT * FROM `courses` ";
                      $querylite2 = mysqli_query($conn,$sqlite2);
            
                      while ($rowlite2 = mysqli_fetch_array($querylite2)){

                    ?>



                      <li><a href="register_Alevel.php"><?php echo $rowlite2['courseName'];?></a>
                      </li>
                      <?php 

                    }


                      ?>

                      
                      
                    
                    </ul>
                  </div>
                  </div>
        <br><br>
        
       <div class="tab-content">


  <!--===========enrolled students starts ===============-->
  <!-- <div class="row" id="fetchActive"> -->
  <div class="row">

  <?php 

    if($_SESSION['adminLevel'] == '1'|| $_SESSION['adminLevel'] == '2'){

      $sql = "SELECT * FROM students where activeStatus=1 order by studentID DESC";
    
      }elseif($_SESSION['adminLevel'] == '5'){ 
    
            $sql = "SELECT * FROM students
    inner join assignedCourses on assignedCourses.studentID = students.studentID
    INNER join courses on courses.coursesID = assignedCourses.courseID
    inner join department on department.departmentID = courses.courseDepartment
    
    where department.hodID = ".$_SESSION['adminID']." and  activeStatus = 1 order by students.studentID DESC";
    
      }
        $query = mysqli_query($conn,$sql);
  ?>

  <table id="enrolledstudents_table" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Passport Number</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($rowl = mysqli_fetch_array($query)){
        ?>
            <tr>
              <td><a href="studentProfile.php?id=<?php echo $rowl['studentID'];?>"><?php echo $rowl['studentNumber']?></a></td>
              <td><?php echo $rowl['studentName']?></td>
              <td><?php echo $rowl['studentLastName']?></td>
              <td><?php echo $rowl['studentEmail']?></td>
              <td><?php echo $rowl['identityNo']?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
        <tr>
                <th>Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Passport Number</th>
            </tr>
        </tfoot>
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

    $(document).ready(function() {
      $('#search').keyup(function(){
    var search = $(this).val();
    var searchText = $("#searchBar").val();
    if(search != '')
    {
      load_data(search);
    }else{
      load_data();      
    }
  });


        $("#fetchActive").load("fetchActivated.php?page=1");
        $(".page-link").click(function(){
            var id = $(this).attr("data-id");
            var select_id = $(this).parent().attr("id");
            $.ajax({
                url: "fetchActivated.php",
                type: "GET",
                data: {
                    page : id
                },
                cache: false,
                success: function(dataResult){
                    $("#fetchActive").html(dataResult);
                    $(".pageitem").removeClass("active");
                    $("#"+select_id).addClass("active");
                    
                }
            });
        });
    });

$(document).on('click', '#delete', function(){
          var id = $(this).data("id");
        
          var action = "deleteStudent";
          $("#spinner").fadeIn(500);
           var query = confirm("Are you sure you want to delete this student??");
           if (query == true) {
          $.ajax({
                type:"POST",
                url:"back/deleteStudent.php",
                data:{action:action, id:id},
                success:function(data){
                  
                  $("#spinner").fadeOut(500);
                  if(data = 200){ 
                    alert("Student successfuly deleted"); 
                    
                  } else {

                    alert("Error in deleting student");

                  }


                  
                }
              });
        }
        });




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
    //  close_callback && close_callback();
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

<script type="text/javascript">
  
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

</script>

</body>




</html>
<?php
session_start();
include "../action.php";

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <style type="text/css">
    .page {
  display: none;
}
.page-active {
  display: block;
}
/*end css for pagination*/
body {
  font-family: 'Lato', sans-serif;
  font-weight: 300;
  margin: 2rem;
  background-color: #B0BEC5;
}

h1, h2, h3, h4, h5, h6 {
 font-family: 'Prata', serif;
}
.jumbotron {background-image: linear-gradient(-225deg, #B7F8DB 0%, #50A7C2 100%);
}
  /*Example of custom colors for pagination*/
.page-link {
    color: #000000;
    background-color: #80DEEA;
    border: 1px solid #84FFFF;
}
.page-item.disabled .page-link {
    color: #6c757d;
    background-color: #84FFFF;
    border-color: #dee2e6;
}
.page-item.active .page-link {
    color: #fff;
    background-color: #00B8D4;
    border-color: #00ACC1;
}
.page-link:hover {
    color: #0056b3;
    background-color: #e9ecef;
    border-color: #dee2e6;
}
.page-link:focus {
    box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
}
.prev .page-link {
    background-color: #80DEEA;
}
.first .page-link {
    background-color: #80DEEA;
}
.next .page-link {
    background-color: #80DEEA;
}
.last .page-link {
    background-color: #80DEEA;
}
  

  



  </style>
</head>
<body>
<div class="container">

   <?php 

             if (isset($_GET['page_no']) && $_GET['page_no']!=""){
                            $page_no = $_GET['page_no'];
                          } else {
                            $page_no = 1;
                          }


                          $total_records_per_page = 12;
                          $offset = ($page_no-1) * $total_records_per_page;
                          $previous_page = $page_no - 1;
                          $next_page = $page_no + 1;
                          $adjacents = "2";

$result_count;

if($_SESSION['adminLevel'] == '1' || $_SESSION['adminLevel'] == '2'){

$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `students` where activeStatus=0 order by studentID DESC ");


}elseif($_SESSION['adminLevel'] == '5'){


$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `students` 
  inner join assignedCourses on assignedCourses.studentID = students.studentID
INNER join courses on courses.coursesID = assignedCourses.courseID
inner join department on department.departmentID = courses.courseDepartment

where department.hodID = ".$_SESSION['adminID']."
and activeStatus=0 ");

}

  
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1;

  $sql;

if($_SESSION['adminLevel'] == '1'|| $_SESSION['adminLevel'] == '2'){

            $sql = "SELECT * FROM students where activeStatus=0 order by studentID DESC ";

  }elseif($_SESSION['adminLevel'] == '5'){ 

       $sql = "SELECT * FROM students
inner join assignedCourses on assignedCourses.studentID = students.studentID
INNER join courses on courses.coursesID = assignedCourses.courseID
inner join department on department.departmentID = courses.courseDepartment

where department.hodID = ".$_SESSION['adminID']."

and  activeStatus = 0 order by students.studentID DESC limit ".$offset.", ".$total_records_per_page."";

  }
           $query = mysqli_query($conn,$sql);
            $id = 1;

            while ($row = mysqli_fetch_array($query)){
             

              ?>
  <div class="jumbotron page" id="page<?php echo $id?>">
    <div class="container">
      <h1 class="display-4"><?php echo $row['studentName']?></h1><br>
      <p class="lead">In this article we teach you how to add pagination, an excellent way to navigate large amounts of content, to your website using a jQuery Bootstrap Plugin.</p><br>
      <p><a class="btn btn-lg btn-success" href="#" role="button">Learn More</a></p>
    </div>
  </div>

<?php
 $id++;
 }?>




<nav aria-label="Page navigation example">
  <ul id="pagination-demo" class="pagination justify-content-center">
  </ul>
</nav>
</div>









<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script type="text/javascript">

   var items  = $(".container .jumbotron");
        alert("Number of paragraphs in content div = " + items.length);


  $('#pagination-demo').twbsPagination({
   totalPages: items.length,
   startPage: 1,
   visiblePages: items.length,
   initiateStartPageClick: true,
    hideOnlyOnePage: false,
    href: false,
    pageVariable: '{{page}}',
    totalPagesVariable: '{{total_pages}}',
    page: null,
    first: 'First',
    prev: 'Previous',
    next: 'Next',
    last: 'Last',
    loop: false,
    beforePageClick: null,
    onPageClick: function (event, page) {
    $('.page-active').removeClass('page-active');
    $('#page'+page).addClass('page-active');
  },
    paginationClass: 'pagination',
    nextClass: 'page-item next',
    prevClass: 'page-item prev',
    lastClass: 'page-item last',
    firstClass: 'page-item first',
    pageClass: 'page-item',
    activeClass: 'active',
    disabledClass: 'disabled',
    anchorClass: 'page-link'  
});






 



</script>
</body>
</html>
<?php

include "../../action.php";

//$response = [];
$response['data'] = [];
if ($_GET['action'] == 'intake') {
    $courseIt = $_GET['courseIt'];
    $course = $_GET['course'];

    $part = ($courseIt === '*') ? "" : "courses.courseIntake = '$courseIt' AND";

    $sql = "SELECT studentNumber, studentLastName, studentName, identityNo, studentEmail, gender FROM students 
    INNER JOIN assignedCourses ON assignedCourses.studentID = students.studentID 
    INNER JOIN courses ON courses.coursesID = assignedCourses.courseID 
    INNER JOIN department ON department.departmentID = courses.courseDepartment
    WHERE $part courses.courseCode = $course";

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
        $i = "";
        while ($row = mysqli_fetch_array($result)) {
            $response['data'][] = $row;
        }
    }
    echo json_encode($response);

} elseif ($_GET['action'] == 'fetchAll') {
    $sql = "SELECT studentNumber, studentLastName, studentName, studentTimestamp, studentEmail, gender FROM students 
    INNER JOIN assignedCourses ON assignedCourses.studentID = students.studentID 
    INNER JOIN courses ON courses.coursesID = assignedCourses.courseID 
    INNER JOIN department ON department.departmentID = courses.courseDepartment
    ";

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    if ($queryResult > 0) {
        $i = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $response['data'][] = $row;
        }
    }
    echo json_encode($response);

} elseif ($_GET['action'] == 'courseIntake') {
    $sqlite = "SELECT * FROM students Inner join assignedCourses on assignedCourses.studentID = students.studentID inner join courses on courses.coursesID = assignedCourses.courseID INNER join department on department.departmentID = courses.courseDepartment group by courses.courseIntake";

    $result = mysqli_query($conn, $sqlite);


    if ($country !== 'Select') {
        ?>
        <br>

        <select class='intakeFilter form-control'>
            <option>Select Intake</option>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php
                echo $row['courseIntake'] ?>"><?php
                    echo $row['courseIntake'] ?></option>
            <?php
            } ?>
        </select>
    <?php
    }
}

//header('Content-Type: application/json');



/*<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables/export/buttons.flash.min.js"></script>
<script src="../assets/plugins/datatables/export/jszip.min.js"></script>
<script src="../assets/plugins/datatables/export/pdfmake.min.js"></script>
<script src="../assets/plugins/datatables/export/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables/export/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables/export/buttons.print.min.js"></script>
<script src="../assets/js/pages/table/table_data.js"></script>*/

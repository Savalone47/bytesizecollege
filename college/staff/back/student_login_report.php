<?php
include "../../action.php";


if ($_POST['action'] == "fetchAll") {

    $sql = "SELECT * FROM students INNER JOIN assignedCourses ON assignedCourses.studentID = students.studentID INNER JOIN courses ON courses.coursesID = assignedCourses.courseID INNER JOIN department ON department.departmentID = courses.courseDepartment";

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    if ($queryResult > 0) {
        $i = "";
        while ($row = mysqli_fetch_array($result)) {
            $sql = "SELECT * FROM userlog WHERE userID = " . $row['studentID'] . " AND (loginTime > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 6 month)";
            $sqlite = mysqli_query($conn, $sql);
            $log = mysqli_fetch_array($sqlite);

            $count = mysqli_num_rows($sqlite);
            if ($count > 0):
                ?>

                <tr class="gradeX odd">

                    <td style="width: 20%;"><?= $row['studentName'] ?>&nbsp;<?= $row['studentLastName'] ?></td>
                    <td><?= $row['departmentName'] ?></td>
                    <td><?= $row['courseIntake'] ?></td>
                    <td><?php echo $count ?></td>
                    <td><a data-toggle="modal" data-target=".bs-example-modal-new" href="#"
                           data-id="<?php echo $row['studentID']; ?>" class="showLogin btn btn-primary btn-xs"><i
                                    class="fa fa-eye"></i>


                        </a>
                    </td>

                </tr>

            <?php endif;
        }

    } else {
        echo " <h5>There are no students in the database right now.</h5>";
    } ?>
    <link href="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="../assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/datatables/export/buttons.flash.min.js"></script>
    <script src="../assets/plugins/datatables/export/jszip.min.js"></script>
    <script src="../assets/plugins/datatables/export/pdfmake.min.js"></script>
    <script src="../assets/plugins/datatables/export/vfs_fonts.js"></script>
    <script src="../assets/plugins/datatables/export/buttons.html5.min.js"></script>
    <script src="../assets/plugins/datatables/export/buttons.print.min.js"></script>
    <script src="../assets/js/pages/table/table_data.js"></script>

    <?php

}


if (secure($_POST['action']) == "fetchModalData") {


    $sql = "SELECT * FROM students WHERE studentID=" . htmlspecialchars($_POST['userID']) . " ";

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    if ($queryResult > 0) {
        while ($row = mysqli_fetch_array($result)) {
            ?>


            <?php

            $sqlme = "SELECT * FROM userlog WHERE userID= '" . $row['studentID'] . "' ";
            $resultt = mysqli_query($conn, $sqlme);
            if (mysqli_num_rows($resultt) > 0) {
                while ($fetchLogs = mysqli_fetch_array($resultt)) { ?>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric"><?= date('d-m-Y', strtotime($fetchLogs['loginTime'])) ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?= date('H:m:s', strtotime($fetchLogs['loginTime'])) ?></td>

                    </tr>
                <?php }
                echo "<input type='hidden' value='" . $row['studentID'] . "' id='myInput'>";
            } else {
                echo "<h6>No Infomation available at the moment.</h6>";

            }
        }


    }
}


if (secure($_POST['action']) == 'timeFilter') {

    if (secure($_POST['val']) == 'month') {

        $sqlme = "SELECT * FROM userlog WHERE userID= '" . $_POST['id'] . "' AND loginTime > DATE_SUB(NOW(), INTERVAL 1 MONTH) ";
    } elseif (secure($_POST['val']) == 'week') {

        $sqlme = "SELECT * FROM userlog WHERE userID= '" . $_POST['id'] . "' AND loginTime between date_sub(now(),INTERVAL 1 WEEK) and now()";

    } elseif (secure($_POST['val']) == 'today') {

        $sqlme = "SELECT * FROM userlog WHERE userID= '" . $_POST['id'] . "' AND DATE_FORMAT(loginTime,'%m/%d/%Y') = DATE_FORMAT( now(),'%m/%d/%Y') ";

    } elseif (secure($_POST['val']) == "eversince") {

        $sqlme = "SELECT * FROM userlog WHERE userID= '" . $_POST['id'] . "' ";

    } else {
        $sqlme = "SELECT * FROM userlog WHERE userID= '" . $_POST['id'] . "' ";
    }


    $resultt = mysqli_query($conn, $sqlme);

    while ($fetchLogs = mysqli_fetch_array($resultt)) { ?>
        <tr>
            <td class="mdl-data-table__cell--non-numeric"><?= date('d-m-Y', strtotime($fetchLogs['loginTime'])) ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?= date('H:m:s', strtotime($fetchLogs['loginTime'])) ?></td>

        </tr>
    <?php }
    echo "<input type='hidden' value='" . $_POST['id'] . "' id='myInput'>";


}

?>

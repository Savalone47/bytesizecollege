<?php
include "../../action.php";


if ($_POST['action'] == "fetchAll") {

    $sql = "SELECT * FROM management INNER JOIN staffFunction ON management.managementLevel = staffFunction.id";


    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    if ($queryResult > 0) {
        $i = "";
        while ($row = mysqli_fetch_array($result)) {
            $sql = "SELECT * FROM userlog WHERE userID = " . $row['managementID'] ." AND (loginTime > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 6 month)";

//            var_dump($sql);die;
            $sqlite = mysqli_query($conn, $sql);
            $log = mysqli_fetch_array($sqlite);
            $count = mysqli_num_rows($sqlite);
            if ($count > 0):
            ?>

            <tr class="gradeX odd">

                <td style="width: 20%;"><?= $row['managementName'] ?>&nbsp;<?= $row['lastName'] ?></td>
                <td><?= $row['staffFunction'] ?></td>
                <td><?= $row['managementEmail'] ?></td>
                <td><?php echo $count; ?></td>
                <td><a data-toggle="modal" data-target=".bs-example-modal-new" href="#"
                       data-id="<?= $log['userID'] ?? 'null' ?>" class="showLogin btn btn-primary btn-xs"><i
                                class="fa fa-eye"></i>


                    </a>
                </td>

            </tr>

        <?php endif; }
        ?>
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
    } else {
        echo " <h5>There are no students in the database right now.</h5>";
    }

}


if (secure($_POST['action']) == "fetchModalData") {


    $sql = "SELECT * FROM management WHERE managementID=" . htmlspecialchars($_POST['userID']) . " ";

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    if ($queryResult > 0) {
        while ($row = mysqli_fetch_array($result)) {
            ?>


            <?php

            $sqlme = "SELECT * FROM userlog WHERE userID= '" . $row['managementID'] . "' ";
            $resultt = mysqli_query($conn, $sqlme);

            while ($fetchLogs = mysqli_fetch_array($resultt)) { ?>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric"><?= date('d-m-Y', strtotime($fetchLogs['loginTime'])) ?></td>
                    <td class="mdl-data-table__cell--non-numeric"><?= date('H:m:s', strtotime($fetchLogs['loginTime'])) ?></td>

                </tr>
            <?php }
            echo "<input type='hidden' value='" . $row['managementID'] . "' id='myInput'>";
            ?>


        <?php }
    } else {
        echo "<h6>No Infomation available at the moment.</h6>";

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
    echo "<input type='hidden' value='" . $_POST['id'] . "' id='myInput'> ";


}

?>

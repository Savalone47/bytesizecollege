<?php
include "../../action.php";


if ($_POST['action'] == "fetchAll") {

    $sql = "SELECT * FROM students";


    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    if ($queryResult > 0) {
        $i = "";
        while ($row = mysqli_fetch_array($result)) {
            ?>

            <tr class="gradeX odd">

                <td style="width: 20%;"><?= $row['studentName'] ?></td>
                <td><?= $row['studentLastName'] ?></td>
                <td><?= $row['identityNo'] ?></td>
                <td><?= $row['studentEmail'] ?></td>
                <td><?= $row['studentNumber'] ?></td>
                <td><?= $row['gender'] ?></td>

            </tr>

        <?php }

    } else {
        echo " <h5>There are no students in the database right now.</h5>";
    }

}


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

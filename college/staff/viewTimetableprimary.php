<?php

session_start();
include '../action.php';
include "../../college/util/connectDB.php";

$sql = "";

//var_dump($_SESSION);
//var_dump($_POST);die;

if ($_POST['classID'] !== '0') {
    $sql = "SELECT DISTINCT (lessonStart) as time from lessons WHERE grade IN (SELECT courses.coursesID FROM courses where courses.coursesID = '" . $_POST['classID'] . "')  order by lessonStart";
} elseif ($_POST['classID'] === '0') {
    if ($_SESSION['adminLevel'] === '1' || $_SESSION['adminLevel'] === '2' || $_SESSION['adminLevel'] === '5' || $_SESSION['adminLevel'] === '4' || $_SESSION['adminLevel'] === '3') {
        $sql = "SELECT DISTINCT (lessonStart) as time from lessons WHERE grade IN (SELECT courses.coursesID FROM courses Inner join modules on modules.moduleCourseID = courses.coursesID Inner join lectureAssigns on lectureAssigns.moduleID = modules.moduleID ) order by lessonStart";
    } else {
        $sql = "SELECT DISTINCT (lessonStart) as time from lessons WHERE grade IN (SELECT courses.coursesID FROM courses Inner join modules on modules.moduleCourseID = courses.coursesID Inner join lectureAssigns on lectureAssigns.moduleID = modules.moduleID where lectureAssigns.lectureID = '" . $_SESSION['adminID'] . "') order by lessonStart";
    }
}

//var_dump($sql);die;

$rest = mysqli_query($conn, $sql);


while ($t = mysqli_fetch_array($rest)) {
    $sql1 = "select * from lessons inner join lecturerRoom on lecturerRoom.ID = lessons.lecturerRoomID inner join modules on modules.moduleID = lessons.subjectID where   lessonStart = '{$t['time']}'";
//    print_r($sql);exit;
//    var_dump($sql1);die;
    $res = mysqli_query($conn, $sql1);
    ?>

    <tr>

        <td><?php
            echo substr($t['time'], 0, 5); ?></td>
        <?php
        $week_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $classes = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $classes[date('l', strtotime($row['weekDay']))] = $row;
        }
        foreach ($week_days as $day) {
            ?>
            <?php
            if (array_key_exists($day, $classes)) {
                $row = $classes[$day]; ?>
                <td>
                    <p class="name"><?= $row['moduleName']; ?></p>
                    <p class="grade text-primary"><?= $row['name']; ?></p>


                    <?php
                    echo $row['moduleName']; ?>
                    <form action="../live/api/create-token/index.php" method="POST">

                        <input type="hidden" name="nameText" value="<?php
                        echo $_SESSION['adminName'] ?>">
                        <input type="hidden" name="meetingID" value="<?php
                        echo $row['roomID'] ?>">
                        <input type="hidden" name="roomPin" value="<?php
                        echo $row['adminPin']; ?>">
                        <?php


                        if ($row['moduleName']){ ?>
                        <button class="btn btn-success btn-xs">Join</button>

                    </form>
                <?php
                if ($_SESSION['adminLevel'] === '1' || $_SESSION['adminLevel'] === '2' || $_SESSION['adminLevel'] === '5') { ?>
                    <a onclick="return confirm('Are you sure you want to delete this?')" class="pull-right"
                       href="back/deleteTimetable.php?id=<?php
                       echo $row['lessonID']; ?>">
                        <button class=" btn-xs" style="border: none;"><i class="fa fa-trash " style="color:red;"></i>
                        </button>
                    </a>
                    <?php
                }
                } ?>
                </td>
                <!-- end -->
                <?php
            } else { ?>
                <td></td>


                <?php
            }
        }
        ?>
    </tr>
    <?php
}

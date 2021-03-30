<?php
include 'util/nav.php';
include 'college/action.php';

if ($_SESSION['departmentID'] != "") {
    ?>

    <style type="text/css">
        .fa-li i {
            color: rgb(255, 165, 0);
        }

        .course-details__curriculum-list li {
            padding-top: 12.5px;
            padding-bottom: 12.5px;
            border-bottom: 1px solid #f1f1f1;
        }

        .border-bottom {
            border: none;
            border-bottom: 1px dashed grey !important;
        }

        *:focus {
            outline: none;
        }

        .font-12 {
            font-size: 12px;
        }


        @media (max-width: 1199px) {
            .header-navigation .container .menu-toggler {
                float: right;
                margin: 28px 0;
                color: #81868a;
                margin-left: 0px;
                position: relative;
                top: 5px;
                right: 0;
            }

        }
    </style>
    <section class="course-details">
        <noscript>
            <div id="noscript-content">
                <style type="text/css">
                    .content {
                        display: none;
                        visibility: hidden;
                    }
                </style>
                <h2>Javascript seems to be disabled or blocked</h2>
                <p>Unfortunately, Javascript is required in order for the Postman Dashboard to be rendered. Please:</p>
                <ul>
                    <li>Enable Javascript if you have disabled it</li>
                    <li>Disable any plugins or extensions which may be blocking Javascript execution</li>
                    <li>Switch to a browser which supports Javascript</li>
                    <li>Upgrade your browser to the latest version</li>
                </ul>
            </div>
        </noscript>
        <div class="container">
            <?php
            $sql = "SELECT * From courses where coursesID = " . base64_decode(urldecode($_GET['token']));
            $results = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($results);

            ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-details__content">
                        <div class="course-one__image">
                            <img src="assets/images/<?= $row['courseCode']; ?>.jpg" alt="">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="course-details__content">
                            <ul class="course-details__tab-navs list-unstyled nav nav-tabs" role="tablist"
                                style="display: flex !important;">
                                <li><a class="active" role="tab" data-toggle="tab" href="#description"
                                       aria-selected="false">Description</a></li>
                                <li><a class="" role="tab" data-toggle="tab" href="#overview" aria-selected="false">Modules</a>
                                </li>
                                <li><a class="" role="tab" data-toggle="tab" href="#curriculum" aria-selected="false">Prerequisite</a>
                                </li>
                            </ul>
                            <div class="tab-content course-details__tab-content ">


                                <div class="tab-pane active  animated fadeInUp" role="tabpanel" id="description">
                                    <h3><?= $row['courseName']; ?> Course Description</h3>
                                    <div>
                                        <?php echo $row['courseOverview']; ?>
                                    </div>
                                    <br>

                                    <br>

                                </div>


                                <div class="tab-pane   animated fadeInUp" role="tabpanel" id="overview">
                                    <h3 class="course-details__tab-title"><?= $row['courseName']; ?></h3>
                                    <br>
                                    <p class="course-details__tab-title" style="color:orange;">Modules</p>
                                    <br>
                                    <ul class="course-details__curriculum-list list-unstyled">
                                        <?php
                                        $modules = "SELECT * From modules where moduleCourseID = " . base64_decode(urldecode($_GET['token']));
                                        $module = mysqli_query($conn, $modules);
                                        while ($mod = mysqli_fetch_array($module)): ?>
                                            <li>
                                                <span class="fa-li"><i class="fas fa-square"></i></span>
                                                <div class="course-details__curriculum-list-left">
                                                    <a><?= $mod['moduleName']; ?></a>
                                                </div>
                                            </li>
                                        <?php
                                        endwhile;

                                        ?>
                                    </ul>
                                    <!-- /.course-details__tab-text -->
                                    <br>
                                    <div class="course-details__price" style="background-color: transparent;">
                                        <button type="button" class="btn btn-success btn-sm update" data-toggle="modal"
                                                data-keyboard="false" data-backdrop="static" data-target="#register"
                                                data-id="<?= $_GET['token']; ?>"
                                                data-code="<?= $row['courseCode']; ?>"
                                                data-name="<?= $row['courseName']; ?>"
                                        >Register for this course
                                        </button>
                                    </div>
                                </div>
                                <div class="tab-pane  animated fadeInUp" role="tabpanel" id="curriculum">
                                    <?php
                                    $mod = "SELECT * From courses INNER JOIN modules ON modules.moduleCourseID = courses.coursesID where modules.moduleCourseID = " . base64_decode(urldecode($_GET['token']));
                                    $mmm = mysqli_query($conn, $mod);
                                    $rom = mysqli_fetch_array($mmm);
                                    if ($rom['courseCode'] == 1002 || $rom['courseCode'] == 1005 || $rom['courseCode'] == 1008) { ?>
                                        <div class="row mt-3">
                                            <div class="col-lg-12 col-md-12">
                                                <h4>Entry Requirements:</h4>
                                            </div>
                                            <!-- Buttons Styles -->
                                            <div class="col-lg-12 col-md-12">
                                                <ul class="lists lists-1">
                                                    <li>1. Botswana General Certificate for Secondary Education (BGCSE),
                                                        NCQF level 4, or equivalent qualification.
                                                    </li>
                                                    <li>2. Certificate III, NCQF level 3, with two years’ work
                                                        experiences in related field
                                                    </li>
                                                </ul>
                                                <h4>Access and Inclusion</h4>
                                                <p>The qualification is accessible to anyone who is interested to pursue
                                                    their career in the above mentioned fields of study. The admissions
                                                    process will be open and transparent to all applicants. All learners
                                                    are treated equally and fairly irrespective of their disability,
                                                    age, gender, ethnic background, religious or philosophical belief,
                                                    age, marital or parental status or socio-economic class to gain
                                                    admission.</p>
                                            </div>
                                        </div>
                                    <?php } elseif ($rom['courseCode'] == 1003) { ?>
                                        <div class="row mt-3">
                                            <div class="col-lg-12 col-md-12">
                                                <p>To be admitted into Certificate in Early Childhood Education, the
                                                    following entry requirements are developed:</p>
                                                <h4>Entry Requirements:</h4>
                                            </div>
                                            <!-- Buttons Styles -->
                                            <div class="col-lg-12 col-md-12">
                                                <ul class="lists lists-1">
                                                    <li>1. NCQF Level 4, Certificate IV, or equivalent, with a Credit in
                                                        at least 3 subjects including English Language.
                                                    </li>
                                                    <li>2. Junior Certificate school leavers who are currently teaching
                                                        in pre-schools to be admissible to the qualification through
                                                        RPL.
                                                    </li>
                                                    <li>3. Experience in Pre-school teaching and early childhood care
                                                        will be an added advantage.
                                                    </li>
                                                </ul>
                                                <h4>Access and Inclusion</h4>
                                                <p>The program is accessible to anyone interested to pursue their career
                                                    in the field of early childhood education. The admissions process
                                                    will be open and transparent for all applicants. All learners are
                                                    treated equally and fairly irrespective of their disability, age,
                                                    gender, ethnic background, religious or philosophical belief, age,
                                                    marital or parental status, or socio-economic class to gain
                                                    admission.</p>
                                            </div>
                                        </div>
                                    <?php } elseif ($rom['courseCode'] == 1000 || $rom['courseCode'] == 1001) { ?>
                                        <p>No prior qualification needed. </p>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="course-details__price">
                        <button type="button" class="btn btn-success btn-sm update" data-toggle="modal"
                                data-keyboard="false" data-backdrop="static" data-target="#register"
                                data-id="<?= $_GET['token']; ?>"
                                data-code="<?= $row['courseCode']; ?>"
                                data-name="<?= $row['courseName']; ?>"
                        >Register for this course
                        </button>
                    </div>
                    <div class="course-details__meta">
                        <a class="course-details__meta-link">
               <span class="course-details__meta-icon">
               <i class="far fa-clock"></i>
               </span>
                            Durations: <span><?= $row['courseDuration'] . " " . $row['courseTimeline']; ?></span>
                        </a>
                        <a class="course-details__meta-link">
               <span class="course-details__meta-icon">
               <i class="far fa-user-circle"></i>
               </span>
                            <div class="row">
                                <p class="col-12"> Intake(s): </p>
                                <?php
                                $intakes = mysqli_query($conn, "SELECT DISTINCT `courseIntake` FROM `courses` WHERE courseCode = " . $row['courseCode'] . "");

                                while ($intake = mysqli_fetch_array($intakes)) {

                                    ?>
                                    <p class="col-4"><?= $intake['courseIntake']; ?></p>
                                <?php } ?>
                            </div>
                        </a>
                        <a class="course-details__meta-link">
               <span class="course-details__meta-icon">
               <i class="far fa-flag"></i>
               </span>
                            Level: <span><?= $row['courseLevel']; ?></span>
                        </a>
                        <a class="course-details__meta-link">
               <span class="course-details__meta-icon">
               <i class="far fa-bell"></i>
               </span>
                            Language: <span>English</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include "util/footer.php" ?>
    </div><!-- /.page-wrapper -->
    <script>
        $(document).ready(function () {

            $(function () {
                $('#register').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); /*Button that triggered the modal*/
                    var id = button.data('id');
                    var name = button.data('name');
                    var code = button.data('code');

                    var modal = $(this);
                    modal.find('#name_modal').val(name);
                    modal.find('#name_course').val(name);
                    modal.find('#code_modal').val(code);
                    modal.find('#id_modal').val(id);
                });
            });


            $(document).on('submit', '.submitForm', function (e) {
                e.preventDefault();
                var action = "register";

                $.ajax({
                    type: "POST",
                    url: "studentRegister.php",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {

                        //alert(data);

                        if (data == 200) {

                            Swal.fire({
                                title: 'Success!',
                                text: 'Congratulations your application has been received an email has been sent to confirm the receiving of your application',
                                icon: 'success',
                                confirmButtonText: 'Cool'
                            })

                        } else if (data == 202) {

                            Swal.fire({
                                title: 'Error!',
                                text: 'Your email address already being used please use another!',
                                icon: 'error',
                                confirmButtonText: 'Cool'
                            })

                        } else if (data == 1) {
                            $('#error').html("Sorry, your file is too large.");
                        } else if (data == 2) {
                            $('#error').html("Sorry, only pdf files are allowed.");
                        } else if (data == 3) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Please make sure you have choosen a course and Department',
                                icon: 'error',
                                confirmButtonText: 'Cool'
                            })

                        }
                        location.reload();
                    }
                });
            });


        });

    </script>
    <!-- Modal -->
    <div class="modal fade " id="register" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog bd-example-modal-lg" role="document">
            <div class="modal-content ">
                <div class="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: red;position: relative;z-index: 9999">&times;</span>
                    </button>
                </div>
                <form class="submitForm" role="form" enctype="multipart/form-data">
                    <div class="modal-body" style="padding: 1rem 2rem;">
                        <center>
                            <h4 class="modal-title" id="modalLabel" style="font-weight: 700;">Student Details</h4>
                        </center>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Course Name</label>
                                        <input type="text" class="form-control" id="name_modal" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <p>Intake <span style="font-size: 10px;">(please tick)</span></p>
                                        <div class="col-sm-12">
                                            <label class="checkbox-inline">
                                                <input type="radio" name="intake" value="Jan" required>January
                                            </label>&nbsp;&nbsp;
                                            <label class="checkbox-inline">
                                                <input type="radio" name="intake" value="Mar">March
                                            </label>&nbsp;&nbsp;
                                            <label class="checkbox-inline">
                                                <input type="radio" name="intake" value="Jun">June
                                            </label>&nbsp;&nbsp;
                                            <label class="checkbox-inline">
                                                <input type="radio" name="intake" value="Sep">September
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <p>Course Delivery <span style="font-size: 10px;">(please tick)</span></p>
                                        <?php if ($row['courseDepartment'] != 32): ?>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="delivery" value="Fulltime" required>Fulltime
                                            </label>&nbsp;&nbsp;
                                            <label class="checkbox-inline">
                                                <input type="radio" name="delivery" value="Parttime">Parttime
                                            </label>&nbsp;&nbsp;
                                            <label class="checkbox-inline">
                                                <input type="radio" name="delivery" value="Distance">Distance
                                            </label>&nbsp;&nbsp;
                                        <?php else: ?>

                                            <label class="checkbox-inline">
                                                <input type="radio" name="delivery" value="Fulltime" required>Online
                                            </label>&nbsp;&nbsp;

                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-12">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="code_modal" class="form-control" name="code" required>
                            <input type="hidden" id="id_modal" class="form-control" name="id_modal" required>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="firstName" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="lastName" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Personal Email</label>
                                        <input type="email" class="form-control" name="email" required
                                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>ID Number</label>
                                    <input type="text" class="form-control" name="idNumber" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control" name="dateOfBirth" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Home Cell No</label>
                                        <input type="text" class="form-control" name="homePhoneNumber" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Cell No</label>
                                        <input type="text" class="form-control" name="cellPhoneNumber" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Omang/Passport No:</label>
                                        <input type="text" class="form-control" name="PassportNo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Nationality:</label>
                                        <?php include 'country.php'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Residential Address</label>
                                        <input type="text" class="form-control" name="address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label><strong>Upload Documents</strong></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>ID/Passport</label>
                                        <input type="file" name="passport" required accept=".pdf">
                                        <input type="hidden" name="passport">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Certificate</label>
                                        <input type="file" name="certificate" accept=".pdf">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Proof of Payment</label>
                                        <input type="file" class="form-control" name="proofOfPayment" accept=".pdf">
                                    </div>
                                    <span class="text-danger" id="error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label><strong>PREVIOUS INSTITUTION RECORD </strong></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>School Name</label>
                                        <input type="text" class="form-control" name="schoolName" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Qualification Obtained</label>
                                        <input type="text" class="form-control" name="qualification" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Year</label>
                                        <input type="text" class="form-control" name="year" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label><strong>SPONSORS/NEXT OF KIN DETAILS (A PERSON TO BE CONTACTED IN CASE OF
                                                EMERGENCY)</strong></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" name="kinName" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Relationship:</label>
                                        <input type="text" class="form-control" name="relationship" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Home/Work Phone:</label>
                                        <input type="text" class="form-control" name="kinPhone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Cell No:</label>
                                        <input type="text" class="form-control" name="kinCellPhone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Residential Address:</label>
                                        <input type="text" class="form-control" name="kinAddress" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                     <span class="font-12"><b>Disability:</b>
                     <span class="font-12">&nbsp;&nbsp;Do you consider yourself to have a disability, impairment or long-term condition?<span
                                 style="font-size: 10px;">(Please tick)</span> &nbsp; &nbsp;<label
                                 class="checkbox-inline">yes
                     <input type="radio" value="1" name="check" onclick="yesnoCheck();" id="yesCheck">
                     </label>
                     <label class="checkbox-inline">No
                     <input type="radio" value="0" name="check" onclick="yesnoCheck();" id="noCheck">
                     </label></span>
                     <div id="no" style="display: none;">
                        <p>You indicated the presence of a disability, impairment or long-term condition, please select the area( s) in the following list: (You may indicate more than one area):</p>
                        <label class="checkbox-inline">Hearing/deaf&nbsp;
                        <input type="checkbox" value="1" name="condition">
                        </label>
                        <label class="checkbox-inline">Physical &nbsp;
                        <input type="checkbox" value="1" name="condition1">
                        </label>
                        <label class="checkbox-inline">Intellectual &nbsp;
                        <input type="checkbox" value="1" name="condition2">
                        </label><br>
                        <label class="checkbox-inline">L e a r n i n g &nbsp;
                        <input type="checkbox" value="1" name="condition3">
                        </label>
                        <label class="checkbox-inline">&nbsp;Mental illness
                        <input type="checkbox" value="1" name="condition4">
                        </label>
                        <label class="checkbox-inline">&nbsp;Vision
                        <input type="checkbox" value="1" name="condition5">
                        </label>
                        <label class="checkbox-inline">&nbsp;Medical Condition
                        <input type="checkbox" value="1" name="condition6">
                        </label>
                        <label class="checkbox-inline"><b>Other</b>
                        <textarea type="text" class="border-bottom" name="other"></textarea>
                        </label>
                        <hr>
                     </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span class="font-12">I,</span> <input type="text" name="signature"
                                                                       class="border-bottom"><span class="font-12">do bind myself in payment for</span>
                                <span><input type="text" name="program" id="name_course" class="border-bottom" readonly></span><span
                                        class="font-12">Tuition and examination fees at this institution. I also agree that I have read and understood the contents of the above policies.
                     I further do bind myself to pay the said fees by the said deadlines. I therefore agree that I will comply with the information
                     contained in this application form. By Signing this document, I further commit myself to pay all the full amount of school fees
                     even if I miss classes or withdraw from school before finishing the course and failure to do so will result in legal action and I
                     will be liable for all legal costs.</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="checkbox-inline">&nbsp; I Agree
                                    <input type="checkbox" id="agree" value="1" checked>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" id="register" class="btn btn-info" value="Submit">
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
<?php } else {
    echo "<script>window.location = 'index.php';</script>";

} ?>
<script type="text/javascript">
    $('#agree').click(function () {

        if ($(this).is(':checked')) {

            $("input[type='submit']").prop("disabled", false);
        } else {

            $("input[type='submit']").prop("disabled", true);
            $("#register").attr('title', 'Please tick agree box above');
        }
    });

    function yesnoCheck() {
        if (document.getElementById('noCheck').checked) {
            document.getElementById('no').style.display = 'none';
        } else document.getElementById('no').style.display = 'block';

    }


    var uploadField = document.getElementById("file");

    uploadField.onchange = function () {
        if (this.files[0].size > 3000000) {//max file

            Swal.fire({
                title: 'Error!',
                text: 'File is too big',
                icon: 'error',
                confirmButtonText: 'Cool'
            })
            this.value = "";
        }
    }


</script>

</body>
</html>

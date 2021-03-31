<?php
include "../action.php";
session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      <meta name="description" content="vinco" />
      <meta name="author" content="vinco" />
      <title>Vinco</title>
      <?php include 'headerLinks.php';?>
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
      <link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
      <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      <link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
      <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
         type="text/css" />
      <link rel="stylesheet" href="assets/plugins/material/material.min.css">
      <link rel="stylesheet" href="assets/css/material_style.css">
      <link href="assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
      <link href="assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
      <!-- favicon -->
      <link rel="shortcut icon" href="assets/img/favicon.ico" />
      <style type="text/css">
       
         .buttons-pdf{
         display: none !important;
         }
        

          th{
            pointer-events:none;
          }
          .table.table-bordered.dataTable tbody td {
                
                word-break: break-all;
                white-space: pre-wrap;
            }

      </style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
   </head>
   <!-- END HEAD -->
   <body
      class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
      <div class="page-wrapper">
         <?php include 'nav.php'?>
         <div class="page-container">
            <!-- start sidebar menu -->
            <?php include'sidebar.php';?>
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">
               <div class="page-content">
                  <div class="row">
                     <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="card-box">
                           <div class="card-head">
                              <br><br><br>
                              <header>Department List</header>
                           </div>
                           <div class="card-body ">
                              <div class="row">
                                 <div class="col-md-6 col-sm-6 col-6">
                                    <div class="btn-group">
                                       <a class="btn btn-info"  data-toggle="modal" data-target="#pie">
                                       Bar Charts &nbsp;<i class="fa fa-bar-chart" aria-hidden="true"></i>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="table-scrollable "  id="bar-parent">
                                 <table class="display nowrap table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="exportTable">
                                    <div class="row ">
                                       <div class="col-md-4 text-center">
                                          <div class="form-group">
                                             <div class="col-sm-12">
                                                <br>
                                                <select class="form-control filter" name="filter" id="filter">
                                                   <option value="All">All Students</option>
                                                   <option value="perBranch">Per branch</option>
                                                   <option value="perCourse">Per Course</option>
                                                </select>
                                              
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4 text-center">
                                          <div class="form-group">
                                             <div class="col-sm-12" id="filtered">
                                                <!-- data here -->
                                             </div>
                                          </div>
                                       </div>

                                       <!-- filtering per intake -->
                                         <div class="col-md-4 text-center forIntake">
                                          <div class="form-group">
                                             <div class="col-sm-12" id="intake">
                                                <!-- data here -->
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                   
                                    <thead>
                                       <tr>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Id Number</th>
                                          <th>Email</th>
                                          <th>Student Number</th>
                                          <th>Gender</th>
                                          <!-- <th>Edit</th> -->
                                       </tr>
                                    </thead>
                                    <tbody id="contentBox">
                                       <!-- data here -->
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                 
               </div>













    
<div class="modal fade modal-fullscreen" id="pie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Students Bar Chart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card-body" id="chartjs_pie_parent" >
                     <div class="row">
                      
                        <canvas id="graphCanvas" height="447" width="1122" ></canvas>
                     </div>
                  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
            </div>
         </div>
         <div class="page-footer">
            <div class="page-footer-inner"> <?=date('Y');?> &copy; <a href="mailto:admin@ngomadigitech.com" target="_top" class="makerCss">Ngomadigitech</a> All rights reserved
            </div>
            <div class="scroll-to-top">
               <i class="icon-arrow-up"></i>
            </div>
         </div>
         <!-- end footer -->
      </div>
      <script type="text/javascript">
        document.getElementsByTagName("th").onclick = function() { return false; } 
        document.getElementByClass("sorting").onclick = function() { return false; } 
      </script>
      <script src="assets/plugins/jquery/jquery.min.js"></script>
      <script src="assets/plugins/popper/popper.js"></script>
      <script src="assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
      <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
      <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
      <script src="assets/js/pages/table/table_data.js"></script>
      <script src="assets/js/app.js"></script>
      <script src="assets/js/layout.js"></script>
      <script src="assets/js/theme-color.js"></script>
      <script src="assets/plugins/material/material.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.0/jspdf.umd.min.js"></script>
      <script src="assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
      <script src="assets/plugins/datatables/export/buttons.flash.min.js"></script>
      <script src="assets/plugins/datatables/export/jszip.min.js"></script>
      <script src="assets/plugins/datatables/export/pdfmake.min.js"></script>
      <script src="assets/plugins/datatables/export/vfs_fonts.js"></script>
      <script src="assets/plugins/chart-js/Chart.bundle.js"></script>
      <script src="assets/plugins/chart-js/utils.js"></script>
      <script src="assets/js/pages/chart/chartjs/chartjs-data.js"></script>
      <script src="assets/plugins/datatables/export/buttons.html5.min.js"></script>
      <script src="assets/plugins/datatables/export/buttons.print.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
     <?php include "ajax.js";?>
   </body>
</html>










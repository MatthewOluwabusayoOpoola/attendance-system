<?php 
session_start();

if(!isset($_SESSION['admin']['adminnakalogin']) == true) header("location:index.php");


 ?>
<?php include("../../conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>


<?php 
   $classId = $_GET['id'];

   $selClass = $conn->query("SELECT * FROM class_tbl WHERE class_id='$classId' ");
   $selClassRow = $selClass->fetch(PDO::FETCH_ASSOC);

   $deptId = $selClassRow['dept_id'];
   $selDept = $conn->query("SELECT dept_name as deptName FROM dept_tbl WHERE dept_id='$deptId' ")->fetch(PDO::FETCH_ASSOC);
 ?>


<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div> Class
                            <div class="page-title-subheading">
                              Take Attendance For <?php echo $selClassRow['class_title']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
            <div id="refreshData">
            <div class="row">
                  <div class="col-md-6">
                      <div class="main-card mb-3 card">
                          <div class="card-header">
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Class Information
                          </div>
                          <div class="card-body">
                           <form method="post" id="updateClassFrm">
                               <div class="form-group">
                                <label>DEPT.</label>
                                <select class="form-control" name="deptId" required="">
                                  <option value="<?php echo $selClassRow['dept_id']; ?>"><?php echo $selDept['deptName']; ?></option>
                                  <?php 
                                    $selAllDept = $conn->query("SELECT * FROM dept_tbl ORDER BY dept_id DESC");
                                    while ($selAllDeptRow = $selAllDept->fetch(PDO::FETCH_ASSOC)) { ?>
                                      <option value="<?php echo $selAllDeptRow['dept_id']; ?>"><?php echo $selAllDeptRow['dept_name']; ?></option>
                                    <?php }
                                   ?>
                                </select>
                              </div>

                              <div class="form-group">
                                <label>CLASS</label>
                                <input type="hidden" name="classId" value="<?php echo $selclassRow['class_id']; ?>">
                                <input type="" name="classTitle" class="form-control" required="" value="<?php echo $selClassRow['class_title']; ?>">
                              </div>  

                              
                           </form>                           
                          </div>
                      </div>
                   
                  </div>

                  <!-- dfghjk -->

 
                  <div class="col-md-10">
                    <?php 
                        $selAttend = $conn->query("SELECT * FROM attend_tbl WHERE class_id='$classId' ORDER BY attend_id desc");
                    ?>
                     <div class="main-card mb-3 card">
                          <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Attendance
                            <span class="badge badge-pill badge-primary ml-2">
                              <?php echo $selAttend->rowCount(); ?>
                            </span>
                            <div class="btn-actions-pane-right">
                             <a href="#" data-toggle="modal" data-target="#modalForAddAttend"><button class="btn btn-sm btn-primary ">Take Attendance</button></a>
                              </div>
                             
                          </div>
                          <div class="card-body" >
                            <div class="scroll-area-sm" style="min-height: 400px;">
                               <div class="scrollbar-container">

                            <?php 
                               
                               if($selAttend->rowCount() > 0)
                               {  ?>
                                 <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                                        <thead>
                                        <tr>
                                            <th class="text-left pl-2" width="20%">No.</th>
                                            <th class="text-left pl-2" width="20%">Matric. No.</th>
                                            <th class="text-left pl-2" width="20%">Name</th>
                                            <th class="text-left pl-2" width="20%">Department</th>
                                            <th class="text-center" width="20%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            
                                            if($selAttend->rowCount() > 0)
                                            {
                                               $i = 1;
                                               while ($selAttendRow = $selAttend->fetch(PDO::FETCH_ASSOC)) { 
                                                 ?>
                                                <tr>
                                                        <td >
                                                            <b><?php echo $i++ ; ?> .)</b><br> </td>
                                                            
                                                            <td>
                                                            <span class="pl-1"><?php echo $selAttendRow['matric']; ?></span></td>
                                                             <td>
                                                             <span class="pl-1"><?php echo $selAttendRow['attendname']; ?> </span></td>
                                                                <td>
                                                             <span class="pl-1"><?php echo $selAttendRow['dept']; ?></span>
                                                                </td>
                                                                <td>
                                                              <span class="pl-1"><?php echo $selAttendRow['date']; ?> </span>
                                                            
                                                              
                                                              
                                                            
                                                        </td>
                                                        <td class="text-center">
                                                         
                                                         <button type="button" id="deleteQuestion" data-id='<?php echo $selAttendRow['attend_id']; ?>'  class="btn btn-danger btn-sm">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <?php }

                                                             ?>
                                               <?php
                                            }
                                            else
                                            { ?>
                                                <tr>
                                                  <td colspan="2">
                                                    <h3 class="p-3">No Attendance Found..</h3>
                                                  </td>
                                                </tr>
                                            <?php }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                               <?php }
                               else
                               { ?>
                                  <h4 class="text-primary">No Attendance Found...</h4>
                                 <?php
                               }
                             ?>
                               </div>
                            </div>


                          </div>
                        
                      </div>
                  </div>
              </div>  
            </div> 
            </div>
               
            </div>
      
        

<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>

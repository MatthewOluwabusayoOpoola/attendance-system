<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE CLASS</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Class List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Class Title</th>
                                <th class="text-left ">Dept.</th>
                                <th class="text-left ">Description</th> 
                                <th class="text-left ">Date of Creation</th> 
                                <th class="text-center" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selClass = $conn->query("SELECT * FROM class_tbl ORDER BY class_id DESC ");
                                if($selClass->rowCount() > 0)
                                {
                                    while ($selClassRow = $selClass->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td class="pl-4"><?php echo $selClassRow['class_title']; ?></td>
                                            <td>
                                                <?php 
                                                    $deptId =  $selClassRow['dept_id']; 
                                                    $selDept = $conn->query("SELECT * FROM dept_tbl WHERE dept_id='$deptId' ");
                                                    while ($selDeptRow = $selDept->fetch(PDO::FETCH_ASSOC)) {
                                                        echo $selDeptRow['dept_name'];
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $selClassRow['class_description']; ?></td>
                                            
                                            <td><?php echo $selClassRow['date']; ?></td>
                                            <td class="text-center">
                                             <a href="manage-class.php?id=<?php echo $selClassRow['class_id']; ?>" type="button" class="btn btn-primary btn-sm">Manage</a>
                                             <button type="button" id="deleteExam" data-id='<?php echo $selClassRow['class_id']; ?>'  class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="5">
                                        <h3 class="p-3">No Class Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         

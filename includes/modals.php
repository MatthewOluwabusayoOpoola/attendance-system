<!-- Modal For Add dEPT -->
<div class="modal fade" id="modalForAddDept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addDeptFrm" method="post" action="./query/addDeptExe.php">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Department</label>
            <input type="" name="dept_name" id="dept_name" class="form-control" placeholder="Input Dept" required="" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Update Dept -->
<div class="modal fade myModal" id="updateCourse-<?php echo $selCourseRow['cou_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
     <form class="refreshFrm" id="addCourseFrm" method="post" >
       <div class="modal-content myModal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update ( <?php echo $selCourseRow['cou_name']; ?> )</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Course</label>
              <input type="" name="course_name" id="course_name" class="form-control" value="<?php echo $selCourseRow['cou_name']; ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Now</button>
        </div>
      </div>
     </form>
    </div>
  </div>


<!-- Modal For Add Class -->
<div class="modal fade" id="modalForclass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addClassFrm" method="post" action="./query/addClassExe.php">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Select Department</label>
            <select class="form-control" name="deptSelected">
              <option value="0">Select Department</option>
              <?php 
                $selDept = $conn->query("SELECT * FROM dept_tbl ORDER BY dept_id DESC");
                if($selDept->rowCount() > 0)
                {
                  while ($selDeptRow = $selDept->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selDeptRow['dept_id']; ?>"><?php echo $selDeptRow['dept_name']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="0">No Department Found</option>
                <?php }
               ?>
            </select>
          </div>


          <div class="form-group">
            <label>Class Code</label>
            <input type="" name="classTitle" class="form-control" placeholder="Input Class Code" required="">
          </div>

          <div class="form-group">
            <label>Class Title</label>
            <textarea name="classDesc" class="form-control" rows="4" placeholder="Input Class Title" required=""></textarea>
          </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Question -->
<div class="modal fade" id="modalForAddAttend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addAttendFrm" method="post" action="query/addAttendExe.php">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Attendace for <br><?php echo $selClassRow['class_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" id="addClassFrm" action="query/addAttendExe.php">

                              <!-- ------------------------ -->
            
<div class="scanner" style="width: 450px; height: auto;">
	<video id="preview" style="width:450px;
	height: auto;
	margin:0px 10px;

	border: 20px blue double;
	object-fit: cover;"></video>
</div>


<script
  src="libs/js/jquery-3.4.1.slim.min.js"
  ></script>
  <script src="./libs/js/jquery.min1.js"></script>
<script src="./libs/js/instascan.min.js"></script>
<script type="text/javascript">
	var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
  console.log('out');
	scanner.addListener('scan',function(content){
    console.log('in');
    var content = content;
		
    var contentArr = content.split(",");
    
    document.getElementById("name").setAttribute('value', contentArr[0]);
    document.getElementById("matric").setAttribute('value', contentArr[1]);
    document.getElementById("dept").setAttribute('value', contentArr[2]);
    
	// 	$.ajax({

	// 		url:"./query/addAttendExe.php",
  //       method: "POST",
  //       data: {
  //           data : content
  //       },
  //       beforeSend : function () {
  //           console.log("done");
  //       },
  //       dataType:"text",
  //       success: function (data) {
  //       alert("successful");
  //       },
  //       // dataType: "json",
  //       dataType:"text",
  //       success: function (data) {
  //       $(document).ready(function (){setTimeout( function () { location.reload(true);}, 5000); }); 
  //           // window.location.reload();
  //       }
        
  //   }
  //   )
	});
	Instascan.Camera.getCameras().then(function (cameras){
		if(cameras.length>0){
			scanner.start(cameras[0]);
			$('[name="options"]').on('change',function(){
				if($(this).val()==1){
					if(cameras[0]!=""){
						scanner.start(cameras[0]);
					}else{
						alert('No Front camera found!');
					}
				}else if($(this).val()==2){
					if(cameras[1]!=""){
						scanner.start(cameras[1]);
					}else{
						alert('No Back camera found!');
					}
				}
			});
		}else{
			console.error('No cameras found.');
			alert('No cameras found.');
		}
	}).catch(function(e){
		console.error(e);
		alert(e);
	});
</script>



<!-- ===================== -->

      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Name</label>
            <input type="hidden" name="classId" value="<?php echo $classId; ?>">
            <input type="" name="name" id="name" class="form-control" placeholder="Input name" autocomplete="off">
          </div>

            <div class="form-group">
                <label>Matriculation Number</label>
                <input type="" name="matric" id="matric" class="form-control" placeholder="Input matric" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Department</label>
                <input type="" name="dept" id="dept" class="form-control" placeholder="Input department" autocomplete="off">
            </div>

           
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
      </form>
    </div>
   </form>
  </div>
</div>

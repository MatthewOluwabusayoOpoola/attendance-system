<?php 
 include("../../../conn.php");

 extract($_POST);


    
	$insclass = $conn->query("INSERT INTO class_tbl(dept_id,class_title,class_description) VALUES('$deptSelected','$classTitle','$classDesc') ");
	if($insclass)
	{
		$res = array("res" => "success", "classTitle" => $classTitle);
		header("location: ../home.php?page=manage-class");
	}
	else
	{
		$res = array("res" => "failed", "classTitle" => $classTitle);
		header("location: ../home.php?page=manage-class");
	}







 echo json_encode($res);
 ?>
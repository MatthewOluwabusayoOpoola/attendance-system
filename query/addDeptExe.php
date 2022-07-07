<?php 
 include("../../../conn.php");

 extract($_POST);

$dept_name = strtoupper($dept_name);
 $seldept = $conn->query("SELECT * FROM dept_tbl WHERE dept_name='$dept_name' ");

 if($seldept->rowCount() > 0)
 {
	$res = array("res" => "exist", "dept_name" => $dept_name);
	header("location: ../home.php?page=manage-dept");
 }
 else
 {
    
	$insdept = $conn->query("INSERT INTO dept_tbl(dept_name) VALUES('$dept_name') ");
	if($insdept)
	{
		$res = array("res" => "success", "dept_name" => $dept_name);
		header("location: ../home.php?page=manage-dept");
	}
	else
	{
		$res = array("res" => "failed", "dept_name" => $dept_name);
		header("location: ../home.php?page=manage-dept");
	}


 }




 echo json_encode($res);
 ?>
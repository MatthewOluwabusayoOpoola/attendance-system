<?php 
 include("../../../conn.php");


extract($_POST);

$delDept = $conn->query("DELETE  FROM dept_tbl WHERE dept_id='$id'  ");
if($delDept)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}



	echo json_encode($res);
 ?>
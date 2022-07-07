<?php 
 include("../../../conn.php");


extract($_POST);

$delclass = $conn->query("DELETE  FROM class_tbl WHERE class_id='$id'  ");
if($delclass)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}


	echo json_encode($res);
 ?>
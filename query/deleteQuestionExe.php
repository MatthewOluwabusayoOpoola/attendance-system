<?php 
 include("../../../conn.php");


extract($_POST);

$delClass = $conn->query("DELETE  FROM attend_tbl WHERE attend_id='$id'  ");
if($delClass)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}


	echo json_encode($res);
 ?>
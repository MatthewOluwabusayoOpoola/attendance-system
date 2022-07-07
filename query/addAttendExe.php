<?php 
 include("../../../conn.php");
 
 extract($_POST);


$selAttend = $conn->query("SELECT * FROM attend_tbl WHERE class_id='$classId' AND attendname='$name' ");
if($selAttend->rowCount() > 0)
{
  $res = array("res" => "exist", "msg" => $name);
  header("location: ../manage-class.php?id=".$classId);
}
else
{
	echo $classId;
	echo $name;
	echo $matric;
	echo $dept;
	
	$insAttend = $conn->query("INSERT INTO attend_tbl (class_id, attendname, matric, dept) VALUES('$classId', '$name', '$matric', '$dept') ");

	echo "OUT";

	if($insAttend)
	{
       $res = array("res" => "success", "msg" => $name);
	   header("location: ../manage-class.php?id=".$classId);
	}
	else
	{
       $res = array("res" => "failed"); 
	//    header("location: ../manage-lga.php?id=".$classId);
	header("location: ../manage-class.php?id=".$classId);
	}
}



echo json_encode($res);
 ?>
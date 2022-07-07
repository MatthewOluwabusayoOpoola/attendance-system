<?php 

// Count All Course
$selDept = $conn->query("SELECT COUNT(dept_id) as totDept FROM dept_tbl ")->fetch(PDO::FETCH_ASSOC);


// Count All Exam
$selClass = $conn->query("SELECT COUNT(class_id) as totClass FROM class_tbl ")->fetch(PDO::FETCH_ASSOC);




 ?>
<?php
include 'db.php';
$value = $_POST['data'];
// $value = var_dump ($_REQUEST);
echo $value;

$value = (explode(',', $value));

// foreach ((explode(',', $value)) as $values){
//     if (!is_array($values)) continue;
//     foreach ($values as $k => $v){
// //         echo "$k: $v\n";
// //     }
// // }
//         $data[":$k"] = $v;
//     }
// }
// try {
//     echo $value[1]; 
//     $stmt = $conn->prepare("INSERT INTO `students` (`name`, `matric_no`, `deptartment`) VALUES ($value[0], $value[1], $value[2])");
// } catch (\Throwable $th) {
//     //throw $th; 
//     echo ($th->getMessage());
// }
echo $value[0];
$stmt = $conn->prepare("INSERT INTO `students`(`name`,`matric_no`,`department`) VALUES ('$value[0]', '$value[1]', '$value[2]')");

if ($stmt) {
    echo "success";
}
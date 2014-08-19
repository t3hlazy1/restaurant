<?php
include_once 'includes.php';

if (isset($_GET['name'])){
  $name = $_GET['name'];
}
else{
  return "";
}

$sql = "SELECT * FROM `users` WHERE `name` = '$name'";
$res = mysqli_query($con, $sql);
if (mysqli_num_rows($res) > 0){
  $return = "<span style='color: red;'>Taken</span>";
}
else{
  $return = "<span style='color: green;'>Available</span>";
}

echo $return;
return $return;

?>
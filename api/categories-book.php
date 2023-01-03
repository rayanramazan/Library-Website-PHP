<?php 
include'../include/config.php';
header('Content-Type: application/json');
$array_json = [];
$query = mysqli_query($db , "SELECT * FROM `categories-book`");
while($row = mysqli_fetch_assoc($query)){
    $array_json[] = $row;
}
echo json_encode($array_json);
?>
<?php
include'../include/config.php';
header('Content-Type: application/json');
if(isset($_GET['book_id'])){
    $id = $_GET['book_id'];
    $query = mysqli_query($db , "SELECT * FROM `book` WHERE `id` = '$id'");
    $array_json = [];
    while($row = mysqli_fetch_assoc($query)){
        $array_json[] = $row;
    }
    echo json_encode($array_json);
}
?>
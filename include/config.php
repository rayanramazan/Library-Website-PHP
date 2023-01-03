<?php
$db = mysqli_connect('localhost','root','','kurdishs_search');
if (!$db){
    echo mysqli_connect_error($db);
    echo "DataBase Niya";
}
// set font kurdish in mysqli
$db->query("SET NAMES utf8");
$db->query("SET CHARACTER SET utf8");
?>
<?php
function sec($data){
    global $db;
    $data = mysqli_real_escape_string($db,htmlspecialchars($data));
    return $data;
}
function getRows($condition){
    global $db;
    $query = mysqli_query($db , "SELECT * FROM $condition");
    echo mysqli_num_rows($query);
}
if(isset($_SESSION['object'])){
    $id = $_SESSION['object'];
}

 //vistors to web page just view in my database 
$ip = $_SERVER['REMOTE_ADDR'];
$query = mysqli_query($db , "SELECT * FROM `visitors` WHERE `ip` = '$ip'");
if(mysqli_num_rows($query) == 0 ){
    $query = mysqli_query($db , "INSERT INTO `visitors`(`ip`) VALUES('$ip')");
}

$ips = $_SERVER['REMOTE_ADDR'];
    $querys = mysqli_query($db , "INSERT INTO `visitors_no_unique`(`ip`) VALUES('$ips')");

?>
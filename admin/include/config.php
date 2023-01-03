<?php
session_start();
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

if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}

if(isset($_GET['logout'])){
    session_unset();
    unset($_SESSION['userid']);
    session_destroy();
    header('Location: index.php');
    }

?>
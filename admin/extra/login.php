<?php
include'../include/config.php';

if(isset($_POST['login'])){
    
    $email = sec($_POST['email']);
    $password = sec($_POST['password']);

    if(empty($email) || empty($password))
    {
        header("Location: ../index.php");
    } 
    else
    {
        $CheckUser = mysqli_query($db , "SELECT * FROM `login` WHERE `ad-email` = '$email' AND `ad-password` = '$password'");
        $Count = mysqli_num_rows($CheckUser) > 0;
        if($Count == 1){
            $Row = mysqli_fetch_assoc($CheckUser);
            $_SESSION['userid'] = sec($Row['id']);
                header("Location: ../main.php");
        }
        else 
        {
            header("Location: ../index.php?faild");
        }
    }
}

?>
<?php
include'../include/config.php';
if(isset($_POST['request'])){
    $request = sec($_POST['request']);

    $Query = "SELECT * FROM `raport` WHERE `categories` = '$request'";
    $Result = mysqli_query($db , $Query);
    $Count = mysqli_num_rows($Result);
}


?>

<div class="table-report">
    <table id="block">
       <?php if($Count) {?>
        <tr>
            <th>بابەت</th>
            <th>فایل</th>
            <th>داگرتن</th>
        </tr>
        <?php } 
        else {
            echo "Sorry no record found";
        } ?>
        <?php 
            while($Row = mysqli_fetch_assoc($Result)){?>
        <tr><?php echo sec($Row['names']); ?></tr>
        <tr><?php echo sec($Row['files']); ?></tr>
        <tr><a href="<?php echo sec($Row['link']); ?>">download</a></tr>
        <?php } die(); ?>
    </table>
</div>
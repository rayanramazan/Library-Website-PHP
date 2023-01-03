<?php
include'../include/config.php';
$query = "SELECT * FROM `raport` WHERE `names` LIKE '%".sec($_POST['search'])."%'";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0)
{
    while($dataBook = mysqli_fetch_assoc($result)){?>
        <div class="result Search">
            <span class="yell"><?php echo sec($dataBook['names']); ?></span>
            <hr class="lineSearch">
            <a href="<?php echo sec($dataBook['link']); ?>" class="yell">داگرتن</a>
        </div>
        <?php
} }
else 
{
}
?>
 
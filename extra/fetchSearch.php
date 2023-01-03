<?php
include'../include/config.php';
$query = "SELECT * FROM `book` WHERE `names` LIKE '%".sec($_POST['search'])."%'";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0)
{
    while($dataBook = mysqli_fetch_assoc($result)){?>
        <a href="viewBook.php?bookID=<?php echo sec($dataBook['id']); ?>" class="result">
            <img src="assets/upload/<?php echo sec($dataBook['photo']); ?>" alt="" srcset="">
            <span class="yell"><?php echo sec($dataBook['names']); ?></span>
            <hr class="lineSearch li-makes">
            <span class="yell makes"><?php echo sec($dataBook['make']); ?></span>
            <hr class="lineSearch li-language">
            <span class="yell language"><?php echo sec($dataBook['languageobject']); ?></span>
        </a>
        <?php
} }
else 
{
}
?>
 
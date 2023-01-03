<?php
include'../include/config.php';
if(isset($_POST['start'])){
    $start = mysqli_real_escape_string($db,$_POST['starts']);
    $txtSearch = mysqli_real_escape_string($db, $_POST['txtSearch']);
$Query = mysqli_query($db , "SELECT * FROM `book` WHERE `names` LIKE '%$txtSearch%' ORDER BY `id` DESC LIMIT $start,12");
while($dataBook = mysqli_fetch_assoc($Query)){?>
<a href="viewBook.php?bookID=<?php echo sec($dataBook['id']); ?>" class="card" id="dynamic-posts">
    <div class="head-card">
        <ion-icon name="eye-outline"></ion-icon> <span> (<?php echo sec($dataBook['views']); ?>) </span>
    </div>
    <div class="img-book">
        <img src="assets/upload/<?php echo sec($dataBook['photo']); ?>" class="img-books" alt="" srcset="">
    </div>
    <div class="writer">
        <span> <?php echo $txtSearch; ?> </span>
        <span class="write"> <?php echo sec($dataBook['make']); ?> </span>
    </div>
</a>
<?php } } ?>
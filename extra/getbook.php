<?php
include'../include/config.php';
if(isset($_POST['start'])){
    $start = mysqli_real_escape_string($db,$_POST['start']);
$Query = mysqli_query($db , "SELECT * FROM `book` ORDER BY `id` DESC LIMIT $start,12");
while($dataBook = mysqli_fetch_assoc($Query)){?>
<a href="viewBook.php?bookID=<?php echo sec($dataBook['id']); ?>" class="card" id="dynamic-posts">
    <div class="head-card">
        <img src="assets/icon/eye.png" alt="" srcset=""> <span> (<?php echo sec($dataBook['views']); ?>) </span>
    </div>
    <div class="img-book">
        <img src="assets/upload/<?php echo sec($dataBook['photo']); ?>" class="img-books" alt="" srcset="">
    </div>
    <div class="writer">
        <span> <?php echo sec($dataBook['names']); ?> </span>
        <span class="write"> <?php echo sec($dataBook['make']); ?> </span>
    </div>
</a>
<?php } } ?>
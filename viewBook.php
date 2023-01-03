<?php include'include/nav.php'; ?>
<section class="section-view-book">
        <div class="book-info">
        <?php
            if(isset($_GET['bookID'])){
                $bookID = sec($_GET['bookID']);
                $Query = mysqli_query($db, "SELECT * FROM `book` WHERE `id` = '$bookID'");
                while($Row = mysqli_fetch_assoc($Query)){
                    $views = sec($Row['views']) + 1;
                     $count = "UPDATE `book` set `views` = '$views' where `id` = '$bookID'";
                     $query_count = mysqli_query($db , $count);
                     ?>
            <div class="info-text-book">
                
                <span class="name-book"><?php echo sec($Row['names']); ?></span>
                <hr class="hr-indo-book">
                <span><span class="text-name-book-info">نڤێسەر : </span> <?php echo sec($Row['make']); ?> </span>
                <span><span class="text-name-book-info">زمان : </span> <?php echo sec($Row['languageobject']); ?> </span>
                <span><span class="text-name-book-info">جۆر : </span> <?php echo sec($Row['booktag']); ?> </span>
                <span class="text-name-book-info"> <span> PDF </span> : فایل</span>
                <span><span class="text-name-book-info">ڵاپەڕ : </span> <?php echo sec($Row['numpaper']); ?> </span>
                <span><span class="text-name-book-info">بینەر : </span> <?php echo sec($Row['views']); ?> </span>
                <a href="<?php echo sec($Row['link']); ?>">داگرتنا پەرتووکى</a>
            
            </div>

            <div class="img-book-view">
                <img src="assets/upload/<?php echo sec($Row['photo']); ?>" alt="" srcset="">
            </div>
        </div>
        <?php } } ?>

        <div class="title">
            <h1><span>نوێترین پەرتووک</span></h1>
        </div>
        <div class="book-home">
            <div class="cards">
                <?php 
                    $Query = mysqli_query($db, "SELECT * FROM `book` ORDER BY `id` DESC LIMIT 6");
                    while($Row = mysqli_fetch_assoc($Query)){?>
                <a href="viewBook.php?bookID=<?php echo sec($Row['id']); ?>" class="card">
                    <div class="head-card">
                        <ion-icon name="eye-outline"></ion-icon> <span> (<?php echo sec($Row['views']); ?>) </span>
                    </div>
                    <div class="img-book">
                        <img src="assets/upload/<?php echo sec($Row['photo']); ?>" class="img-books" alt="" srcset="">
                    </div>
                    <div class="writer">
                        <span> <?php echo sec($Row['names']); ?> </span>
                        <span class="write"> <?php echo sec($Row['make']); ?> </span>
                    </div>
                </a>
                <?php } ?>
            </div>
            </div>

            <?php include'include/footer.php'; ?>
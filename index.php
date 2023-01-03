<?php include'include/nav.php'; ?>
<section>
        <div class="home-page">
            <div class="title">
                <h1><span>پەرتووک</span></h1>
            </div>
            <div class="book-home">
                <div class="cards">
                    <?php 
                        $Query = mysqli_query($db , "SELECT * FROM `book` ORDER BY `id` DESC LIMIT 12");
                        while($RowBook = mysqli_fetch_assoc($Query)){
                            // $out = strlen(sec($RowBook['names'])) > 32 ? substr(sec($RowBook['names']),0,32)."..." : sec($RowBook['names']);
                            ?>
                    <a href="viewBook.php?bookID=<?php echo sec($RowBook['id']); ?>" class="card">
                        <div class="head-card">
                            <img src="assets/icon/eye.png" alt="" srcset=""> <span> (<?php echo sec($RowBook['views']); ?>) </span>
                        </div>
                        <div class="img-book">
                            <img src="assets/upload/<?php echo sec($RowBook['photo']); ?>" class="img-books" alt="" srcset="">
                        </div>
                        <div class="writer">
                            <span> <?php echo sec($RowBook['names']); ?> </span>
                            <span class="write"> <?php echo sec($RowBook['make']); ?> </span>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="title">
            <h1><span>کۆرس</span></h1>
        </div>

        <div class="cards-course-home">
            <ul>
                <?php 
                    $QueryCourse = mysqli_query($db , "SELECT * FROM `categories-course-object` LIMIT 6");
                    while($RowCourse = mysqli_fetch_assoc($QueryCourse)){?>
                <li>
                    <a href="viewCourse.php?view=<?php echo sec($RowCourse['id']); ?>">
                        <img src="assets/course/<?php echo sec($RowCourse['photo']); ?>" alt="" srcset="">
                        <span> <?php echo sec($RowCourse['name']); ?> </span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>

    <div class="title">
        <h1><span>ڕاپۆرت</span></h1>
    </div>

    <div class="table-report">
        <table>
            <tr>
                <th>#</th>
                <th>بابەت</th>
                <th>فایل</th>
                <th>داگرتن</th>
            </tr>

            <?php 
                $QueryReport = mysqli_query($db , "SELECT * FROM `raport` ORDER BY `id` DESC LIMIT 12");
                $x = 0;
                while($RowReport = mysqli_fetch_assoc($QueryReport)){
                    $x++;
                    ?>
            <tr>
                <td><?php echo $x; ?></td>
                <td><?php echo sec($RowReport['names']); ?></td>
                <td><?php echo sec($RowReport['files']); ?></td>
                <td><a href="<?php echo sec($RowReport['link']); ?>">داگرتن</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    </section>
    <?php include'include/footer.php'; ?>
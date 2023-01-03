<?php include'include/nav.php'; ?>
<section>
        <div class="home-page">
            <div class="cards-course">
                <?php 
                    $QueryCourse = mysqli_query($db , "SELECT * FROM `categories-course-object`");
                    while($RowCourse = mysqli_fetch_assoc($QueryCourse)){?>
                <a href="viewCourse.php?view=<?php echo sec($RowCourse['id']); ?>" class="course-c">
                   <img class="img-course" src="assets/course/<?php echo sec($RowCourse['photo']); ?>" alt="" srcset="">
                   <span>
                    <?php echo sec($RowCourse['name']); ?>
                   </span>
                </a>
                <?php } ?>
            </div>

        </div>

        </section>

        <?php include'include/footer.php'; ?>
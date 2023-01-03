<?php 
include'include/nav.php'; ?>



<section>
        <div class="home-page">
            <?php
                if(isset($_GET['id'])){
                    $IDCourse = sec($_GET['id']);
                    $linkVideo = sec($_GET['view']);
            ?>
            <div class="video-course">
                <div class="videoPlay">
            <?php
            $QueryCourse = mysqli_query($db , "SELECT * FROM `object` WHERE `id` = '$IDCourse'");
            $IDVideo = mysqli_fetch_assoc($QueryCourse);

            $query = mysqli_query($db , "SELECT * FROM `object` WHERE `id` = '$IDCourse' LIMIT 1");

            while($row = mysqli_fetch_assoc($query)){ ?>
            <iframe src="<?php echo sec($row['video']);?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php } ?>
            </div>
            <div class="listOfCourse">
            <ul>
            <?php 
            $idCourse = sec($_GET['view']);

            $rowNum = 0;
            $query = mysqli_query($db , "SELECT * FROM `object` WHERE `categories` = '$idCourse'");
            while($Row = mysqli_fetch_assoc($query)){
            $rowNum++;?>
                <li><a href="viewCourse.php?view=<?php echo $linkVideo; ?>&id=<?php echo sec($Row['id']); ?>"><?php echo sec($Row['title']); ?> - <?php echo $rowNum; ?></a></li>
                <?php } ?>
                
            </ul>
            </div>
            </div>

            <?php } else {?>

            <div class="video-course">
                
                <div class="videoPlay">
                    <?php
                    // $categoriesId = sec($_GET['course']);
                    $linkVideo = sec($_GET['view']);
                    $QueryCourse = mysqli_query($db , "SELECT * FROM `object` WHERE `categories` = '$linkVideo'");
                    $IDVideo = mysqli_fetch_assoc($QueryCourse);

                    
                    $ID_Course = sec($IDVideo['id']);
                  

                    $query = mysqli_query($db , "SELECT * FROM `object` WHERE `id` = '$ID_Course' LIMIT 1");

                    while($row = mysqli_fetch_assoc($query)){ 
                        $ObjectId = sec($row['id']); 
                        
                        ?>
                    <iframe src="<?php echo sec($row['video']);?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php } ?>
                    </div>
                <div class="listOfCourse">
                    <ul>
                    <?php 
                $idCourse = sec($_GET['view']);

                $rowNum = 0;
                $query = mysqli_query($db , "SELECT * FROM `object` WHERE `categories` = '$idCourse'");
                while($Row = mysqli_fetch_assoc($query)){
                    $rowNum++;?>
                        <li><a href="viewCourse.php?view=<?php echo $linkVideo; ?>&id=<?php echo sec($Row['id']); ?>"><?php echo sec($Row['title']); ?> - <?php echo $rowNum; ?></a></li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </div>

            <?php } ?>

        </div>
        

        </section>

        <?php include'include/footer.php'; ?>
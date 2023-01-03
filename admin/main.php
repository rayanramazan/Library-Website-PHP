<?php include'include/config.php'; if($userid == 0) { header("Location: index.php"); }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Main</title>
</head>
<body>
    <header>
        <div class="logo">
            <span>لێگەڕیانا کوردى</span>
            <a href="?logout">LOGOUT</a>
        </div>
    </header>


    <section>
        <form action="extra/insertBook.php" method="POST" class="form-book">
            <span>پەرتووک</span>
            <input name="name" type="text" placeholder="ناڤ">
            <input name="make" type="text" placeholder="نڤێسەر">
            <input name="categ" type="text" placeholder="جۆر">
            <input name="idcate" type="text" placeholder="ئاى دى جۆرى">
            <input name="language" type="text" placeholder="زمان">
            <input type="text" name="paper" placeholder="ڵاپەڕ">
            <input type="text" name="link" placeholder="لینک">
            <input type="file" name="img">
            <button name="insertBook">زێدەکرن</button>
        </form>
        <form action="" class="form-report">
            <span>ڕاپۆرت</span>
            <input type="text" placeholder="ناڤ" name="" id="">
            <input type="text" placeholder="فایل" name="" id="">
            <input type="text" placeholder="لینک" name="" id="">
            <button>زێدەکرن</button>
        </form>
    </section>
    <main>
        <div class="card">
            <img src="../img/icon/eye.png" alt="" srcset="">
            <h4>بینەر</h4>
            <span><?php
                $view1 = 0;
                $Query = mysqli_query($db, "SELECT * FROM `visitors`");
                while($Row = mysqli_fetch_assoc($Query)){
                    $view1++;
                }

                echo $view1;
            ?></span>
        </div>
        <div class="card">
            <img src="../img/icon/eye.png" alt="" srcset="">
            <h4>بینەر</h4>
            <span>
            <?php
                $view1 = 0;
                $Query = mysqli_query($db, "SELECT * FROM `visitors_no_unique`");
                while($Row = mysqli_fetch_assoc($Query)){
                    $view1++;
                }

                echo $view1;
            ?>
            </span>
        </div>
    </main>
    <script src="js/jquery.min.js">
    </script>
</body>
</html>
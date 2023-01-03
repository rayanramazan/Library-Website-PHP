<?php include'include/nav.php'; ?>
<section>
    <div class="home-page">
    
        <div class="cards-categ-book">
           <?php
                $QueryCategories = mysqli_query($db , "SELECT * FROM `categories-book`");
                while($row = mysqli_fetch_assoc($QueryCategories)){?>
            <a href="book.php?id=<?php echo sec($row['id']); ?>" class="card">
                <img src="assets/icon-book/<?php echo sec($row['img']); ?>" alt="" srcset="">
                <h3><?php echo sec($row['name']); ?></h3>
            </a>
            <?php } ?>
        </div>

        <style>
            .cards-categ-book{
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-wrap: wrap;
            }
            .cards-categ-book .card{
                text-decoration: none;
                width: 400px;
                background: #192647;
                transition: .3s;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 10px;
                margin: 10px;
                border-radius: 6px;
            }
            .cards-categ-book .card:hover{
                background: #121b32;
                transform: translate(0px , -2px);
            }
            .cards-categ-book .card img{
                width: 50px;
                height: 50px;
            }
            .cards-categ-book .card h3{
                color: #fff;
            }

            @media only screen and (max-width: 853px){
                .cards-categ-book .card{
                    width: 40%;
                }
            }
            @media only screen and (max-width: 600px){
                .cards-categ-book .card{
                    width: 100%;
                }
            }

        </style>

    </div>
</section>

<?php

$date = Date("m-d");
$myDay = "9/2";

if($date == $myDay)
    echo "رۆژبوونا تە پیروزبیت مستەر رەیان";
else 
    echo "Null";

?>

<?php include'include/footer.php'; ?>
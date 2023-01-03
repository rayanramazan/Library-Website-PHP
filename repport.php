<?php include'include/nav.php'; ?>
<section>
        <div class="home-page">
            <div class="formsearch">
                <form action="repport.php" method="POST"> 
                    <select name="reportCate">
                        <option value="0">جۆرێ ڕاپۆرتێ</option>
                        <?php 
                            $QueryRepport = mysqli_query($db , "SELECT * FROM `categories-report`");
                            while($RowRepport = mysqli_fetch_assoc($QueryRepport)){?>
                        <option value="<?php echo sec($RowRepport['id']); ?>"><?php echo sec($RowRepport['name']); ?></option>
                        <?php } ?>
                    </select>
                        <input id="txtSearch" type="text" placeholder="ناڤێ پەرتووکى بنڤێسە">
                        <button class="btn-search" name="btnSearch">لێگەڕیان</button>
                </form>
               
                <div class="resultSearch" id="resultSearch">
                </div>
            </div>
            
    <?php
        if(isset($_POST['btnSearch'])){
            $reportCate = sec($_POST['reportCate']);
                if($reportCate == 0){
                    echo "<script> window.location.replace('repport.php'); </script>";
                    die();
                }
                ?>
        <div class="table-report">
            <table id="block">
                <tr>
                    <th>بابەت</th>
                    <th>فایل</th>
                    <th>داگرتن</th>
                </tr>
                            
                <?php
            
                $Query = mysqli_query($db , "SELECT * FROM `raport` WHERE `categories` = '$reportCate'");
                while($row = mysqli_fetch_assoc($Query)){?>
                    <tr>
                        <td><?php echo sec($row['names']); ?></td>
                        <td><?php echo sec($row['files']); ?></td>
                        <td><a href="<?php echo sec($row['link']); ?>">داگرتن</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $("#txtSearch").keyup(function(){
            var txt = $(this).val();

            if(txt != '')
            {
                $("#resultSearch").css("display" , "block");
                $.ajax({
                    url: "extra/fetchSearchRepport.php",
                    method: "POST",
                    data: {search:txt},
                    dataType: "text",
                    success:function(data){
                        $("#resultSearch").html(data);
                    }
                });
            }
            else 
            {
                $("#resultSearch").css("display" , "none");
                $("#resultSearch").html('');
            }
        })
    })
</script>
                    </section>
                    <?php include'include/footer.php'; ?>
                    <?php die(); } ?>
                
            
            <div class="table-report">
                <table id="block">
                    <tr>
                        <th>بابەت</th>
                        <th>فایل</th>
                        <th>داگرتن</th>
                    </tr>
                </table>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    var load_flag = 0;
    loadData(load_flag);
    function loadData(start){
        jQuery.ajax({
        url: 'extra/getRepport.php',
        data: 'start='+start,
        type: 'post',
        success:function(result){
            jQuery('#block').append(result);
            load_flag += 12;
        }
    });
    }

    jQuery(window).ready(function(){
        jQuery(window).scroll(function(){
            if(jQuery(window).scrollTop() >= jQuery(document).height() - jQuery(window).height()){
                loadData(load_flag);
            }
        });
    });

    $(document).ready(function(){
        $("#txtSearch").keyup(function(){
            var txt = $(this).val();

            if(txt != '')
            {
                $("#resultSearch").css("display" , "block");
                $.ajax({
                    url: "extra/fetchSearchRepport.php",
                    method: "POST",
                    data: {search:txt},
                    dataType: "text",
                    success:function(data){
                        $("#resultSearch").html(data);
                    }
                });
            }
            else 
            {
                $("#resultSearch").css("display" , "none");
                $("#resultSearch").html('');
            }
        })

        $("#reportCate").on("change" , function(){
            var value = $(this).val();
           
            $.ajax({
                url: "extra/fetchSelectRepport.php",
                type: "POST",
                data: "request=" + value,
                beforeSend:function(){
                    $("#block").html("Working ...");
                },
                success:function(data){
                    $("#block").html(data);
                }
            });
        });
    })
</script>
        </div>

        </section>
        <?php include'include/footer.php'; ?>
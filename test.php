<?php include'include/nav.php'; ?>
<section>
    <div class="home-page">
        <div class="formsearch">
            <div class="formS">
                <select name="categoiresItem" id="categoiresItem">
                    <option value="0">جۆرێ پەرتووک</option>
                    <?php
                            $Query = mysqli_query($db, "SELECT * FROM `categories-book`");
                            while($RowCate = mysqli_fetch_assoc($Query)){?>
                    <option value="<?php echo sec($RowCate['id']); ?>"><?php echo sec($RowCate['name']); ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="txt" id="txtSearch" placeholder="ناڤێ پەرتووکى بنڤێسە">
                <button class="btn-search" name="btnSearch">لێگەڕیان</button>
            </div>
            <div class="resultSearch" id="resultSearch">
            </div>
        </div>

        <div class="book-home">
            <div class="cards" id="block">
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>

            var value = null;
        $("#categoiresItem").on("change" , function(){
            value = $(this).val();
            
            $("#block").removeChildren();
            // $.ajax({
            //     url: "extra/getItemInList.php",
            //     type: "post",
            //     data: {'requset' : value},
            //     success: function(result){
            //         $("#listOne").html(result);
            //     },
            // });
        });

        var load_flag = 0;
        loadData(load_flag);

        function loadData(start) {
            jQuery.ajax({
                url: 'extra/getbook.php',
                data: 'start=' + start,
                type: 'post',
                success: function (result) {
                    jQuery('#block').append(result);
                    load_flag += 16;
                }
            });
        }

        jQuery(window).ready(function () {
            jQuery(window).scroll(function () {
                if (jQuery(window).scrollTop() >= jQuery(document).height() - jQuery(window).height()) {
                    loadData(load_flag);
                }
            });
        });

        $(document).ready(function () {
            $("#txtSearch").keyup(function () {
                var txt = $(this).val();
                if (txt != '') {
                    $("#resultSearch").css("display", "block");
                    $.ajax({
                        url: "extra/fetchSearch.php",
                        method: "POST",
                        data: {
                            search: txt
                        },
                        dataType: "text",
                        success: function (data) {
                            $("#resultSearch").html(data);
                        }
                    });
                } else {
                    $("#resultSearch").css("display", "none");
                    $("#resultSearch").html('');
                }
            })
        })
    </script>
</section>
<?php include'include/footer.php'; ?>
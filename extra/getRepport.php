<?php
include'../include/config.php';
if(isset($_POST['start'])){
    $start = mysqli_real_escape_string($db,$_POST['start']);
$Query = mysqli_query($db, "SELECT * FROM `raport` ORDER BY `id` DESC LIMIT $start,12");
$num = 0;
while($Row = mysqli_fetch_assoc($Query)){ $num++; ?>
<tr>
    <td><?php echo sec($Row['names']); ?></td>
    <td><?php echo sec($Row['files']); ?></td>
    <td><a href="<?php echo sec($Row['link']); ?>">داگرتن</a></td>
</tr>
<?php } } ?>
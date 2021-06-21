<?php
include_once('DataProvider.php');

$sqlAuthor = "SELECT * FROM authors";
$sqlLoai = "SELECT * FROM catagories";
$dsLoai = DataProvider::ExecuteQuery($sqlLoai);
$dsAuthor = DataProvider::ExecuteQuery($sqlAuthor);
?>
Loại Sách:
<select name="" id="">
    <?php
    while ($loai1 = mysqli_fetch_array($dsLoai)) {
        echo "<option value='{$loai1['book_id']}'>{$loai1['catagory']}</option>";
    }
    ?>
</select>

Tác Giả:
<select name="" id="">
    <?php
    while ($loai2 = mysqli_fetch_array($dsAuthor)) {
        echo "<option value='{$loai2['book_id']}'>{$loai2['author_name']}</option>";
    }
    ?>
</select>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <main>
        <h1 class="section-heading">ALL BOOKS
            <div id="right-footer">
                <button style="font-size:large;background-color:white;font-family:Time new roman;"><a href="ThemSach.php">THÊM SÁCH </a></button>
            </div>
            <div id="right-footer">
                <button style="font-size:large;background-color:white;font-family:Time new roman;"><a href="">XÓA SÁCH </a></button>
            </div>
            <div id="right-footer">
                <button style="font-size:large;background-color:white;font-family:Time new roman;"><a href="SuaInfoSach.php?id=<?php echo $id; ?>">SỬA THÔNG TIN</a></button>
            </div>
        </h1>

        <?php
        include_once('DataProvider.php');

        $sqlLoai = "SELECT * FROM categories";
        $dsLoai = DataProvider::ExecuteQuery($sqlLoai);
        ?>
        <h3>Loại:</h3>
        <select name="cboCategories" id="cboCategories">
            <?php
            while ($loai1 = mysqli_fetch_array($dsLoai)) {
                $selected = $_REQUEST["book_id"] == $loai1['book_id'] ? "selected" : "";
                echo "<option value='{$loai1['book_id']}' {$selected}>{$loai1['category']}</option>";
            }
            ?>
        </select><br>
        <div>
            <?php
            $sqlSach = "SELECT id, title, category, thumbnailUrl, author_name from books join categories lo on lo.book_id = books.id join authors tg on tg.book_id = books.id GROUP BY books.id";
            if (isset($_REQUEST["book_id"])) {
                $sqlSach .= " WHERE books.id = " . $_REQUEST["book_id"];
            }

            /*if ( == 1) {
                echo "Sách Đã Được Mượn";
            } else echo "Còn Sách";*/

            $result = DataProvider::ExecuteQuery($sqlSach);
            while ($sach = mysqli_fetch_array($result)) {
                $dsSach = <<< EOD
                    <div class="hh-box">
                    <div class="hh-box-promotion"></div>
                    <div class="hh-box-qua"></div>
                    <div class="hh-box-image">
                        <img src="{$sach['thumbnailUrl']}">
                    </div><br>
                        <div class="hh-box-name">
                            <a href = "book.php">
                            Tên sách: {$sach["title"]}</a>
                        </div>
                        <div class="hh-box-gia">
                        Tác giả: {$sach['author_name']}
                        </div>
                        <div class="hh-box-sua">
                    <a href ="SuaInfoSach.php?id=<?php echo {$sach['id']}; ?>">Sửa</a>
                    </div>
                    </div>
                EOD;
                echo $dsSach;
            }
            ?>
        </div>

        <script>
            $(function() {

                $("#cboLoai").change(function() {
                    window.location.href = 'dsSach.php?book_id=' + $(this).val();
                });
            });
        </script>
    </main>
</body>

</html>
<!--<img src="sach/{$sach['thumbnailUrl']}" class="hh-box-image">
<img src="images/moi-icon.png" class="hh-box-new" >->
// <a href = "book.php">
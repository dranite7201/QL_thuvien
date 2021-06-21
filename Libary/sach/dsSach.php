<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <main>
        <h1 class="section-heading">ALL BOOKS</h1>

        <?php
        include_once('DataProvider.php');
        $sqlLoai = "SELECT * FROM categories";
        $dsLoai = DataProvider::ExecuteQuery($sqlLoai);
        ?>
        Loại:
        <select name="cboLoai" id="cboLoai">
            <?php
            while ($loai1 = mysqli_fetch_array($dsLoai)) {
                $selected = $_REQUEST["category"] == $loai['category'] ? "selected" : "";
                echo "<option value='{$loai1['']}' {$selected}>{$loai1['category']}</option>";
            }
            ?>
        </select><br>
        <div id="right-footer">
            <a href="ThemSach.php">THÊM SÁCH</a>
        </div>
        <section>
            <div>
                <?php
                $sqlSach = "SELECT id, title, isbn, pageCount, shortDescription, status, category, author_name, thumbnailUrl from books join categories lo on lo.book_id = books.id join authors tg on tg.book_id = books.id";
                if (isset($_REQUEST["book_id"])) {
                    $sqlSach .= " WHERE books.id = " . $_REQUEST["book_id"];
                }

                /*if ( == 1) {
                echo "Sách Đã Được Mượn";
            } else echo "Còn Sách";*/

                $result = DataProvider::ExecuteQuery($sqlSach);
                while ($sach = mysqli_fetch_array($result)) {
                    $tacgia = $sach['author_name'];
                    $tinhtrang = $sach['status'];
                    $gt = $sach['shortDescription'];
                    $dsSach = <<< EOD
                    <div class="hh-box">
                        <img src="{$sach['thumbnailUrl']}" class="hh-box-image">
                        <div class="hh-box-name">Tên sách: {$sach["title"]}</div>
                        <div class="hh-box-gia">Tác giả: {$tacgia}</div>
                        <div class="hh-box-gt">Giới thiệu: {$gt}</div>
                        <div class="hh-box-tinhtrang">Tình Trạng: {$tinhtrang}</div>
                    </div>
                EOD;
                    echo $dsSach;
                }
                ?>
            </div>
        </section>

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
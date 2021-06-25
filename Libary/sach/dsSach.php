<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <main>
        <h1 class="section-heading">ALL BOOKS
            <div id="right-footer">
                <button style="font-size:large;background-color:white;font-family:Time new roman;"><a href="ThemSach.php">THÊM SÁCH </a></button>
            </div>
            <div id="right-footer">
                <button style="font-size:large;background-color:white;font-family:Time new roman;"><a href="SuaInfoSach.php">SỬA THÔNG TIN SÁCH </a></button>
            </div>

        </h1>
        <div>
            <?php
            include_once('DataProvider.php');
            $sqlLoai = "SELECT * FROM categories";
            $dsLoai = DataProvider::ExecuteQuery($sqlLoai);
            ?>
            Loại:
            <select name="cbo" id="cbo">
                <?php
                while ($loai = mysqli_fetch_array($dsLoai)) {
                    $selected = $_REQUEST["book_id"] == $loai['book_id'] ? "selected" : "";
                    echo "<option value='{$loai['book_id']}' {$selected}>{$loai['category']}</option>";
                }
                ?>
            </select></br>


            <div>
                <?php
                $sqlSach = "SELECT id,category, author_name ,title, pageCount, shortDescription, status, thumbnailUrl  from books join categories lo  on lo.book_id = books.id join authors tg on books.id=tg.book_id group by title;";
                if (isset($_REQUEST["book_id"])) {
                    $sqlSach .= " WHERE categories.book_id = " . $_REQUEST["book_id"];
                }
                $result = DataProvider::ExecuteQuery($sqlSach);
                while ($sach = mysqli_fetch_array($result)) {
                    $category = $sach['category'];
                    $author_name = $sach['author_name'];
                    $status = $sach['status'];
                    $shortDescription = $sach['shortDescription'];
                    $dsSach = <<< EOD
                    <div class="hh-box">
                        <div style="width: 200px; height: 180px;">
                        <img src="{$sach['thumbnailUrl']}">
                        </div>
                        <div class="hh-box-name">
                        <a href = "book.php">
                        Tên sách: {$sach["title"]}</a>
                        </div>
                        <div class="hh-box-gia">Tác giả: {$author_name}</div>
                        <div class="hh-box-loai">Loại: {$category}</div>
                        <div class="hh-box-gt">Giới thiệu: {$shortDescription}</div>
                        <div class="hh-box-tinhtrang">Tình Trạng: {$status}</div>
                        <div>
                        <form method="post" action="xoasach.php" style="display: inline-block">
                            <input  type="hidden" name="id" value="<?php echo {$sach['id']} ?>"/>
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                        <div>
                    </div>
                EOD;
                    echo $dsSach;
                }
                ?>
            </div>
        </div>

        <script>
            $(function() {

                $("#cbo").change(function() {
                    window.location.href = 'dsSach.php?book_id=' + $(this).val();
                });
            });
        </script>
    </main>
</body>

</html>
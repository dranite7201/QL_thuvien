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
        $sqlLoai = "SELECT * FROM loai";
        $dsLoai = DataProvider::ExecuteQuery($sqlLoai);
        ?>
        Loại:
        <select name="cboLoai" id="cboLoai">
            <?php
            while ($loai = mysqli_fetch_array($dsLoai)) {
                $selected = $_REQUEST["MaLoai"] == $loai['MaLoai'] ? "selected" : "";
                echo "<option value='{$loai['MaLoai']}' {$selected}>{$loai['TenLoai']}</option>";
            }
            ?>
        </select><br>
        <section>
            <?php
            $sqlSach = "select MaSach, TenSach, TacGia, TinhTrang, Hinh, TenLoai from book join loai lo on lo.MaLoai = book.MaLoai";
            if (isset($_REQUEST["MaLoai"])) {
                $sqlSach .= " WHERE book.MaLoai = " . $_REQUEST["MaLoai"];
            }

            /*if ( == 1) {
                echo "Sách Đã Được Mượn";
            } else echo "Còn Sách";*/

            $result = DataProvider::ExecuteQuery($sqlSach);
            while ($sach = mysqli_fetch_array($result)) {
                $tacgia = $sach['TacGia'];
                $tinhtrang = $sach['TinhTrang'];
                $dsSach = <<< EOD
        <div class="hh-box">	
            <div class="hh-box-promotion"></div>
            <div class="hh-box-qua"></div>
            <img src="hoa/{$sach['Hinh']}" class="hh-box-image">
            <img src="images/moi-icon.png" class="hh-box-new" >
            <div class="hh-box-name">{$sach["TenSach"]}</div>
            <div class="hh-box-gia">{$tacgia}</div>
            <div class="hh-box-tinhtrang">{$tinhtrang}</div>
        </div>
    EOD;
                echo $dsSach;
            }
            ?>
        </section>

        <script>
            $(function() {

                $("#cboLoai").change(function() {
                    window.location.href = 'dsSach.php?MaLoai=' + $(this).val();
                });
            });
        </script>
    </main>
</body>

</html>
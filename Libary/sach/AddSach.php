<?php
include_once('DataProvider.php');

$sqlLoai = "SELECT * FROM loai";
$dsLoai = DataProvider::ExecuteQuery($sqlLoai);
?>
<form action="" enctype="multipart/form-data" method="post">
    <h2>THÊM SÁCH</h2>
    Loại:
    <select name="cboLoai" id="cboLoai">
        <?php
        while ($loai = mysqli_fetch_array($dsLoai)) {
            $selected = $_REQUEST["MaLoai"] == $loai['MaLoai'] ? "selected" : "";
            echo "<option value='{$loai['MaLoai']}' {$selected}>{$loai['TenLoai']}</option>";
        }
        ?>
    </select><br>
    Tên hoa: <input name="txtTenSach"><br>
    Tác Gỉa: <input name="txtTacGia"><br>
    Tình Trạng Sách:
    <textarea name="txtTinhTrang" id="" cols="30" rows="10"></textarea><br>
    Hình:
    <input type="file" name="txtHinh" id=""><br>
    <button>Thêm</button>
</form>
<?php
if (isset($_FILES["txtHinh"]) && isset($_REQUEST['txtTenSach'])) {
    if ($_FILES["txtHinh"]["error"] == 0) {
        $hinh = $_FILES["txtHinh"]["name"];
        if (move_uploaded_file($_FILES["txtHinh"]["tmp_name"], "./hoa/" . $hinh)) {
            echo $hinh;
            $sqlThemSach = "INSERT INTO `book`(`MaSach`, `TenSach`, `TacGia`, `TinhTrang`, `MaLoai`, `Hinh`) VALUES ('{$_REQUEST['cboLoai']}', '{$_REQUEST['txtTenSach']}', {$_REQUEST['txtTacGia']}, '{$_REQUEST['txtTinhTrang']}', '{$hinh}');";
            echo $sqlThemSach;
            DataProvider::ExecuteQuery($sqlThemSach);
        }
    }
}

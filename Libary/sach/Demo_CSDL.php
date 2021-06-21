<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbanhoa');

//set bảng mã
mysqli_query($conn, 'SET NAMES utf8');

$sql = "SELECT MaSach, TenSach, TacGia, TinhTrang, MaLoai FROM book ORDER BY TenSach";

$result = mysqli_query($conn, $sql);
print_r($result);
while ($row = mysqli_fetch_array($result)) {
    echo $row["TenSach"] . ' - ' . $row[2] . '<br>';
}

mysqli_close($conn);

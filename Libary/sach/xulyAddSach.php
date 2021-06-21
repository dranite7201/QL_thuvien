<?php
header('Content-Type: text/html; charset=utf-8');
include_once('DataProvider.php');

$sqlLoai = "SELECT * FROM categories";
$dsLoai = DataProvider::ExecuteQuery($sqlLoai);
$sqlSach = "SELECT * FROM books";
$dsSach = DataProvider::ExecuteQuery($sqlSach);

// Dùng isset để kiểm tra Form
if (isset($_POST['themsach'])) {
    $tensach = trim($_POST['title']);
    $tacgia = trim($_POST['author']);
    $loai = trim($_POST['category']);
    $tinhtrang = trim($_POST['status']);
    //$hinh = trim($_POST['Hinh']);

    if (empty($tensach)) {
        array_push($errors, "Tên Sách bắt buộc có");
    }
    if (empty($tacgia)) {
        array_push($errors, "Tác giả bắt buộc có");
    }
    if (empty($tinhtrang)) {
        array_push($errors, "bắt buộc có");
    }
    if (empty($loai)) {
        array_push($errors, "bắt buộc có");
    }

    // Kiểm tra có trùng tên sách ko
    $sql = "SELECT * FROM books WHERE title = '$tensach'";

    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);

    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Bị trùng tên sách hoặc chưa nhập tên sách!"); window.location="register.php";</script>';

        // Dừng chương trình
        die();
    } else {
        $sql = "INSERT INTO books (title, author, status, category) VALUES ('$tensach','$tacgia','$tinhtrang','$loai')";
        echo '<script language="javascript">alert("Thêm sách thành công!"); window.location="ThemSach.php";</script>';

        if (mysqli_query($conn, $sql)) {
            echo "Tên Sách: " . $_POST['title'] . "<br/>";
            echo "Tác Giả: " . $_POST['author'] . "<br/>";
            echo "Tình Trạng Sách: " . $_POST['status'] . "<br/>";
            echo "Loại : " . $_POST['category'] . "<br/>";
        } else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="ThemSach.php";</script>';
        }
    }
}

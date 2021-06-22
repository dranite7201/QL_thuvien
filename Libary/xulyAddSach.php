<?php
header('Content-Type: text/html; charset=utf-8');
/*include_once ('DataProvider.php');
$sqlLoai = "SELECT * FROM categories";
$dsLoai = DataProvider::ExecuteQuery($sqlLoai);
$sqlSach = "SELECT * FROM books";
$dsSach = DataProvider::ExecuteQuery($sqlSach);*/
$conn = mysqli_connect('localhost', 'root', '', 'data1') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");
// Dùng isset để kiểm tra Form
if (isset($_POST['themsach'])) {
    $title = trim($_POST['title']);
    $isbn = trim($_POST['isbn']);
    $pageCount= trim($_POST['pageCount']);
    $publishedDate= trim($_POST['publishedDate']);
    $thumbnailUrl= trim($_POST['thumbnailUrl']);
    $shortDescription= trim($_POST['shortDescription']);
    $longDescription= trim($_POST['longDescription']);
    $status = trim($_POST['status']);
    $author_name = trim($_POST['author_name']);
    if (empty($title)) {
        array_push($errors, "Name is required");
    }
    if (empty($isbn)) {
        array_push($errors, "MaSach is required");
    }
    if (empty($pageCount)) {
        array_push($errors, "PageCount is required");
    }
    if (empty($publishedDate)) {
        array_push($errors, "Date is required");
    }
    if (empty($thumbnailUrl)) {
        array_push($errors, "Url is required");
    }
    if (empty($shortDescription)) {
        array_push($errors, "Description is required");
    }
    if (empty($longDescription)) {
        array_push($errors, "Ndung is required");
    }
    if (empty($status)) {
        array_push($errors, "Status is required");
    }
    if (empty($author_name)) {
        array_push($errors, "Status is required");
    }
    // Kiểm tra có trùng tên sách ko
    $sql = "SELECT * FROM books WHERE title = '$title'";
    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) 
    {
        echo '<script language="javascript">alert("Bị trùng tên sách hoặc chưa nhập tên sách!"); window.location="ThemSach.php";</script>';
        // Dừng chương trình
        die();
    } 
    else {
        $sql = "INSERT INTO books (title,isbn,pageCount,publishedDate,thumbnailUrl,shortDescription,longDescription, status) VALUES ('$title','$isbn','$pageCount','$publishedDate','$thumbnailUrl','$shortDescription','$longDescription','$status')";
        echo '<script language="javascript">alert("Thêm sách thành công!"); window.location="ThemSach.php";</script>';
        $sql = "INSERT INTO authors (author_name) VALUES ('$author_name')";
        echo '<script language="javascript">alert("Thêm sách thành công!"); window.location="ThemSach.php";</script>';

        if (mysqli_query($conn, $sql)) {
            echo "Tên Sách: " . $_POST['title'] . "<br/>";
            echo "Mã số sách: " . $_POST['isbn'] . "<br/>";
            echo "Số trang: " . $_POST['pageCount'] . "<br/>";
            echo "Nguồn: " . $_POST['thumbnaillUrl'] . "<br/>";
            echo "Ngày đăng: " . $_POST['publishedDate'] . "<br/>";
            echo "Mô tả " . $_POST['shortDescription'] . "<br/>";
            echo "Nội dung: " . $_POST['longDescription'] . "<br/>";
            echo "Tình Trạng Sách: " . $_POST['status'] . "<br/>";
            echo "Tác Giả: " . $_POST['author_name'] . "<br/>";

        } else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="ThemSach.php";</script>';
        }
    }
}
?>
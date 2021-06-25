<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    header('Content-Type: text/html; charset=utf-8');
    $conn = mysqli_connect('localhost', 'root', '', 'data1') or die('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");
    #//$sql = "SELECT * from books";
    // Dùng isset để kiểm tra Form
    if (isset($_POST['suasach'])) {
        //lấy dữ liệu trên form vào biến
        $id = $_POST['id'];
        $title = $_POST['title'];
        $pagec = $_POST['pagec'];
        $thumbnailUrl = $_POST['thumbnailUrl'];
        $shortDescription = $_POST['shortDescription'];
        $longDescription = $_POST['longDescription'];
        $status = $_POST['status'];
        $category_name = $_POST['category'];
        $author_name = $_POST['author_name'];
        if (empty($id)) {
            echo "Không được bỏ trống";
        };
        $sql = "SELECT id, title, pagec, thumbnailUrl, shortDescription, longDescription, status, author_name, category from books join authors tg on tg.book_id = books.id join categories lo on lo.book_id = books.id where id = '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $link = "UPDATE books SET title = ' $title  ', pagec = '  $pagec ', thumbnailUrl = ' $thumbnailUrl  ', shortDescription = ' $shortDescription  ', longDescription = '  $longDescription ', status = ' $status ' WHERE id = '$id '";
            $link1 = "UPDATE categories SET category= '$category_name' WHERE book_id = '$id'";
            $link2 = "UPDATE authors SET author_name = '$author_name' WHERE book_id = '$id;";
            echo '<script language="javascript">alert("Sửa thông tin sách thành công!"); window.location="SuaInfoSach.php";</script>';
            if (mysqli_query($conn, $link)) {
                echo "ID Sách: " . $_POST['id'] . "<br/>";
                echo "Tên Sách: " . $_POST['title'] . "<br/>";
                echo "Số trang: " . $_POST['pagec'] . "<br/>";
                echo "Nguồn: " . $_POST['thumbnaillUrl'] . "<br/>";
                echo "Mô tả " . $_POST['shortDescription'] . "<br/>";
                echo "Nội dung: " . $_POST['longDescription'] . "<br/>";
                echo "Tình Trạng Sách: " . $_POST['status'] . "<br/>";
                if (mysqli_query($conn, $link1)) {
                    echo "Loại: " . $_POST['category'] . "<br/>";
                    if (mysqli_query($conn, $link2)) {
                        echo "Tác giả: " . $_POST['author_name'] . "<br/>";
                    }
                }
            } else {
                echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="SuaInfoSach.php";</script>';
            }
        }
    } ?>
    <form method="post" action="SuaInfoSach.php" class="form">

        <h2 style="text-align: center;">Sửa Thông Tin Sách</h2>
        ID Sách: <input type="text" name="id" value="" required /><br />
        Tên Sách: <input type="text" name="title" value="" required /><br />
        Tác Giả:<input type="text" name="author_name" value="" required /><br />
        Số trang:<input type="text" name="pagec" value="" required /><br />
        Loại:<input type="text" name="category" value="" required /><br />
        Nguồn:<input type="link" name="thumbnailUrl" value="" /><br />
        Mô tả:<input type="text" name="shortDescription" value="" required /><br />
        Nội dung chi tiết:<br>
        <textarea name="longDescription" rows="5" cols="40%"></textarea><br>
        Tình trạng: <select name="status">
            <option value="Available">Available</option>
            <option value="Not Available">Not Available</option>
        </select> </br><br>
        <button type="submit" name="suasach" value="" style=" background-color:red ;width: 50%;font-size:40;color:white;border-radius: 8px;"> Sửa Thông Tin Sách </button>

    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    include_once('DataProvider.php');
    $conn = mysqli_connect('localhost', 'root', '', 'data1');
    $username = $_GET['username'];
    $sql = "SELECT username, password, hoten, ngsinh, email, type, phone from thanhvien where username = '$username'";
    if ($username == "admin") {
        header('Location: #');
    } else {
        if (isset($_POST['phieumuon'])) {
            //lấy dữ liệu trên vào biến
            $pmuon_id = $_POST['pmuon_id'];
            $username = $_POST['username'];
            $hoten = $_POST['hoten'];
            $idSach = $_POST['idSach'];
            $tenSach = $_POST['tenSach'];
            $ngaymuon = $_POST['ngaymuon'];
            $ngaytra = $_POST['ngaytra'];
            $anh = $_POST['anh'];
            if (empty($pmuon_id)) {
                echo 'Không được bỏ trống';
            }
            if (empty($username)) {
                echo 'Không được bỏ trống';
            }
            if (empty($idSach)) {
                echo 'Không được bỏ trống';
            }
            if (empty($tenSach)) {
                echo 'Không được bỏ trống';
            };
            $sql = "SELECT pmuon_id, ngaymuon, ngaytra, username, idSach, tenSach, anh, hoten from giohang";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo '<script language="javascript">alert("sách đã được mượn"); window.location="phieuMuon.php";</script>';
                die();
            } else {
                $link = "INSERT INTO giohang (pmuon_id, username, hoten, idSach, tenSach, ngaymuon, anh, ngaytra) SET ('$pmuon_id','$username','$hoten','$idSach','$tenSach','$ngaymuon','$anh','$ngaytra') where username = '$username';";
                echo '<script language="javascript">alert("Sửa thông tin sách thành công!"); window.location="phieuMuon.php";</script>';
            }
            if (mysqli_query($conn, $link)) {
                echo "ID phiếu mượn: " . $_POST['pmuon_id'] . "<br/>";
                echo "username: " . $_POST['username'] . "<br/>";
                echo "Họ tên: " . $_POST['hoten'] . "<br/>";
                echo "ID Sách: " . $_POST['idSach'] . "<br/>";
                echo "Tên sách: " . $_POST['tenSach'] . "<br/>";
                echo "Ngày mượn: " . $_POST['ngaymuon'] . "<br/>";
                echo "Ngày trả: " . $_POST['ngaytra'] . "<br/>";
                echo "Ảnh: " . $_POST['anh'] . "<br/>";
            } else {
                echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="phieuMuon.php";</script>';
            }
        }
    }
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <form method="post" action="phieuMuon.php" class="form">

        <h2 style="text-align: center;">Phiếu Mượn</h2>
        ID phiếu mượn : <input type="text" name="id" value="" required /><br />
        Username : <input type="text" name="username" value="" required /><br />
        Họ tên:<input type="text" name="hoten" value="" required /><br />
        ID sách: <input type="text" name="idSach" value="" required /><br />
        Tên Sách: <input type="text" name="tenSach" value="" required /><br />
        Ngày mượn:<input type="text" name="ngaymuon" value="" required /><br />
        Ngày trả:<input type="date" name="ngaytra" value="" required /><br />
        Ảnh: <input type="link" name="anh" required /><br /><br>
        <input type="submit" name="phieumuon" value="Mượn Sách" style=" background-color:red ;width: 20%;font-size:40;color:white;border-radius: 8px;" />
        <?php require 'xulyMuonSach.php'; ?>
    </form>
</body>

</html>
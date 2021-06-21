<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="form.css" />
</head>

<body>

    <form method="post" action="xulyAddSach.php" class="form">

        <h2>Thêm Sách</h2>
        Tên Sách: <input type="text" name="tensach" value="" required> <br>
        Tác Giả: <input type="text" name="tacgia" value="" required> <br>
        Tình Trạng: <input type="text" name="tinhtrang" value="" required /> <br>
        Loại Sách: <input type="number_format" name="maloai" value="" required> <br><br>

        <input type="submit" name="themsach" value="Thêm Sách" style="color: red; background-color: aquamarine;" />
        <?php require 'xulyAddSach.php'; ?>
    </form>

</body>

</html>
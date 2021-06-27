<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=qltv', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];
    $statement = $pdo->prepare("SELECT id, pagec, title, category, thumbnailUrl, author_name,shortDescription, longDescription, status from books join categories lo on lo.book_id = books.id join authors tg on tg.book_id = books.id where id=:id");
    $statement->bindValue(':id',$id);
    $statement->execute();
    $books = $statement->fetchAll(PDO::FETCH_ASSOC);    
    
    
    ?>
    <form method="POST" action="xulysua.php" class="form">
        <h2 style="text-align: center;">Sửa Thông Tin Sách</h2>
        <?php foreach ($books as $book) { ?>
        Tên Sách: <input type="text" name="title" value="<?php echo $book['title']; ?>" required /><br />
        Tác Giả: <input type="text" name="author" value="<?php echo $book['author_name']; ?>" required /><br />
        Thể Loại: <input type="text" name="category" value="<?php echo $book['category']; ?>" required /><br />
        Số trang:<input type="text" name="pageCount" value="<?php echo $book['pagec']; ?>" required /><br />
        Hình ảnh:<input type="link" name="thumbnailUrl" value="<?php echo $book['thumbnailUrl']; ?>" /><br />
        Nội dung chi tiết:<br>
        <textarea name="longDescription" value="<?php echo $book['longDescription']; ?>" rows="5" cols="40%"></textarea><br>
        <button type="submit" name="id" value="<?PHP echo $id ?>" style=" background-color:red ;width: 50%;font-size:40;color:white;border-radius: 8px;"> Sửa Thông Tin Sách </button>
        <?php } ?>
    </form>
</body>

</html>
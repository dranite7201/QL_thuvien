<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=data1', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare("SELECT id, title, category, thumbnailUrl, author_name,shortDescription from books join categories lo on lo.book_id = books.id join authors tg on tg.book_id = books.id GROUP BY books.id");
$statement->execute();
$books = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement1 = $pdo->prepare("select category from categories GROUP BY category  ");
$statement1->execute();
$categories = $statement1->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" />
    <title>Sach</title>
</head>

<body>
    <div>
        <a style="float: right; color: black" href="../user.php">Đăng Nhập</a>
        <h1 style="text-align: center; color:white; background-color: crimson;">LIST BOOKS</h1>
    </div>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th style="border-color:firebrick" scope="col">#</th>
                <th style="border-color:firebrick" scope="col">Hình ảnh</th>
                <th style="border-color:firebrick" scope="col">Tên Sách</th>
                <th style="border-color:firebrick" scope="col">Tác Giả</th>
                <th style="border-color:firebrick" scope="col">Thế loại</th>
                <th style="border-color:firebrick" scope="col">Mô tả </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $i => $book) { ?>
                <tr>
                    <th style="border-color:firebrick" scope="row"><?php echo $i + 1 ?></th>
                    <td style="border-color:firebrick">
                        <?php if ($book['thumbnailUrl']) : ?>
                            <img src="<?php echo $book['thumbnailUrl'] ?>" alt="<?php echo $book['title'] ?>" class="product-img">
                        <?php endif; ?>
                    </td>
                    <td style="border-color:firebrick"><?php echo $book['title'] ?></td>
                    <td style="border-color:firebrick"><?php echo $book['author_name'] ?></td>
                    <td style="border-color:firebrick"><?php echo $book['category'] ?></td>
                    <td style="border-color:firebrick"><?php echo $book["shortDescription"] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=qltv', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $pagecount = $_POST['pageCount'];
        $url = $_POST['thumbnailUrl'];
        $ld = $_POST['longDescription'];
    
    $statemen1=$pdo->prepare("UPDATE authors SET author_name=:author WHERE book_id=:id");
    $statemen1->bindValue(':author',$author);
    $statemen1->bindValue(':id',$id);
    $statemen1->execute();

    $statement2 = $pdo->prepare("UPDATE `books` SET `title`=:title,`pagec`=:pagec,`thumbnailUrl`=:urls,`longDescription`=:ld WHERE id=:id");
    $statement2->bindValue(':title', $title);
    $statement2->bindValue(':pagec', $pagecount);
    $statement2->bindValue(':urls', $url);
    $statement2->bindValue(':ld', $ld);
    $statement2->bindValue(':id', $id);
    $statement2->execute();

    $statemen3=$pdo->prepare("UPDATE categories SET category=:category WHERE book_id=:id");
    $statemen3->bindValue(':category',$category);   
    $statemen3->bindValue(':id',$id);
    $statemen3->execute();
    header('location: ../indexAdmin.html');

}

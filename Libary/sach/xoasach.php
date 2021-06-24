<?php
try{
$pdo = new PDO('mysql:host=localhost; dbname=qltv', 'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//$id = $_POST['id'] ?? NULL;
$id = "60a8a5f6585c6a78469fad16";
if(!$id){
    header('Location: dsSach.php');
    exit();
}
$statement1 = $pdo->prepare('DELETE FROM authors WHERE book_id=:id');
$statement2= $pdo->prepare('DELETE FROM categories WHERE book_id=:id');
$statement3 = $pdo->prepare('DELETE FROM books WHERE id=:id');

$statement1->bindValue(':id', $id);
$statement2->bindValue(':id', $id);
$statement3->bindValue(':id', $id);

$statement1->execute();
$statement2->execute();
$statement3->execute();

header("Location: dsSach.php");
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
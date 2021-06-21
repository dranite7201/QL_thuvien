<?php
$conn = mysqli_connect('localhost', 'root', '', 'data1');

//set bảng mã
mysqli_query($conn, 'SET NAMES utf8');

$sql = "SELECT id, title, isbn, shortDescription, status FROM books ORDER BY title";

$result = mysqli_query($conn, $sql);
print_r($result);
while ($row = mysqli_fetch_array($result)) {
    echo $row["title"] . ' - ' . $row[2] . '<br>';
}

mysqli_close($conn);

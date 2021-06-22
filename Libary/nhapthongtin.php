<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../sach/style.css" />
</head>
<body>

<form method="post" action="nhapthongtin.php" class="form" style=" width: 300px;">

<h2>Đăng ký thành viên</h2>
Họ và tên: <input type="text" name="hoten" value="" required>
Username: <input type="text" name="username" value="" required>
Password: <input type="text" name="password" value="" required/>
Ngày sinh: <input type="date" name="ngsinh" value="" required>
Email: <input type="email" name="email" value="" required/>
Số điện thoại: <input type="text" name="phone" value="" required/>

<input type="submit" name="dangky" value="Đăng Ký" style=" background-color:red ;width: 50%;font-size:40;color:white;border-radius: 8px;"/>
<?php require 'xuly.php';?>
</form>
</body>
</html>
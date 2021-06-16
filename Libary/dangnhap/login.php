<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<link rel="stylesheet" href="style.css"/> 
</head> 
<body> 
<form action='login.php' class="dangnhap" method='POST'> 
<table>
                <caption>
                    <h2 class="page-heading">ĐĂNG NHẬP </h2>
                </caption>
                <tr>
                    <td><b>Username:</b></td>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr>
                    <td><b>Password:</b></td>
                    <td><input type="password" name="password" /></td>
                </tr>
            </table>
<input type='submit' class="button" name="dangnhap" value='Đăng nhập' /> 
<button><a href='../dangki/nhapthongtin.php' title='Đăng ký'>Đăng ký</a> </button>
<?php require 'xuly.php';?> 
<form> 
</body> 
</html>
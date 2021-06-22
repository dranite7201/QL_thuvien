<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>
<body>

    <form method="post" action="ThemSach.php" class="form">

        <h2 style="text-align: center;">Điền vào nội dung sau để thêm sách</h2>
        Tên Sách: <input type="text" name="title" value="" required/>
        Mã số sách:<input type="text" name="isbn" value="" required/>
        Số trang:<input type="text" name="pageCount" value="" required/>
        Ngày đăng:<input type="date" name="publishedDate" value="" required/> 
        Nguồn:<input type="link" name="thumbnailUrl" value="" required/>
        Mô tả:<input type="text" name="shortDescription" value="" required/>
        Nội dung chi tiết:<br>
            <textarea  name="longDescription" rows="5" cols="40%"></textarea><br>
        Tình trạng: <select name="status" >
           <option  value="PUBLISH" >PUBLISH</option>
           <option value="PRIVATE">PRIVATE</option>
        </select> </br> 
        Tác Giả: <input type="text" name="author_name" value="" required> <br> 
        <input type="submit" name="themsach" value="Thêm Sách" style=" background-color:red ;width: 20%;font-size:40;color:white;border-radius: 8px;" />
        <?php require 'xulyAddSach.php';?>
    </form>

</body>

</html>
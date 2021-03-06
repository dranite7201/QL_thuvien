<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css" />
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="../footer.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div id="slideout-menu">
                <ul>
                    <li>
                        <a href="../index.html">Home</a>
                    </li>
                    <li>
                        <a href="../about.html">About</a>
                    </li>
                    <li>
                        <a href="../user.html">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                    <li>
                        <input type="text" placeholder="Search">
                    </li>
                </ul>
            </div>

            <nav>
                <div id="logo-img">
                    <a href="index.php">
                        <img src="img/logo.png" alt="">
                    </a>
                </div>
                <div id="menu-icon">
                    <i class="fas fa-bars"></i>
                </div>
                <ul>
                    <li>
                        <a class="active" href="../index.html">Home</a>
                    </li>
                    <li>
                        <a href="../about.html">About</a>
                    </li>
                    <li>
                        <div id="user-icon">
                            <a href="../user.html">
                                <i class="fas fa-user"></i>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div id="search-icon">
                            <i class="fas fa-search"></i>
                        </div>
                    </li>
                </ul>
            </nav>

            <div id="searchbox">
                <input type="text" placeholder="Search Here">
            </div>
        </div>
        <form method="post" action="xulyAddSach.php" class="form">

            <h2>Th??m S??ch</h2>
            T??n S??ch: <input type="text" name="tensach" value="" required> <br>
            T??c Gi???: <input type="text" name="tacgia" required> <br>
            Lo???i S??ch: <input type="number_format" name="maloai" required> <br><br>
            M?? T??? Ng???n: <input type="text" name="shortdes">
            M?? T??? D??i: <input type="text" name="longdes">
            S??? trang: <input type="text" name="page">
            URL H??nh ???nh: <input type="text" name="url">
            <input type="submit" name="themsach" value="Th??m S??ch" style="color: red; background-color: aquamarine;" />
        </form>
    </div>
</body>

</html>
<script src="main.js"></script>
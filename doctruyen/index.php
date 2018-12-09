<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
ob_start();
?>

<?php
require 'lib/ketnoi.php';
?>

<?php
if (isset($_GET["p"]))
    $p = $_GET["p"];
else
    $p = "";
?>


<html>
    <head>
        <LINK REL="SHORTCUT ICON"  HREF="imgs/logo.png">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="CSS/main.css">
        <title>
            Đọc Truyện
        </title>
    </head>
    <body>
        <div class="container-fluid">

            <?php
            require 'blocks/nav.php';
            ?>
            <div class="row">
                <div class="col-md-3" >
                    <?php
                    require 'blocks/theloai.php';
                    ?>
                    <?php
                    require 'blocks/tacgia.php';
                    ?>
                </div>
                <div class="col-md-9">
                    <?php
                    switch ($p) {
                        case "truyentheoloai": require 'pages/truyentheoloai.php';
                            break;
                        case "chitiettruyen": require 'pages/chitiettruyen.php';
                            break;
                        case "truyentheotacgia": require 'pages/truyentheotacgia.php';
                            break;
                        case "truyentimkiem": require 'pages/truyentimkiem.php';
                            break;
                        case "dangnhap": require 'pages/dangnhap.php';
                            break;
                        case "doimatkhau": require 'pages/doimatkhau.php';
                            break;
                        default : require 'pages/trangchu.php';
                    }
                    ?>
                </div>
            </div>  
            <div class="footer">
                <?php
                require 'blocks/footer.php';
                ?>
            </div>
        </div>

    </body>
</html>

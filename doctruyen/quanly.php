<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>

<?php
ob_start();
if (!isset($_SESSION["tendangnhap"])) {
    header('Location: index.php');
}
else {
?>

<?php
require 'lib/ketnoi.php';
?>

<?php
if (isset($_GET["p"])) {
    $p = $_GET["p"];
} else {
    $p = "truyen";
}
?>


<html>
    <head>
        <LINK REL="SHORTCUT ICON"  HREF="imgs/logo.png">
        <meta charset="UTF-8">
        <title>Quản lý</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="//cdn.ckeditor.com/4.11.1/basic/ckeditor.js"></script>
        <link rel="stylesheet" href="CSS/main.css">
    </head>
    <body>

        <div class="container-fluid">
            <?php
            require 'blocksquanly/navquanly.php';
            ?>

            <div class="row">
                <div class="col-md-3" >
                    <div class="list-group"">
                        <a class="list-group-item" style="background-color: #337ab7; text-align: center; color: white">CHỨC NĂNG</a>
                        <a href="quanly.php?p=truyen" class="list-group-item" <?php if($p=="truyen") echo("style='background-color:#ecf0f1'")?>>Quản lý truyện</a>
                        <a href="quanly.php?p=theloai" class="list-group-item" <?php if($p=="theloai") echo("style='background-color:#ecf0f1'")?>>Quản lý thể loại</a>
                        <a href="quanly.php?p=tacgia" class="list-group-item" <?php if($p=="tacgia") echo("style='background-color:#ecf0f1'")?>>Quản lý tác giả</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <?php
                    switch ($p) {
                        case "theloai": require 'pagesquanly/quanlytheloai.php';
                            break;
                        case "tacgia": require 'pagesquanly/quanlytacgia.php';
                            break;
                        case "truyen": require 'pagesquanly/quanlytruyen.php';
                            break;
                        case "chitiettruyen": require 'pagesquanly/chitiettruyen.php';
                            break;
                        case "doimatkhau": require 'pagesquanly/doimatkhau.php';
                            break;
                    }
                    ?>
                </div>
            </div>  
        </div>
    </body>
</html>
<?php }?>

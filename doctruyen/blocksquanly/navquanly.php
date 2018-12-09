<script language="javascript">
    function dangxuat() {
        if (confirm("Bạn có chắc chắn muốn đăng xuất?")) {
            window.location.href = "blocks/dangxuat.php";
        } else {

        }
    }
</script>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="quanly.php" id="trangchu" style="color: #337ab7"><span class="glyphicon glyphicon-home"></span> Quản lý</a>
        </div>
        
        <ul class="nav navbar-nav navbar-right" >
            <?php
            if (!isset($_SESSION["hotennguoidung"])) {
                ?>
                <li><a href="index.php?p=dangnhap" style="color: #337ab7"> <span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
            <?php } else { ?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #337ab7"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["hotennguoidung"]?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" style="font-size: large">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="quanly.php?p=doimatkhau">Đổi mật khẩu</a></li>
                        <li><a onclick="dangxuat()" class="dangxuat">Đăng xuất</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>

    </div>
</nav>
<?php
if(isset($_SESSION["tendangnhap"])){
    header("Location: index.php");}
?>
<?php
if (isset($_POST["btndn"])) {
    $tendangnhap = $_POST["tendangnhap"];
    $matkhau = $_POST["matkhau"];
    $matkhau= md5($matkhau);
    $kiemtra = kiemtradangnhap($tendangnhap, $matkhau);
    if (mysqli_num_rows($kiemtra) == 1) {
        $row_dn = mysqli_fetch_array($kiemtra);
        $_SESSION["hotennguoidung"] = $row_dn['hoten'];
        $_SESSION["tendangnhap"] = $row_dn['tendangnhap'];
        header("Location: quanly.php");
    } else {
        $ktdn = 0;
    }
}
?>
<div class="dangnhap">
    <p style="color: #337ab7;font-size: xx-large;padding-left: 2.5em">ĐĂNG NHẬP</p>
    <div style="width: 400px;">
        <form action="index.php?p=dangnhap" method="post">

            <div class="form-group">
                <label for="text">Tên đăng nhập:</label>
                <input type="text" class="form-control input-lg" placeholder="Tên đăng nhập" required autofocus="" name="tendangnhap">
            </div>
            <div class="form-group">
                <label for="pwd">Mật khẩu:</label>
                <input type="password" class="form-control input-lg" placeholder="Mật khẩu" required name="matkhau">
            </div>
            <?php
            if (isset($ktdn))
                if ($ktdn == 0) {
                    ?>
                    <div class="alert alert-danger" role="alert" style="text-align: center">
                        Sai tên đăng nhập hoặc mật khẩu!
                    </div>
                <?php } ?>
            <button type="submit" class="btn btn-primary btn-block btn-custom btn-lg" name="btndn">Đăng nhập</button>
        </form>
    </div>	
</div>

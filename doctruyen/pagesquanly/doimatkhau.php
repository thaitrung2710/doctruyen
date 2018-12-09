<?php
if(isset($_SESSION["tendangnhap"])){
?>
<?php
if (isset($_POST["btndmk"])) {
    $matkhaucu = $_POST["matkhaucu"];
    $matkhaumoi = $_POST["matkhaumoi"];
    $xacnhanmatkhau = $_POST["xacnhanmatkhau"];
    $kiemtramkc = kiemtradangnhap($_SESSION["tendangnhap"], md5($matkhaucu));
    if (mysqli_num_rows($kiemtramkc) == 1) {
        if ($matkhaumoi == $xacnhanmatkhau){
            if($matkhaumoi!=$matkhaucu){
                $matkhaumoi= md5($matkhaumoi);
                doimatkhau($_SESSION["tendangnhap"], $matkhaumoi);
                $ktdmk = "Đổi mật khẩu thành công!";
            }
            else{
                $ktdmk = "Mật khẩu mới không được trùng với mật khẩu cũ!";
            }
        }else {
            $ktdmk = "Xác nhận mật khẩu không chính xác!";
        }
    }else{
        $ktdmk = "Mật khẩu cũ không chính xác!";
    }       
}
?>
<div class="dangnhap">
    <p style="color: #337ab7;font-size: xx-large;padding-left: 2.5em">ĐỔI MẬT KHẨU</p>
    <div style="width: 400px;">
        <form action="quanly.php?p=doimatkhau" method="post">
            
            <div class="form-group">
                <label for="pwd">Tên đăng nhập:</label>
                <input type="text" class="form-control input-lg" value="<?php echo $_SESSION["tendangnhap"]?>" readonly required name="">
            </div>
           
            <div class="form-group">
                <label for="pwd">Mật khẩu cũ:</label>
                <input type="password" class="form-control input-lg" placeholder="Mật khẩu cũ" required name="matkhaucu">
            </div>
            
            <div class="form-group">
                <label for="pwd">Mật khẩu mới:</label>
                <input type="password" class="form-control input-lg" placeholder="Mật khẩu mới" required name="matkhaumoi">
            </div>
            
            <div class="form-group">
                <label for="pwd">Xác nhận mật khẩu:</label>
                <input type="password" class="form-control input-lg" placeholder="Xác nhận mật khẩu" required name="xacnhanmatkhau">
            </div>
            <?php 
            if(isset($ktdmk))
            {   if($ktdmk=="Đổi mật khẩu thành công!") {?>
            <div class="alert alert-info" role="alert" style="text-align: center">
                        <?php echo $ktdmk?>
                    </div>
            <?php } else {?>
                <div class="alert alert-danger" role="alert" style="text-align: center">
                        <?php echo $ktdmk?>
                    </div>
            
            <?php } }?>
            <button type="submit" class="btn btn-primary btn-block btn-custom btn-lg" name="btndmk">Lưu thay đổi</button>
        </form>
    </div>	
</div>
<?php }else 
     header('Location: quanly.php');
?>



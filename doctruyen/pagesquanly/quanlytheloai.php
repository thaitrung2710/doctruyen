<?php
if (isset($_POST["btnthemtheloai"])) {
    $tentheloai = $_POST["txttentheloai"];
    themtheloai($tentheloai);
    header('Location: quanly.php?p=theloai');
}
?>

<?php
if (isset($_POST["btnsuatheloai"])) {
    $matheloai = $_POST["txtmatheloai"];
    $tentheloai = $_POST["txttentheloai"];
    suatheloai($matheloai, $tentheloai);
    header('Location: quanly.php?p=theloai');
}
?>

<?php
if (isset($_POST["btnhuysuatheloai"])) {
    header('Location: quanly.php?p=theloai');
}
?>

<?php
if (isset($_GET["xoatheloai"])) {
    $ml = $_GET["xoatheloai"];
    settype($ml, "int");
    xoatheloai($ml);
    header('Location: quanly.php?p=theloai');
}
?>

<?php
if (isset($_GET["suatheloai"])) {
    $ml = $_GET["suatheloai"];
    settype($ml, "int");
    $theloai = gettheloaisua($ml);
    $row_theloai = mysqli_fetch_array($theloai);
}
?>
<div>
    <?php if (!isset($_GET["suatheloai"])) { ?>
        <form class="form-inline" action="quanly.php?p=theloai" method="post">
            <div class="form-group">
                <input type="text" class="form-control input-lg" placeholder="Tên thể loại" name="txttentheloai" required="">
            </div>
            <button type="submit" class="btn btn-primary btn-lg" name="btnthemtheloai">Thêm</button>
        </form>
    <?php } else { ?>
        <form class="form-inline" action="quanly.php?p=theloai" method="post">
            <div class="form-group">
                <input type="text" class="form-control input-lg" value="<?php echo $row_theloai['matheloai'] ?>" name="txtmatheloai" required="" readonly>
                <input type="text" class="form-control input-lg" value="<?php echo $row_theloai['tentheloai'] ?>" name="txttentheloai" required="">
            </div>
            <button type="submit" class="btn btn-primary btn-lg" name="btnsuatheloai">Lưu</button>
            <button type="submit" class="btn btn-lg" name="btnhuysuatheloai">Hủy</button>
        </form>
    <?php } ?>
</div>
<hr>
<p class="tieudequanly">DANH SÁCH THỂ LOẠI</p>
<table class="table table-striped table-bordered">
    <tr style="font-weight: bold">
        <td>Mã thể loại</td>
        <td>Tên thể loại</td>
        <td>Số lượng truyện</td>
        <td>Chức năng</td>
    </tr>
    <?php
    $theloai = gettheloai();
    while ($row_theloai = mysqli_fetch_array($theloai)) {
        $soluongtruyen = soluongtruyentheotheloai($row_theloai['matheloai']);
        ?>
        <tr>
            <td><?php echo $row_theloai['matheloai'] ?></td>
            <td><?php echo $row_theloai['tentheloai'] ?></td>
            <td><?php echo $soluongtruyen ?></td>
            <td>
                <button onclick="xoatheloai(<?php echo $row_theloai['matheloai'] ?>)" class="btn btn-primary">Xóa</button>
                <a class="btn btn-primary" href="quanly.php?p=theloai&suatheloai=<?php echo $row_theloai['matheloai'] ?>">Sửa</a>
            </td>
        </tr>
        <?php
    }
    ?>    
</table>
<script language="javascript">
    function xoatheloai(ml) {
        if (confirm("Thể loại và tất cả các truyện thuộc thể loại sẽ bị xóa. Bạn có chắc chắn muốn xóa thể loại này không?")) {
            window.location.href = 'quanly.php?p=theloai&xoatheloai=' + ml;
        } else {

        }
    }
</script>




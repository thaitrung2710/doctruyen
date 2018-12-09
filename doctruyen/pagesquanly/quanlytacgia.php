<?php
if (isset($_POST["btnthemtacgia"])) {
    $tentacgia = $_POST["txttentacgia"];
    themtacgia($tentacgia);
    header('Location: quanly.php?p=tacgia');
}
?>

<?php
if (isset($_POST["btnsuatacgia"])) {
    $matacgia = $_POST["txtmatacgia"];
    $tentacgia = $_POST["txttentacgia"];
    suatacgia($matacgia, $tentacgia);
    header('Location: quanly.php?p=tacgia');
}
?>

<?php
if (isset($_POST["btnhuysuatacgia"])) {
    header('Location: quanly.php?p=tacgia');
}
?>

<?php
if (isset($_GET["xoatacgia"])) {
        $mtg = $_GET["xoatacgia"];
        settype($mtg, "int");
        xoatacgia($mtg);
        header('Location: quanly.php?p=tacgia');
}
?>

<?php
if (isset($_GET["suatacgia"])) {
    $mtg = $_GET["suatacgia"];
    settype($mtg, "int");
    $tacgia = gettacgiasua($mtg);
    $row_tacgia = mysqli_fetch_array($tacgia);
}
?>
<div>
    <?php if (!isset($_GET["suatacgia"])) { ?>
        <form class="form-inline" action="quanly.php?p=tacgia" method="post">
            <div class="form-group">
                <input type="text" class="form-control input-lg" placeholder="Tên tác giả" name="txttentacgia" required="">
            </div>
            <button type="submit" class="btn btn-primary btn-lg " name="btnthemtacgia">Thêm</button>
        </form>
    <?php } else { ?>
        <form class="form-inline" action="quanly.php?p=tacgia" method="post">
            <div class="form-group">
                <input type="text" class="form-control input-lg" value="<?php echo $row_tacgia['matacgia'] ?>" name="txtmatacgia" required="" readonly>
                <input type="text" class="form-control input-lg" value="<?php echo $row_tacgia['tentacgia'] ?>" name="txttentacgia" required="">
            </div>
            <button type="submit" class="btn btn-primary btn-lg" name="btnsuatacgia">Lưu</button>
            <button type="submit" class="btn btn-lg" name="btnhuysuatacgia">Hủy</button>
        </form>
    <?php } ?>
</div>
<hr>
<p class="tieudequanly">DANH SÁCH TÁC GIẢ</p>
<table class="table table-striped  table-bordered">
    <tr style="font-weight: bold">
        <td>Mã tác giả</td>
        <td>Tên tác giả</td>
        <td>Số lượng truyện</td>
        <td>Chức năng</td>
    </tr>
    <?php
    $tacgia = gettacgia();
    while ($row_tacgia = mysqli_fetch_array($tacgia)) {
        $soluongtruyen = soluongtruyentheotacgia($row_tacgia['matacgia']);
        ?>
        <tr>
            <td><?php echo $row_tacgia['matacgia'] ?></td>
            <td><?php echo $row_tacgia['tentacgia'] ?></td>
            <td><?php echo $soluongtruyen ?></td>
            <td>
                <button onclick="xoatacgia(<?php echo $row_tacgia['matacgia'] ?>)" class="btn btn-primary">Xóa</button>
                <a class="btn btn-primary" href="quanly.php?p=tacgia&suatacgia=<?php echo $row_tacgia['matacgia'] ?>">Sửa</a>
            </td>
        </tr>
        <?php
    }
    ?>    
</table>
<script language="javascript">
    function xoatacgia(mtg) {
        if (confirm("Tác giả và tất cả các truyện của tác giả sẽ bị xóa. Bạn có chắc chắn muốn xóa tác giả này không?")) {
            window.location.href = 'quanly.php?p=tacgia&xoatacgia=' + mtg;
        } else {

        }
    }
</script>




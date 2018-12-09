<?php
if (isset($_GET['mt'])) {
    $mt = $_GET['mt'];
    settype($mt, "int");
    $truyen = gettruyensua($mt);
    $row_truyen = mysqli_fetch_array($truyen);
    $chuong = getchitiettruyen($mt);
    $chuongmoinhat = getchuongmoinhat($mt);
}
?>

<?php
if (isset($_POST['btnthemchuong'])) {
    $txtchuong = $_POST['txtchuong'];
    $txtnoidung = $_POST['txtnoidung'];
    themchuong($mt, $txtchuong, $txtnoidung);
    header('Location: quanly.php?p=chitiettruyen&mt=' . $mt);
}
?>

<?php
if (isset($_GET['xoachuong'])) {
    $chuongcanxoa = $_GET['xoachuong'];
    xoachuong($mt, $chuongcanxoa);
    header('Location: quanly.php?p=chitiettruyen&mt=' . $mt);
}
?>

<?php
if (isset($_GET['suachuong'])) {
    $chuongcansua = $_GET['suachuong'];
    $chuong = getchuongsua($mt, $chuongcansua);
    $row_chuong = mysqli_fetch_array($chuong);
}
?>

<?php
if (isset($_POST['btnhuysuachuong'])) {
    header('Location: quanly.php?p=chitiettruyen&mt=' . $mt);
}
?>

<?php
if (isset($_POST['btnsuachuong'])) {
    $txtchuong = $_POST['txtchuong'];
    $txtnoidung = $_POST['txtnoidung'];
    suachuong($mt, $txtchuong, $txtnoidung);
    header('Location: quanly.php?p=chitiettruyen&mt=' . $mt);
}
?>

<ul class="nav nav-pills">
    <li class="active"><a data-toggle="tab" href="#chitiettruyen">Chi tiết truyện</a></li>
    <li><a data-toggle="tab" href="#themchuong">Thêm chương</a></li>
</ul>
<div class="tab-content">
    <div id="chitiettruyen" class="tab-pane fade in active">
        <?php if (!isset($_GET['suachuong'])) { ?>
            <div class="truyen">
                <p><a href="quanly.php?p=truyen" style="text-decoration: none; padding:10px">
                        <span class=" glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                        <span class=" glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                        <span class=" glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                    </a></p>
                <b class="tieudetruyen"><?php echo $row_truyen['tentruyen'] ?></b>
                <br><b>Tóm tắt: </b><?php echo $row_truyen['tomtat'] ?>
                <br><b>Thể loại: </b><?php echo $row_truyen['tentheloai'] ?>
                <br><b>Tác giả: </b><?php echo $row_truyen['tentacgia'] ?>
                <br><b>Chương mới nhất: </b><?php echo $chuongmoinhat ?>
            </div>

            <table class="table table-striped table-bordered">
                <tr>
                    <th >Chương</th>
                    <th width="80%">Nội dung</th>
                    <th width="12%">Chức năng</th>
                </tr>
                <?php while ($row_chuong = mysqli_fetch_array($chuong)) { ?>
                    <tr>
                        <td><?php echo $row_chuong['chuong'];?></td>
                        <td>
                            <?php
                            if (strlen($row_chuong['noidung']) > 1030) {
                                for ($i = 1000; $i < 1030; $i++) {
                                    if (substr($row_chuong['noidung'], $i, 1) == " "){
                                        $noidung = substr($row_chuong['noidung'], 0, $i) . " ...</p>";
                                        break;
                                    }
                                }
                                echo $noidung;
                            } else {
                                echo $row_chuong['noidung'];
                            }
                            ?>

                        </td>
                        <td>
                            <button onclick="xoachuong(<?php echo $row_chuong['chuong'] ?>)" class="btn btn-primary">Xóa</button>
                            <a class="btn btn-primary" href="quanly.php?p=chitiettruyen&mt=<?php echo $mt ?>&suachuong=<?php echo $row_chuong['chuong'] ?>">Sửa</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <div class="truyen">
                <div>
                    <form action="quanly.php?p=chitiettruyen&mt=<?php echo $mt ?>" method="post">

                        <div class="form-group">
                            <label for="text">Tên truyện:</label>
                            <input type="text" class="form-control input-lg" required="" name="txttentruyen" readonly="" value="<?php echo $row_chuong['tentruyen'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="text">Chương:</label>
                            <input type="number" class="form-control input-lg" required="" name="txtchuong" value="<?php echo $row_chuong['chuong'] ?>" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="text">Nội dung:</label>
                            <textarea rows="20" cols="20"  name="txtnoidung"  type="text" class="form-control input-lg" required >
                                <?php echo $row_chuong['noidung'] ?>
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" name="btnsuachuong">Lưu</button>
                        <button type="submit" class="btn btn-lg" name="btnhuysuachuong">Hủy</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
    <div id="themchuong" class="tab-pane fade">
        <div class="truyen">
            <div>
                <form action="quanly.php?p=chitiettruyen&mt=<?php echo $mt ?>" method="post">

                    <div class="form-group">
                        <label for="text">Tên truyện:</label>
                        <input type="text" class="form-control input-lg" required="" name="txttentruyen" readonly="" value="<?php echo $row_truyen['tentruyen'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="text">Chương:</label>
                        <input type="number" class="form-control input-lg" required="" name="txtchuong" value="<?php echo $chuongmoinhat+1?>">
                    </div>

                    <div class="form-group">
                        <label for="text">Nội dung:</label>
                        <textarea rows="7" cols="" style="resize: none" name="txtnoidung"  type="text" class="form-control input-lg" required ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom btn-lg" name="btnthemchuong" value="1">Thêm chương</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('txtnoidung');
</script>

<script language="javascript">
    function xoachuong(mc) {
        if (confirm("Bạn có chắc chắn muốn xóa chương này không?")) {
            window.location.href = 'quanly.php?p=chitiettruyen&mt=' + <?php echo $mt ?> + '&xoachuong=' + mc;
        } else {

        }
    }
</script>



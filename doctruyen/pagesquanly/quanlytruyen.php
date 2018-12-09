<?php
if (isset($_POST["btnthemtruyen"])) {
    $txttentruyen = $_POST["txttentruyen"];
    $txttomtat = $_POST["txttomtat"];
    $txttacgia = $_POST["txttacgia"];
    $txttheloai = $_POST["txttheloai"];
    themtruyen($txttentruyen, $txttomtat, $txttacgia, $txttheloai);
    header('Location: quanly.php?p=truyen');
}
?>

<?php
if (isset($_POST["btnsuatruyen"])) {
    $txtmatruyen = $_POST["txtmatruyen"];
    $txttentruyen = $_POST["txttentruyen"];
    $txttomtat = $_POST["txttomtat"];
    $txttacgia = $_POST["txttacgia"];
    $txttheloai = $_POST["txttheloai"];
    suatruyen($txtmatruyen, $txttentruyen, $txttomtat, $txttheloai, $txttacgia);
    header('Location: quanly.php?p=truyen');
}
?>

<?php
if (isset($_POST["btnhuy"])) {
    header('Location: quanly.php?p=truyen');
}
?>

<?php
if (isset($_GET["suatruyen"])) {
    $mt = $_GET["suatruyen"];
    settype($mt, "int");
    $truyen = gettruyensua($mt);
    $row_truyen = mysqli_fetch_array($truyen);
}
?>

<?php
if (isset($_GET["xoatruyen"])) {
    $mt = $_GET["xoatruyen"];
    settype($mt, "int");
    xoatruyen($mt);
    header('Location: quanly.php?p=truyen');
}
?>

<?php
$theloai = gettheloai();
$tacgia = gettacgia();
?>

<?php
if (isset($_POST['btntimkiem'])) {
    $txttimkiem = $_POST['txttimkiem'];
    $truyen = gettruyentimkiem($txttimkiem);
} else {
    $truyen = gettruyen();
}
?>



<ul class="nav nav-pills">
    <li class="active"><a data-toggle="tab" href="#danhsachtruyen">Danh sách truyện</a></li>
    <li><a data-toggle="tab" href="#themtruyen">Thêm truyện</a></li>
</ul>
<div class="tab-content">
    <div id="danhsachtruyen" class="tab-pane fade in active">
        <?php if (!isset($_GET["suatruyen"])) { ?>
            <div style="width: 50%">
                <form action="quanly.php?p=truyen" method="post" style="margin: 10px 0px" >
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập tên truyện cần tìm" required=""
                               name="txttimkiem" value="<?php if (isset($_POST['txttimkiem'])) echo $_POST['txttimkiem'] ?>">
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="btntimkiem" style="padding-left: 25px;padding-right: 25px">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <?php if (isset($_POST['btntimkiem'])) { ?>
                <p class="timkiem">Có <?php echo mysqli_num_rows($truyen) ?> kết quả tìm kiếm cho "<?php echo $_POST['txttimkiem'] ?>" :</p>
            <?php } ?>
            <table class="table table-striped table-bordered">
                <tr style="font-weight: bold">
                    <td>Tên truyện</td>
                    <td width="50%">Tóm tắt</td>
                    <td>Thể loại</td>
                    <td>Tác giả</td>
                    <td width="12%">Chức năng</td>
                </tr>
                <?php
                while ($row_truyen = mysqli_fetch_array($truyen)) {
                    ?>
                    <tr>
                        <td><a href="quanly.php?p=chitiettruyen&mt=<?php echo $row_truyen['matruyen'] ?>"> <?php echo $row_truyen['tentruyen'] ?></a></td>
                        <td style="text-align: justify"><?php echo $row_truyen['tomtat'] ?></td>
                        <td><?php echo $row_truyen['tentheloai'] ?></td>
                        <td><?php echo $row_truyen['tentacgia'] ?></td>
                        <td>
                            <button onclick="xoatruyen(<?php echo $row_truyen['matruyen'] ?>)" class="btn btn-primary">Xóa</button>
                            <a class="btn btn-primary" href="quanly.php?p=truyen&suatruyen=<?php echo $row_truyen['matruyen'] ?>">Sửa</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>    
            </table>
            <?php if (isset($_POST['btntimkiem'])) { ?>
                <p><a href="quanly.php?p=truyen" style="text-decoration: none;">
                    <span class=" glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                    <span class=" glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                    <span class=" glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                </a></p>
            <?php } ?>
        <?php } else { ?>
            <div class="truyen">
                <div>
                    <form action="quanly.php?p=truyen" method="post">
                        <div class="form-group">
                            <label for="text">Mã truyện:</label>
                            <input type="text" class="form-control input-lg" value="<?php echo $row_truyen['matruyen'] ?>" name="txtmatruyen" required="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="text">Tên truyện:</label>
                            <input type="text" class="form-control input-lg" required="" name="txttentruyen" value="<?php echo $row_truyen['tentruyen'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="text">Tóm tắt:</label>
                            <textarea rows="7" cols="" style="resize: none" name="txttomtat"  type="text" class="form-control input-lg"
                                      value="" required ><?php echo $row_truyen['tomtat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Tác giả:</label>
                            <select class="form-control input-lg" id="sel1" name="txttacgia">
                                <?php while ($row_tacgia = mysqli_fetch_array($tacgia)) { ?>
                                    <?php if ($row_tacgia['matacgia'] == $row_truyen['matacgia']) { ?>
                                        <option selected="" value="<?php echo $row_tacgia['matacgia'] ?>"><?php echo $row_tacgia['tentacgia'] ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $row_tacgia['matacgia'] ?>"><?php echo $row_tacgia['tentacgia'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Thể loại:</label>
                            <select class="form-control input-lg" id="sel1" name="txttheloai">
                                <?php while ($row_theloai = mysqli_fetch_array($theloai)) { ?>
                                    <?php if ($row_theloai['matheloai'] == $row_truyen['matheloai']) { ?>
                                        <option selected="" value="<?php echo $row_theloai['matheloai'] ?>"><?php echo $row_theloai['tentheloai'] ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $row_theloai['matheloai'] ?>"><?php echo $row_theloai['tentheloai'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" name="btnsuatruyen">Lưu</button>
                        <button type="submit" class="btn btn-lg" name="btnhuy">Hủy</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
    <div id="themtruyen" class="tab-pane fade">
        <div class="truyen">
            <div>
                <form action="quanly.php?p=truyen" method="post">

                    <div class="form-group">
                        <label for="text">Tên truyện:</label>
                        <input type="text" class="form-control input-lg" required="" name="txttentruyen">
                    </div>
                    <div class="form-group">
                        <label for="text">Tóm tắt:</label>
                        <textarea rows="7" cols="" style="resize: none" name="txttomtat"  type="text" class="form-control input-lg" required ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Tác giả:</label>
                        <select class="form-control input-lg" id="sel1" name="txttacgia">
                            <?php while ($row_tacgia = mysqli_fetch_array($tacgia)) { ?>
                                <option value="<?php echo $row_tacgia['matacgia'] ?>"><?php echo $row_tacgia['tentacgia'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Thể loại:</label>
                        <select class="form-control input-lg" id="sel1" name="txttheloai">
                            <?php while ($row_theloai = mysqli_fetch_array($theloai)) { ?>
                                <option value="<?php echo $row_theloai['matheloai'] ?>"><?php echo $row_theloai['tentheloai'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom btn-lg" name="btnthemtruyen" value="1">Thêm truyện</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script language="javascript">
    function xoatruyen(mt) {
        if (confirm("Bạn có chắc chắn muốn xóa truyện này không?")) {
            window.location.href = 'quanly.php?p=truyen&xoatruyen=' + mt;
        } else {

        }
    }
</script>







<?php
while ($row_truyen = mysqli_fetch_array($truyen)) {
    ?><div class="truyen">
        <a href="index.php?p=chitiettruyen&mt=<?php echo $row_truyen['matruyen'] ?>" class="tieude">
            <?php echo $row_truyen['tentruyen'] ?></a>
        <br><b>Tóm tắt: </b><?php echo $row_truyen['tomtat'] ?>
        <br><b>Thể loại: </b><?php echo $row_truyen['tentheloai'] ?>
        <br><b>Tác giả: </b><?php echo $row_truyen['tentacgia'] ?>
    </div>
    <?php
}
?>

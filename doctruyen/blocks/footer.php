<?php
$theloai = get5theloai();
$tacgia = get5tacgia();
?>
<div class="row">
    <div class="col-md-4">
        <p><span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>&nbsp;&nbsp; Copyright by :</p>
        <ul>
            <li><a href="https://www.facebook.com/trung.ng.543" target="_blank" title="Facebook">Nguyễn Thái Trung</a></li>
            <li>Tào Thanh Sang</li>
            <li>Đỗ Chơn Như</li>
            <li>Nguyễn Thành Dũng</li>
            <li>Mai Đình Hòa</li>
        </ul>
    </div>
    <div class="col-md-4">
        <p><span class="glyphicon glyphicon-book" aria-hidden="true"></span>&nbsp;&nbsp; Thể loại :</p>
        <ul>
            <?php
            while ($row_theloai = mysqli_fetch_array($theloai)) {
                ?>
                <li>
                    <a href="index.php?p=truyentheoloai&ml=<?php echo $row_theloai['matheloai'] ?>" >
                        <?php echo $row_theloai['tentheloai'] ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="col-md-4">
        <p><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp; Tác giả :</p>
        <ul><?php
            while ($row_tacgia = mysqli_fetch_array($tacgia)) {
                ?>
                <li>
                    <a href="index.php?p=truyentheotacgia&mtg=<?php echo $row_tacgia['matacgia'] ?>" >
                        <?php echo $row_tacgia['tentacgia'] ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
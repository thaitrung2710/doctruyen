<?php
if (isset($_POST["btntk"])) {
    $txttimkiem = $_POST["txttimkiem"];
    $truyen = gettruyentimkiem($txttimkiem);
    $soketqua = mysqli_num_rows($truyen);
    ?>
    <p class="timkiem">Có <?php echo $soketqua ?> kết quả tìm kiếm cho "<?php echo $txttimkiem ?>":</p>
    <?php
    require 'hienthitruyen.php';
}
?>


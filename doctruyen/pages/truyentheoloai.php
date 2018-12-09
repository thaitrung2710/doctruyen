<?php
if (isset($_GET["ml"])) {
    $sotruyen1trang = 5;

    if (isset($_GET["trang"])) {
        $trang = $_GET["trang"];
    } else {
        $trang = 1;
    }

    $from = ($trang - 1) * $sotruyen1trang;
    $ml = $_GET["ml"];
    $truyen = gettruyentheoloai_phantrang($ml,$from,$sotruyen1trang);
    $soluongtruyen = mysqli_num_rows(gettruyentheoloai($ml));
    require 'hienthitruyen.php';?>
    <?php
    $sotrang = ceil($soluongtruyen / $sotruyen1trang);
    if ($sotrang != 0)
        echo("Trang: ");
    for ($i = 1; $i <= $sotrang; $i++) {
        ?>
        <a href="index.php?p=truyentheoloai&ml=<?php echo $ml ?>&trang=<?php echo $i ?>" 
           <?php if ($trang == $i)
               echo("class='sotrangdangchon'");
           else
               echo("class='sotrang'");
           ?>><?php echo $i; ?></a>
        <?php
    }
}
?>


<?php
if (isset($_GET["mtg"])) {
    $sotruyen1trang = 5;

    if (isset($_GET["trang"])) {
        $trang = $_GET["trang"];
    } else {
        $trang = 1;
    }

    $from = ($trang - 1) * $sotruyen1trang;
    $mtg = $_GET["mtg"];
    $truyen = gettruyentheotacgia_phantrang($mtg, $from, $sotruyen1trang);
    $soluongtruyen = mysqli_num_rows(gettruyentheotacgia($mtg));
    require 'hienthitruyen.php';
    ?>
    <?php
    $sotrang = ceil($soluongtruyen / $sotruyen1trang);
    if ($sotrang != 0)
        echo("Trang: ");
    for ($i = 1; $i <= $sotrang; $i++) {
        ?>
        <a href="index.php?p=truyentheotacgia&mtg=<?php echo $mtg ?>&trang=<?php echo $i ?>" 
           <?php if ($trang == $i)
               echo("class='sotrangdangchon'");
           else
               echo("class='sotrang'");
           ?>><?php echo $i; ?></a>
        <?php
    }
}
?>


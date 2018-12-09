<?php
$sotruyen1trang = 5;

if (isset($_GET["trang"])) {
    $trang = $_GET["trang"];
} else {
    $trang = 1;
}

$from = ($trang - 1) * $sotruyen1trang;

$truyen = gettruyen_phantrang($from, $sotruyen1trang);
require 'hienthitruyen.php';
?>
Trang:
<?php
$soluongtruyen= soluongtruyen();
settype($soluongtruyen, "int");
for($i=1;$i<= ceil($soluongtruyen/$sotruyen1trang);$i++){
    ?>
<a href="index.php?trang=<?php echo $i?>" 
    <?php if($trang==$i) echo("class='sotrangdangchon'"); else echo("class='sotrang'"); ?>><?php echo $i;?></a><?php
}
?>


<div class="truyen"  >
    <?php
    if (isset($_GET["mt"])) {
        $mt = $_GET["mt"];
        echo ("<p class='tieudetruyen'>" . mysqli_fetch_array(gettentruyen($mt))["tentruyen"] . "</p>");
        if (!isset($_GET["chuong"])) {
            $chuong = 1;
        } else {
            $chuong = $_GET["chuong"];
        }
        $noidung = getnoidungtruyen($mt, $chuong);
        while ($row_noidung = mysqli_fetch_array($noidung)) {
            ?>
            <?php
            echo($row_noidung['noidung']);
            ?>

            <?php
        }
    }
    ?>
</div>
Chương:
<?php
$sochuong = getsochuong($mt);
while ($row_sochuong = mysqli_fetch_array($sochuong)) {
    ?>
    <a href="index.php?p=chitiettruyen&mt=<?php echo $mt ?>&chuong=<?php echo($row_sochuong['chuong']) ?>" 
    <?php
    if ($row_sochuong['chuong'] == $chuong)
        echo("class='sotrangdangchon'");
    else
        echo("class='sotrang'");
    ?>><?php echo($row_sochuong['chuong']) ?></a><?php
   }
   ?>

<a href="#" id="goTop">
    <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
</a>

<script language="javascript">
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#goTop').fadeIn();
            } else {
                $('#goTop').fadeOut();
            }
        });
        $('#goTop').click(function () {
            $("html, body").animate({scrollTop: 0}, 600);
            return false;
        });
    });
</script>


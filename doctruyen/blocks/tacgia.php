<div class="list-group"">
    <a class="list-group-item" style="background-color: #337ab7; text-align: center; color: white">TÁC GIẢ</a>
    <?php
    $tacgia = gettacgia();
    while ($row_tacgia = mysqli_fetch_array($tacgia))
    {
        ?>
        <a href="index.php?p=truyentheotacgia&mtg=<?php echo $row_tacgia['matacgia']?>" class="list-group-item" >
            <?php echo $row_tacgia['tentacgia'] ?></a>
        <?php
    }
    ?>
</div>
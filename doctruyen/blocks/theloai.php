<div class="list-group"">
    <a class="list-group-item" style="background-color: #337ab7; text-align: center; color: white">THỂ LOẠI</a>
    <?php
    $theloai = gettheloai();
    while ($row_theloai = mysqli_fetch_array($theloai))
    {
        ?>
        <a href="index.php?p=truyentheoloai&ml=<?php echo $row_theloai['matheloai']?>" class="list-group-item" >
            <?php echo $row_theloai['tentheloai'] ?>
        </a>
        <?php
    }
    ?>
</div>
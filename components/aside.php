
<?php 
include_once './src/config.php';
$conn = Config();

$sql = "SELECT * FROM aside";
$query = mysqli_query($conn, $sql);
?>

<aside>
    <?php 
    foreach ($query as $row):
     ?>
    <div class="aside-items">
        <img src="img/<?=$row['img']?>" alt="">
        <a href="">
            <h3><?=$row['title']?></h3>
            <p><?=$row['sub_title']?></p>
        </a>
    </div>
    <?php endforeach; ?>
</aside>
<?php 

include_once('src/config.php');
$conn = Config();

$sql = "SELECT * FROM sidebar";
$query = mysqli_query($conn, $sql);

?>

<nav>
    <ul>
        
        <?php  foreach($query as $row) : ?>
        <li><a href="#" onclick="loadComponents('<?= $row['link']?>')"><i class="<?= $row['icon']?>"></i><?= $row['title']?></a></li>
        <?php EndForeach; ?>

        <li><a href="#contact"><i class="fa-solid fa-phone"></i>Contact</a></li>
        <li><a href="src/login.php"><i class="fas fa-sign-in-alt"></i>Login</a></li>
    </ul>
</nav>
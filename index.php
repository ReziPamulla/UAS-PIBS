<?php

include_once 'src/config.php';
$conn = Config();

$sql = "SELECT * FROM article WHERE title ='Hello'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $paragraf = $row['paragraf'];
    $img = $row['img'];
} else {
    echo "0 results";
}
?>
<?php include 'components/header.php' ?>
<div class="main">
    <?php include 'components/sidebar.php' ?>
    <article id="components">
        <h2 id="judul1">
            <?= $title ?>
        </h2>
        <div class="logo">
            <img id="img-artikel" src="img/<?= $img ?>" alt="">
        </div>
        <p id="p-artikel">
            <?= $paragraf ?>
        </p>
    </article>
    <?php include 'components/aside.php'; ?>
</div>
<?php include 'components/footer.php'; ?>
<script src="https://kit.fontawesome.com/8b0694a704.js" crossorigin="anonymous"></script>
</body>
</html>
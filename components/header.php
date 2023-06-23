<?php 
    include_once('src/config.php');
    $conn = Config();
    $sql = "SELECT * FROM header";
    $query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REZI PAMULLA</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-RU2fwhN6KkU6wveYz5dXT0b0Kz5If5A5Az4fGS0qx2Qxh0jUFLw6YlkF7qE8JeXO1y0u2QvRhe7Rya+HXfHJZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js"></script>
</head>
<body>
    <header>
        <div class="title-header">
            <?php  foreach($query as $row) : ?>
            <h3><?= $row['first_name'] ?> <span><?= $row['last_name'] ?></span></h3>
            <?php endforeach; ?>
        </div>
</header>
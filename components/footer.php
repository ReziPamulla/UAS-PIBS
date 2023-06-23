<?php 

include_once('src/config.php');
$conn = Config();

$sql_1 = "SELECT * FROM sidebar";
$query_1 = mysqli_query($conn, $sql_1);

$sql_2 = "SELECT * FROM medsos";
$query_2 = mysqli_query($conn, $sql_2);

?>

<footer id="contact" class="footer-distributed">
        <div class="footer-left">
            <h3>Rezi <span>Pamulla</span></h3>
            <p class="footer-links">
                <?php foreach ($query_1 as $row): ?>
                <a href="#" onclick="loadComponents('<?= $row['link'] ?>')"><?= $row['title'] ?></a>
                ·
                <?php endforeach; ?>
                <a href="#contact">Contact</a>
            </p>
            <p class="footer-company-name">Rezi Pamulla © 2023</p>
            <div class="footer-icons">
                <?php foreach ($query_2 as $row): ?>
                <a href="<?= $row['link'] ?>"><i class="<?= $row['icon'] ?>"></i></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="footer-right">
            <p>Contact Us</p>
            <form action="#" method="post">
                <input type="text" name="email" placeholder="Email">
                <textarea name="message" placeholder="Message"></textarea>
                <button>Send</button>
            </form>
        </div>
    </footer>
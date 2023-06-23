<?php 

include_once '../../config.php';
$conn = Config();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM sidebar WHERE id = $id";
    $result = $conn->query($sql);
    if ($result) {
        header('location: ../index.php');
    } else {
        echo "0 results";
    }
}

?>
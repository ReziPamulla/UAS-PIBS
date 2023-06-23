<?php 
include_once '../../config.php';
$conn = Config();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM article WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $img = $row['img'];
        $paragraf = $row['paragraf'];
    } else {
        echo "0 results";
    }
}


if (isset($_POST['simpan'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Cek apakah ada file yang diunggah
    if (!empty($_FILES['img']['name'])) {
        // Mengunggah file
        $targetDir = '../../../img/';
        $fileName = $_FILES['img']['name'];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Izinkan hanya tipe file gambar tertentu (misalnya: jpg, png)
        $allowedTypes = array('jpg', 'jpeg', 'png');
        if (in_array($fileType, $allowedTypes)) {
            // Pindahkan file ke direktori tujuan
            if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFilePath)) {
                // File berhasil diunggah, update data di tabel artikel
                $query = "UPDATE article SET title='$title', paragraf='$content', img='$fileName' WHERE id=$id";
                if (mysqli_query($conn, $query)) {
                    echo "Data berhasil diperbarui.";
                    header('Location: ../index.php');
                } else {
                    echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($conn);
                }
            } else {
                echo "Terjadi kesalahan saat mengunggah file.";
            }
        } else {
            echo "Tipe file yang diunggah tidak diizinkan.";
        }
    } else {
        // Jika tidak ada file yang diunggah, hanya update data teks
        $query = "UPDATE article SET title='$title', paragraf='$content' WHERE id=$id";
        if (mysqli_query($conn, $query)) {
           header('Location: ../index.php');
        } else {
            echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($conn);
        }
    }
}
?>

<?php include '../header.php' ?>
<div class="container py-5">
    <div class="card p-5" style="max-width: 700px;">
        <h3 class="mb-4">Tambah Data Aticle</h3>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="inputEmail3" value="<?=$title?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <img src="../../../img/<?=$img?>" style="width:100px" alt="">
                    <input type="file" name="img" class="form-control" id="inputEmail3">
                </div>
            </div>

            <div class="form-floating pb-4">
                <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 400px"><?=$paragraf?></textarea>
                <label for="floatingTextarea2">Konten</label>
            </div>

            <input value="simpan" name="simpan" type="submit" class="btn btn-primary" />
        </form>
    </div>
</div>
<?php include '../footer.php' ?>


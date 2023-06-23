<?php include '../header.php' ?>
<div class="container py-5">
    <div class="card p-5" style="max-width: 700px;">
        <h3 class="mb-4">Tambah Data Menu</h3>
        <form method="post" action="">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="inputEmail3">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Icon</label>
                <div class="col-sm-10">
                    <input type="text" name="icon" class="form-control" id="inputEmail3">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Url</label>
                <div class="col-sm-10">
                    <input type="text" name="url" class="form-control" id="inputEmail3">
                </div>
            </div>
            <input value="simpan" name="simpan" type="submit" class="btn btn-primary" />
        </form>
    </div>
</div>
<?php include '../footer.php' ?>

<?php 
include_once '../../config.php';
$conn = Config();

if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $icon = $_POST['icon'];
    $url = $_POST['url'];

    $sql = "INSERT INTO sidebar (title, icon, link) VALUES ('$title', '$icon', '$url')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('Location: ../index.php');
    } else {
        echo "Gagal";
    }
}
?>
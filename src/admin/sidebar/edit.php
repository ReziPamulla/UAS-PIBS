<?php 
include_once '../../config.php';
$conn = Config();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM sidebar WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $icon = $row['icon'];
        $link = $row['link'];
    } else {
        echo "0 results";
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $icon = $_POST['icon'];
    $link = $_POST['link'];

    $sql = "UPDATE sidebar SET title = '$title', icon = '$icon', link = '$link' WHERE id = $id";
    $result = $conn->query($sql);
    if ($result) {
        header('location: ../index.php');
    } else {
        echo "0 results";
    }
}
?>

<?php include '../header.php' ?>
<div class="container py-5">
    <div class="card p-5" style="max-width: 700px;">
        <h3 class="mb-4">Edit Data Menu</h3>
        <form method="post" action="">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="id" class="form-control" id="inputEmail3" value="<?=$id?>" hidden>
                    <input type="text" name="title" class="form-control" id="inputEmail3" value="<?=$title?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Icon</label>
                <div class="col-sm-10">
                    <input type="text" name="icon" class="form-control" value="<?=$icon?>" id="inputEmail3">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label" >Url</label>
                <div class="col-sm-10"> 
                    <input type="text" name="link" class="form-control" value="<?=$link?>" id="inputEmail3">
                </div>
            </div>
            <input value="simpan" name="simpan" type="submit" class="btn btn-primary" />
        </form>
    </div>
</div>
<?php include '../footer.php' ?>


<?php 

include_once '../config.php';
$conn = Config();

$sql_1 = "SELECT * FROM sidebar";
$query_1 = mysqli_query($conn, $sql_1);

$sql_2 = "SELECT * FROM article";
$query_2 = mysqli_query($conn, $sql_2);

?>


<?php include 'header.php' ?>
<nav class="navbar shadow-sm p-3 mb-5 bg-body-tertiary rounded">
    <div class="container">
        <a class="navbar-brand" href="#">
            Administator
        </a>
        <a href="../logout.php" class="btn btn-primary justify-content-end">Logout</a>
    </div>
</nav>

<div class='container py-1 '>
    <div class="card shadow-sm p-4 border-0">
        <div class="card-body">
            <h3 class="card-title">Tabel Menu</h3>
            <a href="sidebar/tambah.php" class="btn btn-primary mb-3">Tambah Data Menu</a>
            <table class="table border" style="width: auto;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Icon</th>
                        <th scope="col">URL</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($query_1 as $row):?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?=$row['title']?></td>
                        <td><?=$row['icon']?></</td>
                        <td><?=$row['link']?></</td>
                        <td>
                            <a class="btn btn-warning" href="sidebar/edit.php?id=<?=$row['id']?>">Edit</a>
                            <a class="btn btn-danger" href="sidebar/delete.php?id=<?=$row['id']?>">Hapus</a>
                        </td>
                    </tr>
                    <?php EndForeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class='container py-5 '>
    <div class="card shadow-sm p-4 border-0">
        <div class="card-body">
            <h3 class="card-title">Tabel Article</h3>
            <a href="article/tambah.php" class="btn btn-primary mb-3">Tambah Data Article</a>
            <table class="table border" style="width: auto;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Text</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($query_2 as $row):?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?=$row['title']?></td>
                        <td style="max-width: 300px;"><img src="../../img/<?=$row['img']?>" class="img-fluid rounded" alt="not found"/></td>
                        <td style="max-width: 500px;"><?=$row['paragraf']?></</td>
                        <td>
                            <a class="btn btn-warning" href="article/edit.php?id=<?=$row['id']?>">Edit</a>
                            <a class="btn btn-danger" href="article/delete.php?id=<?=$row['id']?>">Hapus</a>
                        </td>
                    </tr>
                    <?php EndForeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
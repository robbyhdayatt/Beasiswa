<?php
include '../functions.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_beasiswa WHERE id=$id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $detail = $_POST['detail'];
    $link = $_POST['link'];
    $gambar = $_POST['gambar'];

    $query = "UPDATE tb_beasiswa SET nama='$nama', detail='$detail', link='$link', gambar='$gambar' WHERE id=$id";
    if ($conn->query($query) === TRUE) {
        header("Location: lihat_beasiswa.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Beasiswa</title>
</head>
<body>
    <form method="POST" action="">
        Nama: <input type="text" name="nama" value="<?= $row['nama'] ?>"><br>
        Detail: <textarea name="detail"><?= $row['detail'] ?></textarea><br>
        Link: <input type="text" name="link" value="<?= $row['link'] ?>"><br>
        Gambar: <input type="text" name="gambar" value="<?= $row['gambar'] ?>"><br>
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>

<?php
include '../functions.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_pengumuman WHERE id=$id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $beasiswa_id = $_POST['beasiswa_id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    $query = "UPDATE tb_pengumuman SET beasiswa_id='$beasiswa_id', judul='$judul', konten='$konten' WHERE id=$id";
    if ($conn->query($query) === TRUE) {
        header("Location: lihat_pengumuman.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengumuman</title>
</head>
<body>
    <form method="POST" action="">
        Beasiswa: <input type="number" name="beasiswa_id" value="<?= $row['beasiswa_id'] ?>"><br>
        Judul: <input type="text" name="judul" value="<?= $row['judul'] ?>"><br>
        Konten: <textarea name="konten"><?= $row['konten'] ?></textarea><br>
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>

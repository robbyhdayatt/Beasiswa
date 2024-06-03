<?php
include '../functions.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $detail = $_POST['detail'];
    $link = $_POST['link'];
    $gambar = $_POST['gambar'];

    $query = "INSERT INTO tb_beasiswa (nama, detail, link, gambar) VALUES ('$nama', '$detail', '$link', '$gambar')";
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
    <title>Tambah Beasiswa</title>
</head>
<body>
    <form method="POST" action="">
        Nama: <input type="text" name="nama"><br>
        Detail: <textarea name="detail"></textarea><br>
        Link: <input type="text" name="link"><br>
        Gambar: <input type="text" name="gambar"><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>
</html>

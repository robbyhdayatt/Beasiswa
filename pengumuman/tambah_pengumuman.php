<?php
include '../functions.php';

if (isset($_POST['submit'])) {
    $beasiswa_id = $_POST['beasiswa_id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $tanggal = date('Y-m-d');

    $query = "INSERT INTO tb_pengumuman (beasiswa_id, judul, konten, tanggal) VALUES ('$beasiswa_id', '$judul', '$konten', '$tanggal')";
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
    <title>Tambah Pengumuman</title>
</head>
<body>
    <form method="POST" action="">
        Beasiswa: <input type="number" name="beasiswa_id"><br>
        Judul: <input type="text" name="judul"><br>
        Konten: <textarea name="konten"></textarea><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>
</html>

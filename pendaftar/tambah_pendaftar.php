<?php
include '../functions.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $beasiswa_id = $_POST['beasiswa_id'];
    $tanggal_daftar = date('Y-m-d');

    $query = "INSERT INTO tb_pendaftar (nama, email, beasiswa_id, tanggal_daftar) VALUES ('$nama', '$email', '$beasiswa_id', '$tanggal_daftar')";
    if ($conn->query($query) === TRUE) {
        header("Location: lihat_pendaftar.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pendaftar</title>
</head>
<body>
    <form method="POST" action="">
        Nama: <input type="text" name="nama"><br>
        Email: <input type="email" name="email"><br>
        Beasiswa: <input type="number" name="beasiswa_id"><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>
</html>

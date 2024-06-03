<?php
include '../functions.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_pendaftar WHERE id=$id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $beasiswa_id = $_POST['beasiswa_id'];

    $query = "UPDATE tb_pendaftar SET nama='$nama', email='$email', beasiswa_id='$beasiswa_id' WHERE id=$id";
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
    <title>Edit Pendaftar</title>
</head>
<body>
    <form method="POST" action="">
        Nama: <input type="text" name="nama" value="<?= $row['nama'] ?>"><br>
        Email: <input type="email" name="email" value="<?= $row['email'] ?>"><br>
        Beasiswa: <input type="number" name="beasiswa_id" value="<?= $row['beasiswa_id'] ?>"><br>
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>

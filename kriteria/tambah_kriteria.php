<?php
include '../functions.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];

    $query = "INSERT INTO tb_kriteria (nama, bobot) VALUES ('$nama', '$bobot')";
    if ($conn->query($query) === TRUE) {
        header("Location: lihat_kriteria.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kriteria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Manajemen Beasiswa</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../beasiswa/lihat_beasiswa.php">Beasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pendaftar/lihat_pendaftar.php">Pendaftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lihat_kriteria.php">Kriteria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pengumuman/lihat_pengumuman.php">Pengumuman</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2 class="my-4">Tambah Kriteria</h2>
        <div class="form-container">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nama">Nama Kriteria</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="bobot">Bobot</label>
                    <input type="number" class="form-control" id="bobot" name="bobot" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Sistem Manajemen Beasiswa. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>

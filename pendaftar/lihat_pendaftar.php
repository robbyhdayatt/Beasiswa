<?php
include '../functions.php';
$query = "SELECT * FROM tb_pendaftar";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Pendaftar</title>
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
                    <a class="nav-link" href="lihat_pendaftar.php">Pendaftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../kriteria/lihat_kriteria.php">Kriteria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pengumuman/lihat_pengumuman.php">Pengumuman</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2 class="my-4">Daftar Pendaftar</h2>
        <a href="tambah_pendaftar.php" class="btn btn-primary mb-3">Tambah Pendaftar</a>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Pendaftar</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['telepon'] ?></td>
                    <td>
                        <a href="edit_pendaftar.php?id=<?= $row['id'] ?>" class="btn btn-success" data-toggle="tooltip" title="Edit">Edit</a>
                        <a href="hapus_pendaftar.php?id=<?= $row['id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 Sistem Manajemen Beasiswa. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>

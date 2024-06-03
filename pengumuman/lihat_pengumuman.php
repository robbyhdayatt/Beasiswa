<?php
include '../functions.php';
$query = "SELECT * FROM tb_pengumuman";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Pengumuman</title>
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
                    <a class="nav-link" href="../kriteria/lihat_kriteria.php">Kriteria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lihat_pengumuman.php">Pengumuman</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2 class="my-4">Daftar Pengumuman</h2>
        <a href="tambah_pengumuman.php" class="btn btn-primary mb-3">Tambah Pengumuman</a>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['judul'] ?></td>
                    <td><?= $row['isi'] ?></td>
                    <td><?= $row['tanggal'] ?></td>
                    <td>
                        <a href="edit_pengumuman.php?id=<?= $row['id'] ?>" class="btn btn-success" data-toggle="tooltip" title="Edit">Edit</a>
                        <a href="hapus_pengumuman.php?id=<?= $row['id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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

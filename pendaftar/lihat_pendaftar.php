<?php
include '../functions.php';
$query = "SELECT * FROM tb_pendaftar";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lihat Pendaftar</title>
</head>
<body>
    <a href="tambah_pendaftar.php">Tambah Pendaftar</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Beasiswa</th>
            <th>Tanggal Daftar</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['beasiswa_id'] ?></td>
            <td><?= $row['tanggal_daftar'] ?></td>
            <td>
                <a href="edit_pendaftar.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="hapus_pendaftar.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

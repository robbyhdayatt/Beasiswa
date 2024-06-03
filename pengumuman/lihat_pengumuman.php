<?php
include '../functions.php';
$query = "SELECT * FROM tb_pengumuman";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lihat Pengumuman</title>
</head>
<body>
    <a href="tambah_pengumuman.php">Tambah Pengumuman</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Beasiswa</th>
            <th>Judul</th>
            <th>Konten</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['beasiswa_id'] ?></td>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['konten'] ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td>
                <a href="edit_pengumuman.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="hapus_pengumuman.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

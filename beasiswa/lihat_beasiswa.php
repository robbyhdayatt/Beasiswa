<?php
include '../functions.php';
$query = "SELECT * FROM tb_beasiswa";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lihat Beasiswa</title>
</head>
<body>
    <a href="tambah_beasiswa.php">Tambah Beasiswa</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Detail</th>
            <th>Link</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['detail'] ?></td>
            <td><?= $row['link'] ?></td>
            <td><?= $row['gambar'] ?></td>
            <td>
                <a href="edit_beasiswa.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="hapus_beasiswa.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

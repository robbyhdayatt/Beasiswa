<?php
include '../functions.php';
$query = "SELECT * FROM tb_kriteria";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lihat Kriteria</title>
</head>
<body>
    <a href="tambah_kriteria.php">Tambah Kriteria</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Beasiswa</th>
            <th>Kriteria</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['beasiswa_id'] ?></td>
            <td><?= $row['kriteria'] ?></td>
            <td>
                <a href="edit_kriteria.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="hapus_kriteria.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

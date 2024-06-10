<?php
include 'db.php';
include 'templates/header.php';

// Query untuk mendapatkan data kriteria
$sql = "SELECT Kriteria.id, Beasiswa.nama AS nama_beasiswa, Kriteria.nama, Kriteria.deskripsi
        FROM Kriteria
        JOIN Beasiswa ON Kriteria.beasiswa_id = Beasiswa.id";
$result = $conn->query($sql);

?>

<div class="container">
    <h2>Daftar Kriteria</h2>
    <div class="table-wrapper">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Beasiswa</th>
                    <th>Nama Kriteria</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama_beasiswa']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['deskripsi']; ?></td>
                        <td class="actions">
                            <a href="edit_kriteria.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <form action="delete_kriteria.php" method="POST" style="display:inline-block;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$conn->close();
include 'templates/footer.php';
?>
    
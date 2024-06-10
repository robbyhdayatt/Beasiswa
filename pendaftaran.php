<?php
include 'db.php';
include 'templates/header.php';

// Query untuk mendapatkan data pendaftaran
$sql = "SELECT Pendaftaran.id, Siswa.nama AS nama_siswa, Beasiswa.nama AS nama_beasiswa, Pendaftaran.tanggal_daftar, Pendaftaran.status
        FROM Pendaftaran
        JOIN Siswa ON Pendaftaran.siswa_id = Siswa.id
        JOIN Beasiswa ON Pendaftaran.beasiswa_id = Beasiswa.id";
$result = $conn->query($sql);

?>

<div class="container">
    <h2>Daftar Pendaftaran</h2>
    <div class="table-wrapper">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Siswa</th>
                    <th>Nama Beasiswa</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama_siswa']; ?></td>
                        <td><?php echo $row['nama_beasiswa']; ?></td>
                        <td><?php echo $row['tanggal_daftar']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td class="actions">
                            <a href="edit_pendaftaran.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <form action="delete_pendaftaran.php" method="POST" style="display:inline-block;">
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
